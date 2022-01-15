<?php
	session_start();
	$flag=NULL;
				include('core/init.php');

?>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/cart.js"></script>
<?php
		 include 'includes/head.php';
	 include 'includes/navigation.php';
	
	
?>

<div class="cart_style" style=" margin-bottom:100px">
	<?php
    	echo"<table border='1' style='text-align:center;
		width: 722px;	 border-collapse:collapse;margin: auto;'>";
      		echo"<tr>";
        		echo"<th style='width:60px'>Xóa</th>";
        		echo"<th style='width:150px'>Sản phẩm</th>";
        		echo"<th style='width:150px'>Kích cỡ</th>";
        		echo"<th style='width:80px'>Đơn giá</th>";
				echo"<th style='width:80px'>Số lượng</th>";
				echo"<th style='width:100px'>Thành tiền</th>";
      		echo"</tr>"; 
	  	if(!isset($_SESSION['cart']))
		  {
			  $flag=false;
		  }
		  else
		  {
			  foreach($_SESSION['cart'] as $id => $amount)
			  {
				  if(isset($id))
				  {
					  $flag=true;
				  }
				  else
				  {
					  $flag=false;
				  }
			  }
		  }
		  if ($flag==false)
		  {
				echo"<tr>";
					echo"<td colspan='5'>Giỏ hàng trống </td>";
				echo"</tr>";
			 echo"</table>";
		  }
		  else
		  {
			foreach($_SESSION['cart'] as  $id=>$amount)
			{
				//echo $id;
			  $arr[]="'".$id."'";//tao ra mang mơi;
			}
			$string=implode(",",$arr);// noi cac phan tu trong mang thanh 1 chuoi
			$sql=mysqli_query($db,"select id,title,price from products where id in ($string)");
			$money=0;
			
			
			while($data=mysqli_fetch_assoc($sql))
			{
				
			
			echo"<tr>";
				echo"<td><a href='del_cart.php?id=$data[id]'>Xóa</a></td>";
				echo"<td>$data[title]</td>";?>
				<td>size</td>				
				<?php 

				echo"<td>".number_format($data['price'])."</td>";
				echo"<td>";
				echo"<select class='quantity' data-id='$data[id]' style='border:1px solid #CCC'>";
				$amount=$_SESSION['cart'][$data['id']];

						for($i=1;$i<=3;$i++)
						{
							if($i==$amount){
						  echo"<option value='$i' selected='selected'>$i</option>";}
						  else{
							  echo"<option value='$i'>$i</option>";}
							  
						}
				echo"</select>";
				echo"</td>";
				$into_money=$amount*$data['price'];	
				$money+=$into_money;
;
				echo"<td>".number_format($into_money
)."</td>";
		  	echo"</tr>";
			}
		  $_SESSION['money']=$money;
		  	echo"<tr>";
				echo"<td colspan='5'>Tổng tiền</td>";
				echo"<td>".number_format($money)."</td>";
		  	echo"</tr>";
		  
		echo"</table>";
		echo"<div style=' padding:20px;   display: flex;
		flex-direction: column;
		align-items: flex-end;     width: 1140px;'><a href='index.php' style=' color:red; float:center;'>Mua tiếp sản phẩm</a>";
		}
	?>
    <br />
     <?php  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){ echo "Bạn chưa đăng nhập, vui lòng đăng nhập để thanh toán hoặc click vào thanh toán ngay ở dưới!";?><div><input type="button" style=" \background: black;
    color: white;
    padding: 10px 40px;
    border: none;
    margin: 20px 0;" onclick="alert('Bạn chưa đăng nhập!')" value="Thanh Toán"/></div>
     <div ><a href="login_to_cart.php" style="color:#FF0000;">Đăng Nhập ngay</a></div>
     <div>Tiếp tục <a href="payment_without_login.php" style="color:#FF0000;">thanh toán ngay</a> không cần đăng nhập</div></div>
	 <?php } else{?><a style=" \background: black;
    color: white;
    padding: 10px 40px;
    border: none;
    margin: 20px 0;" href="payment_with_login.php">Thanh Toán</a><?php }?> 
</div>

<!--footer-->

<?php 
		include 'includes/footer.php';

?>
</body>
</html>