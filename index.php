<?php
// Initialize the session
session_start();
	$flag=NULL;


?>
<!--http://vietjack.com/php/chen_file_voi_ham_include_va_require_trong_php.jsp-->
<?php
	 require_once 'core/init.php';
	 include 'includes/head.php';
	 include 'includes/navigation.php';
	 include 'includes/headerfull.php';
	 include 'includes/leftsidebar.php';	 
	 include 'includes/listproduct.php';
	 include 'includes/rightsidebar.php';	 
	 include 'includes/detailsmodal.php';
	 include 'includes/footer.php';

?>