<?php
include "service/database.php";

// Error Reporting (Only for development!)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errorMessage = "";
$successMessage = "";
// Debug information - Remove in production
$debugInfo = "";

// Define upload directory with absolute path
$targetDir = dirname(__FILE__) . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
$debugInfo .= "Target directory path: " . $targetDir . "<br>";

// Create uploads directory with proper permissions if it doesn't exist
if (!file_exists($targetDir)) {
    $debugInfo .= "Directory does not exist, attempting to create...<br>";
    // Make sure parent directory is writable
    if (!is_writable(dirname($targetDir))) {
        $debugInfo .= "Parent directory is not writable!<br>";
        $errorMessage = "Server error: Parent directory is not writable.";
        error_log("Parent directory is not writable: " . dirname($targetDir));
    } else {
        // Create with proper permissions
        $mkdir_result = mkdir($targetDir, 0755, true);
        if (!$mkdir_result) {
            $debugInfo .= "Failed to create directory: " . error_get_last()['message'] . "<br>";
            $errorMessage = "Failed to create upload directory. Check server permissions.";
            error_log("Failed to create directory: " . error_get_last()['message']);
        } else {
            $debugInfo .= "Directory created successfully<br>";
        }
    }
} else {
    // Check if directory is writable
    if (!is_writable($targetDir)) {
        $debugInfo .= "Directory exists but is not writable!<br>";
        $errorMessage = "Server error: Upload directory is not writable.";
        error_log("Upload directory is not writable: " . $targetDir);
    } else {
        $debugInfo .= "Directory exists and is writable<br>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $debugInfo .= "Form submitted.<br>";

    // Check if form was submitted and file was selected
    if (isset($_POST['upload']) && isset($_FILES['file']) && $_FILES['file']['error'] !== UPLOAD_ERR_NO_FILE) {
        $debugInfo .= "Form and file detected.<br>";
        $debugInfo .= "File info: " . print_r($_FILES['file'], true) . "<br>";

        // Check for upload errors
        if ($_FILES["file"]["error"] !== UPLOAD_ERR_OK) {
            $debugInfo .= "Upload error occurred: " . $_FILES["file"]["error"] . "<br>";
            switch ($_FILES["file"]["error"]) {
                case UPLOAD_ERR_INI_SIZE:
                    $errorMessage = "File size exceeds php.ini limit.";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $errorMessage = "File size exceeds HTML form limit.";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $errorMessage = "File was only partially uploaded.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $errorMessage = "No file was uploaded.";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $errorMessage = "Temporary folder not found.";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $errorMessage = "Failed to write file to disk.";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $errorMessage = "PHP extension stopped the upload.";
                    break;
                default:
                    $errorMessage = "Unknown upload error.";
                    break;
            }
            error_log("Upload error: " . $_FILES["file"]["error"]);
        } else {
            $debugInfo .= "No initial upload errors.<br>";

            // Get file information
            $fileName = basename($_FILES["file"]["name"]);
            $fileTmpPath = $_FILES["file"]["tmp_name"];
            $fileSize = $_FILES["file"]["size"];
            $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Validate file type (MIME Type)
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $fileTmpPath);
            finfo_close($finfo);

            $allowedMimeTypes = ['application/pdf', 'image/jpeg', 'image/png', ''];
            if (!in_array($mimeType, $allowedMimeTypes)) {
                $errorMessage = "File type not allowed. MIME Type: " . htmlspecialchars($mimeType);
                $debugInfo .= "Invalid file type.<br>";
            } else {
                $debugInfo .= "Valid file type.<br>";

                // Validate file size
                $maxFileSize = 20 * 1024 * 1024; // 20MB
                if ($fileSize > $maxFileSize) {
                    $errorMessage = "File size too large. Maximum 20MB.";
                    $debugInfo .= "File size too large.<br>";
                } else {
                    $debugInfo .= "File size OK.<br>";

                    // Sanitize form input
                    $namaUser = isset($_POST['namaUser']) ? trim($_POST['namaUser']) : '';
                    $lokasi = isset($_POST['lokasi']) ? trim($_POST['lokasi']) : '';

                    $namaUser = htmlspecialchars($namaUser, ENT_QUOTES, 'UTF-8');
                    $lokasi = htmlspecialchars($lokasi, ENT_QUOTES, 'UTF-8');

                    // Validate form input
                    if (empty($namaUser) || empty($lokasi)) {
                        $errorMessage = "Name and location must be filled.";
                        $debugInfo .= "Name or location empty.<br>";
                    } else {
                        $debugInfo .= "Name and location filled.<br>";

                        // Safe file naming
                        try {
                            $randomString = bin2hex(random_bytes(8));
                            $newFileName = time() . "_" . $randomString . "_" . preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);
                            $targetFilePath = $targetDir . $newFileName;

                            $debugInfo .= "Target file path: " . $targetFilePath . "<br>";

                            // Move file
                            if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
                                $debugInfo .= "File successfully moved.<br>";
                                chmod($targetFilePath, 0644); // Set proper file permissions

                                // Save to database (Prepared Statement)
                                if ($conn === null) {
                                    $errorMessage = "An error occurred (database connection failed).";
                                    $debugInfo .= "Database connection failed.<br>";
                                    error_log("Database connection failed.");
                                } else {
                                    $debugInfo .= "Database connection OK.<br>";
                                    $sql = "INSERT INTO laporan_progress (namaUser, lokasi, file) VALUES (?, ?, ?)";
                                    $stmt = $conn->prepare($sql);

                                    if ($stmt) {
                                        $debugInfo .= "Prepared statement created successfully.<br>";
                                        $stmt->bind_param("sss", $namaUser, $lokasi, $newFileName);
                                        if ($stmt->execute()) {
                                            $debugInfo .= "Data saved successfully.<br>";
                                            $successMessage = "File uploaded and data saved successfully!";
                                        } else {
                                            $debugInfo .= "Error executing statement: " . $stmt->error . "<br>";
                                            $errorMessage = "Failed to save data: " . $stmt->error;
                                            error_log("Error executing statement: " . $stmt->error);
                                        }
                                        $stmt->close();
                                    } else {
                                        $debugInfo .= "Error preparing statement: " . $conn->error . "<br>";
                                        $errorMessage = "Query error: " . $conn->error;
                                        error_log("Error preparing statement: " . $conn->error);
                                    }
                                }
                            } else {
                                $debugInfo .= "Failed to move file. Check permissions.<br>";
                                $errorMessage = "An error occurred while uploading the file.";
                                error_log("Failed to move uploaded file from {$fileTmpPath} to {$targetFilePath}");
                            }
                        } catch (Exception $e) {
                            $debugInfo .= "Exception: " . $e->getMessage() . "<br>";
                            $errorMessage = "An error occurred during processing.";
                            error_log("Exception during file upload: " . $e->getMessage());
                        }
                    }
                }
            }
        }
    } else {
        $errorMessage = "Form incomplete or no file selected.";
        $debugInfo .= "Form incomplete or no file selected.<br>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Laporan Sampah Jogja</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- font css -->
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>

<body>
    <div class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="report.php">Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="visualization.php">Visualization</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <div class="login_bt">
                            <ul>
                                <li><a href="#">Sign Up</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </nav>
        </div>

        <div class="form-report">
            <form action="progressReport.php" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <h3>Nama</h3>
                        </td>
                        <td>
                            <input type="text" name="namaUser">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Lokasi</h3>
                        </td>
                        <td>
                            <select id="lokasi" name="lokasi" required>
                                <!-- Options will be populated by JavaScript -->
                            </select>
                        </td>
                    </tr>
                </table>
                <div class="drp-container">
                    <div id="drop-zone" class="drop-zone">
                        <div class="drop-zone-content">
                            <svg class="upload-icon" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>

                            <div class="drop-zone-text">
                                <p>Select files to upload</p>
                            </div>

                            <label class="browse-button">
                                Browse Files
                                <input type="file" id="file-input" name="file" multiple>
                            </label>
                        </div>
                    </div>

                    <div id="file-list-container" class="file-list-container hidden">
                        <h3 class="file-list-title">Uploaded Files (<span id="file-count">0</span>)</h3>
                        <ul id="file-list" class="file-list"></ul>
                    </div>
                    <input type="submit" name="upload" value="upload">
                </div>
            </form>

        </div>
        <div class="debug-section" style="margin: 20px; padding: 15px; border: 1px solid #ccc; background-color: #f9f9f9;">
            <h3>Debug Information</h3>
            <?php
            if (!empty($debugInfo)) {
                echo $debugInfo;
            } else {
                echo "Belum ada informasi debugging.";
            }
            ?>
        </div>
        <?php
        include "layout/scriptBody.html"
        ?>
        <script type="module" src="public/lokasiData.js"></script>
        <script type="module" src="public/locations.js"></script>
        <script type="module" src="public/dropcontainer.js"></script>
</body>

</html>