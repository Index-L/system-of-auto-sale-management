<?php
//检验登录
//$CarTypeId = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';

session_start();
$id = $_SESSION['id'];
$position = $_SESSION['position'];
if($id == ''){
	require("login.php");
}

$id_usr = $_POST['id'];
//$id_usr = 2019002010;
require("conn_db.php");
mysqli_set_charset($conn,'utf8');
$sql = "select * from  cardetail where 
		CarTypeId = '{$id_usr}'";
$result = mysqli_query($conn,$sql);
$index = 0;
$row=mysqli_fetch_array($result);
	do{
		$pass[$index]=$row;
		$index++;
	}while ($row=mysqli_fetch_array($result));		
	for($j = 0;$j < $index; $j = $j+1){
		$cartypeid[$j] = $pass[$j][0];
		$carLine[$j] = $pass[$j][1];
		$Cartype[$j] = $pass[$j][2];
		$Release_t[$j] = $pass[$j][3];
		$Displace[$j] = $pass[$j][4];
		$AutoGrade[$j] = $pass[$j][5];
		$Body[$j] = $pass[$j][6];
		$GearBox[$j] = $pass[$j][7];
		$Market_P[$j] = $pass[$j][8];
		$IsForSale[$j] = $pass[$j][9];
	}

mysqli_close($conn);
for($ind = 0; $ind < $j; $ind ++){
	$data='{"CarTypeId":"' . $cartypeid[$ind] . '",
	CarLine:"' . $carLine[$ind] .'",
	CarType:"' . $Cartype[$ind] .'",
	ReleaseTime:"' . $Release_t[$ind] .'",
	Displacement:"' . $Displace[$ind] .'",
	AutoGrade:"' . $AutoGrade[$ind] .'",
	Body:"' . $Body[$ind] .'",
	GearBox:"' . $GearBox[$ind] .'",
	MarketPrice:"' . $Market_P[$ind] .'",
	IsForSale:"' . $IsForSale[$ind] .'",
	}';//组合成json格式数据
	echo json_encode($data);
}

//访问cardetail数据库，取出相应的车型到一个变量（最好是键值对数组）里，然后echo这个变量即可，写完这个告诉我，前端模板sales还要改
?>