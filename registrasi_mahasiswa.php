<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="icon" href="assets/img/logo-uns-biru.png" type="image/png">
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
</head>

<body>

    <div class="main-login">
        <div class="content-login">
            <div class="box-form">
                <div class="header-box-form-regis">
                    <b class="welcome">Sign Up</b>
                    <b class="desc">Create your account</b>
                </div>
                <form method="POST" class="form" enctype="multipart/form-data">
                    <div class="group-form">
                        <label class="label-email-regis" for="">Nama Lengkap</label>
                        <input class="input-email-regis" type="text" name="nama" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="group-form">
                        <label class="label-email-regis" for="">NIM</label>
                        <input class="input-email-regis" type="teks" name="nim" placeholder="Masukan NIM" required>
                    </div>
                    <div class="group-form">
                        <label class="label-email-regis" for="">Jurusan</label>
                        <select name="jurusan" type="text" required>
                            <option>--- Pilih Jurusan ---</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknologi Hasil Pertanian">Teknologi Hasil Pertanian</option>
                            <option value="Akuntansi">Akuntansi</option>
                        </select>
                    </div>
                    <div class="group-form">
                        <label class="label-email-regis" for="">Email</label>
                        <input class="input-email-regis" type="email" name="email" placeholder="Username" required>
                    </div>
                    <div class="group-form-footer-regis">
                        <input class="button-login" type="submit" name="Submit" value="Sign Up">
                        <b>Already have an account? <span><a class="span" href="login.php">Sign In</a></span></b>
                    </div>
                </form>
                
                
                <?php

                include('config.php');

                if (isset($_POST['Submit'])) {

                    $nama = $_POST['nama'];
                    $jurusan = $_POST['jurusan'];
                    $email = $_POST['email'];
                    $nim = $_POST['nim'];

                    //query
                        if ($nama != null || $jurusan != null || $email != null || $nim != null) {
                            $query =  "INSERT INTO mahasiswa 
                            VALUES(NULL, '$nama' , '$email' , '$nim', '$jurusan' , 'default_profil.png')";

                            $result = mysqli_query($koneksi, $query);

                            if (!$result) {
                                die("Query gagal dijalankan: " . mysqli_error($koneksi) .
                                    " - " . mysqli_error($koneksi));
                            } else {
                                echo '<script>alert("Registrasi Berhasil")</script>';
                                echo '<script>window.location.href ="login_mahasiswa.php";</script>';
                                exit();
                            }
                        } else {
                            echo '<script>alert("Mohon untuk lengkapi seluruh form")</script>';
                        }
                    } 
                mysqli_close($koneksi);
                ?>

            </div>
        </div>
    </div>

</body>

</html>