<?php
	session_start();
	if(isset ($_POST['ok']))
	{
		if(empty($_POST['txtname']))
		{
			echo "Xin vui long nhap ho ten";
			$name="";
		}
		else
		{
			$name=$_POST['txtname'];
		}
		if(empty($_POST['txtsdt']))
		{
			echo "Xin vui long nhap sdt";
			$phone="";
		}
		else
		{
			$phone=$_POST['txtsdt'];
		}
		if(empty($_POST['txtaddr']))
		{
			echo "Xin vui long nhap dia chi";
			$addr="";
		}
		else
		{
			$addr=$_POST['txtaddr'];
		}
		if($name !="" && $phone!="" && $addr!="")
		{
			require("core/init.php");
			//mysqli_query($db,"insert into order_management(ordercode,order_date,username,address,phonenumber,money) values('$ordercode',now(),'$user','$sql3','$sql2','$_SESSION[money]')");		
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
	
			mysqli_query($db,"insert into order_management(ordercode,order_date,name,phonenumber,address,money) values('$ordercode',now(),'$name','$phone','$addr','$_SESSION[money]')");
			foreach ($_SESSION['cart'] as $id => $amount)
			{
				mysqli_query($db,"insert into order_details(ordercode,id,amount) values('$ordercode','$id','$amount')");
			}
			unset($_SESSION["cart"]);
			echo"<span style='color:red'>Don hang duoc thanh toan thanh cong</span>,<a href='index.php'>tro ve trang chu</a>";
			mysqli_close($db);
		}
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<form action="payment_without_login.php" method="post">
    	<table>
          <tr>
            <td colspan="2" style="text-align:center"><h3>Thông tin khách hàng</h3></td>
          </tr>
          <tr>
            <td>Họ tên</td>
            <td><input type="text" size="40" name="txtname" /></td>
          </tr>
          <tr>
            <td>Số điện thoại</td>
            <td><input type="text" size="40" name="txtsdt" /></td>
          </tr>
          <tr>
            <td>Địa chỉ</td>
            <td><textarea cols="30" rows="3" name="txtaddr"></textarea></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" value="Xác nhận thanh toán" name="ok" /></td>
          </tr>
        </table>

    </form>
</body>
</html>