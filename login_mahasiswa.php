<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include 'config.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="icon" href="assets/img/logo-uns-biru.png" type="image/png">
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
</head>

<body>

    <div class="main-login">
        <div class="content-login">

            <div class="box-form">
                <div class="header-box-form">
                    <b class="welcome">SELAMAT DATANG</b>
                    <b class="desc">Please enter your email and password</b>
                </div>
                <form method="POST" class="form" enctype="multipart/form-data">
                    <div class="group-form">
                        <label class="label-email-login" for="">Username</label>
                        <input class="input-email-login" type="email" name="email" placeholder="Username" required>
                    </div>
                    <div class="group-form">
                        <label class="label-email-login" for="">NIM</label>
                        <input class="input-email-login" type="teks" name="nim" placeholder="Masukan NIM" required>
                    </div>
                    <div class="group-form-footer">
                        <input class="button-login" type="submit" name="login" value="Login">
                        <b>Don’t have an account? <span><a class="span" href="registrasi_mahasiswa.php">Registrasi</a></span></b>
                    </div>
                </form>

                <?php
                if (isset($_POST["login"])) {

                    $email = $_POST["email"];
                    $nim = $_POST["nim"];

                    $sql_aktif = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE email='$email'");
                    $cek_akun_aktif = mysqli_num_rows($sql_aktif);
                    $data_akun = mysqli_fetch_assoc($sql_aktif);
                    $nim_dariBD = $data_akun['nim'];

                    
                        if ($cek_akun_aktif > 0) {
                            if ($nim == $nim_dariBD) {
                                $_SESSION['id'] = $data_akun['id'];
                                $_SESSION['nama'] = $data_akun['nama'];
                                $_SESSION['jurusan'] = $data_akun['jurusan'];

                                echo '<script>window.location.href = "dashboard.php";</script>';
                            } else {
                                echo "<script>
                    alert('password Anda salah');
                </script>";
                            }
                        } else {
                            echo '<script>alert("Akun Anda belum terdaftar")</script>';
                            echo '<script>window.location.href = "register.php";</script>';
                        }
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>