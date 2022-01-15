<?php	 
	require_once $_SERVER['DOCUMENT_ROOT'].'/shopquanao.vn/core/init.php';

	if (isset($_REQUEST['id'])) {
			
		$id = intval($_REQUEST['id']);
		$sql = "SELECT * FROM products WHERE id = $id";
		$result = $db->query($sql);
		
		$product=mysqli_fetch_assoc($result);
		//var_dump($result);
		$sizestring = $product['sizes'];
		$sizestring=rtrim($sizestring,',');
		//hàm explode dùng để tách chuỗi
		$size_array = explode(',', $sizestring);
			?>
		
			
        
		<div class="container-fluid">
            <div class="row">
              <div class="col-xl-3">
  				<div class="w3-content" style="max-width:258px">
                  <!--https://www.w3schools.com/w3css/tryit.asp?filename=tryw3css_slideshow_imgdots-->
                  <div class="w3-content" style="max-width:258px">
                    <!--https://www.jqueryscript.net/zoom/Simple-Image-Hover-Zoom-Plugin-With-jQuery-spzoom.html-->
                    <a href="<?= $product['image']; ?>" title="<?= $product['title']; ?>" data-spzoom>
                        <img class="mySlides" src="<?= $product['image']; ?>" width="258" height="344" alt="<?= $product['title']; ?>"/>
                    </a>

                    <a href="<?= $product['image']; ?>" title="<?= $product['title']; ?>" data-spzoom>
                        <img class="mySlides" src="<?= $product['image2']; ?>" width="258" height="344" alt="<?= $product['title']; ?>"/>
                    </a>

                    <a href="<?= $product['image2']; ?>" title="<?= $product['title']; ?>" data-spzoom>
                        <img class="mySlides" src="<?= $product['image3']; ?>" width="258" height="344" alt="<?= $product['title']; ?>"/>
                    </a>
                    <div class="w3-row-padding w3-section">
                      <div class="w3-col s4">
                        <img class="demo w3-opacity w3-hover-opacity-off" src="<?= $product['image']; ?>" style="width:100%" onclick="currentDiv(1)">
                      </div>
                      <div class="w3-col s4">
                        <img class="demo w3-opacity w3-hover-opacity-off" src="<?= $product['image2']; ?>" style="width:100%" onclick="currentDiv(2)">
                      </div>
                      <div class="w3-col s4">
                        <img class="demo w3-opacity w3-hover-opacity-off" src="<?= $product['image3']; ?>" style="width:100%" onclick="currentDiv(3)">
                      </div>
                    </div>
                  </div>
			   </div>
              </div>
              <div class="col-xl-9">
              	<div><h4><?= $product['title']; ?></h4></div>
                <div style="color:red;"><h2><?= $product['price']; ?> đ</h2></div>
                <div><hr color="black" ><?= nl2br($product['description']); ?></div>
                <br /><br />
                <form action="add_cart.php?id=<?=$id?>" method="post">
                     <label for="size">Size:</label>
                                <select name="size" id="size" class="form-control">
                                    <option value=""></option>
                                    <?php foreach($size_array as $string) {
                                        $string_array = explode(':', $string);
                                        $size = $string_array[0];
                                        $quantity = $string_array[1];
                                        echo '<option value="'.$size.'">'.$size.' (Có Sẵn:'.$quantity.')</option>';
                                        } ?>
                                </select>
					<label for="quantity">Số Lượng:</label>
                                <input type="number" class="form-control"  min="0" max="3" id="quantity" name="quantity">
                    <br />          

                                <br /><br />
                                <button type="submit" class="btn btn-danger"  style="color:white;"><i class="fa fa-cart-plus" style="font-size:20px;color:white"></i> Thêm vào giỏ</button>
                                            
                 </form>
			  </div>
            </div>
        </div>    
		<?php				
	}
?>

	<!--Modal chi tiết sản phẩm-->
	<div id="view-modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        	
                  <div class="modal-content"> 
                  
                       <div class="modal-header"> 
                            <h4 class="modal-title">
                            	Thông Tin Chi Tiết Sản Phẩm
                            </h4> 
                       </div> 
                       <div class="modal-body"> 
                       
                       	   <div id="modal-loader" style="display: none; text-align: center;">
                       	   	<img src="images/ajax-loader.gif">
                       	   </div>
                            
                           <!-- content will be load here -->                          
                           <div id="dynamic-content">
				
                           </div>
                             
                        </div> 
                        <div class="modal-footer"> 
                              

            		     <!-- <button type="submit" class="btn btn-danger" data-dismiss="modal" style="color:white;"><i class="fa fa-cart-plus" style="font-size:20px;color:white"></i> Thêm Vào Giỏ</button> -->
			      <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>  
                        </div> 
                        
                 </div> 
       </div> 


<!--End Modal chi tiết sản phẩm-->

<!--script Modal chi tiết sản phẩm dùng jquery ajax-->
<script>
$(document).ready(function(){
	
	$(document).on('click', '#getProduct', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url:'includes/detailsmodal.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data); // load response 
			$('#modal-loader').hide();		  // hide ajax loader	
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});
		
	});
	
});

</script>

<link rel="stylesheet" type="text/css" href="css/jquery.spzoom.css"/>
<script type="text/javascript" src="js/jquery.spzoom.js"></script>



<!--Script khi hover lên image sẽ phóng to-->

<script>
$(function() {
    $('[data-spzoom]').spzoom();
});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!--script slideshow image trong chi tiết sản phẩm-->

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
</script>