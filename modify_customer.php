<?php 
//检验登录
//echo htmlspecialchars($_POST['S_Gender']);
//修改操作
session_start();
$id = $_SESSION['id'];
$position = $_SESSION['position'];
if($id == ''){
	require("login.php");
}

//echo htmlspecialchars($_POST['S_Gender']);
//修改操作
$id_usr = $_POST['CustomerId'];
$idcard = $_POST['IDCard'];
$first_name = $_POST['C_FirstName'];
$last_name = $_POST['C_LastName'];
$gender = $_POST['C_Gender'];
$birthday = $_POST['C_BirthDay'];
$phone = $_POST['C_Phone'];
$addr = $_POST['Address'];

require("conn_db.php");

if($idcard != ''){
	$sql = "update customer set IDCard = '{$idcard}' where 
		CustomerId = '{$id_usr}'";
	mysqli_query($conn,$sql);
}
if($first_name != ''){
	$sql = "update customer set C_FirstName = '{$first_name}' where 
		CustomerId = '{$id_usr}'";
	mysqli_query($conn,$sql);
}
if($last_name != ''){
	$sql = "update customer set C_Lastname = '{$last_name}' where 
		CustomerId = '{$id_usr}'";
	mysqli_query($conn,$sql);
}
if($gender != ''){
	$sql = "update customer set C_Gender = '{$gender}' where 
		CustomerId = '{$id_usr}'";
	mysqli_query($conn,$sql);
}
if($birthday != ''){
	$sql = "update customer set C_BirthDay = '{$birthday}' where 
		CustomerId = '{$id_usr}'";
	mysqli_query($conn,$sql);
}
if($phone != ''){
	$sql = "update customer set C_Phone = '{$phone}' where 
		CustomerId = '{$id_usr}'";
	mysqli_query($conn,$sql);
}
if($addr != ''){
	$sql = "update customer set Address = '{$addr}' where 
		CustomerId = '{$id_usr}'";
	mysqli_query($conn,$sql);
}
mysqli_close($conn);
echo "<script>alert('modify successful!');</script>";
echo "<script type='text/javascript'>window.location.href='customer.php'         
	</script>";

?>