<?php
	session_start();
	require("core/init.php");
	$user = $_SESSION['username'];	
	// truy vấn để lấy thong tin từ bảng users cho vào input trong form
	$sql3 = "SELECT username, name, phonenumber,address FROM users WHERE username = '$user'";
	$result3 = mysqli_query($db, $sql3);
	$row=mysqli_fetch_assoc($result3);
        ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form action="payment_processing.php" method="post">
    	<table>
          <tr>
            <td colspan="2" style="text-align:center"><h3>Thông tin khách hàng</h3></td>
          </tr>
           <tr>
            <td>Tài khoản</td>
            <td><input type="text" size="40" value="<?php echo "$row[username]";?>" disabled="disabled"/></td>
          </tr>
          <tr>
            <td>Họ tên</td>
            <td><input type="text" size="40" name="txtname" value="<?php echo "$row[name]";?>"/></td>
          </tr>
          <tr>
            <td>Số điện thoại</td>
            <td><input type="text" size="40" name="txtsdt" value="<?php echo "$row[phonenumber]";?>"/></td>
          </tr>
          <tr>
            <td>Địa chỉ</td>
            <td><input type="text" size="40" name="txtaddr" value="<?php echo "$row[address]";?>"/></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" value="Xác nhận thanh toán" /></td>
          </tr>
        </table>

    </form>
</body>
</html>

<?php 
mysqli_close($db);
?> 
