<?php
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
<!--http://vietjack.com/php/chen_file_voi_ham_include_va_require_trong_php.jsp-->
<?php
	 require_once 'core/init.php';
	 include 'includes/head.php';
	 include 'includes/navigation.php';
	 include 'includes/leftsidebar.php';	 
?>
 <?php
 //featured = 1 sẽ show sản phẩm lên trang index và nếu featured = 0 sẽ k show sản phẩm
	 // TÌM TỔNG SỐ RECORDS
	  $result = mysqli_query($db, 'select count(id) as total from products');
	  $row = mysqli_fetch_assoc($result);
	  $total_records = $row['total'];
	  //  TÌM LIMIT VÀ CURRENT_PAGE
	  $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
	  $limit = 6;
	  // TÍNH TOÁN TOTAL_PAGE VÀ START
	  // tổng số trang
	  $total_page = ceil($total_records / $limit);
	  // Giới hạn current_page trong khoảng 1 đến total_page
	  if ($current_page > $total_page){
	  $current_page = $total_page;
	  }
	  else if ($current_page < 1){
	  $current_page = 1;
	  }
	  // Tìm Start
	  $start = ($current_page - 1) * $limit;
	  //  TRUY VẤN LẤY DANH SÁCH TIN TỨC
	  // Có limit và start rồi thì truy vấn CSDL lấy danh sách
    
	  if(isset($_GET['category']))
		{
			$cat_id = sanitize($_GET['category']);
		}
		else
		{
			$cat_id='';
		}
	  $productQ = mysqli_query($db, "SELECT * FROM products WHERE categories ='$cat_id' LIMIT $start, $limit");
	  
?>

     <!--content center-->
    <div class="col-8 bg-light">
      <div><hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 3px; width:900px;"><h2 class="text-center" style="margin:10px 0 20px 0;"><a href="#" class="san-pham-xxx"> Sản Phẩm Mới Nhất </a></h2><hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 3px; margin-bottom:20px;"></div>
      <div class="row">
      
      <?php while($product=mysqli_fetch_assoc($productQ)):?>
       <div class="col-md-4  image-main-section">
        <div class="row img-part">
          <div class="col-md-12 img-section">
            <a href="#">
            	<div class="container">
					<img src="<?= $product['image']; ?>" alt="<?= $product['image']; ?>">
					<div class="overlay">
					<img src="<?= $product['image2']; ?>" alt="<?= $product['image2']; ?>">
                    </div>
                </div>
                
            </a>
          </div>
          
          <div class="col-md-12  image-title">
            <a href="#" class="san-pham-xxx"><h3><?= $product['title']; ?></h3></a>
          </div>
          <div class="col-md-12 text-center">
            <h3 class="price"><?= $product['price']; ?> đ</h3>
          </div>
          <button type="button" class="btn btn-secondary mua-ngay">Mua Ngay</button>
          <button data-toggle="modal" data-target="#view-modal" data-id="<?= $product['id'];  ?>" id="getProduct" class="btn btn-secondary chi-tiet">Chi Tiết</button>
        </div>
       </div>
      <?php endwhile;?> 
      </div>
      
      
      <br /><br />	  
      <!--Phân Trang  https://codepen.io/IamManchanda/pen/qXvrEB ; https://www.w3schools.com/bootstrap4/bootstrap_pagination.asp    https://freetuts.net/thuat-toan-phan-trang-voi-php-va-mysql-550.html-->    
      <nav>
        <ul class="pagination justify-content-end" >
          <?php 
			// PHẦN HIỂN THỊ PHÂN TRANG
			// BƯỚC 7: HIỂN THỊ PHÂN TRANG
			 
			// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
			if ($current_page > 1 && $total_page > 1){
				echo '<li class="page-item"  ><a href="category.php?category='.$cat_id.'&page='.($current_page-1).'" class="page-link" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li> ';
			}
			 
			// Lặp khoảng giữa
			for ($i = 1; $i <= $total_page; $i++){
				// Nếu là trang hiện tại thì hiển thị thẻ span
				// ngược lại hiển thị thẻ a
				if ($i == $current_page){
					echo '<li class="page-item active"><a href="category.php?category='.$cat_id.'&page='.$i.'" class="page-link" >'.$i.'</a></li>';
				}
				else
				{
						echo '<li class="page-item"><a href="category.php?category='.$cat_id.'&page='.$i.'" class="page-link" >'.$i.'</a> </li>';
				}
						
					
				
			}
			 
			// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
			if ($current_page < $total_page && $total_page > 1){
				echo ' <li class="page-item"><a href=category.php?category='.$cat_id.'&page='.($current_page+1).'" class="page-link" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
			}
           ?>
        </ul>
      </nav>
      
      
    </div>

<?php

 include 'includes/rightsidebar.php';	 
	 include 'includes/detailsmodal.php';
	 include 'includes/modalregister.php';
	 include 'includes/footer.php';
?>