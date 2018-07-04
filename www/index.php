<?php 
#define App path
define("APP_PATH", dirname(dirname(__FILE__)));

#Load database
#load controlers i.e functions

require APP_PATH."/controller/controller.php";

#load routes
require APP_PATH."/routes/router.php";





 ?>