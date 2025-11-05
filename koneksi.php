<?php

// ini untuk protokol tcp/ip
$ipserver = "localhost";
$port = "3306";

// ini untuk database mysql
$username = "root";
$password = "";
$database = "kampus";

$connect = null;

try{
    $connection = new mysqli($ipserver, $username, $password, $database, $port);
}catch(Exception $e){
    echo "Koneksi Gagal";
    exit();
}