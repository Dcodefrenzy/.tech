<?php
ob_start();
session_start();
authenticate();

$_SESSION['active'] = true;
$page_title = "View Products";
$link= "products";

include 'include/header2.php';
 ?>
 <table id="tab">
   <thead>
     <tr>
       <th>Firstname</th>
       <th>Lastname</th>
       <th>age</th>
       <th>Gender</th>
       <th>state</th>
       <th>town</th>
       <th>phone number</th>
       <th>Inventory</th>
       <th>Price</th>
       <th>gurantor Name</th>
       <th>gurantor Number</th>
       <th>Image</th>
     </tr>
   </thead>
   <tbody>
     <?php

     viewProducts($conn);
     ?>

         </tbody>
 </table>
         </tbody>
 </table>

<br>
<br>
<br>
<br>
 <?php include 'include/footer.php'; ?>
