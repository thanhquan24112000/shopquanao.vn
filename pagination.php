<?php
include('core/init.php'); 
$limit = 6;

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM products WHERE featured = 1 LIMIT $start_from, $limit";  
$rs_result = mysqli_query($db, $sql); 
?>

<?php  
while ($product = mysqli_fetch_assoc($rs_result)) {
?>  
            <div class="col-md-3  image-main-section">
        <div class="row img-part">
          <div class="col-md-12 img-section">
            <a href="#" data-toggle="modal" data-target="#view-modal" data-id="<?= $product['id'];  ?>" id="getProduct">
            	<div class="container">
					<img src="<?= $product['image']; ?>" alt="<?= $product['image']; ?>">
					<div class="overlay">
					<img src="<?= $product['image2']; ?>" alt="<?= $product['image2']; ?>">
                    </div>
                </div>
                
            </a>
          </div>
          
          <div class="col-md-12  image-title">
            <a href="#" data-toggle="modal" data-target="#view-modal" data-id="<?= $product['id'];  ?>" id="getProduct" class="san-pham-xxx"><h3><?= $product['title']; ?></h3></a>
          </div>
          <div class="col-md-12 text-center">
            <h3 class="price"><?= $product['price']; ?> đ</h3>
          </div>
          <button data-toggle="modal" data-target="#view-modal" data-id="<?= $product['id'];  ?>" id="getProduct" class="btn btn-secondary chi-tiet">Chi Tiết</button>
        </div>
       </div>
<?php  
};  
?>