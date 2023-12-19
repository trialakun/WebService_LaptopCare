<?php

    include 'koneksi.php';

    $nama_akun = $_POST['nama_akun'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $queryRegister = "SELECT * FROM akun WHERE username = '".$username."'";

    $msql = mysqli_query($koneksi, $queryRegister);

    $result = mysqli_num_rows($msql);

    if (!empty($nama_akun) && !empty($username) && !empty($email) && !empty($password)){
        if($result == 0){
            $regis = "INSERT INTO akun (nama_akun, username, email, password) VALUES ('$nama_akun', '$username', '$email', '$password')";

            $msqlRegis = mysqli_query($koneksi, $regis);

            echo "Daftar Berhasil";
        } else{
            echo "username sudah digunakan";
        }
    } else{
        echo "Semua data harus di isi dengan lengkap!";
    }