<?php
include 'koneksi.php';

if (isset($_GET['id_laptop'])) {
  $id_laptop = $_GET['id_laptop'];
$hapus = mysqli_query($koneksi, "DELETE FROM laptop WHERE id_laptop = '$id_laptop'");
  if ($hapus) {
   echo '<script>window.location="info-laptop-user.php"</script>';
 } else {
   echo "Error deleting record: " . mysqli_error($db);
 }
}
 ?>
