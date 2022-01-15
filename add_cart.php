<?php
	session_start();
	$id=$_GET['id'];
	if(isset($_SESSION['cart'][$id]))
	{
		$soluong=$_SESSION['cart'][$id];
	}
	else
{		$soluong=1;
	}
	$_SESSION['cart'][$id]=$soluong;//lưu trữ msp và số lượng sp của masp đó
	header("Location:cart.php");
	exit();
?>