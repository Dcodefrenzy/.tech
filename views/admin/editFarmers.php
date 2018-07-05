<?php
ob_start();
session_start();
authenticate();
$_SESSION['active'] = true;
if(isset($_GET['unique_id'])){
  $id = $_GET['unique_id'];
}
#Links to the header2.php
$page_title = "Edit Farmer";
$link= "#";



include 'include/header2.php';
$getp = getFarmerById($conn,$id);

  extract($getp);
if($getp == false){
  header("Location:products");
}
$season = array("none", "Pre-planting", "planting","harvesting");
$availability = array("1" =>"Available", "2" =>"Not Available");



$error = [];

if(array_key_exists('add', $_POST)){


  if(empty($_POST['fname'])){
    $error['fname'] = "Please enter your first name";
  }

    if(empty($_POST['lname'])){
    $error['lname'] = "Please enter your last name";
  }

  if(empty($_POST['age'])){
    $error['age'] = "Please enter your age";
  }

   if(empty($_POST['gender'])){
    $error['gender'] = "Please enter your gender";
  }

   if(empty($_POST['state'])){
    $error['state'] = "Please choose your state";
  }

    if(empty($_POST['lga'])){
    $error['lga'] = "Please choose your local government";
  }

  if(empty($_POST['price'])){
    $error['price'] = "Please enter Price";
  }

  if(empty($_POST['inventory'])){
    $error['inventory'] = "Please enter your product quantity";
  }

  if (empty($_POST['phonenumber'])){
    $error['phonenumber'] = "please enter your phone number";
  }

  if (!is_numeric($_POST['phonenumber'])){
    $error['phonenumber'] = "Please enter a numeric value";
  }

  if (empty($_POST['guarantor'])){
    $error['guarantor'] = "please enter a guarantor's name";
  }

  if (empty($_POST['guarantor_number'])){
    $error['guarantor_number'] = "please enter a guarantor's phone number";
  }

  if (!is_numeric($_POST['guarantor_number'])) {
    $error['guarantor_number'] = "Please enter a numeric value for your guarantor";
  }

  if (empty($_POST['availability'])){
    $error['availability'] = "please enter Product Availability";
  }

   if (empty($_POST['season'])){
    $error['season'] = "please enter Product season";
  }


  if(empty($error)){
  $clean = array_map('trim', $_POST);
// var_dump($clean);
  editFarmer($conn,$clean,$id);
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
  <?php  $display = displayErrors($error, 'fname');
   echo $display; ?>
<label for="">FIRST NAME</label>
<input type="text" name="fname" value=<?php echo $firstname; ?> placeholder="First Name">
</div>

 <div class="">
  <?php  $display = displayErrors($error, 'lname');
   echo $display; ?>
<label for="">Last NAME</label>
<input type="text" name="lname" value=<?php echo $lastname; ?> placeholder="Last Name">
</div>


<div class="">
  <?php  $display = displayErrors($error, 'age');
   echo $display; ?>
<label for="">Age </label>
 <input type="number" name="age" value=<?php echo $age; ?> placeholder="Age">
</div>


<div class="">
  <?php  $display = displayErrors($error, 'gender');
   echo $display; ?>
<label for="">Gender </label>
 <input type="text" name="gender" value=<?php echo $gender; ?> placeholder="Gender">
</div>


<div class="">
  <?php  $display = displayErrors($error, 'state');
   echo $display; ?>
  <label for="">State</label>
  <select onchange="getSub(this.value)" class="" name="state">
  <option value="">-Select State-</option>
  <?php viewStates($conn) ?>
 </select>
</div>

<div class="">
  <?php  $display = displayErrors($error, 'lga');
   echo $display; ?>
  <label for="">Local Government</label>
  <select id ="sub" onchange="getSubCat(this.value)" class="" name="lga">
  <option value="">-Select LGA-</option>
  </select>
</div>



<div class="">
  <?php  $display = displayErrors($error, 'phonenumber');
   echo $display; ?>
<label for="">Phone Number </label>
 <input type="number" name="phonenumber" value=<?php echo $phone_number; ?> placeholder="Phone Number">
</div>

<div class="">
  <?php  $display = displayErrors($error, 'inventory');
   echo $display; ?>
<label for="">Product Quantity </label>
 <input type="number" name="inventory" value=<?php echo $inventory; ?> placeholder="Product Quantity">
</div>

<div class="">
  <?php  $display = displayErrors($error, 'price');
   echo $display; ?>
<label for="">Price </label>
 <input type="number" name="price" value=<?php echo $price; ?> placeholder="Price">
</div>

<div class="">
  <?php  $display = displayErrors($error, "guarantor");
   echo $display; ?>
<label for="">GURANTOR NAME </label>
 <input type="text" name="guarantor" value=<?php echo $guarantor_name; ?> placeholder="GURANTOR NAME">
</div>

<div class="">
  <?php  $display = displayErrors($error, "guarantor_number");
   echo $display; ?>
<label for="">GURANTOR NUMBER </label>
 <input type="number" name="guarantor_number" value=<?php echo $guarantor_number; ?> placeholder="GURANTOR NUMBER">
</div>

<div class="">
  <?php  $display = displayErrors($error, 'availability');
   echo $display; ?>
  <label for="">AVAILABILTY</label>
  <select class="" name="availability">
    <option value="">-Select Availability-</option>
    <?php foreach($availability as $num => $status){?>
    <option value="<?php echo $num  ?>">
  <?php echo $status  ?>
  </option>
<?php  }?>
  </select>
</div>

<div class="">
  <?php  $display = displayErrors($error, 'season');
   echo $display; ?>
  <label for="">SEASON</label>
  <select class="" name="season">
    <option value="">-Select Season-</option>
    <?php foreach($season as $ff){?>
    <option value="<?php echo $ff  ?>">
  <?php echo $ff  ?>
  </option>
<?php  }?>
  </select>
</div>



<input type="submit" name="add" value="Edit Farmer">
</form>


</div>
<br>
<br>
<br>
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
<?php include 'include/footer.php'; ?>
