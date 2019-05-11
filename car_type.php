<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['id'])) {
	echo "<script>alert('you are not login!');</script>";
	echo "<script type='text/javascript'>window.location.href='login.php'         
		</script>";
}
$id = $_SESSION['id'];
$position = $_SESSION['position'];

	require("conn_db.php");
	mysqli_set_charset($conn,'utf8');
	
	$sql = "select * from cardetail";

	$result = mysqli_query($conn,$sql);
	$index = 0;
	$row=mysqli_fetch_array($result);
	do{
		$pass[$index]=$row;
		$index++;
	}while ($row=mysqli_fetch_array($result));	
		
	for($j = 0;$j < $index; $j = $j+1){
		$cartypeid[$j] = $pass[$j][0];
		$carline[$j] = $pass[$j][1];
		$cartype[$j] = $pass[$j][2];
		$release_t[$j] = $pass[$j][3];
		$displacement[$j] = $pass[$j][4];
		$grade[$j] = $pass[$j][5];
		$body[$j] = $pass[$j][6];
		$box[$j] = $pass[$j][7];
		$price[$j] = $pass[$j][8];
		$state[$j] = $pass[$j][9];
		if($state[$j] == 0) $state[$j] = "no";
		else $state[$j] = "yes";
	}
	mysqli_close($conn);
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Car Type Management</title>

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
          <h5 class="centered"><?php echo $position;?></h5>
          
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
            <a href="staff.php" >
              <i class="fa fa-user-md"></i>
              <span>Staff</span>
              </a>
          </li>

		  <li id="storage">
            <a href="storage.php" >
              <i class="fa fa-edit"></i>
              <span>Storage</span>
              </a>
          </li>
		  
		  <li id="inventory">
            <a href="inventory.php">
              <i class="fa fa-th-large"></i>
              <span>Inventory</span>
              </a>
          </li>
		  <li id="car_type">
            <a href=""  class="active">
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
        <h3><i class="fa fa-angle-right"></i> Car Type Information</h3>
		<br>
		<button id="add_sales_record" class="btn btn-theme" type="button" data-toggle="modal" data-target="#add_record"><i class="fa fa-plus"></i>&nbsp Add New Car Type</button>
		<br>


			  
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="add_record" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
			<form action="add_car_type.php" method="post">
			<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">car detail</h4>
			</div>
			<div class="modal-body">			
			    <p>Car Line.</p>
                <input type="text"   name="CarLine" autocomplete="off" class="form-control placeholder-no-fix"  >
				<br>	
			    <p>Car Type.</p>
                <input type="text"   name="CarType" autocomplete="off" class="form-control placeholder-no-fix"  >
				<br>	
			    <p>Release Time.</p>
                <input type="text"   name="ReleaseTime" autocomplete="off" class="form-control placeholder-no-fix"  >
				<br>	
			    <p>Displacement.</p>
                <input type="text"   name="Displacement" autocomplete="off" class="form-control placeholder-no-fix"  >
				<br>	
			    <p>AutoGrade.</p>
                <input type="text"   name="AutoGrade" autocomplete="off" class="form-control placeholder-no-fix"  >
				<br>	
			    <p>Body.</p>
                <input type="text"   name="Body" autocomplete="off" class="form-control placeholder-no-fix"  >
				<br>	
			    <p>GearBox.</p>
                <input type="text"   name="GearBox" autocomplete="off" class="form-control placeholder-no-fix"  >
				<br>	
			    <p>MarketPrice.</p>
                <input type="text"   name="MarketPrice" autocomplete="off" class="form-control placeholder-no-fix"  >
				<br>				
			    <p>Is For Sale.</p>
                <select class="form-control"  name="IsForSale">
				<option value ="1">yes</option>
				<option value ="0">no</option>
			    </select>
				<br>								
              </div>
              <div class="modal-footer">
			    <button class="btn btn-theme" type="submit" >Add</button>
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

                <hr>
                <thead>
                  <tr>
                    <th>Car Type Id</th>
                    <th>Car Line</th>
                    <th>Car Type</th>
                    <th>Release Time</th>
					<th>Displacement</th>
					<th>AutoGrade</th>
					<th>Body</th>
					<th>GearBox</th>
					<th>Market Price</th>
					<th>Is For Sale</th>
					<th>Operation</th>
                  </tr>
                </thead>
                <tbody>
				<?php
				for($ind = 0;$ind < $index;$ind ++){
				//	if($stockid[$ind] == '') break;
					echo"<tr>
                    <td>".$cartypeid[$ind]."</td>
                    <td>".$carline[$ind]."</td>
					<td>".$cartype[$ind]."</td>
					<td>".$release_t[$ind]."</td>
					<td>".$displacement[$ind]."</td>
					<td>".$grade[$ind]."</td>
					<td>".$body[$ind]."</td>
					<td>".$box[$ind]."</td>
					<td>".$price[$ind]."</td>
					<td>".$state[$ind]."</td>".
					"<td>
					<button class=\"btn btn-danger\" type=\"button\" onclick=\"delete_record(this)\">Delete</button>
					</td>".
					"</tr>";
					
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
function delete_record(obj){
	var id=$(obj).parent().parent().children()[0].innerHTML;
	console.log(id);
	$.post("delete_car_type.php",
    {
        id:id
    },
    function(data,status){
        console.log("数据: " + data + "\n状态: " + status);
		if(status=="success"){
			alert("successful delete !");
			window.location.href='car_type.php' 
		}
		
    });
}

</script>

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

</html>
