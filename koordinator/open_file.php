<?php
include '../config.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $query = "SELECT penulis, path_pengesahan, path_ketersediaan FROM tugas_akhir WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $penulis ='../'.$row["penulis"];

        $path;

        if ($_GET["file"] == "pengesahan") {
            $path ='../'.$row["path_pengesahan"];
        }else{
            $path ='../'.$row["path_ketersediaan"];
        }

        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $penulis . '_'. basename($path) . '"');

        readfile($path);

        exit();
    } else {
        echo "Data tidak ditemukan untuk ID: $id";
    }
} else {
    echo "ID tidak diterima.";
}
?>
