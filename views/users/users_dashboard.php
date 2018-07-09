<?php 
ob_start();
$page_title = "Home";
include "includes/header.php"; 


	if (isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
	}else{
		header("Location:home");
	}
	if (isset($_GET['unique_id'])) {
		$unique_id = $_GET['unique_id'];
		
		if (ifContactExit($conn, $unique_id, $id )) {

			updateCOntact($conn, $unique_id, $id);

		}else{
	 		addContact($conn, $unique_id, $id);
			}
	}											




	
 ?>
<div class="column_center">
  <div class="container">
</div>
<div class="main">
  <div class="content_top">
  	<div class="container">
	   <div class="col-md-3 sidebar_box">
	   	 <div class="sidebar">
			<div class="menu_box">
		    <h3 class="menu_head">Search Menu</h3>
			  <ul class="menu">
					<li class="item1" ><a href="#"><img class="arrow-img" src="images/f_menu.png" alt=""/> Season</a>
					<ul class="cute">
			<li class="subitem1" ><a href="#"><input onclick="getSeason(this.value, this.name)" class="subitem1" type="submit" style="height:50%; width:90%; padding: 0px; margin:0px; border: 0px solid #ddd; opacity: 0.5; " value="<?php $id; ?>"  name="Pre-Planting"></a></li>

			<li class="subitem1" ><a href="#"><input onclick="getSeason(this.value, this.name)"  class="subitem1" type="submit"   style="height:50%; width:90%; padding: 0px; margin:0px; border: 0px solid #ddd; opacity: 0.5; " value="<?php $id; ?>" name="Planting"></a></li>

			<li class="subitem1" ><a href="#"><input onclick="getSeason(this.value, this.name)" value=<?php $id; ?> class="subitem1" type="submit"   style="height:50%; width:90%; padding: 0px; margin:0px; border: 0px solid #ddd; opacity: 0.5;" name="harvesting"></a></li>
					</ul>
				</li>
		
			</ul>
		</div>
				<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
       </div>
		    <div class="delivery">
				<img src="images/delivery.jpg" class="img-responsive" alt=""/>
				<h3>Delivering</h3>
				<h4>World Wide</h4>
			</div>
			<div class="twitter">
			   <h3>Latest From Twitter</h3>
			   <ul class="twt1">
			   	  <i class="twt"> </i>
			   	  <li class="twt1_desc"><span class="m_1">@Contrary</span> to popular belief, Lorem Ipsum is<span class="m_1"> not simply</span></li>
			   	  <div class="clearfix"> </div>
			   </ul>
			   <ul class="twt1">
			   	  <i class="twt"> </i>
			   	  <li class="twt1_desc"><span class="m_1">There are many</span> variations of passages of Lorem Ipsum available, but the majority <span class="m_1">have suffered</span></li>
			   	  <div class="clearfix"> </div>
			   </ul>
			   <ul class="twt1">
			   	  <i class="twt"> </i>
			   	  <li class="twt1_desc"><span class="m_1">Lorem Ipsum</span> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has <span class="m_1">been the industry's standard dummy text ever</span></li>
			   	  <div class="clearfix"> </div>
			   </ul>
			</div>
			<div class="clients">
				<h3>Our Happy Clients</h3>
				<h4>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</h4>
			   <ul class="user">
			   	<i class="user_icon"></i>
			   	<li class="user_desc"><a href="#"><p>John Doe, Company Info</p></a></li>
			   	<div class="clearfix"> </div>
			   </ul>
			</div>
	   </div> 
	   <div class="col-md-9 single_right">
	   	<div class="single_top">
	       <div class="single_grid">
				<div class="grid images_3_of_2">
			
						 <div class="clearfix"></div>		
				  </div> 

			
		<div id="display">
		<h3 class="single_head">Farmers</h3>
	    <div class="related_products">
	    	<?php getContact($conn, $id); ?>
	 </div>

	     
	
	     <div class="col-md-4 top_grid1-box1"></div>
	    </div> 
        </div>
      </div> 
	</div>
</div>
			<!--initiate accordion-->
		<script type="text/javascript">
				
  			//To fetch Season.
  			function getSeason(name, id){
  				var url = 'season';
  				var method = 'post';
  				var params = 'season=' + name, 'user_id=' + id;
  				console.log(params);
  				console.log(url);
  				console.log(method);
  				console.log(getFarmerSeason);
  				getFarmerSeason(url, method, params);
  			}
  			function getFarmerSeason(url, method, params){
  				var xhr = new XMLHttpRequest();
  				xhr.onreadystatechange = () =>{
  					if(xhr.readyState == 4){
  						var res = xhr.responseText;
  					/*	console.log(res);*/
  						document.getElementById('display').innerHTML = res;
  					}
  				}
  				xhr.open(method, url, true);
  				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  				xhr.send(params);
  			}
		</script>
<?php 
include "includes/footer.php";

 ?>