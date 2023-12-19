<?php
include 'koneksi.php';

$judul_histori = $_POST['judul_histori'];
$des_histori = $_POST['des_histori'];
$id_laptop = $_POST['id_laptop'];

$query_histori = "INSERT INTO `histori` (`id_histori`, `judul_histori`, `des_histori`, `id_laptop`) VALUES (NULL, '$judul_histori', '$des_histori', '$id_laptop')";
$result_histori = mysqli_query($koneksi, $query_histori);

if($result_histori) {
  // Pesan keberhasilan
  echo json_encode(array('message' => 'Data histori berhasil disimpan'));
} else {
  // Pesan jika gagal
  echo json_encode(array('message' => 'Gagal menyimpan data histori.'));
}

mysqli_close($koneksi);
?>
