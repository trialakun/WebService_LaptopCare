<?php
include 'koneksi.php';

$id_laptop = $_POST['id_laptop'];
$nama_laptop = $_POST['nama_laptop'];
$sistem_operasi = $_POST['sistem_operasi'];
$processor = $_POST['processor'];
$merk_laptop = $_POST['merk_laptop'];
$type_laptop = $_POST['type_laptop'];
$id_akun = $_POST['id_akun'];

// Lakukan query untuk memeriksa apakah id_akun sudah ada
$cek = "SELECT * FROM laptop WHERE id_akun = $id_akun";
$msql = mysqli_query($koneksi, $cek);
$result = mysqli_fetch_assoc($msql);

if ($result == 0) {
   // Jika data belum ada, lakukan insert
   $insert_query = "INSERT INTO `laptop` (`id_laptop`,`nama_laptop`, `sistem_operasi`, `processor`, `merk_laptop`, `type_laptop`, `id_akun`) VALUES (NULL,'$nama_laptop', '$sistem_operasi', '$processor', '$merk_laptop', '$type_laptop', '$id_akun')";
   $insert_result = mysqli_query($koneksi, $insert_query);

  if ($insert_result !== FALSE) {
      // Insert berhasil
      $response['status'] = 'success';
      $response['message'] = 'Data berhasil ditambahkan';

      // Ambil data terbaru dari laptop setelah insert
      $fetchLaptop = "SELECT * FROM laptop WHERE id_akun = $id_akun";
      $result = mysqli_query($koneksi, $fetchLaptop);
      $insertedLaptop = mysqli_fetch_assoc($result);

      // Tambahkan data terbaru ke dalam response
      $response['id_laptop'] = $insertedLaptop['id_laptop'];
      $response['nama_laptop'] = $insertedLaptop['nama_laptop'];
      $response['sistem_operasi'] = $insertedLaptop['sistem_operasi'];
      $response['processor'] = $insertedLaptop['processor'];
      $response['merk_laptop'] = $insertedLaptop['merk_laptop'];
      $response['type_laptop'] = $insertedLaptop['type_laptop'];
      $response['id_akun'] = $insertedLaptop['id_akun'];

      echo json_encode($response);
  } else {
      // Insert gagal
      $response['status'] = 'failed';
      $response['message'] = 'Gagal menambahkan data';
      echo json_encode($response);
  }
} else {
    // Jika data sudah ada, lakukan update
    $update_query = "UPDATE laptop SET nama_laptop = '$nama_laptop', sistem_operasi = '$sistem_operasi', processor = '$processor', merk_laptop = '$merk_laptop', type_laptop = '$type_laptop' WHERE id_akun = $id_akun";
    $update_result = mysqli_query($koneksi, $update_query);
    
    if ($update_result) {
        // Update berhasil
        $response['status'] = 'success';
        $response['message'] = 'Data berhasil diupdate';

        // Ambil data terbaru dari laptop setelah update
        $fetchLaptop = "SELECT * FROM laptop WHERE id_akun = $id_akun";
        $result = mysqli_query($koneksi, $fetchLaptop);
        $updatedLaptop = mysqli_fetch_assoc($result);

        // Tambahkan data terbaru ke dalam response
        $response['id_laptop'] = $updatedLaptop['id_laptop'];
        $response['nama_laptop'] = $updatedLaptop['nama_laptop'];
        $response['sistem_operasi'] = $updatedLaptop['sistem_operasi'];
        $response['processor'] = $updatedLaptop['processor'];
        $response['merk_laptop'] = $updatedLaptop['merk_laptop'];
        $response['type_laptop'] = $updatedLaptop['type_laptop'];
        $response['id_akun'] = $updatedLaptop['id_akun'];

        echo json_encode($response);
    } else {
        // Update gagal
        $response['status'] = 'failed';
        $response['message'] = 'Gagal mengupdate data';
        echo json_encode($response);
    }
}
?>
