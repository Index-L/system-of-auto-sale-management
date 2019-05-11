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
  <title>Inventory Management</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
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
            <a href="inventory.php" class="active">
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
        <h3><i class="fa fa-angle-right"></i> Inventory Information</h3>
		<br>

		<form class="form-inline" role="form" action="" method="post">

			<!--  取数据 ：<?php echo $_POST["Color"] ?>  <?php echo $_POST["CarTypeId"]?> >  <-->
				
				<label class="control-label"><font size="4">car type number : </font></label>
            
                <input class="form-control" id="exampleInputPassword2" type="text" name="CarTypeId">

				&nbsp&nbsp&nbsp&nbsp
				<label class="control-label"><font size="4">color : </font></label>
				<select class="form-control" id="sel1" name="Color">
				<option value ="">All</option>
				<option value ="Black">Black</option>
				<option value ="Green">Green</option>
				<option value ="Purple">Purple</option>
				<option value ="Blue">Blue</option>
				<option value ="Red">Red</option>
				<option value ="Grey">Grey</option>
				<option value ="Yellow">Yellow</option>
			    </select>
			    &nbsp&nbsp&nbsp&nbsp
                <button class="btn btn-theme" type="submit"><i class="fa fa-search-plus"></i>&nbsp Search</button>
				
        </form>

			<?php
			if(isset($_POST["Color"]) != '' || isset($_POST["CarTypeId"]) != ''){
				$color = $_POST["Color"];
				$CarTypeId = $_POST["CarTypeId"];
			}
			else{
				$color = '';
				$CarTypeId = '';
			}

			require("conn_db.php");
			if($color == '' && $CarTypeId == ''){//default
				$sql = "select * from inventory";
			}
			else if($color == '' && $CarTypeId != ''){//no color
				$sql = "select * from inventory where CarTypeId = '{$CarTypeId}'";

			}
			else if($color != '' && $CarTypeId == ''){//no id
				$sql = "select * from inventory where Color = '{$color}'";

			}
			else{//search
				$sql = "select * from inventory where CarTypeId = '{$CarTypeId}' and Color = '{$color}'";
			}
			$result = mysqli_query($conn,$sql);
			$index = 0;
			$row=mysqli_fetch_array($result);
			do{
				$pass[$index]=$row;
				$index++;
			}while ($row=mysqli_fetch_array($result));
			
			for($j = 0;$j < $index; $j = $j+1){
				$cartype[$j] = $pass[$j][0];
				$vin[$j] = $pass[$j][1];
				$eng_no[$j] = $pass[$j][2];
				$car_color[$j] = $pass[$j][3];
				$date[$j] = $pass[$j][4];
				$ex_pri[$j] = $pass[$j][5];

			}
			mysqli_close($conn);
			?>
			  
	
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

              <table class="table table-hover">

                <hr>
                <thead>
                  <tr>
					<th>Car Type</th>
                    <th>VIN</th>
					<th>Engine Number</th>
                    <th>Color</th>
                    <th>Manufactured Date</th>
					<th>Ex-factory Price</th>
                  </tr>
                </thead>
                <tbody>
				<?php
				for($ind = 0;$ind < $index;$ind ++){
					echo"<tr>
					<td><a data-toggle=\"modal\" data-target=\"#cardetail\" onclick=\"get_cardetail(this)\">".$cartype[$ind]."</a></td>
                    <td>".$vin[$ind]."</td>
                    <td>".$eng_no[$ind]."</td>
					<td>".$car_color[$ind]."</td>
					<td>".$date[$ind]."</td>
					<td>".$ex_pri[$ind]."</td>".
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

function get_cardetail(obj){
	var id=$(obj).parent().parent().children()[0].innerText;
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


</html>
