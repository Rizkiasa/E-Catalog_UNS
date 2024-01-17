<?php
session_start();
include '../config.php';

if (!isset($_SESSION["id"]) || !isset($_SESSION["nama"]) || !isset($_SESSION["role"])) {
    echo '<script>alert("Anda harus login sebagai dosen")</script>';
    echo '<script>window.location.href = "../login.php";</script>';
    exit();
}

// Proses ACC tugas akhir dari dosen koordinator
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["acc"])) {
    if ($_SESSION["role"] == "dosen koordinator") {
        $tugasAkhirId = $_GET["id"];

        // Update status tugas akhir menjadi "acc"
        $updateQuery = "UPDATE tugas_akhir SET status='sudah acc' WHERE id='$tugasAkhirId'";
        $updateResult = mysqli_query($koneksi, $updateQuery);

        if ($updateResult) {
            echo '<script>alert("Tugas Akhir berhasil di-ACC dan diunggah ke halaman mahasiswa")</script>';
        } else {
            echo '<script>alert("Gagal meng-ACC tugas akhir")</script>';
        }
    }
}

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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
      <a href="../index.php" class="logo d-flex align-items-center">
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
        <a class="nav-link" href="dashboard_koordinator.php">
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
        <section class="section">
            <div class="container" style='height: auto';>
                <?php if ($_SESSION["role"] == "dosen koordinator") : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Abstrak</th>
                                <th scope="col">Lembar Pengesahan</th>
                                <th scope="col">Kestersediaan Publikasi</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT id, judul, penulis, abstrak, pengesahan_name, ketersediaan_publikasi_name FROM tugas_akhir ORDER BY id DESC");

                            if (!$query) {
                                die("Query error: " . mysqli_error($koneksi));
                            }

                            while ($data = mysqli_fetch_assoc($query)) :
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td><?php echo $data['judul']; ?></td>
                                    <td><?php echo $data['penulis']; ?></td>
                                    <td><?php echo $data['abstrak']; ?></td>
                                    <td>
                                        <a href="open_file.php?id=<?php echo $data['id']; ?>&file=pengesahan">Download Pengesahan</a>
                                    </td>
                                    <td>
                                        <a href="open_file.php?id=<?php echo $data['id']; ?>&file=ketersediaan_publikasi">Download Ketersediaan Publikasi</a>
                                    </td>
                                    <td>
                                        <form method="post" action="?id=<?php echo $data['id']; ?>">
                                            <button class="btn btn-success" onclick="return confirm('Apakah Anda yakin mengkonfirmasi data ini?')" type="submit" name="acc">
                                                <i class='bx bxs-like bx-fade-up-hover'></i><span> Upload </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </section>
    </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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