<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['Alamat_utama'])
    && isset($_POST['username']) && isset($_POST['No_telepon'])) {
    if ($db->dbConnect()) {
        if ($db->signUp("users", $_POST['email'], $_POST['password'], $_POST['Alamat_utama'], $_POST['username'],
        $_POST['No_telepon'])) {
            echo "Sign Up Success";
        } else echo "Sign up Failed";
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
