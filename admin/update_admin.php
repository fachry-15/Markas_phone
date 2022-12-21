<?php
include "../config/koneksi.php";

$product = $_GET["id"];

$data = $koneksi->query("SELECT * FROM products WHERE id_barang= $product");
$setiap = $data->fetch_assoc();
?>

<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:update_admin.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>mPhone - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../assets/css/admin.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index_admin.php">Admin</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <!-- <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index_admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Partisi</div>
                        <a class="nav-link" href="tambah_admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                            Tambah Barang
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Halo <?php echo $_SESSION['username'] ?></div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Update Barang</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                    <div class="container" style=" padding-right: 15%; margin-top: 2%;">
                        <form action="controller/update.php" method="POST">
                            <?php foreach ($data as $key => $value) : ?>
                                <input type="hidden" class="form-control" name="id_brg" id="id_brg" aria-describedby="emailHelp" placeholder="Nama Handphone" value="<?php echo $value['id_barang'] ?>"> <br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Masukkan Nama Handphone</label> <br>
                                    <input type="text" class="form-control" name="hp" id="nama-br" aria-describedby="emailHelp" placeholder="Nama Handphone" value="<?php echo $value['nama_hp'] ?>"> <br>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Masukkan Merek Handphone</label>
                                    <input type="text" class="form-control" name="merek" id="merek" placeholder="iPhone/Samsung/Oppo" value="<?php echo $value['merek'] ?>"> <br>
                                </div>
                                <label for="exampleFormControlTextarea1">Masukkan Harga Produk</label> <br>
                                <label class="sr-only" for="inlineFormInputGroupUsername2">Rp.</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="text" name="harga" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Langsung Nominal tanpa Rupiah" value="<?php echo $value['harga'] ?>"><br>
                                </div>
                                <div class="mb-3" style="margin-bottom: 10%;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Masukkan Spesifikasi</label>
                                    <textarea class="form-control" name="spek" id="spek" rows="3" value=""><?php echo $value['spesifikasi'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Masukkan Gambar Product</label> <br>
                                    <img src="../assets/image/product/<?php echo $value['gambar'] ?>" alt="" style="width: 90px; border: 2px solid black;"> <br>
                                    <input class="form-control" type="file" name="gambar" id="product" style="margin-top: 2%;">
                                </div>
                                <button type="submit" class="btn btn-warning">update</button>
                            <?php endforeach ?>
                        </form>

                    </div>
                </div>

            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; mPhone 2022</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</body>

</html>