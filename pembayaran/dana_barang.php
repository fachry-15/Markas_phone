<?php
include "../config/koneksi.php";
session_start();
$user = $_SESSION['username'];
if ($_SESSION['status'] != "login") {
    header("location:product-menu.php?pesan=belum_login");
}


$product = array();

$data = $koneksi->query("SELECT * FROM tb_pembelian WHERE username = '$user' AND status = 'Menunggu Pembayaran'");
while ($setiap = $data->fetch_assoc()) {
    $hp[] = $setiap;
    $jumlah = $setiap['jumlah'];
    $harga = $setiap['harga'];
    $subharga = $setiap['harga'] * $setiap['jumlah'];
    $semua[] = $subharga;
    $total = array_sum($semua);
    $deret = count($hp);
    var_dump($deret);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>mPhone - BRI Payments</title>
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
                        <li>Isi Data Diri</li>
                        <li>Isi Data Pembayaran</li>
                    </ul>

                    <div class="container">
                        <?php
                        foreach ($data as $key => $value) : ?>
                            <div class="card" style="max-width: 500px; margin-bottom: 15px; margin-left: auto; margin-right: auto;">
                                <div class="row g-0">
                                    <div class="col-sm-5">
                                        <img src="../assets/image/product/<?php echo $value['gambar'] ?>" class="card-img-top h-120" alt="...">
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $value['barang'] ?></h5>
                                            <p><?php echo $value['merek'] ?></p>
                                            <p class="card-text">Rp.<?php echo number_format($value['harga']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <form>
                        </form>
            </section>
        </article>
    </main>
    <form action="controller_pembayaran/tambah_barang_dana.php" method="POST" enctype="multipart/form-data">

        <?php
        foreach ($data as $key => $value) : ?>
            <input type="hidden" name="jumlah" value="<?php echo $deret ?>">
            <input type="hidden" name="username[]" value="<?php echo $value['username'] ?>">
            <input type="hidden" name="barang[]" value="<?php echo $value['barang'] ?>">
            <input type="hidden" name="merek[]" value="<?php echo $value['merek'] ?>" id="">
            <input type="hidden" name="harga[]" value="<?php echo $value['harga'] ?>" id="">
            <input type="hidden" name="gambar[]" value="<?php echo $value['gambar'] ?>">
            <input type="hidden" name="status[]" value="belum mengisi data diri">
        <?php endforeach ?>


        <button class="learn-more" style="margin-top: 1%; margin-left: 41%; margin-bottom: 3%;" type="submit">
            <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
            </span>
            <span class="button-text">Lanjut Isi Data Penerima</span>
        </button>
    </form>
</body>

</html>