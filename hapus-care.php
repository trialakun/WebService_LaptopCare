<?php
include 'koneksi.php';

if (isset($_GET['id_care'])) {
  $id_care = $_GET['id_care'];
$hapus = mysqli_query($koneksi, "DELETE FROM care WHERE id_care = '$id_care'");
  if ($hapus) {
   echo '<script>window.location="info-care.php"</script>';
 } else {
   echo "Error deleting record: " . mysqli_error($db);
 }
}
 ?>
