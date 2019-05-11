<?php
//检验登录
//$StockId = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';

//echo 'staff_id: ' . $StockId;
//删除操作
session_start();
$id = $_SESSION['id'];
$position = $_SESSION['position'];
if($id == ''){
	require("login.php");
}
//删除操作
$id_usr = $_POST['id'];
require("conn_db.php");
$sql = "delete from stock where 
		StockId = '{$id_usr}'";
mysqli_query($conn,$sql);
mysqli_close($conn);
echo "<script>alert('delete successful!');</script>";
echo "<script type='text/javascript'>window.location.href='purchase_.php'         
	</script>";
?>