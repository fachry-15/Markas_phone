<?php
$hostmysql = "localhost";
$username = "root";
$password = "";
$database = "db_markas";

$con = mysqli_connect($hostmysql, $username, $password, $database);

if (!$con) die ("Koneksi gagal");
mysqli_select_db($con, $database) or die ("Database tidak ditemukan"); 
?>