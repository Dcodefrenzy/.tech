<?php
    define("DBNAME", 'tech4rice');
    define("DBUSER", 'root');
    define("DBPASS", 'dre');

        try{

          $conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);

          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
                echo $e->getMessage();
        }

 ?>
