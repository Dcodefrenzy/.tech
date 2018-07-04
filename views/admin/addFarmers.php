<?php
ob_start();
session_start();
authenticate();
$_SESSION['active'] = true;
#Links to the header2.php
$page_title = "Add Products";
$link= "add_products";

include 'include/header2.php';

$flag = array("none", "top-selling", "popular-demand","new-offers");
$availability = array("1" =>"Available", "2" =>"Not Available");
$promo = array("1" =>"On Promo", "2" =>"No Promo");
$error = [];

if(array_key_exists('add', $_POST)){
  //die(var_dump($_POST));
  define("MAX_FILE_SIZE", "2097152");

  $ext = ["image/jpg", "image/JPG", "image/jpeg", "image/JPEG", "image/PNG", "image/png"];

  if(empty($_POST['product_name'])){
    $error['product_name'] = "Please enter Product name";
  }

  if(empty($_POST['maker'])){
    $error['maker'] = "Please enter Producer";
  }

  if(empty($_POST['category'])){
    $error['category'] = "Please enter Category";
  }

  if(empty($_POST['sub_category'])){
    $error['sub_category'] = "Please enter Sub-Category";
  }

  if(empty($_POST['final_category'])){
    $error['final_category'] = "Please enter final-Category";
  }

  if(empty($_POST['description'])){
    $error['description'] = "Please enter Description";
  }

  if(empty($_POST['price'])){
    $error['price'] = "Please enter Price";
  }

  if(empty($_POST['old_price'])){
    $error['old_price'] = "Please enter Previous Price";
  }

  if (empty($_POST['availability'])){
    $error['availability'] = "please enter Product Availability";
  }

  if(empty($_POST['promo_status'])){
    $error['promo_status'] = "Please enter Promo Status";
  }

  if(empty($_POST['old_price'])){
    $error['old_price'] = "please enter old_price";
  }

  if(empty($_POST['flag'])){
    $error['flag'] = "please enter flag";
  }
  
  if(empty($_POST['inventory'])){
    $error['inventory'] = "please enter inventory";
  }

  if(empty($_FILES['pic']['name'])){
    $error['pic'] = "please choose a file";
  }

  if($_FILES['pic']['size'] > MAX_FILE_SIZE){
    $error['pic'] = "file size exceeds maximum. maximum:".MAX_FILE_SIZE;
  }

  if(!in_array($_FILES['pic']['type'], $ext)){
    $error['pic'] = "Invalid file type";
  }

  if(empty($error)){
    $ver = compressImage($_FILES, 'pic',80, 'uploads/');
  $clean = array_map('trim', $_POST);
// var_dump($clean);
  addProducts($conn,$clean,$ver);
}
}
 ?>
 <?php if(isset($_GET['success'])){
   $msg = str_replace('_', ' ', $_GET['success']);
   echo $msg;
 } ?>

<div class="wrapper">
 <h2>PLEASE SELECT FILE</h2>
<form id="register" action="" method="POST" enctype="multipart/form-data">
<div class="">
<label id="lab" >Upload file</label>
<input type="file" name="pic">
</div>

 <div class="">
  <?php  $display = displayErrors($error, 'fname');
   echo $display; ?>
<label for="">FIRST NAME</label>
<input type="text" name="fname" value="" placeholder="First Name">
</div>

 <div class="">
  <?php  $display = displayErrors($error, 'lname');
   echo $display; ?>
<label for="">Last NAME</label>
<input type="text" name="lname" value="" placeholder="Last Name">
</div>


<div class="">
  <?php  $display = displayErrors($error, 'age');
   echo $display; ?>
<label for="">Age </label>
 <input type="number" name="age" value="" placeholder="Age">
</div>


<div class="">
  <?php  $display = displayErrors($error, 'gender');
   echo $display; ?>
<label for="">Gender </label>
 <input type="text" name="gender" value="" placeholder="Gender">
</div>

<div class="">
  <?php  $display = displayErrors($error, 'gender');
   echo $display; ?>
<label for="">State </label>
 <input type="text" name="gender" value="" placeholder="Gender">
</div>

<div class="">
  <?php  $display = displayErrors($error, 'gender');
   echo $display; ?>
<label for="">LGA </label>
 <input type="text" name="gender" value="" placeholder="Gender">
</div>

<div class="">
  <?php  $display = displayErrors($error, 'phonenumber');
   echo $display; ?>
<label for="">Phone Number </label>
 <input type="text" name="phonenumber" value="" placeholder="Phone Number">
</div>

<div class="">
  <?php  $display = displayErrors($error, 'inventory');
   echo $display; ?>
<label for="">Product Quantity </label>
 <input type="number" name="inventory" value="" placeholder="Product Quantity">
</div>

<div class="">
  <?php  $display = displayErrors($error, 'price');
   echo $display; ?>
<label for="">Price </label>
 <input type="text" name="price" value="" placeholder="Price">
</div>

<div class="">
  <?php  $display = displayErrors($error, "gurantor");
   echo $display; ?>
<label for="">GURANTOR NAME </label>
 <input type="text" name="gurantor" value="" placeholder="GURANTOR NAME">
</div>

<div class="">
  <?php  $display = displayErrors($error, "gurantor_number");
   echo $display; ?>
<label for="">GURANTOR NUMBER </label>
 <input type="text" name="gurantor_number" value="" placeholder="GURANTOR NUMBER">
</div>



<input type="submit" name="add" value="Add Product">
</form>


</div>
<br>
<br>
<br>
<script type="text/javascript">
function getSub(id){

  var url = 'getSubCategory';
  var method = 'POST';
  var params = 'cat_id='+ id;
  ////console.log(url);
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
  //for getting final category
function getSubCat(id){


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
}
</script>
<?php include 'include/footer.php'; ?>
