<!DOCTYPE html>
<html lang="en">

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
    <?php
    include "layout/header.html"
    ?>
    <?php
    include "service/database.php"; // Pastikan koneksi database sudah benar

    // Periksa koneksi database
    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Ambil data laporan
    $query = "SELECT * FROM laporan_progress";
    $data = mysqli_query($conn, $query) or die(mysqli_error($conn));
    ?>

    <style>
        .container.geser-horizontal {
            max-width: 1200px;
            width: 90%;
            margin: 100px auto;
            /* Reduced from 200px to 50px */
            padding: 0 15px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #00c6aa !important;
            color: white !important;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 198, 170, 0.1);
            transition: background-color 0.3s ease;
        }

        @media (max-width: 768px) {
            .container.geser-horizontal {
                width: 95%;
                margin: 30px auto;
            }
        }
    </style>

    <div class="container geser-horizontal">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-gradient-primary text-white py-3">
                <h3 class="text-center mb-0 font-weight-bold">
                    <i class="fas fa-file-alt mr-2"></i>Data Laporan Masuk
                </h3>
            </div>
            <div class="card-body px-4">
                <div class="table-responsive">
                    <table id="reportTable" class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center font-weight-bold" style="width: 50px;">#</th>
                                <th>Tanggal Upload</th>
                                <th>Nama Pengguna</th>
                                <th>Lokasi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if (mysqli_num_rows($data) > 0) {
                                while ($row = mysqli_fetch_assoc($data)) {
                            ?>
                                    <tr>
                                        <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                                        <td>
                                            <i class="far fa-calendar-alt mr-2 text-primary"></i>
                                            <?php echo htmlspecialchars(date('d M Y H:i', strtotime($row['date']))); ?>
                                        </td>
                                        <td class="font-weight-bold">
                                            <i class="fas fa-user mr-2 text-success"></i>
                                            <?php echo htmlspecialchars($row['namaUser']); ?>
                                        </td>
                                        <td>
                                            <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                            <?php echo htmlspecialchars($row['lokasi']); ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if (!empty($row['file'])) { ?>
                                                <a href="DownloadFile.php?url=<?php echo urlencode($row['file']); ?>"
                                                    class="btn btn-outline-primary btn-sm"
                                                    data-toggle="tooltip"
                                                    title="Download File">
                                                    <i class="fas fa-download mr-1"></i> Download
                                                </a>
                                            <?php } else { ?>
                                                <span class="badge badge-secondary">Tidak ada file</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo '<tr><td colspan="5" class="text-center py-5">
                                <div class="alert alert-info" role="alert">
                                    <i class="fas fa-info-circle mr-2"></i> 
                                    Tidak ada laporan masuk saat ini
                                </div>
                            </td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Required JavaScript Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#reportTable').DataTable({
                "pageLength": 10,
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    ['5 Baris', '10 Baris', '25 Baris', '50 Baris', 'Semua']
                ],
                "order": [
                    [0, 'asc']
                ],
                "language": {
                    "emptyTable": "Tidak ada data yang tersedia",
                    "zeroRecords": "Tidak ada data yang cocok",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "infoFiltered": "(disaring dari _MAX_ total entri)",
                    "lengthMenu": "Tampilkan _MENU_",
                    "search": "Cari:",
                    "paginate": {
                        "first": '<i class="fas fa-angle-double-left"></i>',
                        "last": '<i class="fas fa-angle-double-right"></i>',
                        "next": '<i class="fas fa-angle-right"></i>',
                        "previous": '<i class="fas fa-angle-left"></i>'
                    }
                },
                "responsive": true,
                "columnDefs": [{
                    "orderable": false,
                    "targets": 4
                }]
            });

            // Enable tooltips
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <style>
        .bg-gradient-primary {
            background: linear-gradient(to right, #4e73df 0%, #224abe 100%);
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, .05);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, .075);
        }
    </style>
</body>

</html>