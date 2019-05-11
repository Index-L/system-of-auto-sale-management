<?php
//检验登录
//$CarTypeId = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';

//echo 'CarTypeId: ' . $CarTypeId;
//删除操作

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
$sql = "delete from cardetail where 
		CarTypeId = '{$id_usr}'";
mysqli_query($conn,$sql);
mysqli_close($conn);
echo "<script>alert('delete successful!');</script>";
echo "<script type='text/javascript'>window.location.href='car_type.php'         
	</script>";
?>
