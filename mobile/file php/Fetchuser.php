<?php
 
  //database constants
 define('DB_HOST', 'localhost');
 define('DB_USER', 'id20065870_markas');
 define('DB_PASS', '@Markasphone123');
 define('DB_NAME', 'id20065870_db_markas');
 
 //connecting to database and getting the connection object
 $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
 //Checking if any error occured while connecting
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 
  $users="SELECT id_user, email, Alamat_utama, No_telepon, username FROM user";
  $result=mysqli_query($conn,$users);
 
 
  if(mysqli_num_rows($result)>0){
 
 
    while($row=$result->fetch_assoc()){
 
      $response['users'][]=$row;
      $response['error']="200";
    }
  }
  else{
 
    $response['error']="400";
    $response['users'][]="";
 
 
  }
 
   
  echo json_encode($response);
     
?>