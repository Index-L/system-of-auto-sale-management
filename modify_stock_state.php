<?php 
//检验登录
//应该是齐了再对一下
//echo htmlspecialchars($_POST['StockId']);
//echo htmlspecialchars($_POST['S_State']);
date_default_timezone_set('PRC');
session_start();
$id = $_SESSION['id'];
$position = $_SESSION['position'];
if($id == ''){
	require("login.php");
}

//echo htmlspecialchars($_POST['S_Gender']);
//修改操作
$id_usr = $_POST['StockId'];
$state = $_POST['S_State'];
$now = date('Y-m-d h:i:s', time());

require("conn_db.php");

if($state == '1'){
	$sql = "update stock set S_State = '{$state}', S_FTime = '{$now}' where 
		StockId = '{$id_usr}'";
}
else{
	$sql = "update stock set S_State = '{$state}', S_FTime = null where 
		StockId = '{$id_usr}'";
}
mysqli_query($conn,$sql);


mysqli_close($conn);
echo "<script>alert('modify successful!');</script>";
echo "<script type='text/javascript'>window.location.href='purchase_.php'         
	</script>";
//修改操作
