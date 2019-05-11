<?php

require ("conn_db.php");
//require ("../Dashio_test/login.php");
$id = $_POST["id"];
$password = $_POST["password"];
if($id != null and $password != null){
	$tb_name = "Staff";
	$sql = "select Passwd, Position from $tb_name where StaffId = '{$id}'";
	$result = mysqli_query($conn,$sql);
	$pass = mysqli_fetch_row($result);
	mysqli_close($conn);
	$position = $pass[1];
	
	if($pass[0] == $password) {
		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['position'] = $position;
		//echo "<script>alert('login successful!');</script>";
		echo "<script type='text/javascript'>window.location.href='personal_page.php'         
		</script>";		
	}
	else{
		echo "<script>alert('user id or password error!');</script>";
		echo "<script type='text/javascript'>window.location.href='login.php'         
		</script>";
	}
}	
else{
	//echo "password error";
	echo "<script>alert('please complete the information!');</script>";
	echo "<script type='text/javascript'>window.location.href='login.php'         
		</script>";
	//require ("../Dashio_test/login.php");
}

?>