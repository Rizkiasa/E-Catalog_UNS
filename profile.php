<?php
session_start();
include 'config.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION["id"]) || !isset($_SESSION["nama"]) || !isset($_SESSION["jurusan"])) {
    echo '<script>alert("Anda harus login dahulu")</script>';
    echo '<script>window.location.href = "login_mahasiswa.php";</script>';
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id =" . $_SESSION['id']);
    while ($data = mysqli_fetch_assoc($query)) {
        // Halaman Admin Prodi
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">

            <title>Profile</title>
            <meta content="" name="description">
            <meta content="" name="keywords">

            <!-- Favicons -->
            <link href=".../assets/img/logo-uns-biru.png" rel="icon">
            <link href=".../assets/img/logo-uns-biru.png" rel="apple-touch-icon">

            <!-- Google Fonts -->
            <link href="https://fonts.gstatic.com" rel="preconnect">
            <link
                href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
                rel="stylesheet">

            <!-- Vendor CSS Files -->
            <link href="assets/vendoor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="assets/vendoor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
            <link href="assets/vendoor/boxicons/css/boxicons.min.css" rel="stylesheet">
            <link href="assets/vendoor/quill/quill.snow.css" rel="stylesheet">
            <link href="assets/vendoor/quill/quill.bubble.css" rel="stylesheet">
            <link href="assets/vendoor/remixicon/remixicon.css" rel="stylesheet">
            <link href="assets/vendoor/simple-datatables/dashboar.css" rel="stylesheet">

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
                        <a class="nav-link collapsed" href="upload.php">
                            <i class="bi bi-journal-text"></i><span>Upload</span>
                        </a>
                    </li>

                    <li class="nav-heading">Pages</li>

                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">
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
                    <h1>Profile</h1>
                    <div class="pagetitle">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </nav>
                    </div><!-- End Page Title -->
                </div><!-- End Page Title -->

                <section class="section profile">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                    <img src="assets/img/<?php echo $data['foto_profil'] ?>" alt="Profile"
                                        class="rounded-circle">
                                    <h2 class="text-center">
                                        <?php echo $data['nama'] ?>
                                    </h2>
                                    <h3>
                                        <?php echo $data['jurusan'] ?>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body pt-3">
                                    <!-- Bordered Tabs -->
                                    <ul class="nav nav-tabs nav-tabs-bordered">
                                        <li class="nav-item">
                                            <button class="nav-link active" data-bs-toggle="tab"
                                                data-bs-target="#profile-edit">Edit Profile</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-2">
                                        <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                                            <!-- Profile Edit Form -->
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="row mb-3">
                                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                        Image</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <img src="assets/img/<?php echo $data['foto_profil'] ?>"
                                                            alt="Profile" class="rounded-circle">
                                                        <div class="pt-2">
                                                            <input type="file" name="profileImage" id="profileImage"
                                                                accept="image/*" />
                                                            <small class="text-muted">Accepted formats: JPG, JPEG, PNG</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input name="nama" type="text" class="form-control" id="fullName"
                                                            value="<?php echo $data['nama'] ?>">
                                                    </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Jurusan</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="jurusan" type="text" class="form-control" required>
                                                    <option value="<?php echo $data['jurusan']; ?>" <?php if ($data['jurusan'] == $data['jurusan'])
                                                           echo 'selected="selected"'; ?>>
                                                        <?php echo $data['jurusan']; ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="Email"
                                                    value="<?php echo $data['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <input name="Submit_update" type="submit" class="btn btn-primary"
                                                value="Save Changes">
                                        </div>
                                        </form><!-- End Profile Edit Form -->

                                        <?php
                                        if (isset($_POST['Submit_update'])) {
                                            $nama = $_POST['nama'];
                                            $jurusan = $_POST['jurusan'];
                                            $email = $_POST['email'];

                                            // Proses upload foto profil
                                            if ($_FILES['profileImage']['name'] != '') {
                                                $targetDir = 'assets/img/';
                                                $fileName = basename($_FILES['profileImage']['name']);
                                                $targetFilePath = $targetDir . $fileName;
                                                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                                                // Cek apakah file adalah gambar
                                                $allowTypes = array('jpg', 'png', 'jpeg');
                                                if (in_array($fileType, $allowTypes)) {
                                                    // Upload file
                                                    if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetFilePath)) {
                                                        $foto_profil = $fileName;
                                                    } else {
                                                        echo '<script>alert("Gagal mengunggah file gambar.")</script>';
                                                        echo '<script>window.location.href = "profile.php";</script>';
                                                        exit();
                                                    }
                                                } else {
                                                    echo '<script>alert("Hanya file gambar JPG, JPEG, dan PNG yang diizinkan.")</script>';
                                                    echo '<script>window.location.href = "profile.php";</script>';
                                                    exit();
                                                }
                                            } else {
                                                $foto_profil = $data['foto_profil'];
                                            }


                                            if (
                                                $data['nama'] == $nama &&
                                                $data['jurusan'] == $jurusan &&
                                                $data['email'] == $email &&
                                                $data['foto_profil'] == $foto_profil
                                            ) {
                                                echo '<script>alert("Anda tidak melakukan pengubahan data")</script>';
                                                echo '<script>window.location.href = "profile.php";</script>';
                                            } else {
                                                if ($data['jurusan'] == $jurusan && $data['email'] == $email) {
                                                    $query = "UPDATE mahasiswa SET 
                                                            nama='$nama',
                                                            foto_profil='$foto_profil'
                                                            WHERE id ='" . $data['id'] . "'";


                                                    $result = mysqli_query($koneksi, $query);

                                                    if (!$result) {
                                                        echo '<script>alert("Gagal update")</script>';
                                                        echo '<script>window.location.href = "profile.php";</script>';
                                                    } else {
                                                        echo '<script>alert("Nama dan Foto Profil berhasil diubah")</script>';
                                                        echo '<script>window.location.href = "profile.php";</script>';
                                                        exit();
                                                    }
                                                    } else {
                                                        $query = "UPDATE mahasiswa SET 
                                                                nama='$nama',
                                                                jurusan ='$jurusan',
                                                                email ='$email'
                                                                foto_profil='$foto_profil'
                                                                WHERE id ='" . $data['id'] . "'";
                                                    }
                                                    $result = mysqli_query($koneksi, $query);

                                                    if (!$result) {
                                                        die("Query gagal dijalankan: " . mysqli_error($koneksi) .
                                                          " - " . mysqli_error($koneksi));
                                                      } else {
                                                        echo '<script>alert("Data User berhasil diubah, Anda mengubah role atau email maka Anda akan logout dari sistem. Lakukan login kembali.")</script>';
                                                        echo '<script>window.location.href = "logout.php";</script>';
                                                    }
                                                }
                                            }
                                        }
                                             mysqli_close($koneksi);
                                        ?>

                                    </div>
                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                    </div>
                    </div>
                </section>

            </main><!-- End #main -->

            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>


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
        <?php
    }

?>