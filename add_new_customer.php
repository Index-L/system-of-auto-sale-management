<?php 
//检验登录
//应该是齐了再对一下
//echo htmlspecialchars($_POST['IDCard']);
//echo htmlspecialchars($_POST['C_FirstName']);
//echo htmlspecialchars($_POST['C_LastName']);
//echo htmlspecialchars($_POST['C_Phone']);
//echo htmlspecialchars($_POST['C_BirthDay']);
//echo htmlspecialchars($_POST['C_Gender']);
//echo htmlspecialchars($_POST['Address']);
//insert操作
session_start();
$id = $_SESSION['id'];
$position = $_SESSION['position'];
if($id == ''){
	require("login.php");
}

//echo htmlspecialchars($_POST['S_Gender']);
//修改操作
$id_card = $_POST['IDCard'];
$fname = $_POST['C_FirstName'];
$lname = $_POST['C_LastName'];
$phone = $_POST['C_Phone'];
$birthday = $_POST['C_BirthDay'];
$gender = $_POST['C_Gender'];
$addr = $_POST['Address'];

if($id_card =='' || $fname == '' || $lname == '' ||
	$phone == '' || $birthday == '' || $gender == ''){//not empty
		echo "<script>alert('please complete the form!');</script>";
		echo "<script type='text/javascript'>window.location.href='sales.php'         
		</script>";
}
else{
	
	require("conn_db.php");
	$sql_id = "select * from sale where IDCard = '{$id_card}'";//to determine if existed
	$result_id = mysqli_query($conn,$sql_id);
	$pass_id = mysqli_fetch_row($result_id);
	if($pass_id[0] != '') {
		echo "<script>alert('record existed!');</script>";
		echo "<script type='text/javascript'>window.location.href='customer.php'         
		</script>";		
	}
	
	$sql_pre = "select max(CustomerId) from customer where 1";
	$result_pre = mysqli_query($conn,$sql_pre);
	$pass_pre = mysqli_fetch_row($result_pre);
	$max_id = (string)((int)$pass_pre[0] + 1);//id in mysql is varchar
	//echo $max_id;
	
	$sql = "insert into sale values ('{$max_id}', '{$id_card}', '{$lname}', '{$fname}',
		'{$addr}', '{$phone}', '{$gender}', '{$birthday}')";
	$result = mysqli_query($conn,$sql);


	mysqli_close($conn);
	if($result == 1)
		echo "<script>alert('add successful!');</script>";
	
	else
		echo "<script>alert('add fail!');</script>";
	
}
echo "<script type='text/javascript'>window.location.href='customer.php'         
	</script>";
	//require("../Dashio_test/personal_page_salesman.php");
	
?>