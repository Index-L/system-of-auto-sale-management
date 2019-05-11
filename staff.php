<!DOCTYPE html>
<html lang="en">
<?php
require ("conn_db.php");
session_start();
if(!isset($_SESSION['id'])) {
	echo "<script>alert('you are not login!');</script>";
	echo "<script type='text/javascript'>window.location.href='login.php'         
		</script>";
}
$id = $_SESSION['id'];
$position = $_SESSION['position'];
if($position != 'General Manager'){
	echo "<script>alert('permission deny!');</script>";
	if($possiton == 'Salesman'){
		echo "<script type='text/javascript'>window.location.href='personal_page_salesman.php'         
		</script>";
	}
	if($possiton == 'Warehouse Keeper'){
		echo "<script type='text/javascript'>window.location.href='personal_page_buyer.php'         
		</script>";
	}
	else{
		echo "<script type='text/javascript'>window.location.href='login.php'         
		</script>";
	}
}
$sql_manager = "select StaffId, S_FirstName, S_LastName, S_Gender, S_BirthDay, S_Phone from staff where Position = 'General Manager'";
$result_manager = mysqli_query($conn,$sql_manager);
$sql_salesman = "select StaffId, S_FirstName, S_LastName, S_Gender, S_BirthDay, S_Phone from staff where Position = 'Salesman'";
$result_salesman = mysqli_query($conn,$sql_salesman);
$sql_buyer = "select StaffId, S_FirstName, S_LastName, S_Gender, S_BirthDay, S_Phone from staff where Position = 'Warehouse Keeper'";
$result_buyer = mysqli_query($conn,$sql_buyer);
//$pass_manager = mysqli_fetch_row($result_manager);
//$pass_buyer = mysqli_fetch_row($result_buyer);//only one man

$index_manager = 0;
$row=mysqli_fetch_array($result_manager);
do{
	$pass_manager[$index_manager]=$row;
	$index_manager++;
}while ($row=mysqli_fetch_array($result_manager));

$index_buyer = 0;
$row=mysqli_fetch_array($result_buyer);
do{
	$pass_buyer[$index_buyer]=$row;
	$index_buyer++;
}while ($row=mysqli_fetch_array($result_buyer));

$index_salesman = 0;
$row=mysqli_fetch_array($result_salesman);
do{
	$pass_salesman[$index_salesman]=$row;
	$index_salesman++;
}while ($row=mysqli_fetch_array($result_salesman));
//print_r($rows);

$now = date("Y-m-d");//calculate age

//$Id_manager = $pass_manager[0];
//$fname_manager = $pass_manager[1];
//$lname_manager = $pass_manager[2];
//$gender_manager = $pass_manager[3];
//$birthday_manager = $pass_manager[4];

for($j = 0;$j < $index_manager; $j = $j+1){
	$Id_manager[$j] = $pass_manager[$j][0];
	$fname_manager[$j] = $pass_manager[$j][1];
	$lname_manager[$j] = $pass_manager[$j][2];
	$gender_manager[$j] = $pass_manager[$j][3];
	$birthday_manager = $pass_manager[$j][4];
	//echo $pass_salesman[$j][0];
	list($Y_b,$m_b,$d_b)=explode('-',$birthday_manager);
	list($Y_n,$m_n,$d_n)=explode('-',$now);
	$age_manager[$j] = $Y_n - $Y_b;
	$phone_manager[$j] = $pass_manager[$j][5];
	//$k = k+6;
}


//$Id_buyer = $pass_buyer[0];
//$fname_buyer = $pass_buyer[1];
//$lname_buyer = $pass_buyer[2];
//$gender_buyer = $pass_buyer[3];
//$birthday_buyer = $pass_buyer[4];

for($j = 0;$j < $index_buyer; $j = $j+1){
	$Id_buyer[$j] = $pass_buyer[$j][0];
	$fname_buyer[$j] = $pass_buyer[$j][1];
	$lname_buyer[$j] = $pass_buyer[$j][2];
	$gender_buyer[$j] = $pass_buyer[$j][3];
	$birthday_buyer = $pass_buyer[$j][4];
	//echo $pass_salesman[$j][0];
	list($Y_b,$m_b,$d_b)=explode('-',$birthday_buyer);
	list($Y_n,$m_n,$d_n)=explode('-',$now);
	$age_buyer[$j] = $Y_n - $Y_b;
	$phone_buyer[$j] = $pass_buyer[$j][5];
	//$k = k+6;
}


//$name_salesman[$index];
//$gender_salesman[$index];
//$birthday_salesman[$index];
//$age_salesman[$index];
//$phone_salesman[$index];
//$k = 0;
for($j = 0;$j < $index_salesman; $j = $j+1){
	$Id_salesman[$j] = $pass_salesman[$j][0];
	$fname_salesman[$j] = $pass_salesman[$j][1];
	$lname_salesman[$j] = $pass_salesman[$j][2];
	$gender_salesman[$j] = $pass_salesman[$j][3];
	$birthday_salesman = $pass_salesman[$j][4];
	//echo $pass_salesman[$j][0];
	list($Y_b,$m_b,$d_b)=explode('-',$birthday_salesman);
	list($Y_n,$m_n,$d_n)=explode('-',$now);
	$age_salesman[$j] = $Y_n - $Y_b;
	$phone_salesman[$j] = $pass_salesman[$j][5];
	//$k = k+6;
}
mysqli_close($conn);
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Staff Management</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="lib/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" type="text/css">
  <link href="lib/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css">
  <link href="lib/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
  <link href="lib/bootstrap-timepicker/compiled/timepicker.css" rel="stylesheet" type="text/css">
  <link href="lib/bootstrap-datetimepicker/datertimepicker.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b>Au<span>di</span></b></a>
      <!--logo end-->

      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="personal_page.php"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo $position ?></h5>
          
		  <li class="mt" id="about">
            <a href="personal_page.php" >
              <i class="fa fa-star"></i>
              <span>About</span>
              </a>
          </li>
		  
		  <li id="purchase">
            <a href="purchase_.php" >
              <i class="fa fa-sign-in"></i>
              <span>Purchase</span>
              </a>
          </li>

          <li id="sales">
            <a href="sales.php" >
              <i class="fa fa-sign-out"></i>
              <span>Sales</span>
              </a>
          </li>
		  
          <li id="customers">
            <a href="customer.php" >
              <i class="fa fa-user"></i>
              <span>Customers</span>
              </a>
          </li>
		  
          <li id="staff">
            <a href="staff.php" class="active">
              <i class="fa fa-user-md"></i>
              <span>Staff</span>
              </a>
          </li>

		  <li id="storage">
            <a href="storage.php">
              <i class="fa fa-edit"></i>
              <span>Storage</span>
              </a>
          </li>
		  
		  <li id="inventory">
            <a href="inventory.php" >
              <i class="fa fa-th-large"></i>
              <span>Inventory</span>
              </a>
          </li>
		  		  <li id="car_type">
            <a href="car_type.php" >
              <i class="fa fa-truck"></i>
              <span>Car Type</span>
              </a>
          </li>
		  
		  <li id="Statistical_analysis">
            <a href="statistic.php">
              <i class="fa fa-bar-chart-o"></i>
              <span>Statistical analysis</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Staff Information</h3>
		<br>
		<button class="btn btn-theme" type="button" data-toggle="modal" data-target="#add_new_staff"><i class="fa fa-plus"></i>&nbsp Add New Staff</button>
			  
			  
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="add_new_staff" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
			<form action="add_new_staff.php" method="post">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add new staff</h4>
              </div>
              <div class="modal-body">
				<p>Enter First Name.</p>
                <input type="text"  placeholder="First Name" name="S_FirstName" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				<p>Enter Last Name.</p>
                <input type="text" name="S_LastName" placeholder="Last Name" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				<p>Gender.</p>
                <input type="text" name="S_Gender" placeholder="Gender" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				<p>Birth Day.</p>
				<div style="width:533px">
				    <div class="input-append date dpYears" data-date="1970-01-01" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                      <input class="form-control" type="text" size="16" readonly="" value="1970-01-01" name="S_BirthDay">
                      <span class="input-group-btn add-on">
                        <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
				</div>
				<br>
				<p>Phone.</p>
                <input type="text" name="S_Phone" placeholder="Phone" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				<p>Password.</p>
                <input type="password" name="Passwd" placeholder="Password" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				<p>Position.</p>
				<select class="form-control" name="Position">
                  <option>General Manager</option>
                  <option>Salesman</option>
                  <option>Warehouse Keeper</option>
                </select>
				
              </div>
              <div class="modal-footer">
			    <button class="btn btn-theme" type="submit" >Add</button>
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                
              </div>
			</form>
            </div>
          </div>
        </div>	  
			  
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modify_staff" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
			<form action="modify_staff.php" method="post">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">modify manager</h4>
              </div>
              <div class="modal-body">
			    <p>Enter staff ID.</p>
                <input type="text" id="staff_id"  name="id" autocomplete="off" class="form-control placeholder-no-fix" value="" readonly>
				<br>
				<p>Enter First Name.</p>
                <input type="text"  placeholder="First Name" name="S_FirstName" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				<p>Enter Last Name.</p>
                <input type="text" name="S_LastName" placeholder="Last Name" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				<p>Gender.</p>
                <input type="text" name="S_Gender" placeholder="Gender" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				<p>Birth Day.</p>
				<div style="width:533px">
				    <div class="input-append date dpYears" data-date="1970-01-01" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                      <input class="form-control" type="text" size="16" readonly="" value="1970-01-01" name="S_Birthday">
                      <span class="input-group-btn add-on">
                        <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
				</div>
				<br>
				<p>Phone.</p>
                <input type="text" name="S_Phone" placeholder="Phone" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				<p>Password.</p>
                <input type="password" name="Passwd" placeholder="Password" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				<p>Position.</p>
				<select class="form-control" name="Position">
                  <option>General Manager</option>
                  <option>Salesman</option>
                  <option>Warehouse Keeper</option>
                </select>
              </div>
              <div class="modal-footer">
			    <button class="btn btn-theme" type="submit" >Save Changes</button>
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
              </div>
			</form>
            </div>
          </div>
        </div>	  

		
        <div class="row">
          <!-- /col-md-12 -->
          <div class="col-md-12 mt">
            <div class="content-panel">
              <table class="table table-hover">
                <h4><i class="fa fa-angle-right"></i>Manager</h4>
                <hr>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
					<th>Age</th>
					<th>Phone</th>
					<th>Operation</th>
                  </tr>
                </thead>
                <tbody>
				<?php
				for($ind = 0;$ind < $index_manager;$ind ++){
					echo"<tr>
                    <td>".$Id_manager[$ind]."</td>
                    <td>".$fname_manager[$ind]."</td>
                    <td>".$lname_manager[$ind]."</td>
					<td>".$gender_manager[$ind]."</td>
					<td>".$age_manager[$ind]."</td>
					<td>".$phone_manager[$ind]."</td>";
					echo "<td>".
					"<button class=\"btn btn-warning\" type=\"button\" data-toggle=\"modal\" data-toggle=\"modal\" data-target=\"#modify_staff\" onclick=\"modify_click(this)\">Modify</button>&nbsp";
					echo "</tr>";
				}//print
				?>
                </tbody>
              </table>
            </div>
          </div>
		  
		  
		    <div class="col-md-12 mt">
            <div class="content-panel">
			  <table class="table table-hover">
                <h4><i class="fa fa-angle-right"></i> Salesman</h4>
                <hr>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
					<th>Age</th>
					<th>Phone</th>
					<th>Operation</th>
                  </tr>
                </thead>
                <tbody>
				<?php
				for($ind = 0;$ind < $index_salesman;$ind ++){
					echo"<tr>
                    <td>".$Id_salesman[$ind]."</td>
                    <td>".$fname_salesman[$ind]."</td>
                    <td>".$lname_salesman[$ind]."</td>
					<td>".$gender_salesman[$ind]."</td>
					<td>".$age_salesman[$ind]."</td>
					<td>".$phone_salesman[$ind]."</td>";
					echo "<td>".
					"<button class=\"btn btn-warning\" type=\"button\" data-toggle=\"modal\" data-toggle=\"modal\" data-target=\"#modify_staff\" onclick=\"modify_click(this)\">Modify</button>&nbsp".
					"<button class=\"btn btn-danger\" type=\"button\" onclick=\"delete_staff(this)\">Delete</button>".
					"</td>";
					echo "</tr>";
				}//print
				?>
                </tbody>
              </table>
			  
            </div>
          </div>
		  
		  
		    <div class="col-md-12 mt">
            <div class="content-panel">
			  
			  <table class="table table-hover">
                <h4><i class="fa fa-angle-right"></i>Buyer</h4>
                <hr>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
					<th>Age</th>
					<th>Phone</th>
					<th>Operation</th>
                  </tr>
                </thead>
                <tbody>
				<?php
				for($ind = 0;$ind < $index_buyer;$ind ++){
					echo"<tr>
                    <td>".$Id_buyer[$ind]."</td>
                    <td>".$fname_buyer[$ind]."</td>
                    <td>".$lname_buyer[$ind]."</td>
					<td>".$gender_buyer[$ind]."</td>
					<td>".$age_buyer[$ind]."</td>
					<td>".$phone_buyer[$ind]."</td>";
					echo "<td>".
					"<button class=\"btn btn-warning\" type=\"button\" data-toggle=\"modal\" data-toggle=\"modal\" data-target=\"#modify_staff\" onclick=\"modify_click(this)\">Modify</button>&nbsp".
					"<button class=\"btn btn-danger\" type=\"button\" onclick=\"delete_staff(this)\">Delete</button>";
					echo "</tr>";
				}//print
				?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- row -->
       
        <!-- /row -->
      </section>
    </section>	
	
	

     
 
 
 
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="buttons.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="lib/advanced-form-components.js"></script>
</body>
<script>

var position="<?php echo $position ?>";
if(position=="General Manager"){
	$("#storage").css('display','none');

}
if(position=="Salesman"){
	$("#staff").css('display','none');
	$("#purchase").css('display','none');
	$("#storage").css('display','none');
	$("#car_type").css('display','none');
	$("#Statistical_analysis").css('display','none');
	
}
if(position=="Warehouse Keeper"){
	$("#staff").css('display','none');
	$("#sales").css('display','none');
	$("#customers").css('display','none');
	$("#car_type").css('display','none');
	$("#Statistical_analysis").css('display','none');

}

</script>
<script>
function delete_staff(obj){
	var id=$(obj).parent().parent().children()[0].innerHTML;
	console.log(id);
	$.post("delete_staff.php",
    {
        id:id
    },
    function(data,status){
        console.log("数据: " + data + "\n状态: " + status);
		if(status=="success"){
			alert("successful delete !");
		}
		
    });
}
function modify_click(obj){
	document.getElementById("staff_id").value=$(obj).parent().parent().children()[0].innerHTML;;
}
</script>


</html>
