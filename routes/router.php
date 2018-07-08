<?php
$uri = explode("/", $_SERVER['REQUEST_URI']);
//var_dump($uri);

if(count($uri)> 2){
  header("Location:/admin_home");
}

//Creating A Null variable to be populated for the query String Route;
$category_id = NULL;
$category_name= NULL;

//Creating a $_GET condition to populate the Null Variables;
if(isset($_GET['id'])){
  $category_id = $_GET['id'];
}

$msg = NULL;
if(isset($_GET['msg'])){
  $msg = $_GET['msg'];
}
if(isset($_GET['name'])){
  $category_name = $_GET['name'];
}
$success = NULL;
if(isset($_GET['success'])){
  $success = $_GET['success'];
}

$product_id = NULL;
if(isset($_GET['product_id'])){
  $product_id = $_GET['product_id'];
}

$cart_id = NULL;
if(isset($_GET['cart_id'])){
  $cart_id = $_GET['cart_id'];
}
$sub_cat_id =  NULL;
if (isset($_GET['sub_cat_id'])) {
  $sub_cat_id = $_GET['sub_cat_id'];
}
$unique_id = NULL;
if (isset($_GET['unique_id'])) {
  $unique_id=$_GET['unique_id'];
}


  $hid = NULL;
  if(isset($_GET['hid'])){
    $hid = $_GET['hid'];
  }
  $user_id = NULL;
  if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
  }
   $cat_id = NULL;
  if(isset($_GET['cat_id'])){
    $cat_id = $_GET['cat_id'];
  }
  $i = "";
  if(isset($_GET['page'])){
    $i = $_GET['page'];
  }
      $inventory = "";
  if (isset($_GET['stock'])) {
    $inventory = $_GET['stock'];
  }
  $hash_id = NULL;
  if (isset($_GET['hash_id'])) {
    $hash_id = $_GET['hash_id'];
  }


switch ($uri[1]) {
  case "admin":
  include APP_PATH."/views/admin/adminlogin.php";
  break;

  case "admin?msg=$msg":
  include APP_PATH."/views/admin/adminlogin.php";
  break;

  case "admin_register":
  include APP_PATH."/views/admin/register.php";
  break;

  case "admin_home":
  include APP_PATH."/views/admin/adminhome.php";
  break;

  case "add_farmers":
  include APP_PATH."/views/admin/addFarmers.php";
  break;


  case "edit_farmers":
  include APP_PATH."/views/admin/editFarmers.php";
  break;

  case "delete_products":
  include APP_PATH."/views/admin/deleteProducts.php";
  break;

  case "edit_sub_category":
  include APP_PATH."/views/admin/editSubCategory.php";
  break;

  case "edit_category":
  include APP_PATH."/views/admin/editCategory.php";
  break;

  case "farmers":
  include APP_PATH."/views/admin/farmers.php";
  break;

  #Routes With Query Strings are Below;
  case "editCategory?id=$category_id":
  include APP_PATH."/views/admin/editCategory.php";
  break;

  case "getLocal":
  include APP_PATH."/views/admin/ajax/subcategory.php";
  break;
 
  case "search":
  include APP_PATH."/views/users/ajax/finalCategory.php";
  break;

   case "season":
  include APP_PATH."/views/users/ajax/users_seasons.php";
  break;

  case "edit_farmers?unique_id=$unique_id":
  include APP_PATH."/views/admin/editFarmers.php";
  break;

  case "editfarmersImage?unique_id=$unique_id":
  include APP_PATH."/views/admin/editfarmersImage.php";
  break;

  case "deletefarmers?unique_id=$unique_id": //$product_id has been created
  include APP_PATH."/views/admin/deletefarmers.php";
  break;

  case "product_category?success=$success":
  include APP_PATH."/views/admin/category.php";
  break;

  case "logout":
  include APP_PATH."/views/admin/logout.php";
  break;

  case "product_sub_category?success=$success":
  include APP_PATH."/views/admin/subcategory.php";
  break;

  case "deleteCategory?id=$category_id":
  include APP_PATH."/views/admin/deleteCategory.php";
  break;

  case "deleteSubCategory?id=$category_id":
  include APP_PATH."/views/admin/deleteSubCategory.php";
  break;

  case "add_farmers?success=$success":
  include APP_PATH."/views/admin/addFarmers.php";
  break;

  case "farmers?success=$success":
  include APP_PATH."/views/admin/farmers.php";
  break;











  ///////Public Routes//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 case " ":
  include APP_PATH."/views/users/users_home.php";
  break;

  case "home":
  include APP_PATH."/views/users/users_home.php";
  break;

   case "about":
  include APP_PATH."/views/users/users_about.php";
  break;

   case "index":
  include APP_PATH."/views/users/users_home.php";
  break;

  case "view_farmers":
  include APP_PATH."/views/users/users_farmers.php";
  break;


  case "product?sub_cat_id=$sub_cat_id":
  include APP_PATH."/views/users/users_products.php";
  break;

   case "product?sub_cat_id=$sub_cat_id&&page=$i":
  include APP_PATH."/views/users/users_products.php";
  break;

   case "product?cat_id=$cat_id":
  include APP_PATH."/views/users/users_products.php";
  break;

  case "product?hid=$hid":
  include APP_PATH."/views/users/users_products.php";
  break;

  case "product?hid=$hid&&page=$i":
  include APP_PATH."/views/users/users_products.php";
  break;

  case "farmers?page=$i":
  include APP_PATH."/views/users/users_farmers.php";
  break;

  case "contact":
  include APP_PATH."/views/users/users_contact.php";
  break;

  case "login":
  include APP_PATH."/views/users/users_login.php";
  break;

  

   case "login?user_id=$user_id":
  include APP_PATH."/views/users/users_login.php";
  break;


  case "user_login?msg=$msg":
  include APP_PATH."/views/users/users_login.php";
  break;      

  case "register":
  include APP_PATH."/views/users/users_register.php";
  break;

  
   case "register?user_id=$user_id":
  include APP_PATH."/views/users/users_register.php";
  break;

  case "login?success=$success":
  include APP_PATH."/views/users/users_login.php";
  break;

  case "cart":
  include APP_PATH."/views/users/users_cart.php";
  break;

  
  case "cart?msg=$msg":
  include APP_PATH."/views/users/users_cart.php";
  break;


  case "profile":
  include APP_PATH."/views/users/farmer_profile.php";
  break;

  case "profile?unique_id=$unique_id":
  include APP_PATH."/views/users/farmer_profile.php";
  break;


  case "dashboard":
  include APP_PATH."/views/users/users_dashboard.php";
  break;

  

  case "dashboard?unique_id=$unique_id":
  include APP_PATH."/views/users/users_dashboard.php";
  break;

 case "delete?unique_id=$unique_id":
  include APP_PATH."/views/users/users_delete.php";
  break;


  
  case "confirmation?hash_id=$hash_id":
  include APP_PATH."/views/users/confirmation.php";
  break;






}





?>
