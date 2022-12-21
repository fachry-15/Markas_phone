<?php
include "../../config/koneksi.php";
?>
<?php
$product = $_GET["id"];

$data = $koneksi->query("DELETE FROM products WHERE id_barang= '$product'");

echo "<script>alert('data terhapus')</script>";
echo "<script>location='../tambah_admin.php'</script>";
