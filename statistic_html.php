<!DOCTYPE html>
<html lang="en">
<?php
//session_start();
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

          <li id="sales" >
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
            <a href="" class="active">
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
        <h3><i class="fa fa-angle-right"></i>Statistical analysis</h3>
		<div class="tab-pane" id="chartjs">
          <div class="row mt">
            <div class="col-lg-6">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i>车系销售统计</h4>
                <div class="panel-body text-center">
                  <canvas id="chart1" height="300" width="560"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i>车型销售统计</h4>
                <div class="panel-body text-center">
                  <canvas id="chart2" height="300" width="560"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt">
            <div class="col-lg-6">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i>销量月度统计</h4>
                <div class="panel-body text-center">
                  <canvas id="chart3" height="300" width="560"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i>营业额月度统计</h4>
                <div class="panel-body text-center">
                  <canvas id="chart4" height="300" width="560"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt">
            <div class="col-lg-6">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i>员工业绩 销售数量</h4>
                <div class="panel-body text-center">
                  <canvas id="chart5" height="300" width="560"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i>员工业绩 营业额</h4>
                <div class="panel-body text-center">
                  <canvas id="chart6" height="300" width="560"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>




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

<script src="https://cdn.bootcss.com/echarts/4.2.1-rc1/echarts.js"></script>
<script>
var data1=eval('<?php echo json_encode($data1);?>');
var data1_a=new Array(); 
var data1_b=new Array();
for(var i=0;i<data1.length;i++){
	data1_a.push(data1[i][0]+" "+data1[i][1]+"辆");
	var temp={value:335, name:'A4'};
	temp.name=data1[i][0]+" "+data1[i][1]+"辆";
	temp.value=data1[i][1];
	data1_b.push(temp);
}
var myChart1 = echarts.init(document.getElementById('chart1'));
var option1 = {
    title : {
        text: '各车系销售量',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: data1_a
    },
    series : [
        {
            name: '访问来源',
            type: 'pie',
            radius : '66%',
            center: ['50%', '52%'],
            data:data1_b,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};
myChart1.setOption(option1);

var data2=eval('<?php echo json_encode($data2);?>');
var data2_a=new Array(); 
var data2_b=new Array();
for(var i=0;i<data2.length;i++){
	data2_a.push(data2[i][0]+" "+data2[i][1]+"辆");
	var temp={value:335, name:'A4'};
	temp.name=data2[i][0]+" "+data2[i][1]+"辆";
	temp.value=data2[i][1];
	data2_b.push(temp);
}
var myChart2 = echarts.init(document.getElementById('chart2'));
var option2 = {
	title : {
        text: '各车型销售量',
        x:'center'
    },
    tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        x: 'left',
        data:data2_a
    },
    series: [
        {
            name:'访问来源',
            type:'pie',
            radius: ['50%', '70%'],
            avoidLabelOverlap: false,
            label: {
                normal: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    show: true,
                    textStyle: {
                        fontSize: '30',
                        fontWeight: 'bold'
                    }
                }
            },
            labelLine: {
                normal: {
                    show: false
                }
            },
            data:data2_b
        }
    ]
};
myChart2.setOption(option2);

var data3=eval('<?php echo json_encode($data3);?>');
var data3_a=new Array(); 
var data3_b=new Array();
for(var i=0;i<data3.length;i++){
	data3_a.push(data3[i][0]+" "+"月");
	data3_b.push(data3[i][1]);
}
var myChart3 = echarts.init(document.getElementById('chart3'));
var option3 = {
    xAxis: {
        type: 'category',
        data: data3_a
    },
    yAxis: {
        type: 'value'
    },
    series: [{
        data: data3_b,
        type: 'line'
    }]
};
myChart3.setOption(option3);

var data4=eval('<?php echo json_encode($data4);?>');
var data4_a=new Array(); 
var data4_b=new Array();
for(var i=0;i<data4.length;i++){
	data4_a.push(data4[i][0]+" "+"月");
	data4_b.push(data4[i][1]);
}
var myChart4 = echarts.init(document.getElementById('chart4'));
var option4 = {
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: data4_a
    },
    yAxis: {
        type: 'value'
    },
    series: [{
        data: data4_b,
        type: 'line',
        areaStyle: {}
    }]
};
myChart4.setOption(option4);

var data5=eval('<?php echo json_encode($data5);?>');
var data5_a=new Array(); 
var data5_b=new Array();
for(var i=0;i<data5.length;i++){
	data5_a.push(data5[i][1]+" "+data5[i][2]);
	data5_b.push(data5[i][3]);
}
var myChart5 = echarts.init(document.getElementById('chart5'));
var option5 = {
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis: {
        type: 'value',
        boundaryGap: [0, 0.01]
    },
    yAxis: {
        type: 'category',
        data: data5_a
    },
    series: [
        {
            type: 'bar',
            data:  data5_b
        }

    ]
};
myChart5.setOption(option5);

var data6=eval('<?php echo json_encode($data6);?>');
var data6_a=new Array(); 
var data6_b=new Array();
for(var i=0;i<data6.length;i++){
	data6_a.push(data6[i][1]+" "+data6[i][2]);
	data6_b.push(data6[i][3]);
}
var myChart6 = echarts.init(document.getElementById('chart6'));
var option6 = {
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis: {
        type: 'value',
        boundaryGap: [0, 0.01]
    },
    yAxis: {
        type: 'category',
        data: data6_a
    },
    series: [
        {
            type: 'bar',
            data:  data6_b
        }

    ]
};
myChart6.setOption(option6);
</script>
</html>
