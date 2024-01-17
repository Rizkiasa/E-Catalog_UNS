<?php
session_start();
include '../config.php';

// Cek apakah pengguna sudah login sebagai dosen
if (!isset($_SESSION["id"]) || !isset($_SESSION["nama"]) || !isset($_SESSION["role"])) {
  echo '<script>alert("Anda harus login sebagai dosen")</script>';
  echo '<script>window.location.href = "../login.php";</script>';
  exit();
}

if ($_SESSION["role"] != "admin prodi") {
  echo '<script>alert("Anda tidak memiliki izin untuk mengakses halaman ini")</script>';
  echo '<script>window.location.href = "dashboard_admin_prodi.php";</script>';
  exit();
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

  <link href="../assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="../assets/img/logo-uns-biru.png" alt="">
        <span class="d-none d-lg-block">E-CATALOG</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

  </header>

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="dashboard_admin_prodi.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      </li>

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="../logout.php">
          <i class="bi bi-person"></i>
          <span>Log-out</span>
        </a>
      </li>

  </aside>

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
    <?php
    if ($_SESSION["role"] == "admin prodi") {
      ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Gambar Poster</th>
            <th scope="col">Berkas Bebas Lab</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $query = mysqli_query($koneksi, "SELECT id, penulis, poster_image, bebas_lab_name, status FROM tugas_akhir
                ORDER BY id DESC
            ");

          while ($data = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
              <th scope="row">
                <?php echo $no++ ?>
              </th>
              <td><img src="../assets/img/poster/<?php echo $data['poster_image'] ?>" alt="Gambar Poster 1"
                  class="img-thumbnail" style="max-width: 100px;"></td>
              <td>
                <?php echo $data['bebas_lab_name'] ?>
              </td>
              <td>
                <a class="btn btn-success" onclick href="open_file.php?id=<?php echo $data['id'] ?>">
                  Download</i>
                </a>
                <?php ?>
              </td>
            </tr>
            <?php
          }
          ?>

        </tbody>
      </table>
    <?php } ?>

  </main>

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

  <script src="../assets/js/dashboard.js"></script>
</body>

</html>