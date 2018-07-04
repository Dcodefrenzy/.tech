<?php
  
        $stmt = $conn->prepare("SELECT * FROM final_category WHERE sub_category = :sub_id");
        $stmt->bindParam(":sub_id", $_POST['hash_id']);
        $stmt->execute();
          echo  '<option value="">-Select Sub Category-</option>';
        while($row = $stmt->fetch(PDO::FETCH_BOTH)){

          echo '<option value="'.$row['hash_id'].'">'.$row['final_category_name'].'</option>';

        }

 ?>
