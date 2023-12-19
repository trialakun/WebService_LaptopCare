<?php
include 'koneksi.php';

if (isset($_GET['id_histori'])) {
  $id_histori = $_GET['id_histori'];
$hapus = mysqli_query($koneksi, "DELETE FROM histori WHERE id_histori = '$id_histori'");
  if ($hapus) {
   echo '<script>window.location="info-histori.php"</script>';
 } else {
   echo "Error deleting record: " . mysqli_error($db);
 }
}
 ?>
