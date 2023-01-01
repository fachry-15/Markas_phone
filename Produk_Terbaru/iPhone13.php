<?php
include "../config/koneksi.php";


$data = $koneksi->query("SELECT * FROM products WHERE nama_hp = 'iPhone 13 Pro 128 GB'");
$setiap = $data->fetch_assoc();
?>

<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:product-menu.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>mPhone - Detail Produk</title>
    <link rel="shortcut icon" href="assets/image/1665066751539.png" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
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
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">

                <?php foreach ($data as $key => $value) : ?>
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="../assets/image/product/<?php echo $value['gambar'] ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1"><?php echo $value['merek'] ?></div>
                        <h1 class="display-5 fw-bolder"><?php echo $value['nama_hp'] ?></h1>
                        <div class="fs-5 mb-5">
                            <span>Rp.<?php echo $value['harga'] ?></span><br>
                            <span class="text-muted">Stok : </span>
                        </div>
                        <p class="lead"><?php echo $value['spesifikasi'] ?></p>
                    <?php endforeach ?>
                    <form action="cart.php" method="POST" enctype="multipart/form-data">
                        <div class="d-flex">

                            <?php foreach ($data as $value) : ?>
                                <input type="hidden" name="nama" value="<?= $value['nama_hp'] ?>">
                                <input type="hidden" name="merek" value="<?= $value['merek'] ?>">
                                <input type="hidden" name="harga" value="<?= $value['harga'] ?>">
                                <input type="hidden" name="gambar" value="<?= $value['gambar'] ?>">
                                <input id="quantity" name="jumlah" type="number" value="1" class="form-control quantity-input" style="width: 10%; margin-right: 2%;">
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Masukkan Keranjang
                                </button>
                            <?php endforeach ?>

                        </div>
                    </form>
                    </div>

            </div>
        </div>
    </section>

    <section>
        <h1 class="display-5 fw-bolder" style="text-align: center;">Rekomendasi Produk</h1>
        <div class=" container py-5">
            <div class="row ">
                <?php

                $product = array();

                $data = $koneksi->query("SELECT * FROM products WHERE merek = 'iPhone' AND id_barang >= 4");
                while ($setiap = $data->fetch_assoc()) {
                    $hp[] = $setiap;
                }

                foreach ($data as $key => $value) : ?>
                    <div class="col-md-8" style="width: 24%; border-radius: 2px; margin-left: 1%; margin-bottom: 2%;">
                        <div class="card text-black">
                            <img src="../assets/image/merek/<?php echo $value['merek'] ?>.png" alt="" style="max-width: 20px; margin-left: 5%; margin-top: 3%;">
                            <img src="../assets/image/product/<?php echo $value['gambar'] ?>" class="card-img-top" alt="Apple Computer" style="margin-top: 8%; margin-left: 5%; width: 250px; align-items: center;" />
                            <div class="card-body">
                                <div class="text-center">
                                    <h5 class="card-title"><?php echo $value['nama_hp'] ?></h5>
                                    <p class="text-muted mb-2.5"><?php echo $value['merek'] ?></p>
                                    <p class="text-muted mb-1">Rp.<?php echo $value['harga'] ?></p>
                                    <a href="detail.php?id=<?php echo $value["id_barang"] ?>" type="button" class="btn" style="background-color: #EDE1EF;">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white"> Gurungg ges Footer e sabar</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>