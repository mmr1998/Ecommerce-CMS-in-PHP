<?php 
session_start();
include("includes/db.php");
include("functions/functions.php");
?>


<?php 
	if(isset($_GET['pro_id'])){
		$product_id = $_GET['pro_id'];
		$get_product = "select * from products where product_id='$product_id'";
		$run_product = mysqli_query($con,$get_product);
		$row_product = mysqli_fetch_array($run_product);
		$p_cat_id = $row_product['p_cat_id'];
		$pro_title = $row_product['product_title'];
		$pro_price = $row_product['product_price'];
		$pro_desc = $row_product['product_desc'];
		$pro_img1 = $row_product['product_img1'];
		$pro_img2 = $row_product['product_img2'];
		$pro_img3 = $row_product['product_img3'];
		
		$get_p_cat ="select * from products_categories where p_cat_id='$p_cat_id'";
		$run_p_cat = mysqli_query($con,$get_p_cat);
		$row_p_cat = mysqli_fetch_array($run_p_cat);
		$p_cat_title = $row_p_cat['p_cat_title'];
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ecommerce Project</title>
		
		<link rel="stylesheet" type="text/css" href="styles/bootstrap-337.min.css">
		<link rel="stylesheet" type="text/css" href="font-awsome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	<body>

		<div id="top"> <!-- top menu begain -->
			<div class="container">
				<div class="col-md-6 offer">
					<a href="#" class="btn btn-success btn-sm">
						<?php 
						if(!isset($_SESSION['customer_email'])){
							 echo "Welcome : Guest";
						} else{
							$c_mail = $_SESSION['customer_email'];
							$get_name = "select * from customers where customer_email='$c_mail'";
							$run_name = mysqli_query($con,$get_name);
							$row_name = mysqli_fetch_array($run_name);
							$c_name = $row_name['customer_name'];
							echo "Welcome : $c_name";
						}
						?>
					</a>
					<a href="#"><?php items(); ?> Items | <?php total_price(); ?></a>
				</div>
				<div class="col-md-6">
					<ul class="menu">
						<li><a href="../customer-register.php">Register</a></li>
						<li>
							
							<?php 
								if(!isset($_SESSION['customer_email'])){
									echo "<a href='checkout.php'> My Account</a>";
								}else{									echo "<a href='my_account.php?my_orders'> My Account</a>";
								}
								?>
							
						</li>
						<li><a href="../cart.php">Cart</a></li>
						<li><a href="../checkout.php">
							<?php 
							if(!isset($_SESSION['customer_email'])){
								 echo "<a href='../checkout.php'>Login</a>";
							} else{
								echo "<a href='logout.php'>Log Out</a>";
							}
							?>
							
						</a></li>
					</ul>
				</div>
			</div>
		</div> <!-- top menu finished -->

		<div id="navbar" class="navbar navbar-default"> <!-- main menu begain -->
			<div class="container">
				<div class="navbar-header">
					<a href="../index.php" class="navbar-brand home">
						<img src="images/ecom-store-logo.png" alt="logo bigger" class="hidden-xs">
						<img src="images/ecom-store-logo-mobile.png" alt="logo mobile" class="visible-xs">
					</a>
					<button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
						<span class="sr-only">Toggle Nevigation</span>
						<i class="fa fa-align-justify"></i>
					</button>
					<button class="navbar-toggle" data-toggle="collapse" data-target="#search">
						<span class="sr-only">Toggle Search</span>
						<i class="fa fa-search"></i>
					</button>
				</div>
				<div class="navbar-collapse collapse" id="navigation">
					<div class="padding-nav">						
				        <ul class="nav navbar-nav left">
							<li class="<?php if($active == 'home') echo "active"; ?>">
								<a href="../index.php">Home</a>
							</li>
							<li class="<?php if($active == 'shop') echo "active"; ?>">
								<a href="../Shop.php">Shop</a>
							</li>
							<li class="<?php if( $active == 'my_account') echo "active"; ?>">
								<?php 
								if(!isset($_SESSION['customer_email'])){
									echo "<a href='checkout.php'> My Account</a>";
								}else{									echo "<a href='my_account.php?my_orders'> My Account</a>";
								}
								?>
							</li>
							<li class="<?php if( $active == 'cart') echo "active"; ?>">
								<a href="../cart.php">Shopping Cart</a>
							</li>
							<li class="<?php if( $active == 'contact') echo "active"; ?>">
								<a href="../contact.php">Contact Us</a>
							</li>
						</ul>
					</div>
					<a href="../cart.php" class="btn navbar-btn btn-primary right">
						<i class="fa fa-shopping-cart"></i>
						<span><?php items(); ?> Items | <?php total_price(); ?></span>
					</a>
					<div class="navbar-collapse collapse right">
						<button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
							<span class="sr-only">Toggle Search</span>
							<i class="fa fa-search"></i>
						</button>
					</div>
					<div class="collapse clearfix" id="search">
						<form method="get" action="results.php" class="navbar-form">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search" name="user_query" required>
								<span class="input-group-btn">
									<button type="submit" name="search" value="Search" class="btn btn-primary">
										<i class="fa fa-search"></i>
									</button>
								</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> <!-- main menu finished -->