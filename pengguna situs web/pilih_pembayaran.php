<?php
include "config/koneksi.php";
session_start();
$user = $_SESSION['username'];
if ($_SESSION['status'] != "login") {
    header("location:product-menu.php?pesan=belum_login");
}


$product = array();

$data = $koneksi->query("SELECT * FROM tb_pembelian WHERE username = '$user' AND status = 'keranjang'");
while ($setiap = $data->fetch_assoc()) {
    $hp[] = $setiap;
    $jumlah = $setiap['jumlah'];
    $harga = $setiap['harga'];
    $subharga = $setiap['harga'] * $setiap['jumlah'];
    $semua[] = $subharga;
    $total = array_sum($semua);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>mPhone - Keranjang</title>
    <link rel="shortcut icon" href="assets/image/1665066751539.png" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/product -1 .css">
    <link rel="stylesheet" href="assets/css/checkout.css">
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
                        <a class="nav-link mx-2 active" aria-current="page" href="home.php" style="color: black;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="product-menu.php" style="color: black;">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="about.php" style="color: black;">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown" href="#" style="color: black;" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hai <?php echo $_SESSION['username'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile_user.php"><i class="fa-solid fa-circle-user" style="font-size: 14px; margin-right: 6px; margin-bottom: 4px;"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="Belanjaan.php"><i class="fa-solid fa-credit-card" style="font-size: 14px; margin-right: 6px; margin-bottom: 4px;"></i> Pembelian Anda</a>
                            </li>
                            <li><a class="dropdown-item" href="riwayat.php"><i class="fa-solid fa-clock-rotate-left" style="font-size: 14px; margin-right: 6px; margin-bottom: 4px;"></i> Riwayat Pembelian</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket" style="font-size: 14px; margin-right: 6px; margin-bottom: 4px;"></i>Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="cart_menu.php" style="color: black;"><i class="fa-solid fa-basket-shopping"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page">
        <section class="shopping-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h1 style="color: black; font-size: 60px;"><b>Pilih Metode Pembayaran</b></h1>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><b>Transfer Bank</b></h5>
                                <img src="assets/image/logo_pembayaran/bri.svg" alt="" style="max-width: 160px;margin-left: 2px;  margin-top: 2%; margin-bottom: 4.5%;"> <br>
                                <a class="pilih" href="pembayaran/BRI_barang.php">
                                    <span class="circle" aria-hidden="true">
                                        <span class="icon arrow"></span>
                                    </span>
                                    <span class="a-text">Bayar Dengan BRI</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><b>Pembayaran E-Wallet Shopeepay</b></h5>
                                <img src="assets/image/logo_pembayaran/shopee.svg" alt="" style="max-width: 80px; margin-top: 2%; margin-bottom: 2%;"> <br>
                                <a class="pilih" href="pembayaran/shopee_barang.php" style="width: 21rem;">
                                    <span class="circle" aria-hidden="true">
                                        <span class="icon arrow"></span>
                                    </span>
                                    <span class="a-text">Bayar Dengan Shopeepay</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><b>Pembayaran E-Wallet Gopay</b></h5>
                                <img src="assets/image/logo_pembayaran/gopay.svg" alt="" style="max-width: 80px; margin-top: 2.5%; margin-bottom: 2.5%;"> <br>
                                <a class="pilih" href="pembayaran/gopay_barang.php" style="width: 18rem;">
                                    <span class="circle" aria-hidden="true">
                                        <span class="icon arrow"></span>
                                    </span>
                                    <span class="a-text">Bayar Dengan Gopay</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><b>Pembayaran E-Wallet Dana</b></h5>
                                <img src="assets/image/logo_pembayaran/dana.svg" alt="" style="max-width: 80px;margin-left: 2px;  margin-top: 2.5%; margin-bottom: 3%; border-radius: 3%;"> <br>
                                <a class="pilih" href="pembayaran/dana_barang.php" style="width: 17rem;">
                                    <span class="circle" aria-hidden="true">
                                        <span class="icon arrow"></span>
                                    </span>
                                    <span class="a-text">Bayar Dengan Dana</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</body>

</html>