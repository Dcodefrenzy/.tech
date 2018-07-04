<html>
<head>
	<title><?php echo $page_title ?></title>
	<link rel="stylesheet" type="text/css" href="admin_style/styles.css">
</head>
<body>
	<section>
			<div class="mast">
				<h1>A<span>DMIN</span></h1>
				<nav>
					<ul class="clearfix">
						<?php if(isset($_SESSION['admin_id']) && isset($_SESSION['admin_name'])){?>

						<li><a href="<?php echo $link ?>" class="selected"><?php echo $page_title  ?></a></li>
						<li><a href="admin_home">Home</a></li>
						<li><a href="add_farmers">Add Farmer</a></li>
						<li><a href="farmers">View Farmers</a></li>
						<li><a href="#">View Users</a></li>
						<li><a href="#">View Purchase</a></li>
						<li><a href="logout">Logout</a></li>
					<?php }elseif(isset($_SESSION['admin_id']) && isset($_SESSION['admin_name']) && isset($_SESSION['admin_id']) == 1122334455){ ?>
						<li><a href="<?php echo $link ?>" class="selected"><?php echo $page_title  ?></a></li>
						<li><a href="admin_home">Home</a></li>
						<li><a href="add_farmers">Add Farmer</a></li>
						<li><a href="farmers">View Farmers</a></li>
						<li><a href="#">View Users</a></li>
						<li><a href="#">View Purchase</a></li>
						<li><a href="admin_register">Register New Admin</a></li>
						<li><a href="logout">Logout</a></li>

					<?php }else{ ?>
						<li><a href="admin" class="selected">Login</a></li>

					<?php }?>

					</ul>
				</nav>
			</div>
		</section>
