<?php
if (!empty($_POST['username'])) {
    $username =$_POST['username'];
    $result = array();
    
    
include ("koneksi.php");
    if ($con) {
        $sql = "SELECT * FROM `tbl_pembelian` WHERE `username` = '".$username."'";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) != 0) {
              while ($row = mysqli_fetch_assoc($res)){
            $data[] = [ 
                "id_pembelian" => $row["id_pembelian"],
                    "id_barang" => $row["id_barang"],
                    "barang" => $row["barang"],
                    "harga" => $row["harga"],
                    "merek" => $row['merek'],
                    "jumlah" => $row['jumlah'],
                    "gambar" => $row["gambar"],
                    "status" => $row["status"],
                    "username" => $row["username"]
            ];
            }
            $result =array("status" => "succes", "message" => " berhasil", "data" =>$data);
            
        } else
            $result = array("status" => "failed", "message" => "Failed get data from cart");
    } else
        $result = array("status" => "failed", "message" => "Database connection failed");
}else $result = array("status" => "failed", "message" => "Login before buy");
echo json_encode($data, JSON_PRETTY_PRINT);
?>