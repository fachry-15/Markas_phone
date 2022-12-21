<?php

session_start();

include "../../config/koneksi.php";

$username = $_POST['username'];
$password = ($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * from tb_useradmin where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['admin'] = "login";
    header("location:../index_admin.php");
} else {
    header("location:../login_admin.php");
}
