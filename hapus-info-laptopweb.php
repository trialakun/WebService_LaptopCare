<?php
include 'koneksi.php';

if (isset($_GET['id_info_laptop'])) {
  $id_info_laptop = $_GET['id_info_laptop'];
$hapus = mysqli_query($koneksi, "DELETE FROM info_laptop WHERE id_info_laptop = '$id_info_laptop'");
  if ($hapus) {
   echo '<script>window.location="info-laptopweb.php"</script>';
 } else {
   echo "Error deleting record: " . mysqli_error($db);
 }
}
 ?>
