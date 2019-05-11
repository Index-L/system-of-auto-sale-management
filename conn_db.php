<?php
// connect to my sql 
$host="localhost"; // Host name 
$username="INDEXL";
$password="ljy2357"; 
$db_name="car_sale";
// Mysql username // Mysql password // Database name
$conn = mysqli_connect($host, $username, $password,$db_name);
if(mysqli_connect_errno($conn)){
	die("cannot connect"); 
}
?>