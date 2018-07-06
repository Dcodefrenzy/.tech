<?php
  
        $stmt = $conn->prepare("SELECT * FROM farmers WHERE");
        $stmt->bindParam(":lid", $_POST['lid']);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {

	}

        

 ?>
