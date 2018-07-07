<?php 
ob_start();
$page_title = "Users login";
include "includes/header.php";




$error =  []; 
if(array_key_exists('login', $_POST)){

  if(empty($_POST['email'])){
    $error['email'] = "Please enter email";
  }
  if(empty($_POST['hash'])){
    $error['hash'] = "please enter password";
  }

  if(empty($error)){
    $clean = array_map('trim', $_POST);

    userLogin($conn, $clean);
  }
 }

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
         <div class="register">
			   <div class="col-md-6 login-left">
			  	 <h3>NEW CUSTOMERS</h3>
				 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				 <a class="acount-btn" href="register">Create an Account</a>
			   </div>
			   <div class="col-md-6 login-right">
			  	<h3>REGISTERED CUSTOMERS</h3>
				<p>If you have an account with us, please log in.</p>
				<form method="post">
				  <div>
				  <?php  $display = displayErrors($error, 'email');
  				  echo $display; ?>
					<span>Email Address<label>*</label></span>
					<input type="email" required="" placeholder="Email" name="email"> 
				  </div>

				  <div>
				  		<?php  $display = displayErrors($error, 'hash');
  						 echo $display; ?>
					<span>Password<label>*</label></span>
					<input type="Password" required="" placeholder="Password" name="hash"> 
				  </div>
				  <a class="forgot" href="#">Forgot Your Password?</a>
				  <input type="submit" value="Login" name="login">
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
		</div>
	</div>
</div>
<?php 
include "includes/footer.php";
 ?>