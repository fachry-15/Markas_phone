<?php
if (!empty($_POST['id_pembelian'])) {
    
 
include ("koneksi.php");
    
    $id_cart = $_POST['id_pembelian'];
if ($con) {
        $sql = "DELETE FROM `tbl_pembelian` WHERE `id_pembelian`='" . $id_pembelian . "'";
    if (mysqli_query($con, $sql)) {
        $result = array("status" => "success", "message" => "deleted");
    } else $result = array("status" => "failed", "message" => "Failed delete cart");;
    
} else $result = array("status" => "failed", "message" => "database connection failed");
}else $result = array("status" => "failed", "message" => "id_cart not found");
echo json_encode($result, JSON_PRETTY_PRINT);
?>