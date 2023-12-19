<?php
   include 'koneksi.php';

   $username = $_POST['username'];
   $password = $_POST['password'];

   $cek = "SELECT * FROM akun WHERE username = '$username' AND password = '$password'";
   $msql = mysqli_query($koneksi, $cek);
   $result = mysqli_fetch_assoc($msql);

   if(!empty($username) && !empty($password)){
       if($result !== NULL){
           // Login berhasil, kirim data akun
           $response['status'] = 'success';
           $response['message'] = 'Selamat Datang';
           $response['id_akun'] = $result['id_akun'];
           $response['nama_akun'] = $result['nama_akun'];
           $response['username'] = $result['username'];
           $response['email'] = $result['email'];

           $id_akun = $result['id_akun'];
           $fetchLaptop = "SELECT * FROM laptop WHERE id_akun = $id_akun";
           $mysql2 = mysqli_query($koneksi, $fetchLaptop);
           $updatedLaptop = mysqli_fetch_assoc($mysql2);

           // Tambahkan data terbaru ke dalam response
           $response['id_laptop'] = $updatedLaptop['id_laptop'];
           $response['nama_laptop'] = $updatedLaptop['nama_laptop'];
           $response['sistem_operasi'] = $updatedLaptop['sistem_operasi'];
           $response['processor'] = $updatedLaptop['processor'];
           $response['merk_laptop'] = $updatedLaptop['merk_laptop'];
           $response['type_laptop'] = $updatedLaptop['type_laptop'];
           //$response['id_akun'] = $updatedLaptop['id_akun'];

           echo json_encode($response);
       } else {
           // Login gagal
           $response['status'] = 'failed';
           $response['message'] = 'Login gagal';
           echo json_encode($response);
       }
   } else {
       $response['status'] = 'error';
       $response['message'] = 'Ada data yang masih kosong';
       echo json_encode($response);
   }
?>
