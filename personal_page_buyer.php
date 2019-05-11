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
$sql = "select S_FirstName, S_LastName, S_Gender, S_BirthDay, S_Phone from staff where StaffId = '{$id}'";
$result = mysqli_query($conn,$sql);
$pass = mysqli_fetch_row($result);
mysqli_close($conn);
$name = $pass[0].' '.$pass[1];
$gender = $pass[2];
$birthday = $pass[3];
$now = date("Y-m-d");
list($Y1,$m1,$d1)=explode('-',$birthday);
list($Y2,$m2,$d2)=explode('-',$now);
$age = $Y2 - $Y1;
$phone = $pass[4];
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Personal Homepages</title>

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
          <h5 class="centered"><?php echo $position; ?></h5>
          
		  <li class="mt">
            <a href="personal_page.php" class="active">
              <i class="fa fa-star"></i>
              <span>About</span>
              </a>
          </li>
		  
		 
		  <li id="purchase">
            <a href="purchase_.php">
              <i class="fa fa-sign-in"></i>
              <span>Purchase</span>
              </a>
          </li>

         
		  <li id="sales">
            <a href="sales.php">
              <i class="fa fa-sign-out"></i>
              <span>Sales</span>
              </a>
          </li>
		  
          
		  <li id="customer">
            <a href="customer.php">
              <i class="fa fa-user"></i>
              <span>Customers</span>
              </a>
          </li>
		  



          
		  <li id="staff">
            <a href="staff.php">
              <i class="fa fa-user-md"></i>
              <span>Staff</span>
              </a>
          </li>

		  
		  <li id="inventory">
            <a href="inventory.php">
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
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
	   <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modify_information" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
			<form action="modify_information.php" method="post">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add new staff</h4>
              </div>
              <div class="modal-body">
				<p>First Name.</p>
                <input type="text"  placeholder="First Name" name="S_FirstName" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				<p>Last Name.</p>
                <input type="text" name="S_LastName" placeholder="Last Name" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				<p>Gender.</p>
				<select class="form-control" id="sel1" name="S_Gender">
				<option value ="Male">male</option>
				<option value ="Female">female</option>
			    </select>
				<br>
				<p>BirthDay .</p>
				<div style="width:530px">
				    <div class="input-append date dpYears" data-date="1970-01-01" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                      <input class="form-control" type="text" size="16" readonly="" value="1970-01-01" name="S_BirthDay">
                      <span class="input-group-btn add-on">
                        <button class="btn btn-theme" style="padding:12px;padding-top:6px;padding-bottom:6px;" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
				</div>
				<p>Phone.</p>
                <input type="text" name="S_Phone" placeholder="Phone" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				<p>Password.</p>
                <input type="password" name="Passwd" placeholder="Password" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				
              </div>
              <div class="modal-footer">
			    <button class="btn btn-theme" type="submit" >Submit</button>
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                
              </div>
			</form>
            </div>
          </div>
      </div>	
	  
	  <div class="container main">
        <div class="row mt">
			<div id = "index_left" class="col-md-6 left">		
				<img class="img-responsive img-rabbit" src="buyer.jpg">	
			</div>
			<div id = "index_right" class="col-md-6 right">	
				<div id="watermark">
					<h2 class="page-title" text-center="">Personal Homepage</h2>
					<div class="marker">w</div>
				</div>
				<p class="subtitle">
					Welcome！<?php echo $name;?>
				</p>
				<br>
				<div id="watermark">
					<h2 class="page-title" text-center="">information</h2>
					<div class="marker">I</div>
				</div>
				<p class="subtitle">
				Staff Id: <?php echo $id;?>
				</p>
				<p class="subtitle">
				Name: <?php echo $name;?>
				</p>
				<p class="subtitle">
				Gender: <?php echo $gender;?>
				</p>
				<p class="subtitle">
				Age: <?php echo $age;?>
				</p>
				<p class="subtitle">
				Phone: <?php echo $phone;?>
				</p>
				<br>
				<br>
			
				<div id="about" class="btn btn-rabbit" data-toggle="modal" data-target="#modify_information">Modify Information</div>
				
			</div>
     
          <!-- /col-lg-6 -->
        </div>
        <!--/ row -->
		</div>
      </section>
      <!-- /wrapper -->
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
console.log(position);
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
<style>
body{
	background-color: #f9f9f9;
	font-family: "Crimson Text";
}

.main{
	background: #fff;
}

.home-description{
	font-style: italic;
	font-weight: 600;
	font-family: "Crimson";
	font-size: 19px;
    padding-top: 15px;
    padding-bottom: 25px;
    line-height: 29px;

}



@media (min-width: 778px)
{
		.main{
			height: 100vh;
			overflow: hidden;
		}

		.img-rabbit{
			/*margin: 0 -15px;*/
		}

		.btn-group-vertical{
    		padding: 20px 87.5px;
    	}

    	.info{
			font-family: "Crimson";
			line-height: 28px;
		    font-size: 16px;
		    padding-top: 15px;
		    padding-right: 50px;
		}
		
		.home-description{
			padding-right: 90px;
			padding-left: 90px;
			
		}
}
.img-rabbit{
	width: 100%;
}
.btn-rabbit{
	background-color: #fff;
	color: #111;
	font-style: italic;
	border: 1px solid #111;
	border-radius: 0px !important;
	transition: all 0.4s ease-in-out;
	margin-bottom: 20px;
	font-family: "Crimson";
	font-size: 13px;
	}

.btn-rabbit:hover{
	color: #fff;
	background-color: #bb9e7d;
	border-color: #bb9e7d;}

p{
	color: #585757;
	font-size: 16px;
	
}

.page-title{
	text-transform: uppercase;
	font-family: 'Josefin Sans';
}

/*Home Style*/




footer{
	padding: 22px 0 10px 0;
	font-style: italic;
	}


.back{
    width: 170px;    
    font-family: "Crimson";
    font-size: 17px;
    font-style: italic;
    vertical-align: middle;
    text-align: center;
    display: block;
    clear: both;
    margin-top: 70px;	 
}

.back i{
	margin-left: -40px;
    margin-right: 17px;
    font-size: 20px;
}



.btn{
	padding: 10px 60px;
	height: 45px;
	font-size: 18px;
}

.btn-group-vertical{
    font-family: "Josefin Sans";    
}

.about{
	font-family: "Josefin Sans";
	/*margin-top: 35px;*/
	/*margin-bottom: 25px;*/
	font-size: 32px;
	
}


.page-title{
	
	font-size: 32px;
	font-family: "Josefin Sans";
}

.fa-heartbeat{
	    color: #bb9e7d;
}

::selection {
	color: #fff;
   	background-color: #bb9e7d;
}

.bottom{
	padding-right: 20px;
}

.page-title{
	position: relative;
	display: inline-block;
}

.page-title:after,.page-title:before{
	content: '';
	position: absolute;
	height: 1px;
	background-color: black;
	left: 0;
	margin: 2px;
}

.social{
	padding-bottom: 15px;
}

.submit{

	font-family: "Crimson"
	font-size: 16px;
}

.subtitle{
	font-style: italic;
	font-weight: 600;
	font-size: 20px;
	color: #3b3b3b;
	line-height: 28px;
	font-family: "Crimson";
	margin-top: 15px;
	margin-bottom: 20px;
	padding-right: 40px;

	}
.page-title:after{
	width: 75%;
	top: -9px;

}

.page-title:before{
	width: 40%;
	bottom: -7px;
}

#watermark .marker{
	position: absolute;
	font-size: 60px;
	opacity: 0.1;
	font-family: "Josefin Sans";
	text-transform: uppercase;
	left: 0;
	top: -5px;
}

#watermark{
	position: relative;
}

.item{
	
	background-color: #313131;
	color: #f9f9f9;
}

#owl-demo .item img{
    display: block;
    width: 100%;
    height: auto;
    /*margin-left: 0px;*/
}

.owl-theme .owl-controls {
    margin-top: 10px;
    margin-right: 10px;
    text-align: center;
    width: 100%;
    position: absolute;
    top: calc(44% - 40px);
		}

.owl-next{
	right: 0;
	padding-right: 1px;

}

.owl-prev{
	left: 0;
	padding-left: 1px;
}



.owl-theme .owl-controls .owl-nav [class*=owl-]{
	position: absolute;
	border-radius: 0px;
	font-size: 21px;
	padding: 15px 20px;
	margin: 0px;
	background-color: #fff; 

}

.owl-theme .owl-controls .owl-nav [class*=owl-] i{
	color: #333;
	
}

.owl-theme .owl-controls .owl-nav [class*=owl-]:hover{
	background-color: #bb9e7d;
	border-color: #bb9e7d;
}
.owl-theme .owl-controls .owl-nav [class*=owl-]:hover i{
	color: #fff;
}
@media (max-width: 1024px) and (orientation: landscape){
	.main{
		height: auto;
	}
}
.custom_btn{
  -vendor-animation-duration: 3s;
  -vendor-animation-delay: 2s;
  -vendor-animation-iteration-count: infinite;
}
.show{
	display: block;
}


</style>

</html>
