<?php
include "../../config/koneksi.php";

$hp = $_POST['hp'];
$merek = $_POST['merek'];
$spek = $_POST['spek'];
$harga = $_POST['harga'];
$gambar = upload_file();

$tambah = mysqli_query($koneksi, "INSERT INTO products (nama_hp, merek, spesifikasi, harga, gambar) VALUES ('$hp','$merek','$spek','$harga','$gambar')");

if ($tambah) {
    echo "
            <script>
                alert('Horee Barang Sudah Ditambahkan !');
                window.location = '../tambah_admin.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('Barang Gagal Ditambahkan');

                // window.location = '../tambah_admin.php';
            </script>
        ";
}



function Upload_file()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //check gambar
    $ektensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile = explode('.', $namaFile);
    $extensifile = strtolower(end($extensifile));

    if (!in_array($extensifile, $ektensifileValid)) {

        echo "<script>
        alert('Format Gambar yang Anda Input Tidak Valid');
        </script>
        ";
        die();
    }

    //check ukuran file
    if ($ukuranFile > 10485760) {
        echo "<script>
        alert('Ukuran File Max 10 MB');
        </script>
        ";
        die();
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    move_uploaded_file($tmpName, '../../assets/image/product/' . $namaFileBaru);
    return $namaFileBaru;
}
