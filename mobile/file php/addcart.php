<?php
if (!empty($_POST['id_user'])) {
   if (!empty($_POST['id_barang'])) {
        if (!empty($_POST['barang'])) {
            if (!empty($_POST['harga'])) {
                if (!empty($_POST['jumlah'])) {
                    if (!empty($_POST['gambar'])) {
         
include ("koneksi.php");
         
    
                            $id_user = $_POST['id_user'];
                            $id_barang = $_POST['id_barang'];
                            $barang = $_POST['barang'];
                            $harga = $_POST['harga'];
                            $jumlah = $_POST['jumlah'];
                            $gambar = $_POST['gambar'];
                            
    if ($con) {
    $sql = "SELECT * FROM `tb_pembelian` WHERE `id_user` = '".$id_user."' AND `id_barang`='".$id_barang."';";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) != 0) {
        if ($row = mysqli_fetch_assoc($res)) {
            $id_pembelian = $row['id_pembelian'];
            $jumlah = $row['jumlah'];
            $jmlbaru = $jumlah + $row['jumlah'];
            $sqll = "UPDATE `id_pembelian` SET `jumlah`='" .$jmlbaru. "' WHERE `id_pembelian`='" . $id_pembelian . "'";
            if (mysqli_query($con, $sqll)) {
                $result = array("status" => "success", "message" => "Success to add to cart 2");
            }else $result = array("status" => "failed", "message" => "failed 2");
        }else $result = array("status" => "failed", "message" => "failed 3");
    }else{
        $sqle = "
INSERT INTO `tb_pembelian` (`id_pembelian`, `id_user` , `id_barang`, `barang`, `harga`, `jumlah`, `gambar`) VALUES (null,'".$id_barang."', '".$id_user."', '".$barang."','".$harga."','".$jumlah."','".$gambar."');";
       
            if (mysqli_query($con, $sqle)) {
                    $result = array("status" => "success", "message" => "berhasil");  
                
            }else $result = array("status" => "failed", "message" => "failed4");
    }
}else $result = array("status" => "failed", "message" => "Database connection failed");


                  } else $result = array("status" => "failed", "message" => "gambar kosong");

                } else $result = array("status" => "failed", "message" => "jumlah kosong");

            } else $result = array("status" => "failed", "message" => "harga kosong");
        } else $result = array("status" => "failed", "message" => "barang kosong");

    } else $result = array("status" => "failed", "message" => "id_barang produk kosong");
} else $result = array("status" => "failed", "message" => "succes tambah data");

echo json_encode($result, JSON_PRETTY_PRINT);

?>