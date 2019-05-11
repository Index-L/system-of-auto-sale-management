<?php
session_start();
$position = $_SESSION['position'];

switch($position){
	case 'General Manager':
		echo "<script type='text/javascript'>window.location.href='personal_page_manager.php'         
		</script>";
		//require("../Dashio_test/personal_page_manager.php");
		break;
	case 'Warehouse Keeper':
		echo "<script type='text/javascript'>window.location.href='personal_page_buyer.php'         
		</script>";
		//require("../Dashio_test/personal_page_buyer.php");
		break;
	case 'Salesman':
		echo "<script type='text/javascript'>window.location.href='personal_page_salesman.php'         
		</script>";
		//require("../Dashio_test/personal_page_salesman.php");
		break;		
}

?>