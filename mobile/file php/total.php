<?php
if (!empty($_POST['username'])) {
    $username = $_POST['username'];
    $resultt = array();

    // Koneksi ke database

    
include ("koneksi.php");

    // Query untuk mengambil data dari tabel A
    $query = "SELECT harga, jumlah FROM tb_pembelian WHERE `username` = '".username."'";
    $sql2 = "SELECT`Alamat_utama` FROM `user` WHERE `username`='".$username."'";
    $result = mysqli_query($con, $query);
    $result2 = mysqli_query($con, $sql2);

    // Inisialisasi total
    $total = 0;

    // Perulangan untuk mengambil data
    while($row = mysqli_fetch_array($result)) {
        // Melakukan perkalian antara kolom A dan B
        $kali = $row['harga'] * $row['jumlah'];
        // Menjumlahkan total
        $total += $kali;
        $resultt = array("status" => "success", "message" => "berhasil", "total" => $total);
    }

}else $result = array("status" => "failed", "message" => "Pilih terlebih dahulu");
echo json_encode($resultt, JSON_PRETTY_PRINT);
?>