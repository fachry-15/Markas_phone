<?php
include 'config/koneksi.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/image/1665066751539.png" type="image/x-icon">
    <title>Login & Signup - Markas Phone</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="login.php" method="POST" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                    <input type="submit" value="Login" name="login" class="btn solid" />
                </form>
                <form action="registrasi.php" method="POST" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                    <input type="submit" class="btn" value="Sign up" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content" style="margin-right: 30%; margin-top: 10%;">
                    <h3>Markas Phone</h3>
                    <p>
                        Daftarkan akunmu kawan !
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="assets/image/login-1.png" style="width: 450px; margin-right: 40%; margin-top: 20%;" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Markas Phone</h3>
                    <p>
                        Jika kamu sudah memiliki akun ayo login ke akun mu
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="assets/image/login.png" style="width: 400px; margin-left: 30%;" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="assets/js/login.js"></script>
</body>

</html>