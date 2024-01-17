<?php
session_start();

include 'config.php';

// Cek apakah parameter id diterima
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Ambil data tugas akhir berdasarkan ID dari database
    $sql = "SELECT judul, penulis, nim, poster_image, abstrak, github_link FROM tugas_akhir WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $judul = $row["judul"];
        $penulis = $row["penulis"];
        $nim = $row["nim"]; 
        $poster = $row["poster_image"];
        $abstrak = $row["abstrak"];
        $githubLink = $row["github_link"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas Akhir</title>
    <link href="assets/img/logo-uns-biru.png" rel="icon">
    <link rel="stylesheet" href="assets/css/detail.css">
</head>
<body>
    <div class="container">
        <h1>Detail Tugas Akhir</h1>
        <div class="ta-detail">
            <img src="assets/img/poster/<?php echo $poster; ?>" alt="Poster TA" width="100px">
            <h2><?php echo $judul; ?></h2>
            <p><strong>Penulis:</strong> <?php echo $penulis; ?></p>
            <p><strong>NIM:</strong> <?php echo $nim; ?></p>
            <p><strong>Abstrak:</strong> <?php echo $abstrak; ?></p>
            <p><strong>Link GitHub:</strong> <a href="<?php echo $githubLink; ?>" target="_blank"><?php echo $githubLink; ?></a></p>
        </div>
        <a href="dashboard.php" class="btn-back">Kembali ke Dashboard</a>
    </div>
</body>
</html>
<?php
    }
}
?>