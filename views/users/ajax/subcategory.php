<?php
    define("DBNAME", 'tech4rice');
    define("DBUSER", 'root');
    define("DBPASS", 'dre');

        try{

          $lconn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);

          $lconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        }
        catch(PDOException $e) {
                echo $e->getMessage();
        }


        $stmt = $lconn->prepare("SELECT * FROM locals WHERE state_id = :state_id");
        $stmt->bindParam(":state_id", $_POST['state_id']);
                $stmt->execute();
          echo  '<option value="">-Select LGA-</option>';
        while($row = $stmt->fetch(PDO::FETCH_BOTH)){
          extract($row);


          echo "<option value=".$local_id.">".$local_name."</option>";

        }




 ?>
