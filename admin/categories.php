<?php
function display_errors($errors){
	$display = '<ul class="bg-danger">';
	foreach ($errors as $error){
		$display .='<li class="text-danger">'.$error.'</li>';
		}
	$display .='</ul';
	return $display;
	}
//function sanitize($dirty){
//	return htmlentities($dirty,ENT_QUOTES, "UTF-8");
//	}

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
	
	$sql = "SELECT * FROM categories WHERE parent = 0";
	$pquery = $db->query($sql);
	$pquery1 = $db->query($sql);
	
	$errors=array();
	$category='';
	$parent1='';
	//sửa sản phẩm
	if(isset($_GET['edit']) && !empty($_GET['edit'])){
		$edit_id=(int)$_GET['edit'];	
		$edit_id=sanitize($edit_id);
		$edit_sql="SELECT * FROM categories WHERE id = '$edit_id'";
		$edit_result=$db->query($edit_sql);
		$edit_category=mysqli_fetch_assoc($edit_result);
	}
	
	//xóa loại sp
	if(isset($_GET['delete']) && !empty($_GET['delete']) )
	{
		$delete_id=(int)$_GET[delete];
		$delete_id=sanitize($delete_id);
		$sql="SELECT * FROM categories WHERE id='$delete_id'";
		$result=$db->query($sql);
		$category=mysqli_fetch_assoc($result);
		if($category['parent']==0){
			$sql="DELETE FROM categories WHERE parent='$delete_id'";
			$db->query($sql);
			}
		$dsql="DELETE FROM categories WHERE id='$delete_id'";
		$db->query($dsql);
		header('Location: categories.php');
		}
	
	//xử lý form
	//http://www.dreamincode.net/forums/topic/104801-fatal-error-call-to-undefined-function-sql-sanitize/
	if(isset($_POST) && !empty($_POST)){
		$parent1=sanitize($_POST['parent']);
		$category=sanitize($_POST['category']);
		$sqlform="SELECT * FROM categories WHERE category='$category' AND parent='$parent1'";
		if(isset($_GET['edit'])){
			$id=$edit_category['id'];
			$sqlform="SELECT * FROM categories WHERE category='$category' AND parent='$parent1' AND id!='$id'";
			}
		$fresult=$db->query($sqlform);
		$count=mysqli_num_rows($fresult);
		//if loại sản phẩm rỗng
		if($category==''){
				$errors[] .='Không được để trống loại sản phẩm.';
			}
		//if loại sản phẩm đã có trong db
		if($count>0){
				$errors[] .=$category. 'đã tồn tại, vui lòng chọn loại sản phẩm mới';
			}
		//thông báo lỗi nếu có và update database
		if(!empty($errors)){
				//thông báo lỗi
				$display=display_errors($errors);?>
				<script>
                	jQuery('document').ready(function() {
                        jQuery('#erorrs').html(<?php echo $display;?>);
                    });
                </script>
<?php }else{
				//cập nhật database
				 $updatesql="INSERT INTO categories (category,parent) VALUES ('$category','$parent1')";
					if(isset($_GET['edit'])){
						
						$updatesql="UPDATE categories SET category='$category', parent='$parent1' WHERE id='$edit_id'";
					}
				
				$db->query($updatesql);
				header('Location: categories.php');
			}		
	}
	
	$category_value='';
	$parent_value=0;
	if(isset($_GET['edit'])){
		$category_value=$edit_category['category'];
		$parent_value=$edit_category['parent'];
		}
	else{
		if(isset($_POST)){
			$category_value = $category;
			$parent_value=$parent1;
			}	
	}	
?>
<br />
<h2 align="center">Quản Lý Danh Mục Loại Sản Phẩm</h2>
<hr>
<div class="row">
  <div class="col-1"></div>
  <div class="col-3">
    <form  class="form" method="post" action="categories.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:'');?>">
    <!--Tag <legend> định nghĩa một chú thích cho các phần tử <fieldset>.-->
    <legend><?=((isset($_GET['edit']))?'Chỉnh Sửa':'Thêm');?> Loại Sản Phẩm </legend>
    <div id="erorrs"></div>
    <div class="form-group">
      <label for="parent">Phân Loại</label>
      <select class="form-control" name="parent" id="parent">
        <option value="0"<?php (($parent_value==0)?'selected="selected"':'');?>>Loại</option>
        <?php  while($parent1 = mysqli_fetch_array($pquery1)) : ?>
        <option value="<?=$parent1['id'];?>"<?php if ($parent_value==$parent1['id'] ) echo 'selected' ;?>><?php echo $parent1['category'];?> </option>
        <?php endwhile;?> 
      </select>
    </div>
    <div class="form-group">
      <label for="category">Loại Sản Phẩm</label>
      <input type="text" class="form-control" id="category" name="category" value="<?=$category_value;?>">
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-success" value="<?=((isset($_GET['edit']))?'Sửa':'Thêm'); ?>">
    </div>
    </form>
  </div>
  <div class="col-7">
    <table class="table table-hover table-bordered" style="text-align:center">
      <thead style="color:#FFFFFF;">
        <tr class="bg-dark">
          <th>Loại Sản Phẩm</th>
          <th>Phân Loại</th>
          <th>Sửa/Xóa</th>
        </tr>
      </thead>
      <tbody>
        <?php while($parent = mysqli_fetch_assoc($pquery)) : ?>
        <?php 
                        
                      $parent_id = $parent['id'];
                      $sql2="SELECT * FROM categories WHERE parent = '$parent_id'";
                      $cquery  = $db -> query($sql2);
					  
                
                 ?>
        <tr class="bg-secondary" style="color:#FFFFFF;">
          <td><?php echo $parent['category'];?></td>
          <td>Loại</td>
          <td><a href="categories.php?edit=<?=$parent['id'];?>"><i class="fa fa-gear fa-spin" style="font-size:24px" title="sửa"></i></a> <a href="categories.php?delete=<?=$parent['id'];?>"><i class="fa fa-trash" style="font-size:24px" title="xóa"></i></a></td>
        </tr>
        <?php while($child = mysqli_fetch_assoc($cquery)) : ?>
        <tr>
          <td><?php echo $child['category'];?></td>
          <td><?php echo $parent['category'];?></td>
          <td><a href="categories.php?edit=<?=$child['id'];?>" ><i class="fa fa-gear fa-spin" style="font-size:24px" title="sửa"></i></a> <a href="categories.php?delete=<?=$child['id'];?>"><i class="fa fa-trash" style="font-size:24px" title="xóa"></i></a></td>
        </tr>
        <?php endwhile;?>
        <?php endwhile;?>
      </tbody>
    </table>
  </div>
  <div class="col-1"></div>
</div>
<?php 
	include 'includes/footer.php';

?>
