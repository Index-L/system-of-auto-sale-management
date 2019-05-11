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
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Sales Management</title>

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
            <a href="" class="active">
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
        <h3><i class="fa fa-angle-right"></i> Sales Information</h3>
		<br>
		<button id="add_sales_record" class="btn btn-theme" type="button" data-toggle="modal" data-target="#add_record"><i class="fa fa-plus"></i>&nbsp Add New Sales Record</button>
		<br>
		<br>
		<form class="form-inline" role="form" action="" method="post">

			<!--  取数据 ：  <?php echo $_POST["EngineNo"]?> >  <-->
				
				<label class="control-label"><font size="4">Engine Number : </font></label>
				<input class="form-control" id="exampleInputPassword2" type="text" name="EngineNo">
			    &nbsp&nbsp&nbsp&nbsp
                <button class="btn btn-theme" type="submit"><i class="fa fa-search-plus"></i>&nbsp Search</button>
				
        </form>
		
		<?php
			if(isset($_POST["EngineNo"])){
				$eng_no = $_POST["EngineNo"];
			}
			else{
				$eng_no = '';
			}

			require("conn_db.php");
			if($eng_no == ''){//default
				$sql = "select * from sale order by SaleId DESC";
			}
			else{//search
				$sql = "select * from sale where EngineNo = '{$eng_no}' order by SaleId DESC";
			}
			$result = mysqli_query($conn,$sql);
			$index = 0;
			$row=mysqli_fetch_array($result);
			do{
				$pass[$index]=$row;
				$index++;
			}while ($row=mysqli_fetch_array($result));
			
			for($j = 0;$j < $index; $j = $j+1){
				$rec_id[$j] = $pass[$j][0];
				$cartypeid[$j] = $pass[$j][1];
				$eng_num[$j] = $pass[$j][2];
				$vin[$j] = $pass[$j][3];
				$staffid[$j] = $pass[$j][4];
				$customersid[$j] = $pass[$j][5];
				$purchaset[$j] = $pass[$j][6];
				$price[$j] = $pass[$j][7];

			}
			mysqli_close($conn);
			?>
			
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="add_record" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
			<form action="add_sales_record.php" method="post">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add new sales record</h4>
              </div>
              <div class="modal-body">
                <p>Car Type Id.</p>
                <input type="text"  placeholder="Car Type Id" name="CarTypeId" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				<p>Engine Number.</p>
                <input type="text"  placeholder="Engine Number" name="EngineNo" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				<p>VIN.</p>
                <input type="text" name="VIN" placeholder="VIN" autocomplete="off" class="form-control placeholder-no-fix">
				<br>

								
				<p>Deal Price.</p>
                <input type="text" name="AucPrice" placeholder="Deal Price" autocomplete="off" class="form-control placeholder-no-fix">
				<br>
				
				<p>Purchase Time</p>
				<div style="width:533px">
				    <div class="input-append date dpYears" data-date="2014-01-01" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                      <input class="form-control" type="text" size="16" readonly="" value="2014-01-01" name="PurchaseTime">
                      <span class="input-group-btn add-on">
                        <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
				</div>
				<br>
				
				<p>Customer Id.</p>
                <input type="text" name="CustomerId" placeholder="Customer Id" autocomplete="off" class="form-control placeholder-no-fix">
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
			  
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="cardetail" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">

			<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">car detail</h4>
			</div>
			<div class="modal-body">
			    <p>Car Type Id.</p>
                <input type="text"   id="CarTypeId"  autocomplete="off" class="form-control placeholder-no-fix" value="?" readonly>
				<br>			
			    <p>Car Line.</p>
                <input type="text"   id="CarLine" autocomplete="off" class="form-control placeholder-no-fix" value="?" readonly>
				<br>	
			    <p>Car Type.</p>
                <input type="text"   id="CarType" autocomplete="off" class="form-control placeholder-no-fix" value="?" readonly>
				<br>	
			    <p>Release Time.</p>
                <input type="text"   id="ReleaseTime" autocomplete="off" class="form-control placeholder-no-fix" value="?" readonly>
				<br>	
			    <p>Displacement.</p>
                <input type="text"   id="Displacement" autocomplete="off" class="form-control placeholder-no-fix" value="?" readonly>
				<br>	
			    <p>AutoGrade.</p>
                <input type="text"   id="AutoGrade" autocomplete="off" class="form-control placeholder-no-fix" value="?" readonly>
				<br>	
			    <p>Body.</p>
                <input type="text"   id="Body" autocomplete="off" class="form-control placeholder-no-fix" value="?" readonly>
				<br>	
			    <p>GearBox.</p>
                <input type="text"   id="GearBox" autocomplete="off" class="form-control placeholder-no-fix" value="?" readonly>
				<br>	
			    <p>MarketPrice.</p>
                <input type="text"   id="MarketPrice" autocomplete="off" class="form-control placeholder-no-fix" value="?" readonly>
				<br>				
			    <p>Is For Sale.</p>
                <input type="text"   id="IsForSale" autocomplete="off" class="form-control placeholder-no-fix" value="?" readonly>
				<br>								
              </div>

	
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
					<th>Record Id</th>
                    <th>Car Type Id</th>
                    <th>Engine No</th>
                    <th>VIN</th>
                    <th>Staff Id</th>
					<th>Customer Id</th>
					<th>Purchase Time</th>
					<th>Deal Price</th>
					<th>Operation</th>
                  </tr>
                </thead>
                <tbody>
				<?php
				for($ind = 0;$ind < $index;$ind ++){
					if($rec_id[$ind] == '') break;
					echo"<tr>
                    <td>".$rec_id[$ind]."</td>
					<td><a data-toggle=\"modal\" data-target=\"#cardetail\" onclick=\"get_cardetail(this)\">".$cartypeid[$ind]."</a></td>
                    <td>".$eng_num[$ind]."</td>
					<td>".$vin[$ind]."</td>
					<td>".$staffid[$ind]."</td>
					<td>".$customersid[$ind]."</td>
					<td>".$purchaset[$ind]."</td>
					<td>".$price[$ind]."</td>".
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
	$.post("delete_sales_record.php",
    {
        id:id
    },
    function(data,status){
        console.log("数据: " + data + "\n状态: " + status);
		if(status=="success"){
			alert("successful delete !");
			window.location.href='';
		}
		
    });
}

function get_cardetail(obj){
	var id=$(obj).parent().parent().children()[1].innerText;
	$.post(
	"get_cardetail.php",
    {
        id:id
    },
    function(data,status){
        //console.log("数据: " + data + "\n状态: " + status);
		if(status=="success"){
			//alert("successful fetch data  !");
			//设置模态框
			var data_eval=eval("("+data+")");
			document.getElementById("CarTypeId").value=data_eval.CarTypeId;
			document.getElementById("CarLine").value=data_eval.CarLine;
			document.getElementById("CarType").value=data_eval.CarType;
			document.getElementById("ReleaseTime").value=data_eval.ReleaseTime;
			document.getElementById("Displacement").value=data_eval.Displacement;
			document.getElementById("AutoGrade").value=data_eval.AutoGrade;
			document.getElementById("Body").value=data_eval.Body;
			document.getElementById("GearBox").value=data_eval.GearBox;
			document.getElementById("MarketPrice").value=data_eval.MarketPrice;
			if(data_eval.IsForSale){
				document.getElementById("IsForSale").value="true";
			}
			else{
				document.getElementById("IsForSale").value="false";
			}		
		}	
    },
	"json"
	);
}

</script>
<script>
var position="<?php echo $_SESSION["position"] ?>";
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
