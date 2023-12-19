<?php
    $hostname = "localhost";
    $username = "id21579254_root";
    $password = "Mieruch14032003.";
    $dbname = "id21579254_laptopcare";

    $koneksi = mysqli_connect($hostname, $username, $password, $dbname);

    if(!$koneksi){
        echo "koneksi gagal";
    }