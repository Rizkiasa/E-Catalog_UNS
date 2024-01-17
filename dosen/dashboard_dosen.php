<?php
session_start();
include '../config.php';

// Cek apakah pengguna sudah login sebagai dosen
if (!isset($_SESSION["id"]) || !isset($_SESSION["nama"]) || !isset($_SESSION["role"])) {
    echo '<script>alert("Anda harus login sebagai dosen")</script>';
    echo '<script>window.location.href = "../login.php";</script>';
    exit();
}

// Ambil data tugas akhir mahasiswa
$sql_tugas_akhir = "SELECT * FROM tugas_akhir";
$result_tugas_akhir = mysqli_query($koneksi, $sql_tugas_akhir);

// Ambil data dokumen tugas akhir
$sql_tugas_akhir2 = "SELECT id, penulis, bab_1_name, bab_2_name, bab_3_name, bab_4_name, bab_5_name FROM tugas_akhir";
$result_tugas_akhir2 = mysqli_query($koneksi, $sql_tugas_akhir2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/logo-uns-biru.png" rel="icon">
    <link href="../assets/img/logo-uns-biru.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendoor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendoor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendoor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendoor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendoor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendoor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendoor/simple-datatables/dashboar.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/dashboard.css" rel="stylesheet">
</head>

<body>


    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="../assets/img/logo-uns-biru.png" alt="">
                <span class="d-none d-lg-block">E-CATALOG</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" href="dashboard_dosen.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            </li><!-- End Forms Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="profile.php">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="../logout.php">
                    <i class="bi bi-person"></i>
                    <span>Log-out</span>
                </a>
            </li>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <div class="container" style='height: auto'>
            <h2>Data Mahasiswa</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>JUDUL</th>
                        <th>PENULIS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row_tugas_akhir = mysqli_fetch_assoc($result_tugas_akhir)): ?>
                    <tr>
                        <td>
                            <?= $row_tugas_akhir["id"]; ?>
                        </td>
                        <td>
                            <?= $row_tugas_akhir["judul"]; ?>
                        </td>
                        <td>
                            <?= $row_tugas_akhir["penulis"]; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Tabel Dokumen Tugas Akhir -->
            <h2>Dokumen Tugas Akhir</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Bab 1</th>
                        <th>Bab 2</th>
                        <th>Bab 3</th>
                        <th>Bab 4</th>
                        <th>Bab 5</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row_tugas_akhir = mysqli_fetch_assoc($result_tugas_akhir2)): ?>
                    <tr>
                        <td>
                            <?= $row_tugas_akhir["id"]; ?>
                        </td>
                        <td>
                            <?= $row_tugas_akhir["penulis"]; ?>
                        </td>
                        <td><a href='download.php?id=<?= $row_tugas_akhir["id"]; ?>&bab=bab_1'>Unduh Bab 1</a></td>
                        <td><a href='download.php?id=<?= $row_tugas_akhir["id"]; ?>&bab=bab_2'>Unduh Bab 2</a></td>
                        <td><a href='download.php?id=<?= $row_tugas_akhir["id"]; ?>&bab=bab_3'>Unduh Bab 3</a></td>
                        <td><a href='download.php?id=<?= $row_tugas_akhir["id"]; ?>&bab=bab_4'>Unduh Bab 4</a></td>
                        <td><a href='download.php?id=<?= $row_tugas_akhir["id"]; ?>&bab=bab_5'>Unduh Bab 5</a></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>



    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendoor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendoor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendoor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendoor/echarts/echarts.min.js"></script>
    <script src="../assets/vendoor/quill/quill.min.js"></script>
    <script src="../assets/vendoor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendoor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendoor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>
