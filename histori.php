<?php
include 'koneksi.php';

// Mengambil id_laptop dari parameter URL
$id_laptop = $_GET['id_laptop'];

$stmt = $koneksi->prepare("SELECT * FROM histori WHERE id_laptop = ?");
$stmt->bind_param("s", $id_laptop);
$stmt->execute();

$result = $stmt->get_result();
$rows = array();

if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      $rows[] = $row;
  }
  // Pesan keberhasilan
  echo json_encode(array('message' => 'Data history berhasil diambil', 'data' => $rows));
} else {
  // Pesan jika tidak ada data
  echo json_encode(array('message' => 'Tidak ada data history.'));
}

$stmt->close();
$koneksi->close();
?>
