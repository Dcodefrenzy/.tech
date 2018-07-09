<?php 
if (isset($_GET['unique_id'])) {
	$id = $_GET['unique_id'];
}
$record_limit = 1;

$profile = showFarmersById($conn, $id);

$state = getStateById($conn, $profile['state']);
$local = getLocalById($conn, $profile['town']);
$related = showRelatedFarmers($conn, $profile['town'], $record_limit);



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
<title>Fashionpress an E-Commerce online Shopping Category Flat Bootstarp responsive Website Template| Single :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashionpress Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/hover_pack.js"></script>
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});

				setTimeout(function(){
			 	on();
			 	console.log('Now');

			 },10000);

  			function on() {
    		document.getElementById("overlay").style.display = "block";
			}

			function off() {
    		document.getElementById("overlay").style.display = "none";
			}
		</script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
            </script>	

</head>
<body>
<div class="header">
	<div class="header_top">
		<div class="container">
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" alt=""/></a>
			</div>
			<ul class="shopping_grid">
			      <a href="register"><li>Get Started</li></a>
			      <a href="login"><li>Sign In</li></a>
			      <a href="#"><li><span class="m_1">Store</span>&nbsp;&nbsp;(0) &nbsp;<img src="images/bag.png" alt=""/></li></a>
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
			<?php if(isset($_SESSION['id']) && isset($_SESSION['username'])){ ?>
			<input id="overlay" type="hidden" name="">
		<?php }else{ ?>
​<div  id="overlay" onclick="off()">
<div align="center" class="card" style="width: 50%; ;  position: fixed; top: 20%; right:30%; left:25%; bottom: 30%; ">
	  <div class="card-img-top" style="background:url(images/tech.jpg); height:100%; width: 100%; background-size: cover; background-position: center; background-repeat: no-repeat;" class="">
  			</div>
<!--   <img class="card-img-top" src="images/p1.jpg" alt="Card image cap"> -->
  <ul class="list-group list-group-flush" >
    <p class="list-group-item">Its Important for you to have an account with us but if you already have one then login</p>
  
 
    <p class="list-group-item"><a href="register" class="card-link"><button type="button" class="btn btn-success">Register</button></a>
    <a href="login" class="card-link"><button type="button" class="btn btn-success">Login</button></a></p>
  
</ul>
</div>
</div>
<?php } ?>
<div class="column_center">
  <div class="container">
	<div class="search" >
	  </div>
	  <div class="clearfix"> </div>
	</div>
    <div class="clearfix"> </div>
  </div>
</div>
<div class="main">
  <div class="content_top">
  	<div class="container">
	   <div class="col-md-3 sidebar_box">
		    <div class="delivery">
			   	<div class="clearfix"> </div>
			</div>
	   </div>  
	   <div class="col-md-9 single_right">
	   	<div class="single_top">
	       <div class="single_grid">
				<div class="grid images_3_of_2">		
					 <div style="background:url(<?php echo $profile['file_path']?>); height:300px; width: 300px; background-size: cover; background-position: center; background-repeat: no-repeat;" class="">
  					</div>
						 <div class="clearfix"></div>		
				  </div> 
				  <br>
				  <div class="desc1 span_3_of_2">
				  	<h1> <?php echo $profile['firstname']." ".$profile['lastname']; ?></h1>
				<p><b>Age:</b> <?php echo $profile['age']; ?></p>
				<p><b>Gender:</b> <?php echo $profile['gender']; ?></p>

				 <div class="price_single">
				<p><b>Location:</b> <?php echo $local.", ".$state; ?></p>
				<p><b>Season:</b> <?php echo $profile['season']; ?></p>

				<p><b>Availability: </b> <?php echo $profile['inventory']." tons" ?></p>
				
				</div>
				
				<p><b>Contact:</b> <span class="actual"><?php echo $profile['phone_number']; ?> </span></p>

				
			    <div class="wish-list">
				 	<ul>
				 		<li class="wish"><div name=<?php $profile['phone_number'] ?>	title="call" class="btn bt1 btn-primary btn-normal btn-inline " target="_self">Call</div></li>
				 	    <li class="compare" ><a href=<?php echo "dashboard?unique_id=".$profile['unique_id']."" ;?> style="text-decoration: none;" title="Save Contact" class="btn bt1 btn-primary btn-normal btn-inline " target="_self">Save Contact</a></li>
				 	</ul>
				 </div>
			</div>
		    <div class="clearfix"> </div>
				</div>
          	    <div class="clearfix"></div>
          </div>
          <div class="sap_tabs">	
				     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
						  	  <!-- <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Description</span></li> -->
							  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Additional Information</span></li>
							  <!-- <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Reviews</span></li> -->
							  <div class="clear"></div>
						  </ul>				  	 
							<div class="resp-tabs-container">
							      <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
									<div class="facts">
									  <ul class="tab_list">
									    <li><a href="#">augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigatione</a></li>
									  	<li><a href="#">claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica</a></li>
									  	<li><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</a></li>
									  </ul>           
							        </div>
							     </div>	
					      </div>

			  </div>
			  <br>
		<h3 class="single_head">Related Farmers</h3>
			    		<?php while ($row = $related->fetch(PDO::FETCH_BOTH)) {
					extract($row);
					$state = getStateById($conn, $state);
					$local = getLocalById($conn, $town);
				 ?>
		<div class="related_products">
	     <div class="col-md-3 top_grid1-box1 top_grid2-box2"><?php echo '<a href=profile?unique_id='.$unique_id.'>' ?>
	     	<div class="grid_2">
	     	  <div class="b-link-stroke b-animate-go  thickbox">
		         <div style="background:url('<?php echo $file_path?>'); height:200px; width: 200px; background-size: cover; background-position: center; background-repeat: no-repeat;" class="">
  			</div>
  			 </div>
	     	  <div class="grid_2" >
	     	  	<p><?php echo $firstname." ".$lastname; ?></p>
	     	  	<p><?php echo "Location: <br>".$local ?></p> 
	     	  	<p><?php echo $state; ?></p>
	     	  	<ul class="grid_2-bottom">
	     	  		<li class="grid_-1-left"></li>
	     	  		<li class="grid_1-left"><p><?php echo $inventory." tons"; ?></p></li>
	     	  		<li class="grid_-1-left"><p><?php echo "Season: <br>".$season; ?></p></li>
	     	  		<li class="grid_1-right"> <?php echo '<a href=profile?unique_id='.$unique_id.' title="Get It" class="btn btn-primary btn-normal btn-inline "" target="_self">Connect</a>' ?></li>	
	     	  	</ul>
	     	  	<div class="clearfix"> </div>
	     	  </div>
	     	</div>
	   <?php  '</a>' ?></div>
	 </div>
	 <?php }; ?>
	
	     <div class="clearfix"> </div>
	    </div> 
        </div>
      </div> 
	</div>
</div>
<?php 
include "includes/footer.php";
 ?>