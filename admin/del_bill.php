<?php
	//session_start();
	$ordercode=$_GET['ordercode'];
			require("../core/init.php");
	$sql=mysqli_query($db,"delete from order_management where ordercode='$ordercode'");
	$sql1=mysqli_query($db,"delete from order_details where ordercode='$ordercode'");
	header('location:ordered.php');
	exit();
?>
