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
                        <label class="label-email-login" for="">Password</label>
                        <input class="input-email-login" type="password" name="password" placeholder="************" required>
                    </div>
                    <div class="group-form-footer">
                        <input class="button-login" type="submit" name="login" value="Login">
                        <b>Don’t have an account? <span><a class="span" href="register.php">Registrasi</a></span></b>
                    </div>
                </form>

                <?php
if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $pass = mysqli_real_escape_string($koneksi, md5($_POST['password']));

    $sql_aktif = mysqli_query($koneksi, "SELECT * FROM dosen WHERE email='$email'");
    $cek_akun_aktif = mysqli_num_rows($sql_aktif);
    $data_akun = mysqli_fetch_assoc($sql_aktif);
    $password = $data_akun['password'];
    

    if ($cek_akun_aktif > 0) {
        if ($pass == $password) {
            $_SESSION['id'] = $data_akun['id'];
            $_SESSION['nama'] = $data_akun['nama'];
            $_SESSION['role'] = $data_akun['role'];

            // Redirect sesuai peran (role)
            switch ($_SESSION['role']) {
                case 'admin prodi':
                    echo '<script>window.location.href = "admin_prodi/dashboard_admin_prodi.php";</script>';
                    break;
                case 'dosen':
                    echo '<script>window.location.href = "dosen/dashboard_dosen.php";</script>';
                    break;
                case 'dosen koordinator':
                    echo '<script>window.location.href = "koordinator/dashboard_koordinator.php";</script>';
                    break;
            }
        } else {
            echo "<script>alert('Password Anda salah');</script>";
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