<?php
include "../../config/koneksi.php";

$id = $_POST['id_brg'];
$hp = $_POST['hp'];
$merek = $_POST['merek'];
$harga = $_POST['harga'];
$spek = $_POST['spek'];
$gambar = Upload_file();

$updatedata = "UPDATE products set nama_hp='$hp', merek='$merek', harga='$harga', spesifikasi='$spek', gambar='$gambar' WHERE id_barang='$id'";
mysqli_query($koneksi, $updatedata);

if (mysqli_query($koneksi, $updatedata)) {

  echo " <div class='alert alert-success'>
        <strong>Success!</strong> Redirecting you back in 1 seconds.
      </div>
    <meta http-equiv='refresh' content='1; url= ../tambah_admin.php'/>  ";
} else {
  echo ("Error description: " . mysqli_error($koneksi));
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
