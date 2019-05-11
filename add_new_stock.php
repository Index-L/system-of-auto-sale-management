<?php 
//检验登录
//应该是齐了再对一下少的那个stockID从数据库取上一条数据加一就行，熊烨没弄自增他是varchar
//echo htmlspecialchars($_POST['CarTypeId']);
//echo htmlspecialchars($_POST['S_Num']);
//echo htmlspecialchars($_POST['S_Time']);
//echo htmlspecialchars($_POST['S_FTime']);
//echo htmlspecialchars($_POST['S_State']);
//echo htmlspecialchars($_POST['S_Remark']);

//insert操作
session_start();
$id = $_SESSION['id'];
$position = $_SESSION['position'];
if($id == ''){
	require("login.php");
}
date_default_timezone_set('PRC');

$cartypeid = $_POST['CarTypeId'];
$snum = $_POST['S_Num'];
$s_time = date('Y-m-d h:i:s', time());
//$s_ftime = null;
$s_state = 0;
$s_remark = $_POST['S_Remark'];

if($cartypeid =='' || $snum == ''){//not empty
		echo "<script>alert('please complete the form!');</script>";
		echo "<script type='text/javascript'>window.location.href='purchase_.php'         
		</script>";
}
else{
	//exist?
	require("conn_db.php");
	$sql_pre = "select max(StockId) from stock where 1";
	$result = mysqli_query($conn,$sql_pre);
	$pass = mysqli_fetch_row($result);
	$max_id = (string)((int)$pass[0] + 1);//mysql is varchar
	//echo $max_id;
	$sql = "insert into stock values ('{$max_id}', '{$cartypeid}', '{$snum}',
		'{$s_time}', '{$s_state}', null, '{$s_remark}')";
	
	$result = mysqli_query($conn,$sql);


	mysqli_close($conn);
	if($result == 1)
		echo "<script>alert('add successful!');</script>";
	
	else
		echo "<script>alert('add fail!');</script>";
	
}
echo "<script type='text/javascript'>window.location.href='purchase_.php'         
	</script>";
	//require("../Dashio_test/personal_page_salesman.php");
	

?>