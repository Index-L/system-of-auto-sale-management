<?php 
//
//echo htmlspecialchars($_POST['id']);
//echo htmlspecialchars($_POST['Position']);
//echo htmlspecialchars($_POST['S_Gender']);
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
$gender = $_POST['S_Gender'];//
$birthday = $_POST['S_BirthDay'];
$phone = $_POST['S_Phone'];
$password_user = $_POST['Passwd'];
$position_user = $_POST['Position'];

if($first_name =='' || $last_name == '' || $gender == '' ||
	$birthday == '' || $phone == '' || $password_user == ''){//not empty
		echo "<script>alert('please complete the form!');</script>";
		echo "<script type='text/javascript'>window.location.href='staff.php'         
		</script>";
}
else{
	require("conn_db.php");
	$sql_pre = "select max(SaleId) from sale where 1";
	$result_pre = mysqli_query($conn,$sql_pre);
	$pass_pre = mysqli_fetch_row($result_pre);
	$max_id = (string)((int)$pass_pre[0] + 1);//id in mysql is varchar
	$sql = "insert into Staff values ('{$max_id}', '{$last_name}', '{$first_name}',
		'{$gender}', '{$birthday}', '{$phone}', '{$position}', '{$password_user}')";
	$result = mysqli_query($conn,$sql);


	mysqli_close($conn);
	if($result == 1)
		echo "<script>alert('add successful!');</script>";
	
	else
		echo "<script>alert('add fail!');</script>";
	
	echo "<script type='text/javascript'>window.location.href='staff.php'         
	</script>";
}

	//require("../Dashio_test/personal_page_salesman.php");
	

?>
