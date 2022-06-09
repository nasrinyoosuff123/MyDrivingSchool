


<?php
 /*
 $host="localhost";
  $user="ogaascom_myorder";
  $pass="@123JasJas";
  $db="ogaascom_test";

   */
    // Create database connection
//$db = mysqli_connect("localhost", "root", "", "ogaasonlineshop");
 
 
 // 	$db = mysqli_connect("localhost", "ogaascom_myorder", "@123JasJas", "ogaascom_form");
 
   $host="localhost";
  $user="root";
  $pass="";
  $db="campus";
 
  $connection = mysqli_connect($host, $user, $pass, $db);
  if ($connection->connect_error) {
      die("ERROR: Connection failed: " . $connection->connect_error);
  }

?>