<?php
include '../config.php';

// Cek apakah parameter id dan bab diterima
if (isset($_GET["id"]) && isset($_GET["bab"])) {
    $id = $_GET["id"];
    $bab = $_GET["bab"];

    // Pastikan bahwa nama kolom sesuai dengan 'path_bab_X' di mana X adalah nomor bab
    $namaKolom = "path_" . $bab;

    // Ambil data file dari database berdasarkan ID
    $sql = "SELECT penulis, $namaKolom FROM tugas_akhir WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $penulis ='../'.$row["penulis"];
        $file_path ='../'. $row[$namaKolom];

        // Mengatur header untuk file
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $penulis . '_' . $bab . '.pdf"');

        // Mengirimkan file ke output
        readfile($file_path);

        exit();
    } else {
        echo "Data tidak ditemukan untuk ID: $id";
    }
} else {
    echo "ID atau bab tidak diterima.";
}
?>
