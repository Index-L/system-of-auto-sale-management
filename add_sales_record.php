<?php 
//未完自己取剩下的
//echo htmlspecialchars($_POST['CarTypeId']);
//echo htmlspecialchars($_POST['EngineNo']);
//echo htmlspecialchars($_POST['VIN']);
session_start();
$id = $_SESSION['id'];
$position = $_SESSION['position'];
if($id == ''){
	require("login.php");
}

//echo htmlspecialchars($_POST['S_Gender']);
//修改操作
$id_car = $_POST['CarTypeId'];
$eng_no = $_POST['EngineNo'];
$vin = $_POST['VIN'];
$price = $_POST['AucPrice'];
$purchase_t = $_POST['PurchaseTime'];
$id_cus = $_POST['CustomerId'];

if($id_car =='' || $eng_no == '' || $vin == '' ||
	$price == '' || $purchase_t == '' || $id_cus == ''){//not empty
		echo "<script>alert('please complete the form!');</script>";
		echo "<script type='text/javascript'>window.location.href='sales.php'         
		</script>";
}
else{
	
	require("conn_db.php");
	$sql_eng = "select * from sale where EngineNo = '{$eng_no}'";//to determine existed by eng_no
	$result_eng = mysqli_query($conn,$sql_eng);
	$pass_eng = mysqli_fetch_row($result_eng);
	if($pass_eng[0] != '') {
		mysqli_close($conn);
		echo "<script>alert('record existed!');</script>";
		echo "<script type='text/javascript'>window.location.href='sales.php'         
		</script>";	
		
	}
	else{
		$sql_pre = "select max(SaleId) from sale where 1";
		$result_pre = mysqli_query($conn,$sql_pre);
		$pass_pre = mysqli_fetch_row($result_pre);
		$max_id = (string)((int)$pass_pre[0] + 1);//id in mysql is varchar
		//echo $max_id;
	
		$sql = "insert into sale values ('{$max_id}', '{$id_car}', '{$eng_no}', '{$vin}',
			'{$id}', '{$id_cus}', '{$purchase_t}', '{$price}')";
			$result = mysqli_query($conn,$sql);


		mysqli_close($conn);
		if($result == 1)
			echo "<script>alert('add successful!');</script>";
	
		else
			echo "<script>alert('add fail!');</script>";
	
	}
}
echo "<script type='text/javascript'>window.location.href='sales.php'         
	</script>";
	//require("../Dashio_test/personal_page_salesman.php");
	

?>