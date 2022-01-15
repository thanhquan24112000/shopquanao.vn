
<?php
include 'includes/head.php';
?>
<!-- <div class="order">
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
</div> -->

<?php

//function sanitize($dirty){
//	return htmlentities($dirty,ENT_QUOTES, "UTF-8");
//	}
function display_errors($errors){
	$display = '<ul class="bg-light">';
	foreach ($errors as $error){
		$display .='<li class="text-danger">'.$error.'</li>';
		}
	$display .='</ul';
	return $display;
	}
function sanitize($value)
{
	if(is_array($value))
	{
		$value = array_map('sanitize', $value);
	}
	else
	{
		if(function_exists("mysql_real_escape_string"))
		{
			$value = mysql_real_escape_string($value);
		} 
		else
		{
			$value = addslashes($value);
		}
	}
	return $value;
}
$_POST = array_map('sanitize', $_POST);
$_GET = array_map('sanitize', $_GET); 
?>
<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'/shopquanao.vn/core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';
	if(isset($_GET['add'])){
	$parentQuery=$db->query("SELECT * FROM categories WHERE parent=0 ORDER BY category");
	if($_POST)
	{	
		$title=sanitize($_POST['title']);
		if (isset($_POST['child'])) {
			$categories=sanitize($_POST['child']);
		  }else{
			$categories='';
		  }		
		$price=sanitize($_POST['price']);

		$sizes=sanitize($_POST['sizes']);

	
		$description=sanitize($_POST['description']);
		//$tmpLoc='';
		//$uploadName='';
		//$uploadPath='';
		//$dbpath='';

		$errors=array();
		
		if(!empty($_POST['sizes'])){
			$sizeString=sanitize($_POST['sizes']);
			$sizeString=rtrim($sizeString,',');
			$sizesArray=explode(',',$sizeString);
			$sArray=array();
			$qArray=array();
			foreach($sizesArray as $ss){
				$s=explode(':',$ss);
				$sArray[]=$s[0];
				$qArray[]=$s[1];		
				}

			}
		else{$sizesArray=array();}
		
		
		$required=array('title','price','parent','child','sizes');
		foreach($required as $field)
		{
			if($_POST[$field]=='')
			$errors[]='Những cột có (*) không được bỏ trống';
			break;	
		}
		//validation image
		/*if(!empty($_FILES)){
			var_dump($_FILES);
			$file=$_FILES['file'];
			$name=$file['name'];
			//$file=$_FILES['file2'];
			//$name=$file['name2'];
			//$file=$_FILES['file3'];
			//$name=$file['name3'];
			$nameArray=explode('.',$name);
			$fileName=$nameArray[0];
			$fileExt=$nameArray[1];
			$mime=explode('/',$file['type']);
			$mimeType=$mime[0];
			$mimeExt=$mime[1];
			$tmpLoc=$file['tmp_name'];
			$fileSize=$file['size'];
			$allowed=array('png','jpg','jpeg');
			$uploadName=md5(microtime().'.'.$fileExt);
			$uploadPath=$_SERVER['DOCUMENT_ROOT'].'/shopquanao.vn/images/products/'.$uploadName;
			$dbpath='/shopquanao.vn/images/products'.$uploadName;
			if(!$mimeType!='image')
			{$errors[]='the file must be an image.';
			}
			if(!in_array($fileExt,$allowed))
			{
				$errors[]='the file extension must be a png, jpg, jpeg.';
				}	
			if($fileSize>15000000)
			{
				$errors[]='the file size must be under 15MB.';
				}
			if($fileExt !=$mimeExt && ($fileExt !='jpg' && $mimeExt=='jpeg'))
			{
				$errors[]='the file extension dose not match the file.';
				}
		}*/
		if($_FILES['file']['name'] != NULL){ // Đã chọn file
			// Tiến hành code upload file
			if($_FILES['file']['type'] == "image/jpeg"
			|| $_FILES['file']['type'] == "image/png"
			|| $_FILES['file']['type'] == "image/gif"){
			// là file ảnh
			// Tiến hành code upload    
				if($_FILES['file']['size'] > 1048576){
					echo "File không được lớn hơn 1mb";
				}else{
					// file hợp lệ, tiến hành upload
					$path = $_SERVER['DOCUMENT_ROOT'].'/shopquanao.vn/images/products/'; // file sẽ lưu vào thư mục data
					$tmp_name = $_FILES['file']['tmp_name'];
					$name = $_FILES['file']['name'];
					$type = $_FILES['file']['type']; 
					$size = $_FILES['file']['size']; 
					// Upload file
					
				
			   }
			}else{
			   // không phải file ảnh
			   echo "Kiểu file không hợp lệ";
			}
	   }else{
			echo "Vui lòng chọn file";
	   }
		//ảnh 2
		if($_FILES['file2']['name'] != NULL){ // Đã chọn file
				// Tiến hành code upload file
				if($_FILES['file2']['type'] == "image/jpeg"
				|| $_FILES['file2']['type'] == "image/png"
				|| $_FILES['file2']['type'] == "image/gif"){
				// là file ảnh
				// Tiến hành code upload    
					if($_FILES['file2']['size'] > 1048576){
						echo "File không được lớn hơn 1mb";
					}else{
						// file hợp lệ, tiến hành upload
						$path2 = $_SERVER['DOCUMENT_ROOT'].'/shopquanao.vn/images/products/'; // file sẽ lưu vào thư mục data
						$tmp_name2 = $_FILES['file2']['tmp_name'];
						$name2 = $_FILES['file2']['name'];

						// Upload file
						
					
				   }
				}else{
				   // không phải file ảnh
				   echo "Kiểu file không hợp lệ";
				}
		   }else{
				echo "Vui lòng chọn file";
		   }
	   
	   //Ảnh 3
		if($_FILES['file3']['name'] != NULL){ // Đã chọn file
				// Tiến hành code upload file
				if($_FILES['file3']['type'] == "image/jpeg"
				|| $_FILES['file3']['type'] == "image/png"
				|| $_FILES['file3']['type'] == "image/gif"){
				// là file ảnh
				// Tiến hành code upload    
					if($_FILES['file3']['size'] > 1048576){
						echo "File không được lớn hơn 1mb";
					}else{
						// file hợp lệ, tiến hành upload
						$path3 = $_SERVER['DOCUMENT_ROOT'].'/shopquanao.vn/images/products/'; // file sẽ lưu vào thư mục data
						$tmp_name3 = $_FILES['file3']['tmp_name'];
						$name3 = $_FILES['file3']['name'];

						// Upload file
						
					
				   }
				}else{
				   // không phải file ảnh
				   echo "Kiểu file không hợp lệ";
				}
		   }else{
				echo "Vui lòng chọn file";
		   }
	   
	   //kiem tra rỗng và upload file
		if(!empty($errors)){
			echo display_errors($errors);
			}
		else{
			//Hàm move_uploaded_file() sẽ kiểm tra để đảm bảo rằng file truyền vào là một file upload hợp lệ( nghĩa là file đã được upload bởi phương thức PHP's HTTP POST). Nếu file hợp lệ nó sẽ được di chuyển đến thư mục đã truyền vào.
			//move_uploaded_file($tmpLoc,$uploadPath);
			move_uploaded_file($tmp_name,$path.$name);
			move_uploaded_file($tmp_name2,$path2.$name2);
			move_uploaded_file($tmp_name3,$path3.$name3);
			$dbpath='/shopquanao.vn/images/products/'.$name;
			$dbpath2='/shopquanao.vn/images/products/'.$name2;
			$dbpath3='/shopquanao.vn/images/products/'.$name3;
			$insertProductSql="INSERT INTO products (title,price,categories,sizes,image,image2,image3,description) VALUES ('$title','$price','$categories','$sizes','$dbpath','$dbpath2','$dbpath3','$description')";									  
			if (mysqli_query($db, $insertProductSql)) {
					 echo "Thêm Thành công";
					 var_dump($insertProductSql);
			} else {
				echo "Error: " . $insertProductSql . "<br>" . mysqli_error($db);
			}
			header('Location:products.php');
		}

		
	}
?>
	<!--thêm sản phẩm-->
	<h2 align="center">Thêm Sản Phẩm Mới</h2><br />
    <!--Thuộc tính enctype=”multipart/form-data” ở trong thẻ <form mục đích của thuộc tính này để trình duyệt có thể hiểu và mã hóa dữ liệu thành nhiều phần.-->
	<form action="products.php?add=1" method="post"  enctype="multipart/form-data">
    <div class="row">  
  		<div class="col-1"></div>
    	<div class="form-group col-3" style="margin-left:50px;">
        	<label for="title"><strong>Tên Sản Phẩm (*):</strong></label>
            <input type="text" name="title"  class="form-coltrol" id="title" value="<?=((isset($_POST['title']))?sanitize($_POST['title']):'');?>" style="width:300px;"/>
        </div>
        
        <div class="form-group col-3">
        	<label for="parent"><strong>Phân Loại(*):</strong></label>
			<select class="form-coltrol" id="parent" name="parent" style="width:300px; height:28px;">
            <option value=""<?=((isset($_POST['parent']) && $_POST['parent']=='')?' selected':'');?>></option>
            <?php while($parent=mysqli_fetch_assoc($parentQuery)): ?>
				<option value="<?=$parent['id'];?>"<?=((isset($_POST['parent']) && $_POST['parent']==$parent['id'])?' select':'');?>><?=$parent['category'];?></option>
            <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group col-4">
        	<label for="child"><strong>Loại Sản Phẩm(*):</strong></label>
			<select class="form-coltrol" id="child" name="child" style="width:300px; height:28px;">
            	
            </select>
        </div>
        <div class="col-1"></div>
    </div>
    
    <div class="row">  
  		<div class="col-1"></div>
    	<div class="form-group col-3" style="margin-left:50px;">
        	<label for="price"><strong>Giá(*):</strong></label>
            <input type="text" name="price"  class="form-coltrol" id="price" value="<?=((isset($_POST['price']))?($_POST['price']):'');?>" style="width:300px;" />
        </div>
        <div class="form-group col-3" >
        	<label><strong>Size (*):</strong></label>
            <button type="text" onclick="jQuery('#sizesModal').modal('toggle');return false;" style="width:300px;">Chọn size và số lượng</button>

        </div>
        <div class="form-group col-3" >
        	<label for="sizes"><strong>Size vừa nhập (*):</strong></label>
            <input type="text"  name="sizes"  class="form-coltrol" id="sizes" value="<?=((isset($_POST['sizes']))?($_POST['sizes']):'');?>" style="width:300px;"/>
        </div>
        <div class="col-1"></div>
    </div>
    
    
    <div class="row">  
  		<div class="col-1"></div>
    	<div class="form-group col-3" style="margin-left:50px;">
        	<div class="row"> 
                <div class="form-group col-12">
                <label for="image"><strong>Ảnh 1:</strong></label>
                <input type="file" name="file"  class="form-coltrol" id="file" style="width:300px;"/>
                </div>
                <div class="form-group col-12">
                <label for="image"><strong>Ảnh 2:</strong></label>
                <input type="file" name="file2"  class="form-coltrol" id="file2"  style="width:300px;"/>
                </div>
                <div class="form-group col-12">
                <label for="image"><strong>Ảnh 3:</strong></label>
                <input type="file" name="file3"  class="form-coltrol" id="file3"  style="width:300px;"/>
                </div>
            </div>
        </div>
        <div class="form-group col-7" >
        	<div><label for="description"><strong>Thông tin Sản Phẩm (*):</strong></label></div>
           <textarea type="text" name="description" rows="6" class="form-coltrol" id="description"  style="width:650px; height:200px;"><?=((isset($_POST['description']))?sanitize($_POST['description']):'');?></textarea>

        </div>
		<div class="col-1"></div>
    </div>
    <div class="row">  
  		<div class="col-1"></div>
        <div class="col-10" style="margin-left:1020px;"><input type="submit"  class="btn btn-success" value="Thêm Sản Phẩm"></div>
        <div class="col-1"></div>
    </div>
    <div class="clearfix"></div>
    </form>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
    <!-- Modal chọn size và so lương size đó -->
    <div class="modal fade" id="sizesModal" tabindex="-1" role="dialog" aria-labelledby="sizesModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="sizesModalLabel"></h4>
          </div>
          <div class="modal-body">
			<div class="container-fluid">
            <?php for($i=1;$i<=9;$i++):?>
            	<div class="form-group col-md-4" style="width:100px;">
                	<label for="sizes<?=$i;?>">Size:</label>
                    <input type="number" name="size<?=$i?>" id="size<?=$i?>" min="28" max="35" class="form-coltrol" value="<?=((!empty($sArray[$i-1]))?$sArray[$i-1]:'');?>"/>
                </div>
                <div class="form-group col-md-4" style="width:120px;">
                	<label for="quantity<?=$i;?>">Số Lượng:</label>
                    <input type="number" min="0" name="quantity<?=$i?>" id="quantity<?=$i?>" class="form-coltrol" value="<?=((!empty($qArray[$i-1]))?$qArray[$i-1]:'');?>" style="width:80px;"/>
                </div>
                
			<?php endfor ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="updateSizes();jQuery('#sizesModal').modal('toggle');return false;">Lưu</button>
          </div>
        </div>
      </div>
    </div>	
<?php }else{
	$sql="SELECT * FROM products WHERE deleted=0";
	$p_result=$db->query($sql);
	if(isset($_GET['featured'])){
		$id=(int)$_GET['id'];	
		$featured=(int)$_GET['featured'];
		$featuredSql="UPDATE products SET featured = '$featured' WHERE id ='$id'";
		$db->query($featuredSql);
		header('Location: products.php');
	}
?>
<br />


<h2 align="center">Quản Lý Đơn Hàng</h2>
<hr>
<div class="row">  
  <div class="col-1"></div>
  <div class="col-10">
    	<!-- <a href="products.php?add=1" id="add-product-btn" ><input type="submit" class="btn btn-success float-right" value="Thêm Sản Phẩm"></a> -->
    <br /><br />
    <br />
    <table class="table table-hover table-bordered" style="text-align:center">
      <thead style="color:#FFFFFF;">
        <tr class="bg-dark">
          <th>Đơn hàng</th>
          <th>Ngày</th>
          <th>Tên tài khoản</th>
		  <th>Tổng tiền</th>
          <th>Trạng thái thanh toán</th>
		  <th>Trạng thái đơn hàng</th>
          <th>Xem</th>

        </tr>
      </thead>
      <tbody>
        <?php while($product = mysqli_fetch_assoc($p_result)) : 
			$childID=$product['categories'];
			$childSql="SELECT * FROM categories WHERE id = '$childID'";
			$result=$db->query($childSql);
			$child = mysqli_fetch_assoc($result);
			$parentID=$child['parent'];
			$pSql="SELECT * FROM categories WHERE id = '$parentID'";
			$presult=$db->query($pSql);
			$parent=mysqli_fetch_assoc($presult);
			$category=$parent['category'].' ~ '.$child['category'];
		?>
        <tr>
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
					?>
					<td>
					<a href="products.php?featured=<?php echo (($product['featured']== 0)?'1':'0');?>&id=<?=$product['id'];?>" title="<?=($product['featured']==1)?'kích hoat':'không kích hoạt'; ?>"><i class="fa fa-<?=($product['featured']==1)?'toggle-on':'toggle-off'; ?>" style="font-size:34px"></i></a>
				    </td>
					<?php
            		echo"<td></td>";
            		echo"<td><a href='detail_cart.php?ordercode=$data[ordercode]' style='color:#09F'>Xem</a></td>";
        		echo"</tr>";
			}
		?>
        </tr>
        <?php endwhile;?>
      </tbody>
    </table>

  </div>
  
  <div class="col-1"></div>
</div>
	
    
	
<?php } 
	include 'includes/footer.php';

?>
