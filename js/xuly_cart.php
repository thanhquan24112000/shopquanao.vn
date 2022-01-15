<?php
	session_start();
	$soluongmoi=$_POST['slm'];
	$id=$_POST['id'];
	$_SESSION['cart'][$id]=$soluongmoi;
?>