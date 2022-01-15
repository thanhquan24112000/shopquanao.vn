
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Thời Trang Nam Nhóm 8</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>

<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
<script type="text/javascript" src="dist/jquery.simplePagination1.js"></script>
<link rel="stylesheet" type="text/css" href="dist/simplePagination.css"/>
 
 
 <!-- header CSS-->
 <style>
  .dropdown:hover>.dropdown-menu{				
  display:block;  
  }
  
  body{padding-top:0px;}
/* II header CSS*/
#headerWrapper{
	position:relative; 	/* Dùng d? thi?t l?p m?t ph?n t? s? d?ng các thu?c tính position (d? can ch?nh v? trí c?a nó và giá tr? là s? kèm theo don v?: top, bottom, left , right) mà không làm ?nh hu?ng d?n vi?c hi?n th? ban d?u.*/
	padding:0;
	margin:0;
	height:600px;
	background-image:url(images/logowebsite.jpg);
	background-repeat:no-repeat;
	background-size:100% 700px;
	background-position: top center;
	background-attachment:fixed;
	
	}

#logotext{
	position:absolute; /*absolute: Dùng d? thi?t l?p v? trí c?a m?t ph?n t? nhung nó s? luôn n?m trong m?t ph?n t? m? dang là relative.*/
	width:100%;
	height:180px;
	background-image:url(../images/headerlogo/text.png);
	background-repeat:no-repeat;
	background-position:center;
	background-size:70% 180px;
	top:50%;
	margin-top:-90px;
	}
 </style>
 <!--end header CSS-->
 
 
<!--Style cho nút search-->
 <style> 
 input[type=text] {
    width: 250px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 5px 5px 5px 5px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 380px;
}
</style>

<!--Style cho Products Box-->
  <style>
  .san-pham-xxx{
  text-decoration:none;
  color:black;
  font-family:"Comic Sans MS", cursive;
 
  }
  .san-pham-xxx:hover{
  text-decoration:none;
  color:red;
  
  }
  .main-section{
    background-color: #f1f1f1;
    padding: 20px 20px 0px 20px;
  }
  .image-main-section{
      margin-bottom:20px;
  }
  .img-part{
      border-radius: 5px;
      margin:0px;
      border:1px solid #DDDDDD;
      background-color: #fff;
      padding-bottom: 20px;
  }
  .img-section{
      padding: 5px;
  }
  .img-section img{
      width: 235px;
      height:270px;
  }
  .image-title h3{
      margin:0px;
      color:#4C4C4C;
      padding: 15px 0px 8px 0px;
      font-size:20px;
	  text-align:center;
  }
  .image-title h3:hover{

      color:red;
  }
  .price{
	  font-family:"Comic Sans MS", cursive;

	  color:red;
	  }
  .mua-ngay{
      border-radius:5px;
      font-size: 16px;
      width:100px;
      margin-left:18px;
	  font-family:"Comic Sans MS", cursive;
  }
  .mua-ngay:hover{
      background-color:red;
  }
  .chi-tiet{
      border-radius:5px;
      font-size: 16px;
      width:100px;
      margin-left:21px;
	  font-family:"Comic Sans MS", cursive;
  }
  .chi-tiet:hover{
      background-color:red;
  }
  .vao-trang-chi-tiet-sp{text-decoration:none;
  }
  .vao-trang-chi-tiet-sp:hover{
      background-color:red;
  }
  .page-link{
  color:black;
 
  }
  .page-link:hover{
  color:black;
  background-color:#0099FF;
  }
 </style>
  
  
 <!--Style cho footer-->
 <style>
 footer{
  color: white;
  }
  footer a{
    color: #bfffff;
  }
  footer a:hover{
    color: white;
  }

  .footer-bottom{
    background: #333333;
    padding: 2em;
  }

  .footer-middle{
     background: #666666;
    padding-top: 2em;
    color: white;
  }
  /**Sub Navigation**/
  .subnavigation-container{
    background: #3d6277;
  }
  .subnavigation .nav-link{
    color: white;
    font-weight: bold;
  }
  .subnavigation-container{
    text-align: center;
  }
  .subnavigation-container .navbar{
    display: inline-block;
    margin-bottom: -6px; /* Inline-block margin offffset HACK -Gilron */
  }
  .col-subnav a{
    padding: 1rem 1rem;
    color: white;
    font-weight: bold;
  }
  .col-subnav .active{
    border-top:5px solid orange;
   background: white;
    color: black;
  }
 </style>

<!--Style Slide in Overlay from the Right " ; https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_image_overlay_slideright-->
<style>


.container {
  position: relative;
  margin-left:-10px;
}

.image {
  display: block;
}

.overlay {
  position: absolute;
  bottom: 0;
  left: 100%;
  right: 0;
  background-color: #FFF;
  overflow: hidden;
  width: 0;
  height: 100%;
  transition: .5s ease;
}

.container:hover .overlay {
  width: 100%;
  left: 0;
  margin-left:15px;
}

</style>



<!--Style cho modal chi tiết sản phẩm-->
<style>

/* The Modal (background) */
.modal {
    position: fixed; /* Stay in place */
    width: 100%; /* Full width */
    height: 100%; /* Full height */

}
/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 1% auto 1% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 95%; /* Could be more or less, depending on screen size */
	height:95%;
}

</style>

<style>
.navbar1 {
    overflow: hidden;
    background-color: #333;
    font-family: Arial, Helvetica, sans-serif;
}

.navbar1 a {
    float: left;
    font-size: 15px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.dropdown1 {
    float: left;
    overflow: hidden;
}

.dropdown1 .dropbtn {
    font-size: 16px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
	
}

 .dropdown1:hover .dropbtn {
    background-color: red;
}

.dropdown1-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown1-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown1-content a:hover {
    background-color: #999999;
}

.dropdown1:hover .dropdown1-content {
    display: block;
}

</style>
<!--Style nút back to top-->
<style>

		/*style go to top */

		#goTop{
			text-align: center;
		    display:none;
		    width:55px;
		    height:55px;
		    position:fixed;
		    bottom:20px;
		    right:50px;
		    line-height: 55px;
		    color: #fff;
		    font-size: 27px;
		    background: #000;
		    border: 1px solid #d4d4d4;
		}
	</style>
<!--style cho slider products-->
<style>
.outerWrapper {
	text-align: left;
	position:relative;
	margin:30px auto 60px auto;
	width:988px;
}

.item {
	float:left;
	margin-right:20px;
	width:227px;
	padding:1px 2px 1px 1px;
	height:270px;
	border:1px solid #b3b3b3;
	background-color:#fff;
	border-radius:5px;
}

.item div {
	background:#ddd;
	width:99%;
	height:99%;
	color:white;
	color:#b3b3b3;
	text-align:center;
	line-height: 162px;
	font-size:60px;
	border-radius:5px;
	border:1px solid #b3b3b3;
}

.left-nav-btn, .right-nav-btn {
	position:absolute;
	width:37px;
	height:37px;
	top:80px;
	cursor:pointer;
	opacity: 0.8;
	background:transparent url(images/arrows.png) top left no-repeat;
	-webkit-transition:opacity 0.2s linear;
  	-moz-transition:opacity 0.2s linear;
  	-o-transition:opacity 0.2s linear;
  	transition:opacity 0.2s linear;
}

.left-nav-btn {
	left:-80px;
}

.right-nav-btn {
	right:-80px;
	background-position: top right;
}

.left-nav-btn:hover, .right-nav-btn:hover {
	opacity: 1;
}

/* Vertical Mode */

.vert.outerWrapper {
	margin:50px auto 60px auto;
	width:204px;
	height:456px;
}

.vert .item {
	float:left;
	margin-bottom:48px;
	width:162px;
}

.vert .left-nav-btn, .vert .right-nav-btn {
	position:absolute;
	width:37px;
	height:37px;
	cursor:pointer;
	left:82px;
	background:transparent url(images/arrows_vert.png) top left no-repeat;
}

.vert .left-nav-btn {
	top:-60px;
}

.vert .right-nav-btn {
	top:auto;
	bottom:-60px;
	background-position: bottom left;
}

.leftWrapper {
	width:48%;
	float:left;
}

.rightWrapper {
	width:48%;
	float:right;
}

.leftWrapper h2, .rightWrapper h2 {
	width:100%;
	text-align:center;
}

.outerWrapper2 .item {
	margin-right:50px;
	width:110px;
	padding:20px;
}

/* Pager */

.pager {
	line-height: 100px;
	text-align: center;
}

.pager > span {
	cursor: pointer;
	border-radius:8px;
	display: inline-block;
	width:16px;
	height:16px;
	background: #DDDDDD;
	border:1px solid #B3B3B3;
	margin:0 4px;
	overflow: none;
}

.pager > span.active {
	background: #B3B3B3;
}

.pager > span > span {
	display: none;
}

/* Counter (See Example 7) */

#counter {
	margin-top:-30px;
	font-weight: bold;
	font-size: 18px;
	text-align: center;
	padding-bottom: 20px;
}

<!--ovelay-->


</style>


<!--Style cho slide banner (carousel slide)-->
 <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  </style>

</head>

<body>



 
 