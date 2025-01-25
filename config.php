<?php
// Connection DB
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "crudphoto";

// Checking connection database
$con = mysqli_connect($host, $user, $pass, $dbname);
// if($con){
//     echo "Koneksi ke database berhasil";
// } else {
//     echo "Koneksi ke database gagal";
// }