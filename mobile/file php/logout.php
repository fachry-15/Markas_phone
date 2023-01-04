<?php
if (!empty($_POST['username']) && !empty($_POST['apiKey'])) {
    $username = $_POST['username'];
    $apiKey = $_POST['apiKey'];
require DataBaseConfig;
    if ($con) {
        $sql = "select * from user where username = '" . $username . "' and apiKey = '" . $apiKey . "'";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) != 0) {
            $row = mysqli_fetch_assoc($res);
            $sqlUpdate = "update user set apiKey = '' where username = '" . $username . "'";
            if (mysqli_query($con, $sqlUpdate)) {
                echo "success";
            } else echo "Logout failed";
        } else echo "Unauthorised to access";
    } else echo "Database connection failed";
} else echo "All fields are required";
?>