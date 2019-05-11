<?php
//检验登录

//职位。。
session_start();
$id = $_SESSION['id'];
$position = $_SESSION['position'];
if($id == ''){
	require("login.php");
}
require("conn_db.php");
mysqli_set_charset($conn,'utf8');
$sql = "select c.CarLine,count(*) as number from sale s,cardetail c where s.CarTypeId=c.CarTypeId group by c.CarLine ";
$result = mysqli_query($conn,$sql);
$data1=mysqli_fetch_all($result);
//var_dump($data1);
$sql = "select c.Body,count(*) as number from sale s,cardetail c where s.CarTypeId=c.CarTypeId group by c.Body  ";
$result = mysqli_query($conn,$sql);
$data2=mysqli_fetch_all($result);
//var_dump($data2);
$year=date('Y');
$sql = "select month(PurchaseTime) as month,count(*) as Totals from sale where year(PurchaseTime)='{$year}' group by month(PurchaseTime) ";
$result = mysqli_query($conn,$sql);
$data3=mysqli_fetch_all($result);
//var_dump($data3);
$sql = "select month(PurchaseTime) as month,sum(AucPrice) as money from sale where year(PurchaseTime)='{$year}' group by month(PurchaseTime) ";
$result = mysqli_query($conn,$sql);
$data4=mysqli_fetch_all($result);
//var_dump($data4);
$sql = "select  a.StaffId,s.S_FirstName,s.S_LastName,count(*) as number from sale a,staff s where s.StaffId=a.StaffId group by s.S_FirstName,s.S_LastName,a.StaffId";
$result = mysqli_query($conn,$sql);
$data5=mysqli_fetch_all($result);
//var_dump($data5);
$sql = "select  a.StaffId,s.S_FirstName,s.S_LastName,sum(a.AucPrice) as money from sale a,staff s where s.StaffId=a.StaffId group by s.S_FirstName,s.S_LastName,a.StaffId";
$result = mysqli_query($conn,$sql);
$data6=mysqli_fetch_all($result);
//var_dump($data6);
mysqli_close($conn);

require("statistic_html.php");
?>