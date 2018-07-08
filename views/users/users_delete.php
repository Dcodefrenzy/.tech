<?php 
ob_start();
$page_title = "Home";
include "includes/header.php"; 


	if (isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
	}
	if (isset($_GET['unique_id'])) {
		$unique_id = $_GET['unique_id'];

		deleteFarmerContact($conn, $unique_id, $id);
		header("Location:dashboard");
	}											




	
 ?>