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
                        <label class="label-email-regis" for="">User Role</label>
                        <select name="role" type="text" required>
                            <option>--- Pilih Role ---</option>
                            <option value="dosen">Dosen</option>
                            <option value="admin prodi">Admin Prodi</option>
                            <option value="dosen koordinator">Koordinator</option>
                        </select>
                    </div>
                    <div class="group-form">
                        <label class="label-email-regis" for="">Email</label>
                        <input class="input-email-regis" type="email" name="email" placeholder="Username" required>
                    </div>
                    <div class="group-form">
                        <label class="label-email-regis" for="">Password</label>
                        <input class="input-email-regis" type="password" name="password" placeholder="************" required>
                    </div>
                    <div class="group-form">
                        <label class="label-email-regis" for="">Confirmasi Password</label>
                        <input class="input-email-regis" type="password" name="confirmpassword" placeholder="************" required>
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
                    $role = $_POST['role'];
                    $email = $_POST['email'];
                    $pass = $_POST['password'];
                    $passwordConfirm = $_POST['confirmpassword'];

                    //query
                        if ($pass == $passwordConfirm) {
                            $password = md5($pass);
                            $query =  "INSERT INTO dosen 
        VALUES(NULL, '$nama' , '$email' , '$password', '$role' , 'default_profil.png')";

                            $result = mysqli_query($koneksi, $query);

                            if (!$result) {
                                die("Query gagal dijalankan: " . mysqli_error($koneksi) .
                                    " - " . mysqli_error($koneksi));
                            } else {
                                echo '<script>alert("Registrasi Berhasil")</script>';
                                echo '<script>window.location.href ="login.php";</script>';
                                exit();
                            }
                        } else {
                            echo '<script>alert("Registrasi gagal, Pastikan Anda memasukkan konfirmasi password yang sama")</script>';
                        }
                    } 
                mysqli_close($koneksi);
                ?>

            </div>
        </div>
    </div>

</body>

</html>