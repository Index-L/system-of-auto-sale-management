﻿<?php
//检验登录
session_start();
$id = $_SESSION['id'];
$position = $_SESSION['position'];
if($id == ''){
	require("login.php");
}
//删除操作
$id_usr = $_POST['id'];
require("conn_db.php");
$sql = "delete from staff where 
		StaffId = '{$id_usr}'";
mysqli_query($conn,$sql);
mysqli_close($conn);
echo "<script>alert('delete successful!');</script>";
echo "<script type='text/javascript'>window.location.href='staff.php'         
	</script>";

?>