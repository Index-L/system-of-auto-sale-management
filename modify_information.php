﻿<?php 
//检验登录
session_start();
$id = $_SESSION['id'];
$position = $_SESSION['position'];
if($id == ''){
	require("login.php");
}

//echo htmlspecialchars($_POST['S_Gender']);
//修改操作
$first_name = $_POST['S_FirstName'];
$last_name = $_POST['S_LastName'];
$gender = $_POST['S_Gender'];
$birthday = $_POST['S_BirthDay'];
$phone = $_POST['S_Phone'];
$password_user = $_POST['Passwd'];

require("conn_db.php");

if($first_name != ''){
	$sql = "update Staff set S_Firstname = '{$first_name}' where 
		StaffId = '{$id}'";
	mysqli_query($conn,$sql);
}
if($last_name != ''){
	$sql = "update Staff set S_Lastname = '{$last_name}' where 
		StaffId = '{$id}'";
	mysqli_query($conn,$sql);
}
if($gender != ''){
	$sql = "update Staff set S_Gender = '{$gender}' where 
		StaffId = '{$id}'";
	mysqli_query($conn,$sql);
}
if($birthday != ''){
	$sql = "update Staff set S_BirthDay = '{$birthday}' where 
		StaffId = '{$id}'";
	mysqli_query($conn,$sql);
}
if($phone != ''){
	$sql = "update Staff set S_Phone = '{$phone}' where 
		StaffId = '{$id}'";
	mysqli_query($conn,$sql);
}
if($password_user != ''){
	$sql = "update Staff set Passwd = '{$password_user}' where 
		StaffId = '{$id}'";
	mysqli_query($conn,$sql);
}
mysqli_close($conn);
echo "<script>alert('modify successful!');</script>";

switch($position){
	case 'General Manager':
		echo "<script type='text/javascript'>window.location.href='personal_page_manager.php'         
		</script>";
		//require("../Dashio_test/personal_page_manager.php");
		break;
	case 'Warehouse Keeper':
		echo "<script type='text/javascript'>window.location.href='personal_page_buyer.php'         
		</script>";
		//require("../Dashio_test/personal_page_buyer.php");
		break;
	case 'salesman':
		echo "<script type='text/javascript'>window.location.href='personal_page_salesman.php'         
		</script>";
		//require("../Dashio_test/personal_page_salesman.php");
		break;		
}
?>