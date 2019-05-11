<?php 
//验证登录、身份
//id从库里取上一条然后加一
//echo htmlspecialchars($_POST['CarLine']);
//echo htmlspecialchars($_POST['CarType']);
//echo htmlspecialchars($_POST['ReleaseTime']);
//echo htmlspecialchars($_POST['Displacement']);
//echo htmlspecialchars($_POST['AutoGrade']);
//echo htmlspecialchars($_POST['Body']);
//echo htmlspecialchars($_POST['GearBox']);
//echo htmlspecialchars($_POST['MarketPrice']);
//echo htmlspecialchars($_POST['IsForSale']);
//insert操作

//insert操作
session_start();
$id = $_SESSION['id'];
$position = $_SESSION['position'];
if($id == ''){
	require("login.php");
}

//echo htmlspecialchars($_POST['S_Gender']);
//修改操作
$carline = $_POST['CarLine'];
$cartype = $_POST['CarType'];
$ReleaseTime = $_POST['ReleaseTime'];
$displacement = $_POST['Displacement'];
$autograde = $_POST['AutoGrade'];
$body = $_POST['Body'];
$GearBox = $_POST['GearBox'];
$MarketPrice = $_POST['MarketPrice'];
$forsale = $_POST['IsForSale'];

if($carline =='' || $cartype == '' || $ReleaseTime == '' ||
	$displacement == '' || $autograde == '' || $body == '' ||
	$GearBox == '' || $MarketPrice == '' || $forsale == ''){//not empty
		echo "<script>alert('please complete the form!');</script>";
		echo "<script type='text/javascript'>window.location.href='sales.php'         
		</script>";
}
else{
	
	require("conn_db.php");
	//$sql_id = "select * from cardetail where CarType = '{$cartype}'";//to determine if existed
	//$result_id = mysqli_query($conn,$sql_id);
	//$pass_id = mysqli_fetch_row($result_id);
	//if($pass_id[0] != '') {
		//echo "<script>alert('record existed!');</script>";
		//echo "<script type='text/javascript'>window.location.href='cardetail.php'         
		//</script>";		
	//}
	
	$sql_pre = "select max(CarTypeId) from cardetail where 1";
	$result_pre = mysqli_query($conn,$sql_pre);
	$pass_pre = mysqli_fetch_row($result_pre);
	$max_id = (string)((int)$pass_pre[0] + 1);//id in mysql is varchar
	//echo $max_id;
	
	$sql = "insert into cardetail values ('{$max_id}', '{$carline}', '{$cartype}', '{$ReleaseTime}',
		'{$displacement}', '{$autograde}', '{$body}', '{$GearBox}', '{$MarketPrice}', '{$forsale}')";
	$result = mysqli_query($conn,$sql);


	mysqli_close($conn);
	if($result == 1)
		echo "<script>alert('add successful!');</script>";
	
	else
		echo "<script>alert('add fail!');</script>";
	
}
echo "<script type='text/javascript'>window.location.href='car_type.php'         
	</script>";
	//require("personal_page_salesman.php");
	
?>

