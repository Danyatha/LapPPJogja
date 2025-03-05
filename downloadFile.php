<?php
// downloadFile.php

// Path ke direktori uploads (SAMA PERSIS DENGAN SCRIPT UPLOAD)
$uploadDir = dirname(__FILE__) . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;

$file = $_GET['url'] ?? null;

// Tambahkan logging (untuk debugging)
error_log("Attempting to download: " . $file);

if ($file) {
    // Buat path absolut ke file
    $filePath = $uploadDir . $file;
    error_log("Full file path: " . $filePath);

    // Validasi dan cegah path traversal
    $realPath = realpath($filePath);
    error_log("Real path: " . $realPath);


    if ($realPath === false || strpos($realPath, $uploadDir) !== 0) {
        error_log("Path traversal detected or file not found/accessible!");
        header("HTTP/1.1 403 Forbidden");
        echo "Forbidden: Access denied to the requested file.";
        exit;
    }


    if (file_exists($realPath) && is_readable($realPath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($realPath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($realPath));

        ob_clean();
        flush();
        readfile($realPath);
        exit;
    } else {
        error_log("File not found or not readable after realpath check.");
        header("HTTP/1.1 404 Not Found");
        echo "Error: File not found or access denied.";
        exit;
    }
} else {
    error_log("No file specified for download.");
    header("HTTP/1.1 400 Bad Request"); // Lebih baik dari 404 jika parameter URL tidak ada
    echo "Error: No file specified.";
    exit;
}
