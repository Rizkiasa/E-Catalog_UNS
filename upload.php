<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo-uns-biru.png" rel="icon">
  <link href="assets/img/logo-uns-biru.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendoor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendoor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendoor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendoor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendoor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendoor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo-uns-biru.png" alt="">
        <span class="d-none d-lg-block">E-CATALOG</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link" href="upload.php">
          <i class="bi bi-journal-text"></i><span>Upload</span>
        </a>
      </li><!-- End Forms Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-person"></i>
          <span>Log-out</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Upload</h1>
       <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Upload</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

    <div class="class">
        <div class="class-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="input-container">
                    <label for="judul">Judul TA:</label>
                    <input type="text" id="judul" name="judul" required>
                </div>
                <div class="input-container">
                    <label for="penulis">Nama Penulis:</label>
                    <input type="text" id="penulis" name="penulis" required>
                </div>
                <div class="input-container">
                    <label for="nim">NIM:</label>
                    <input type="text" id="nim" name="nim" required>
                </div>
                <div class="input-container">
                    <label for="abstrak">Abstrak:</label>
                    <textarea id="abstrak" name="abstrak" rows="4" required></textarea>
                </div>
                <div class="input-container">
                    <label for="bab_1">BAB 1(PDF):</label>
                    <input type="file" id="bab_1" name="bab_1" accept=".pdf" required>
                </div>
                <div class="input-container">
                    <label for="bab_2">BAB 2(PDF):</label>
                    <input type="file" id="bab_2" name="bab_2" accept=".pdf" required>
                </div>
                <div class="input-container">
                    <label for="bab_3">BAB 3(PDF):</label>
                    <input type="file" id="bab_3" name="bab_3" accept=".pdf" required>
                </div>
                <div class="input-container">
                    <label for="bab_4">BAB 4(PDF):</label>
                    <input type="file" id="bab_4" name="bab_4" accept=".pdf" required>
                </div>
                <div class="input-container">
                    <label for="bab_5">BAB 5(PDF):</label>
                    <input type="file" id="bab_5" name="bab_5" accept=".pdf" required>
                </div>
                <div class="input-container">
                    <label for="pengesahan">Lembar Pengesahan(PDF):</label>
                    <input type="file" id="pengesahan" name="pengesahan" accept=".pdf" required>
                </div>
                <div class="input-container">
                    <label for="bebas_lab">Lembar Bebas Lab(PDF):</label>
                    <input type="file" id="bebas_lab" name="bebas_lab" accept=".pdf" required>
                </div>
                <div class="input-container">
                    <label for="kesediaan_publikasi">Lembar Kesediaan Publikasi(PDF):</label>
                    <input type="file" id="kesediaan_publikasi" name="kesediaan_publikasi" accept=".pdf" required>
                </div>
                <div class="input-container">
                    <label for="poster_ta">Poster TA (Gambar):</label>
                    <input type="file" id="poster_ta" name="poster_ta" accept="image/*" required>
                </div>
                <div class="input-container">
                    <label for="github_link">Link GitHub:</label>
                    <input type="text" id="github_link" name="github_link" required>
                </div>
                <input type="submit" name="upload" value="Upload">
            </form>
            <?php

            include('config.php');

            if (isset($_POST['upload'])) {
                $judul = $_POST['judul'];
                $abstrak = $_POST['abstrak'];
                $penulis = $_POST ["penulis"];
                $nim = $_POST["nim"];
                $abstrak = $_POST['abstrak'];
                $link_github = $_POST['github_link'];
                $pengesahan_name = $_FILES['pengesahan']['name'];
                $bebas_lab_name = $_FILES['bebas_lab']['name'];
                $kesediaan_publikasi_name = $_FILES['kesediaan_publikasi']['name'];
                $bab_1_name = $_FILES['bab_1']['name'];
                $bab_2_name = $_FILES['bab_2']['name'];
                $bab_3_name = $_FILES['bab_3']['name'];
                $bab_4_name = $_FILES['bab_4']['name'];
                $bab_5_name = $_FILES['bab_5']['name'];
                $pengesahan_tmp = $_FILES['pengesahan']['tmp_name'];
                $bebas_lab_tmp = $_FILES['bebas_lab']['tmp_name'];
                $kesediaan_publikasi_tmp = $_FILES['kesediaan_publikasi']['tmp_name'];
                $bab_1_tmp = $_FILES['bab_1']['tmp_name'];
                $bab_2_tmp = $_FILES['bab_2']['tmp_name'];
                $bab_3_tmp = $_FILES['bab_3']['tmp_name'];
                $bab_4_tmp = $_FILES['bab_4']['tmp_name'];
                $bab_5_tmp = $_FILES['bab_5']['tmp_name'];
                $pengesahan_path = "assets/file/pengesahan/" . $pengesahan_name;
                $bebas_lab_path = "assets/file/bebas_lab/" . $bebas_lab_name;
                $ketersediaan_publikasi_path = "assets/file/ketersediaan_publikasi/" . $kesediaan_publikasi_name;
                $bab_1_path = "assets/file/bab_1/". $bab_1_name;
                $bab_2_path = "assets/file/bab_2/". $bab_2_name;
                $bab_3_path = "assets/file/bab_3/". $bab_3_name;
                $bab_4_path = "assets/file/bab_4/". $bab_4_name;
                $bab_5_path = "assets/file/bab_5/". $bab_5_name;

                echo $bab_1_path ;


                $poster = $_FILES['poster_ta']['name'];
                $poster_tmp = $_FILES['poster_ta']['tmp_name'];
                $poster_path = "assets/img/poster/" . $poster;
                //query
                $query =  "INSERT INTO tugas_akhir VALUES(
                  NULL, 
                  '$judul' , 
                  '$penulis' , 
                  '$nim' , 
                  '$abstrak' , 
                  '$bab_1_name',
                  '$bab_2_name',
                  '$bab_3_name',
                  '$bab_4_name',
                  '$bab_5_name', 
                  '$pengesahan_name', 
                  '$kesediaan_publikasi_name', 
                  '$bebas_lab_name', 
                  '$bab_1_path',
                  '$bab_2_path',
                  '$bab_3_path',
                  '$bab_4_path',
                  '$bab_5_path' ,  
                  '$link_github' , 
                  '$ketersediaan_publikasi_path', 
                  '$pengesahan_path', 
                  '$bebas_lab_path', 
                  '$poster',
                  'belum acc'
                  )";
                $result = mysqli_query($koneksi, $query);

                    if (!$result) {
                        die("Query gagal dijalankan: " . mysqli_error($koneksi) .
                            " - " . mysqli_error($koneksi));
                    } else {
                      
                      move_uploaded_file($pengesahan_tmp, $pengesahan_path);
                      move_uploaded_file($bebas_lab_tmp, $bebas_lab_path);
                      move_uploaded_file($kesediaan_publikasi_tmp, $ketersediaan_publikasi_path);
                      move_uploaded_file($poster_tmp, $poster_path);
                      move_uploaded_file($bab_1_tmp, $bab_1_path);
                      move_uploaded_file($bab_2_tmp, $bab_2_path);
                      move_uploaded_file($bab_3_tmp, $bab_3_path);
                      move_uploaded_file($bab_4_tmp, $bab_4_path);
                      move_uploaded_file($bab_5_tmp, $bab_5_path);
                        echo '<script>alert("Data berhasil ditambahkan")</script>';
                        echo '<script>window.location.href ="upload.php";</script>';
                        exit();
                    }
                
            }

            mysqli_close($koneksi);
            ?>
        </div>
    </div>
    

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendoor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendoor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendoor/chart.js/chart.umd.js"></script>
  <script src="assets/vendoor/echarts/echarts.min.js"></script>
  <script src="assets/vendoor/quill/quill.min.js"></script>
  <script src="assets/vendoor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendoor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendoor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/dashboard.js"></script>

</body>

</html>