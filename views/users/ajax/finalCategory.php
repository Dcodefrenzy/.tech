<?php
  
        $stmt = $conn->prepare("SELECT * FROM farmers WHERE town = :lid");
        $stmt->bindParam(":lid", $_POST['lid']);
        $stmt->execute();
        /*echo '<h3 class="single_head">Location:'.$local.', '.$state.'</h3>';*/
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
					extract($row);
					$state = getStateById($conn, $state);
					$local = getLocalById($conn, $town);
		
	echo	'
		<div class="related_products">
	     <div class="col-md-3 top_grid1-box1 top_grid2-box2"><a href=profile?unique_id='.$unique_id.'> 
	     	<div class="grid_2">
	     	  <div class="b-link-stroke b-animate-go  thickbox">
		         <div style="background:url('.$file_path.'); height:200px; width: 200px; background-size: cover; background-position: center; background-repeat: no-repeat;" class="">
  			</div>
  			 </div>
	     	  <div class="grid_2" >
	     	  	<p> '.$firstname." ".$lastname.'</p>
	     	  	<p>Location: <br>'.$local.' </p> 
	     	  	<p> '.$state.' </p>
	     	  	<ul class="grid_2-bottom">
	     	  		<li class="grid_-1-left"></li>
	     	  		<li class="grid_1-left"><p> '.$inventory.' tons </p></li>
	     	  		<li class="grid_-1-left"><p> Season: <br>'.$season.' </p></li>
	     	  		<li class="grid_1-right">  <a href=profile?unique_id='.$unique_id.' title="Get It" class="btn btn-primary btn-normal btn-inline "" target="_self">Connect</a> </li>	
	     	  	</ul>
	     	  	<div class="clearfix"> </div>
	     	  </div>
	     	</div>    	
	</div>
	 </div>';
	}

        

 ?>
