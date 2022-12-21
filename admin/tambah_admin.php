<?php
include "../config/koneksi.php";

$product = array();

$data = $koneksi->query("SELECT * FROM products");
while ($setiap = $data->fetch_assoc()) {
    $hp[] = $setiap;
}

?>

<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:tambah_admin.php?pesan=belum_login");
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
                    <li><a class="dropdown-item" href="controller/logout-2.php">Logout</a></li>
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
                        <a class="nav-link" href="charts.html" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus" style="color: white;"></i></div>
                            Tambah Barang
                        </a>
                        <a class="nav-link" href="keranjang.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-shop"></i>
                            </div>
                            Keranjang User
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
                    <h1 class="mt-4">Tambah Barang</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-plus"></i> Tambah Produk
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="controller/tambah.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Masukkan Nama Hp</label> <br>
                                            <input style="margin-top: 1%;" type="text" name="hp" class="form-control" placeholder="Masukkan Nama Hp"><br>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Pilih Merek Hp</label> <br>
                                            <select class="form-control custom-select mr-sm-2" name="merek">
                                                <option value="">Pilih Merek HP anda</option>
                                                <option value="iPhone">iPhone</option>
                                                <option value="Samsung">Samsung</option>
                                                <option value="Xiaomi">Xiaomi</option>
                                                <option value="Oppo">Oppo</option>
                                                <option value="Pixel">Pixel</option>
                                                <option value="Pixel">Vivo</option>
                                            </select> <br>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Spesifikasi</label> <br>
                                            <textarea class="form-control" name="spek" rows="3"></textarea> <br>
                                        </div>
                                        <label for="exampleFormControlTextarea1">Masukkan Harga Produk</label> <br>
                                        <label class="sr-only" for="inlineFormInputGroupUsername2">Rp.</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" name="harga" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Langsung Nominal tanpa Rupiah"><br>
                                        </div>
                                        <label for="exampleFormControlTextarea1">Masukkan Gambar Produk</label> <br>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input type="file" name="gambar" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4" style="margin-top: 1%;">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Daftar Barang <br>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Merek</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col" style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $key => $value) :

                                    ?>
                                        <tr>

                                            <th scope="row"><?php echo $no++ ?></th>
                                            <td><?php echo $value['nama_hp'] ?></td>
                                            <td><?php echo $value['harga'] ?></td>
                                            <td><?php echo $value['merek'] ?></td>
                                            <td><?php echo $value['spesifikasi'] ?></td>
                                            <td><img src="../assets/image/product/<?php echo $value['gambar'] ?>" alt="" style="max-width: 30px;"></td>
                                            <th scope="row">

                                                <a href="update_admin.php?id=<?php echo $value["id_barang"] ?>" type="button" class="btn btn-primary btn-sm">Update</a>
                                                <a href="controller/hapus.php?id=<?php echo $value["id_barang"] ?>" type="button" class="btn btn-danger btn-sm">Hapus</a>
                                            </th>

                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
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
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</body>

</html>