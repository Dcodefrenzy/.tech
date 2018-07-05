<?php
ob_start();
session_start();
authenticate();

$_SESSION['active'] = true;
$page_title = "View farmers";
$link= "farmers";

include 'include/header2.php';
 ?>
 <table id="tab">
   <thead>
     <tr>
      <th>Number</th>
       <th>Firstname</th>
       <th>Lastname</th>
       <th>age</th>
       <th>Gender</th>
       <th>state</th>
       <th>town</th>
       <th>phone number</th>
       <th>Inventory</th>
       <th>Price</th>
       <th>Availability</th>
       <th>Season</th>
       <th>Admin</th>
       <th>Unique</th>
       <th>gaurantor Name</th>
       <th>gaurantor Number</th>
       <th>Image</th>
       <th>Edit</th>
       <th>Delete</th>
     </tr>
   </thead>
   <tbody>
     <?php

     viewFarmers($conn);
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
