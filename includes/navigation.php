<?php
/*0 là những loại hàng như áo nam, quần nam, giày nam, phụ kiện, xem thêm trong db để biết thêm chi tiết*/
$sql = "SELECT * FROM categories WHERE parent = 0";
$pquery = $db->query($sql);

?>


<!--Top Narbar 1 (Stickky Navbar)-->
<nav class="sticky-top">

<div class="navbar1" >
<a class="navbar-brand" title="Trang Chủ" href="index.php" ><strong style="color:#FF0000; font-size:16px; font-family:'Comic Sans MS', cursive;"><strike>S</strike></strong><strong style=" font-size:16px; font-family:'Comic Sans MS', cursive;"><strike class="strike">hopQuanA</strike></strong><strong style="color:#FF0000; font-size:16px; font-family:'Comic Sans MS', cursive;"><strike>o</strike></strong></a>

  	<?php while($parent = mysqli_fetch_assoc($pquery)) : ?>

    <?php 
			
		  $parent_id = $parent['id'];
		  $sql2="SELECT * FROM categories WHERE parent = '$parent_id'";
		  $cquery  = $db -> query($sql2);
	
	 ?>

    <div class="dropdown1">
      <button class="btn dropbtn" onclick="location.href='index.php'">
      <?php echo $parent['category'];?>
      <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown1-content">
        <h5 class="dropdown-header"><?php echo $parent['category'];?> Thời Trang</h5>
        
        <?php while($child = mysqli_fetch_assoc($cquery)) : ?>
        <a href="category.php?category=<?php echo $child['id'];?>"><?php echo $child['category'];?></a>
		<?php endwhile; ?>
      
      </div>
    </div>
   <?php endwhile; ?>  
    <form class="form-inline" action="search.php" style="float:right; margin-right:10px; margin-top:7px;">
        <input type="text" name="search" placeholder="Nhập sản phẩm cần tìm!" >
        <button class="btn" type="submit" style="background-color:white; margin-left:2px;"><img src="images/search-icon.png" width="24" height="24" style="background-color:#FFFFFF;"></button>
    </form>

</div>

</nav>
<!--Top Narbar 2-->
<nav class="navbar navbar-expand-sm bg-light navbar-dark">

<!--Button giỏ hàng-->
<?php
		if(!isset($_SESSION['cart']))
		{
			$flag=false;
		}
		else
		{
			foreach($_SESSION['cart'] as $id => $soluong)
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
		 if($flag==false)
		 { ?>
			<button class="btn btn-danger" onclick="location.href='cart.php'" style="position: relative; left:800px;"><i class="fa fa-cart-plus" style="font-size:20px; color:white;"></i> Giỏ Hàng (0) SP</button>
		 <?php }
		 else
		 {
			 $cart=$_SESSION['cart']; ?>
	  		<button class="btn btn-danger" onclick="location.href='cart.php'" style="position: relative; left:800px;"><i class="fa fa-cart-plus" style="font-size:20px; color:white;"></i> Giỏ Hàng (<?=count($cart)?>) SP</button>
		 <?php }
		?>
        
        
    <div class="dropdown" style="position: relative; left:810px;">
    	<?php if(!isset($_SESSION['username']) || empty($_SESSION['username'])): ?>
        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-user-circle-o" style="font-size:20px;color:white;"></i>  			Tài Khoản
        </button>
        	<div class="dropdown-menu">
              <a class="dropdown-item" href="login.php">Đăng Nhập</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="register.php">Đăng Kí</a>
            </div>
        <?php else:?>
        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-user-circle-o" style="font-size:20px;color:white;"></i>  			<?php echo 'Chào,'.htmlspecialchars($_SESSION['username']);?>
        </button>
        	<div class="dropdown-menu">
              <a class="dropdown-item" href="logout_to_index.php">Đăng Xuất</a>
            </div>
            <?php endif;?> 
        <!--<div class="dropdown-menu">
          <a class="dropdown-item" href="#">Đăng Nhập</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Đăng Kí</a>
        </div>-->
      </div>
	

</nav>
    
 