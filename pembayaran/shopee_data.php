<?php
include "../config/koneksi.php";
session_start();
$user = $_SESSION['username'];
if ($_SESSION['status'] != "login") {
    header("location:product-menu.php?pesan=belum_login");
}


$product = array();

$data = $koneksi->query("SELECT * FROM tb_invoice WHERE username = '$user' AND status = 'Belum mengisi data diri'");
while ($setiap = $data->fetch_assoc()) {
    $hp[] = $setiap;
    $deret = count($hp);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>mPhone - BRI payments</title>
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />
    <link rel="stylesheet" href="../assets/css/pembayaran.css">
    <link rel="stylesheet" href="../assets/css/product -1 .css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark p-3" style="background-color: #EDE1EF; font-weight: initial; font-style: oblique;">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: black;" href="#">mPhone</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class=" collapse navbar-collapse" id="navbarNavDropdown" style="margin-right: 5%;">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link mx-2 active" aria-current="page" href="../home.php" style="color: black;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="../product-menu.php" style="color: black;">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="../about.php" style="color: black;">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown" style="color: black;" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hai <?php echo $_SESSION['username'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../profile_user.php"><i class="fa-solid fa-circle-user" style="font-size: 14px; margin-right: 6px; margin-bottom: 4px;"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="../Belanjaan.php"><i class="fa-solid fa-credit-card" style="font-size: 14px; margin-right: 6px; margin-bottom: 4px;"></i> Pembelian Anda</a>
                            </li>
                            <li><a class="dropdown-item" href="../riwayat.php"><i class="fa-solid fa-clock-rotate-left" style="font-size: 14px; margin-right: 6px; margin-bottom: 4px;"></i> Riwayat Pembelian</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../logout.php"><i class="fa-solid fa-right-from-bracket" style="font-size: 14px; margin-right: 6px; margin-bottom: 4px;"></i>Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="../cart_menu.php" style="color: black;"><i class="fa-solid fa-basket-shopping"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="max-width: 100%;">
        <article>
            <section class="multi_step_form">
                <form id="msform">
                    <div class="tittle">
                        <h1><b>Menu Pembayaran</b></h1>
                        <p>Pastikan Data Yang Kamu Masukkan Benar !</p>
                    </div>
                    <ul id="progressbar">
                        <li class="active">Barang Belanja</li>
                        <li class="active">Isi Data Diri</li>
                        <li>Isi Data Pembayaran</li>
                    </ul>
                    <form></form>
                    <fieldset>
                    </fieldset>
            </section>
        </article>
    </main>
    <div class="container">
        <form action="controller_pembayaran/isi_data_shopee.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="jumlah_data" value="<?php echo $deret ?>" id="">
            <input type="hidden" name="user" value="<?php echo $_SESSION['username'] ?>">
            <label class="form-label">Nama Penerima</label>
            <input type="text" name="nama" class="form-control">
            <label for="exampleInputemail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
            <label for="exampleInputemail1" class="form-label">Alamat</label>
            <input type="alamat" name="alamat" class="form-control">
            <label for="exampleInputemail1" class="form-label">No Telepon</label>
            <input type="telepon" name="telepon" class="form-control">
            <?php
            foreach ($data as $key => $value) : ?>
                <input type="hidden" name="id_barang" value="<?php echo $value['id_invoice'] ?>">
            <?php endforeach ?>

            <input type="hidden" name="rekening_tujuan" value="089523418523">
            <input type="hidden" name="metode" value="E-Wallet Shopeepay">
            <input type="hidden" name="ubah" value="belum mengirim bukti pembayaran"> <br>
            <button class="learn-more" style="margin-left: 40%;" type="submit">
                <span class="circle" aria-hidden="true">
                    <span class="icon arrow"></span>
                </span>
                <span class="button-text">Lanjut Isi Data Pembayaran</span>
            </button>
        </form>
        <div style="margin-top: 5%;"></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>