<?php
    include 'koneksi.php';

    $nama_akun = $_POST['nama_akun'];
    $email = $_POST['email'];
    $id_akun = $_POST['id_akun'];

    $cek = "UPDATE `akun` SET `nama_akun` = '$nama_akun', `email` = '$email' WHERE `id_akun` = $id_akun";
    $msql = mysqli_query($koneksi, $cek);

    if($msql){
        // Update successful
        $response['status'] = 'success';
        $response['message'] = 'Update akun berhasil!';

        $fetchUser = "SELECT * FROM akun WHERE id_akun = $id_akun";
        $result = mysqli_query($koneksi, $fetchUser);
        $updatedUser = mysqli_fetch_assoc($result);

        $response['id_akun'] = $updatedUser['id_akun'];
        $response['nama_akun'] = $updatedUser['nama_akun'];
        $response['username'] = $updatedUser['username'];
        $response['email'] = $updatedUser['email'];
        echo json_encode($response);
    } else {
        // Update failed
        $response['status'] = 'failed';
        $response['message'] = 'Update akun gagal!';
        echo json_encode($response);
    }
?>
