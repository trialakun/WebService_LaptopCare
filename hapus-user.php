<?php
include 'koneksi.php';

if (isset($_GET['id_akun'])) {
  $id_akun = $_GET['id_akun'];
$hapus = mysqli_query($koneksi, "DELETE FROM akun WHERE id_akun = '$id_akun'");
  if ($hapus) {
   echo '<script>window.location="info-user.php"</script>';
 } else {
   echo "Error deleting record: " . mysqli_error($db);
 }
}
 ?>
