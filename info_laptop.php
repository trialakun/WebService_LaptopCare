<?php
include 'koneksi.php';

$query_info = "SELECT * FROM info_laptop";
$result_info = mysqli_query($koneksi, $query_info);

$rows_info = array();

if(mysqli_num_rows($result_info) > 0) {
    while($row_info = mysqli_fetch_assoc($result_info)) {
        $rows_info[] = $row_info;
    }
    // Pesan keberhasilan
    echo json_encode(array('message' => 'Data info laptop berhasil diambil', 'data' => $rows_info));
} else {
    // Pesan jika tidak ada data
    echo json_encode(array('message' => 'Tidak ada data info laptop.'));
}

mysqli_close($koneksi);
?>
