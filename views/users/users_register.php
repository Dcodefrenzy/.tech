<?php 
ob_start();
$page_title = "Home";
include "includes/header.php"; 





$error = [];

if(array_key_exists('submit', $_POST)){


  if(empty($_POST['cname'])){
    $error['cname'] = "Please enter your Company Name";
  }

    if(empty($_POST['email'])){
    $error['email'] = "Please enter your Email address ";
  }

    if(doesUserEmailExist($conn, $_POST['email'])){
    $error['email'] = "Phone number already exit";
  }

   if(empty($_POST['state'])){
    $error['state'] = "Please choose your state";
  }

    if(empty($_POST['lga'])){
    $error['lga'] = "Please choose your local government";
  }
  	if (empty($_POST['address'])) {
  		$error['address'] = "Please Enter your address";
  	}

    if(empty($_POST['hash'])){
    $error['hash'] = "Please enter your Password";
  }

    if(empty($_POST['pword'])){
    $error['pword'] = "Please Re-enter your Password";
  }

    if($_POST['pword'] != $_POST['hash']){
    $error['pword'] = "Your password do not match";
  }
/*
  if ($_POST['phonenumber']) {
    $error['phonenumber'] = "Please input correct digits";
  }*/
  if (empty($_POST['phonenumber'])){
    $error['phonenumber'] = "please enter your phone number";
  }


  if (!is_numeric($_POST['phonenumber'])){
    $error['phonenumber'] = "Please enter a numeric value";
  }


  if(empty($error)){

  $clean = array_map('trim', $_POST);
// var_dump($clean);

doUserRegister($conn, $clean);
}
}
 ?>
 <?php if(isset($_GET['success'])){
   $msg = str_replace('_', ' ', $_GET['success']);
   echo $msg;
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
		  	  <form method="post"> 
				 <div class="register-top-grid">
					<h3>PERSONAL INFORMATION</h3>
					 <div>
					 	<?php  $display = displayErrors($error, 'cname');
  						 echo $display; ?>
						<span>Company Name<label>*</label></span>
						<input type="text" required=""  name="cname" placeholder="Company Name"> 
					 </div>
						<div>
					 	</div>

					 	<div>
					 	<?php  $display = displayErrors($error, 'email');
  						 echo $display; ?>
						<span>Email Adress<label>*</label></span>
						<input type="email" required="" name="email" placeholder="Email Adress" > 
					 	</div>

					 	 <div>
					 	 <?php  $display = displayErrors($error, 'hash');
  						 echo $display; ?>
						 <span>Password<label>*</label></span>
						 <input type="Password" required="" name="hash" placeholder="Password"> 
					 	</div>

			
					  <div>
					  <?php  $display = displayErrors($error, 'pword');
  						echo $display; ?>
					 <span>Comfirm Password<label>*</label></span>
					 <input type="Password" required="" name="pword" placeholder="Comfirm Password"> 
					 </div>

					 	<div class="">
  						<?php  $display = displayErrors($error, 'state');
  						 echo $display; ?>
  						<span>State<label>*</label></span>
  						<select onchange="getSub(this.value)" class="" name="state">
  						<option value="">-Select State-</option>
 						 <?php viewStates($conn) ?>
 						</select>
						</div>

						<div class="">
  						<?php  $display = displayErrors($error, 'lga');
  						 echo $display; ?>
  						<span>Local Government<label>*</label></span>
  						<select id ="sub" onchange="getSubCat(this.value)" class="" name="lga">
  						<option value="">-Select LGA-</option>
  						</select>
						</div>

						 <div>
						 <?php  $display = displayErrors($error, 'address');
  						 echo $display; ?>
						 <span>Address<label>*</label></span>
						 <textarea cols="" rows="" name="address" placeholder="Address"></textarea>
						 </div>

						 <div>
						 <?php  $display = displayErrors($error, 'phonenumber');
  						 echo $display; ?>
						 <span>Phone Number<label>*</label></span>
						 <input type="number" name="phonenumber" placeholder="Phone Number"> 
					 	</div>

					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				<div class="clearfix"> </div>
				<div class="register-but">

					   <input type="submit" value="submit" name="submit">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
	</div>
</div>
<script type="text/javascript">
function getSub(id){

  var url = 'getLocal';
  var method = 'POST';
  var params = 'state_id=' + id;
 /* console.log(params);*/
  subAjax(url, method, params);
}

function subAjax(url, method, params){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if(xhr.readyState == 4){
      var res = xhr.responseText;
      console.log(res);
      document.getElementById('sub').innerHTML = res ;
    }
  }
  xhr.open(method, url, true);
  xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  xhr.send(params);
}
  //for getting final category
/*function getSubCat(id){


  var url = 'finalCategory';
  console.log(url);
  var method ='POST';
  var params = 'hash_id=' + id;

  getFinalCat(url, method, params);
}

function getFinalCat(url, method, params){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = () =>{
    if(xhr.readyState == 4){
      var res = xhr.responseText;
      console.log(res)
      document.getElementById('final').innerHTML = res;
    }
  }
  xhr.open(method, url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(params);
}*/
</script>
<?php 
include "includes/footer.php";
 ?>