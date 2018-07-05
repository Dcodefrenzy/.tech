<?php
ob_start();
session_start();
authenticate();
$page_title = "Delete Product";
$link= "#";


include 'include/header2.php';

if(isset($_GET['unique_id'])){
	$id = $_GET['unique_id'];
}

$nm = getfarmerById($conn,$id);
extract($nm);
 $fullname = $firstname." ".$lastname;

if($fullname == false){
  header("Location:/farmers");
}

if(isset($_POST['no'])){
  header("Location:/farmers");

}

if(isset($_POST['yes'])){
  
  deletefarmers($conn, $id);
}

?>
<h1 id= \"register_label\"> Are You Sure You want to delete <?php echo $fullname." Profile" ?></h1>

<form id="register"  action="" method="post">
  <input type="submit" name="yes" value="Yes">
  <input type="submit" name="no" value="No">
</form>
<?php include 'include/footer.php'; ?>
