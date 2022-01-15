<?php
	session_start();
	$user = $_SESSION['username'];	
			$name=$_POST['txtname'];

			$phone=$_POST['txtsdt'];

			$addr=$_POST['txtaddr'];
		
		if($name !="" && $phone!="" && $addr!="")
		{
			require("core/init.php");
			
			$sql="select max(ordercode) from order_management";
			$result=mysqli_query($db,$sql);
			if(mysqli_num_rows($result)==0)
			{
				$ordercode=1;
			}
			else
			{
				$data=mysqli_fetch_assoc($result);
				$ordercode=$data['max(ordercode)']+1;
			}
			
			mysqli_query($db,"insert into order_management values('$ordercode',now(),'$name','$user','$phone','$addr','$_SESSION[money]')");
			foreach ($_SESSION['cart'] as $id => $amount)
			{
				mysqli_query($db,"insert into order_details(ordercode,id,amount) values('$ordercode','$id','$amount')");
			}
			unset($_SESSION["cart"]);
			echo"<span style='color:red'>Don hang duoc thanh toan thanh cong</span>,<a href='index.php'>tro ve trang chu</a>";
			mysqli_close($db);
		}
	
?>
