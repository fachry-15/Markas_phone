<?php 

 //database constants
 define('DB_HOST', 'localhost');
 define('DB_USER', 'root');
 define('DB_PASS', '');
 define('DB_NAME', 'db_markas');
 
 //connecting to database and getting the connection object
 $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
 //Checking if any error occured while connecting
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 //creating a query
 $stmt = $conn->prepare("SELECT id_barang, merek, nama_hp, spesifikasi, harga, gambar FROM products;");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($id_barang, $merek, $nama_hp, $spesifikasi, $harga, $gambar);
 
 $products = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['id_barang'] = $id_barang;
 $temp['merek'] = $merek; 
 $temp['nama_hp'] = $nama_hp; 
 $temp['spesifikasi'] = $spesifikasi;
 $temp['harga'] = $harga; 
 $temp['gambar'] = $gambar; 
 array_push($products, $temp);
 }

 //displaying the result in json format 
 echo json_encode($products, JSON_UNESCAPED_UNICODE);