
<?php
include('core/init.php');
$limit = 6;
if (isset($_REQUEST['id'])) {
			
		$id = intval($_REQUEST['id']);
}


//for total count data
$countSql = "SELECT COUNT(id) FROM products";  
$tot_result = mysqli_query($db, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
$sql = "SELECT * FROM products WHERE featured = 1 LIMIT $start_from, $limit"; 
$rs_result = mysqli_query($db, $sql); 
?>
     <!--content center-->
    <div class="col-10">
 
		<!--Sản phẩm hót-->    
  		<div><hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 3px; width:900px;"><h2 class="text-center" style="margin:10px 0 20px 0;"><a href="#" class="san-pham-xxx" style="font-family: 'Poppins', sans-serif;"> Sản Phẩm Hot Nhất </a></h2><hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 3px; margin-bottom:20px;"></div>
      	<div class="row" id="product_slider">
      <div id="carousel" class='outerWrapper'>
            <div class="item">
              <img src="images/products/quan-kaki-xanh-den-qk165-9162.jpg" alt="Avatar" class="image" style="width:203px; height:267px;">

            </div>
            <div class="item">
              <img src="images/products/quan-kaki-xanh-den-qk165-9162.jpg" alt="Avatar" class="image" style="width:203px; height:267px;">
            </div>
            <div class="item">
              <img src="images/products/quan-kaki-xanh-den-qk165-9162.jpg" alt="Avatar" class="image" style="width:203px; height:267px;">
            </div>
            <div class="item">
              <img src="images/products/quan-kaki-xanh-den-qk165-9162.jpg" alt="Avatar" class="image" style="width:203px; height:267px;">
            </div>
            <div class="item">
              <img src="images/products/quan-kaki-xanh-den-qk165-9162.jpg" alt="Avatar" class="image" style="width:203px; height:267px;">
            <div>5</div>
            </div>
            <div class="item">
              <img src="images/products/quan-kaki-xanh-den-qk165-9162.jpg" alt="Avatar" class="image" style="width:203px; height:267px;">
            </div>
            <div class="item">
              <img src="images/products/quan-kaki-xanh-den-qk165-9162.jpg" alt="Avatar" class="image" style="width:203px; height:267px;">
            </div>
            <div class="item">
              <img src="images/products/quan-kaki-xanh-den-qk165-9162.jpg" alt="Avatar" class="image" style="width:203px; height:267px;">
            </div>
            <div class="item">
              <img src="images/products/quan-kaki-xanh-den-qk165-9162.jpg" alt="Avatar" class="image" style="width:203px; height:267px;">
            </div>
            <div class="item">
              <img src="images/products/quan-kaki-xanh-den-qk165-9162.jpg" alt="Avatar" class="image" style="width:203px; height:267px;">
            </div>
            <div class="item">
              <img src="images/products/quan-kaki-xanh-den-qk165-9162.jpg" alt="Avatar" class="image" style="width:203px; height:267px;">
            </div>
            <div class="item">
              <img src="images/products/quan-kaki-xanh-den-qk165-9162.jpg" alt="Avatar" class="image" style="width:203px; height:267px;">
            </div>
            </div>
      </div>
    <!--carousel slide -->
      <div class="row" id="banner-slider">
      	<div id="carousel_slide" class="carousel slide" data-ride="carousel">
          <ul class="carousel-indicators">
            <li data-target="#carousel_slide" data-slide-to="0" class="active"></li>
            <li data-target="#carousel_slide" data-slide-to="1"></li>
            <li data-target="#carousel_slide" data-slide-to="2"></li>
          </ul>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/banner-top-trang-chu-1-slide-19.png" alt="Los Angeles" width="1100" height="500">
              <div class="carousel-caption">
                <h3>Los Angeles</h3>
                <p>We had such a great time in LA!</p>
              </div>   
            </div>
            <div class="carousel-item">
              <img src="images/banner-top-trang-chu-2-slide-20.png" alt="Chicago" width="1100" height="500">
              <div class="carousel-caption">
                <h3>Chicago</h3>
                <p>Thank you, Chicago!</p>
              </div>   
            </div>
            <div class="carousel-item">
              <img src="images/banner-top-trang-chu-3-slide-21.png" alt="New York" width="1100" height="500">
              <div class="carousel-caption">
                <h3>New York</h3>
                <p>We love the Big Apple!</p>
              </div>   
            </div>
          </div>
          <a class="carousel-control-prev" href="#carousel_slide" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#carousel_slide" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
      </div>
    
    <br /><br /> 
    <!--Sản phẩm mới nhất-->
      <div><hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 3px; width:900px;"><h2 class="text-center" style="margin:10px 0 20px 0;"><a href="#" class="san-pham-xxx" style="font-family: 'Poppins', sans-serif;"> Sản Phẩm Mới Nhất </a></h2><hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 3px; margin-bottom:20px;"></div>
      <div class="row" id="target-content">
     <?php  
		while ($product = mysqli_fetch_assoc($rs_result)) {
		?>  
			   <div class="col-md-3 image-main-section">
				<div class="row img-part">
				  <div class="col-md-12 img-section">
						<div class="container">
							<img src="<?= $product['image']; ?>" alt="<?= $product['image']; ?>">
							<div class="overlay">
							<img src="<?= $product['image2']; ?>" alt="<?= $product['image2']; ?>">
							</div>
						</div>
						
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
        </div>
        <!--Phân Trang  https://codepen.io/IamManchanda/pen/qXvrEB ; https://www.w3schools.com/bootstrap4/bootstrap_pagination.asp    https://freetuts.net/thuat-toan-phan-trang-voi-php-va-mysql-550.html-->    
      <nav><ul class="pagination">
<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
            if($i == 1):?>
            <li class='active'  id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
            <?php else:?>
            <li id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
        <?php endif;?>          
<?php endfor;endif;?>
</ul></nav>
</div>
</body>

<!--Script slider products-->
<script type="text/javascript" src="js/waltzerjs.js"></script>
<script type="text/javascript">

		$(document).ready(function() {

			$('#carousel').waltzer({scroll:1});

		});

	</script>
<!--script ajax pagination -->
<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
		currentPage : 1,
		onPageClick : function(pageNumber) {
			jQuery("#target-content").html('đang tải...');
			jQuery("#target-content").load("pagination.php?page=" + pageNumber);
		}
    });
});
</script>