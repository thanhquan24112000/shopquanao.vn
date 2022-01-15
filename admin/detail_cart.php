<?php
	$ordercode=$_GET['ordercode'];
?>




<div>
	<?php
			require("../core/init.php");
		$sql=mysqli_query($db,"select ordercode,order_date,name,username,phonenumber,address,money from order_management where ordercode=$ordercode");

		$data=mysqli_fetch_assoc($sql);
		echo"<div style='border:1px solid #3CF; margin:10px 0; padding:10px'>";
			$timestamp=strtotime($data['order_date']);
			$date=date('d-m-Y',$timestamp);
			echo"<p>Đơn hàng:<i>#$data[ordercode]</i>---Ngày:<i>$date</i></p>";
			echo"<p>Họ tên:<i>$data[name]</i>---Điện thoại:<i>$data[phonenumber]</i></p>";
			echo"<p>Địa chỉ:<i>$data[address]</i></p>";
		echo"</div>";
	?>
    <table>
    	<tr style="background:#3CF; color:#FFF">
        	<th style="width:100px;">STT</th>
            <th style="width:120px;">Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th style="width:120px;">Kích thước</th>
            
            <th style="width:120px;">Số lượng</th>
            <th style="width:100px;">Đơn giá</th>
            <th style="width:100px;">Thành tiền</th>
        </tr>
        <?php
			$sql2=mysqli_query($db,"select id,amount from order_details where ordercode=$ordercode");
			$stt=1;
			while($data2=mysqli_fetch_assoc($sql2))
			{
				$sql3=mysqli_query($db,"select image,title,sizes,price from products where id=$data2[id]");
				$data3=mysqli_fetch_assoc($sql3);
				echo"<tr>";
					echo"<td>$stt</td>";?>
                    <td><img src="<?= $data3['image']; ?>" width='100' /></td>
					<?php
					//echo"<td><img src='../images/$data3[image]' width='30'</td>";
					echo"<td>$data3[title]</td>";
					echo"<td>$data3[sizes]</td>";
					echo"<td>$data2[amount]</td>";
					echo"<td>".number_format($data3['price'])."</td>";
					echo"<td>".number_format($data3['price']*$data2['amount'])."</td>";
				echo"</tr>";
				$stt++;
			}
				echo"<tr>";
					echo"<td colspan='4'></td>";
					echo"<td>Tổng tiền</td>";
					echo"<td><i>".number_format($data['money'])."</i></td>";
				echo"</tr>";
		?>
     </table>