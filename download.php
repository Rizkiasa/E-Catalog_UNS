<?php
 $data = mysqli_query($koneksi, "SELECT * FROM tugas_akhir WHERE
 id =" . $_REQUEST['id']);

if ($row = mysqli_fetch_assoc($data)) {
$file = $row['path_bebas_lab'];
}

// Mengecek apakah file ada
if (file_exists($file)) {
// Mengatur header untuk tipe konten file
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . basename($file));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));

// Membaca file dan menuliskannya ke output buffer
ob_clean();
flush();
readfile($file);
exit;
} else {
// File tidak ditemukan
echo "<script>alert('File tidak ditemukan.')</script>";
}
?>