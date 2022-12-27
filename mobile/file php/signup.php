<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['email']) && isset($_POST['No_telepon']) && isset($_POST['Alamat_utama'])
    && isset($_POST['username']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->signUp("user", $_POST['email'], $_POST['No_telepon'], $_POST['Alamat_utama'], $_POST['username'],
        $_POST['password'])) {
            echo "Sign Up Success";
        } else echo "Sign up Failed";
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
