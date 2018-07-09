<?php 

$welcome = "";
session_start();
$sid = md5(session_id());
$cart_numb = 0;
if(isset($_SESSION['username']) && ($_SESSION['id'])){
 	$fullname = $_SESSION['username'];
 	$user_id = $_SESSION['id'];
 	$welcome ="<li><a style='color:Green;' href=''>welcome ".$fullname."</a></li>";
 }




 ?>

<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Fashionpress an E-Commerce online Shopping Category Flat Bootstarp responsive Website Template| Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashionpress Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<style>
#overlay {
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.5);
    z-index: 2;
    cursor: pointer;
}
</style>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script src="js/responsiveslides.min.js"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
</script>
<script type="text/javascript" src="js/hover_pack.js"></script>
</head>
<body>
<div class="header">
	<div class="header_top">
		<div class="container">
			<div class="logo">
				<div style ="background-image:url(images/tech4rice.png); height:100px; width: 100px; background-size: cover; background-position: center; background-repeat: no-repeat;" href="index.html"></div>
			</div>
			<ul class="shopping_grid">
					<?php
				if(isset($_SESSION['id']) && isset($_SESSION['username'])){
         		 echo $welcome; ?>		
         		  <a href="dashboard"><li><span class="m_1">Company Dashboard</span>&nbsp;&nbsp;&nbsp;<img src="" alt=""/></li></a>	
         		  <?php }else{ ?>				
			      <a href="register"><li>Get Started</li></a>
			      <a href="login"><li>Sign In</li></a>
			      <?php } ?>
			     
			      <div class="clearfix"> </div>
			</ul>
		    <div class="clearfix"> </div>
		</div>
	</div>
	<div class="h_menu4"><!-- start h_menu4 -->
		<div class="container">
				<a class="toggleMenu" href="#">Menu</a>
				<ul class="nav">
					<li class="active"><a href="index" data-hover="Home">Home</a></li>
					<li><a href="about" data-hover="About Us">About Us</a></li>
					<li><a href="view_farmers" data-hover="Careers">Farmers</a></li>
					<li><a href="contact" data-hover="Contact Us">Contact Us</a></li>
				 </ul>
				 <script type="text/javascript" src="js/nav.js"></script>
	      </div><!-- end h_menu4 -->
     </div>
</div>