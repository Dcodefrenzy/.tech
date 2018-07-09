<?php 
ob_start();
$page_title = "Home";
include "includes/header.php"; 

 ?>
<div class="column_center">
  <div class="container">
	<div class="search">
	  <div class="stay">Search Product</div>
	  <div class="stay_right">
		  <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
		  <input type="submit" value="">
	  </div>
	  <div class="clearfix"> </div>
	</div>
    <div class="clearfix"> </div>
  </div>
</div>
<div class="about">
 <div class="container">
  <div class="singel_right">
			     <div class="col-md-8">
				      <div class="contact-form">
				  	        <form method="post" action="contact-post.html">
					    	    <p class="comment-form-author"><label for="author">Your Name:</label>
					    	    	<input type="text" class="textbox" value="Enter your name here..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your name here...';}">
						    	</p>
						        <p class="comment-form-author"><label for="author">Email:</label>
						     	   <input type="text" class="textbox" value="Enter your email here..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
						        </p>
						        <p class="comment-form-author"><label for="author">Message:</label>
						    	  <textarea value="Enter your message here..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Enter your message here...</textarea>
						        </p>
						        <input name="submit" type="submit" id="submit" value="Submit">
					        </form>
				       </div>
			     </div>
			     <div class="col-md-4 contact_right">
					<h3>Address</h3>
				    <div class="address">
						<i class="pin_icon"></i>
					    <div class="contact_address">
						  Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non
					    </div>
					    <div class="clearfix"></div>
					</div>
					<div class="address">
						<i class="phone"></i>
					    <div class="contact_address">
						   1-25-2568-897
					    </div>
					    <div class="clearfix"></div>
					</div>
					<div class="address">
						<i class="mail"></i>
					    <div class="contact_email">
						  <a href="malito:mail@demolink.org">mail(at)fashionpress.com</a>
					    </div>
					    <div class="clearfix"></div>
					</div>
		        </div>
		        <div class="clearfix"></div>
		</div>
		<div class="map">
           <iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Iworoko-Ekiti%2C%20Ekiti%2C%20Nigeria+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Embed Google Map</a></iframe>
        </div>
     </div>
</div>

<?php 

include "includes/footer.php";

 ?>