<?php 
ob_start();
$page_title = "Home";
include "includes/header.php"; 
	$record_per_page = 15;

$show = showAllfarmersHome($conn,  $record_per_page);

 ?>
<div class="slider">
	  <div class="callbacks_container">
	      <ul class="rslides" id="slider">
	        <li><img src="images/banner1.jpg" class="img-responsive" alt=""/>
	        <div class="banner_desc">
				<h1>We Provide Worlds top fashion for less fashionpress.</h1>
				<h2>FashionPress the name of the of hi class fashion Web FreePsd.</h2>
			</div>
	        </li>
	        <li><img src="images/banner2.jpg" class="img-responsive" alt=""/>
	         <div class="banner_desc">
				<h1>Duis autem vel eum iriure dolor in hendrerit.</h1>
				<h2>Claritas est etiam processus dynamicus, qui sequitur .</h2>
			 </div>
	        </li>
	        <li><img src="images/banner3.jpg" class="img-responsive" alt=""/>
	          <div class="banner_desc">
				<h1>Ut wisi enim ad minim veniam, quis nostrud.</h1>
				<h2>Mirum est notare quam littera gothica, quam nunc putamus.</h2>
			  </div>
	        </li>
	      </ul>
	  </div>
</div>
<div class="column_center">
  <div class="container">
	<div class="search">

	  <div class="stay_left" align="center">
	  	<select onchange="getSub(this.value)" class="stay-right" name="state">
  			<option value="">-Search By State-</option>
  				<?php viewStatesForHome($conn) ?>
			 </select>
	  </div>
	  <div class="clearfix"> </div>
	</div>
    <div class="clearfix"> </div>
  </div>
</div>
<div class="column_center">
  <div class="container">
	<div class="search">
	
	  <div class="stay_left" align="center">
  <select id ="sub" onchange="getSubCat(this.value)" class="stay-right" name="lga">
  <option value="">-Select LGA-</option>
  </select>
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
	   	 <div class="sidebar">
			<div class="menu_box">
		    <h3 class="menu_head">Products Menu</h3>
			  <ul class="menu">
				<li class="item1" "><a href="#"><img class="arrow-img" src="images/f_menu.png" alt=""/> Season</a>
					<ul class="cute">
					<li class="subitem1" ><a href="#"><input class="subitem1" type="submit" value="Pre-Planting" size="20px" name="Pre-Planting"></a></li>
					<li class="subitem1" ><a href="#"><input class="subitem1" type="submit" value="Planting" size="20px" name="Planting"></a></li>
					<li class="subitem1" ><a href="#"><input class="subitem1" type="submit" value="Pre-Planting" size="20px" name="Pre-Planting"></a></li>
						<li class="subitem1" ><a href="#">Planting</a></li>
						<li class="subitem1" ><a href="#">Harvesting</a></li>
					</ul>
				</li>
				<li class="item2"><a href="#"><img class="arrow-img" src="images/f_menu.png" alt=""/>Women</a>
					<ul class="cute">
						<li class="subitem1"><a href="#">Cute Kittens </a></li>
						<li class="subitem2"><a href="#">Strange Stuff </a></li>
						<li class="subitem3"><a href="#">Automatic Fails </a></li>
					</ul>
				</li>
				<li class="item3"><a href="#"><img class="arrow-img" src="images/f_menu.png" alt=""/>Fashion 2015</a>
					<ul class="cute">
						<li class="subitem1"><a href="#">Cute Kittens </a></li>
						<li class="subitem2"><a href="#">Strange Stuff </a></li>
						<li class="subitem3"><a href="#">Automatic Fails</a></li>
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

					function getSub(id){

  						var url = 'getLocal';
  						var method = 'POST';
  						var params = 'state_id=' + id;
  						subAjax(url, method, params);
					}

					function subAjax(url, method, params){
  					var xhr = new XMLHttpRequest();
  					xhr.onreadystatechange = function(){
    				if(xhr.readyState == 4){
     					 var res = xhr.responseText;
      						
      					document.getElementById('sub').innerHTML = res ;
   					 }
 				 }
  					xhr.open(method, url, true);
  					xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  					xhr.send(params);
				}

			function getSubCat(id){
  				var url = 'search';
  				console.log(url);
  				var method ='POST';
  				var params = 'lid=' + id;
  				console.log(params);

  				getFinalCat(url, method, params);
				}

				function getFinalCat(url, method, params){
  				var xhr = new XMLHttpRequest();
  				xhr.onreadystatechange = () =>{
    				if(xhr.readyState == 4){
      				var res = xhr.responseText;
      				console.log(res)
      				document.getElementById('display').innerHTML = res;
    				}
  				}
  				xhr.open(method, url, true);
  				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  				xhr.send(params);
  			}
  			//To fetch Season.
  			function getSeason(name){
  				var url = 'season';
  				var method = 'GET';
  				var params = 'season' + name;
  				console.log(params);
  				getFarmerSeason(url, method, params);
  			}
  			function getFarmerSeason(url, method, params){
  				var xhr = new XMLHttpRequest();
  				xhr.onreadystatechange = () =>{
  					if(xhr.readyState === 4){
  						var res = xhr.responseText;
  						document.getElementById('season').innerHTML = res;
  					}
  				}
  				xhr.open(method, url, true);
  				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  				xhr.send(params);
  			}
		</script>
       </div>
		    <div class="delivery">
				<img src="images/delivery.jpg" class="img-responsive" alt=""/>
				<h4>Over 3 Million</h4>
				<h3>Farmers</h3>
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
	   <div class="col-md-9 content_right">
	  		<h3 class="single_head">Farmers</h3>	
	
	    		<div id="display">
	    		<?php while ($row = $show->fetch(PDO::FETCH_BOTH)) {
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
	 </div>
	     <div class="col-md-4 top_grid1-box1"></div>
	    </div> 
        </div>
      </div> 
	</div>

</div>
	     
	    
	  </div>  	    
	</div>
</div>
<?php 

include "includes/footer.php";

 ?>