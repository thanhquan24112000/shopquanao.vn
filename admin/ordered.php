<div>
	<table>
    	<tr style="background:#6CF; color: #FFF">
        	<th style="width:100px">Đơn hàng</th>
            <th style="width:120px">Ngày</th>
            <th>Tên tài khoản</th>
            <th style="width:120px">Tổng tiền</th>
            <th style="width:100px">Trạng thái</th>
            <th style="width:100px">Xem</th>
            <th style="width:100px">Xóa</th>
        </tr>
        <?php
			require("../core/init.php");

			$sql=mysqli_query($db,"select ordercode,name,username,order_date,money,state from order_management order by ordercode desc");
			while($data=mysqli_fetch_assoc($sql))
			{
        		echo"<tr>";
        			echo"<td>$data[ordercode]</td>";
					$timestamp=strtotime($data['order_date']);
					$date=date('d-m-Y',$timestamp);
            		echo"<td>$date</td>";
            		echo"<td>$data[username]</td>";
            		echo"<td>".number_format($data['money'])."</td>";
            		echo"<td>$data[state]</td>";
            		echo"<td><a href='detail_cart.php?ordercode=$data[ordercode]' style='color:#09F'>Xem</a></td>";
            		echo"<td><a href='del_bill.php?ordercode=$data[ordercode]' style='color:#F9F'>Xóa</a></td>";
        		echo"</tr>";
			}
		?>
   	</table>
</div>