<?php 

    

?>
  <?php 
session_start();
$active='Cart';
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
		$pro_stock = $row_product['stock'];
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
						<li><a href="customer-register.php">Register</a></li>
						<li>
							
							<?php 
							if(!isset($_SESSION['customer_email'])){
								echo "<a href='checkout.php'> My Account</a>";
							}else{									echo "<a href='customer/my_account.php?my_orders'> My Account</a>";
							}
							?>
							
						</li>
						<li><a href="cart.php">Cart</a></li>
						<li><a href="checkout.php">
							
							<?php 
							if(!isset($_SESSION['customer_email'])){
								 echo "<a href='checkout.php'>Login</a>";
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
					<a href="index.php" class="navbar-brand home">
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
								<a href="index.php">Home</a>
							</li>
							<li class="<?php if($active == 'shop') echo "active"; ?>">
								<a href="Shop.php">Shop</a>
							</li>
							<li class="<?php if( $active == 'my_account') echo "active"; ?>">
								
								<?php 
								if(!isset($_SESSION['customer_email'])){
									echo "<a href='checkout.php'> My Account</a>";
								}else{									echo "<a href='customer/my_account.php?my_orders'> My Account</a>";
								}
								?>
								
							</li>
							<li class="<?php if( $active == 'cart') echo "active"; ?>">
								<a href="cart.php">Shopping Cart</a>
							</li>
							<li class="<?php if( $active == 'contact') echo "active"; ?>">
								<a href="contact.php">Contact Us</a>
							</li>
						</ul>
					</div>
					<a href="cart.php" class="btn navbar-btn btn-primary right">
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
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Shop
                   </li>
                   
                   <li>
                       <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                   </li>
                   <li> <?php echo $pro_title; ?> </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
               <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
                               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol><!-- carousel-indicators Finish -->
                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 3-a"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 3-b"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 3-c"></center>
                                   </div>
                               </div>
                               
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!-- left carousel-control Finish -->
                               
                               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!-- right carousel-control Finish -->
                               
                           </div><!-- carousel slide Finish -->
                       </div><!-- mainImage Finish -->
                   </div><!-- col-sm-6 Finish -->
                   
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box"><!-- box Begin -->
                           <h1 class="text-center"> <?php echo $pro_title; ?> </h1>
                           
                           <?php add_cart(); ?>
                           
                           <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-5 control-label">Products Quantity</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                         <input type="number" name="product_qty" class="form-control p_qty" value="1" min="1">
                                   </div><!-- col-md-7 Finish -->
                                   <div class="overall">
                                   	
                                   </div>
                               </div><!-- form-group Finish -->
                               
                               <div class="form-group"><!-- form-group Begin -->
                                   <label class="col-md-5 control-label">Product Size</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                       
                                       <select name="product_size" class="form-control" required><!-- form-control Begin -->                                    
                                           <option>Small</option>
                                           <option>Medium</option>
                                           <option>Large</option>
                                           
                                       </select><!-- form-control Finish -->
                                       
                                   </div><!-- col-md-7 Finish -->
                               </div><!-- form-group Finish -->
                               
                               <p class="price">
                               		<label class="col-md-5 control-label">Product Price</label>
                               		<label class="col-md-7 control-label">&#x9f3; <?php echo $pro_price; ?></label>
                               </p>
                               <p class="stock">
                               		<label class="col-md-5 control-label">Product Stock</label> 
                               		<label class="col-md-7 control-label"> <input type="text" name="stock" value="<?php echo $pro_stock; ?>"> </label>
                               	</p>
                               <div class="clearfix"></div>
                               <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></p>
                               
                           </form><!-- form-horizontal Finish -->
                           
                       </div><!-- box Finish -->
                       
                       <div class="row" id="thumbs"><!-- row Begin -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="0"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product 1" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="1"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product 2" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="2"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="product 4" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                       </div><!-- row Finish -->
                       
                   </div><!-- col-sm-6 Finish -->
                   
                   
               </div><!-- row Finish -->
               
               <div class="box" id="details"><!-- box Begin -->
                       
                       	<h4>Product Details</h4>
                   		<hr>
                   <p>
                       
                       <?php echo $pro_desc; ?>
                       
                   </p>
                   
                       <h4>Size</h4>
                       <hr>
                       <ul class="size-details">
                           <li>Small</li>
                           <li>Medium</li>
                           <li>Large</li>
                       </ul>  
                       <br>
                       
                       
                   
               </div><!-- box Finish -->
               
               <div id="row" class="same-heigh-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-12 col-sm-6 no-padding"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box same-height headline"><!-- box same-height headline Begin -->
                           <h3 class="text-center">Products You Maybe Like</h3>
                       </div><!-- box same-height headline Finish -->
                   </div><!-- col-md-3 col-sm-6 Finish -->
                   
                   <?php 
                   
                    $get_products = "select * from products order by rand() LIMIT 0,4";
                   
                    $run_products = mysqli_query($con,$get_products);
                   
                   while($row_products=mysqli_fetch_array($run_products)){
                       
                       $pro_id = $row_products['product_id'];
                       
                       $pro_title = $row_products['product_title'];
                       
                       $pro_img1 = $row_products['product_img1'];
                       
                       $pro_price = $row_products['product_price'];
                       
                       echo "
                       
                        <div class='col-md-3 col-sm-6 center-responsive liked-pro'>
                        
                            <div class='product same-height'>
                            
                                <a href='details.php?pro_id=$pro_id'>
                                
                                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                
                                </a>
                                
                                <div class='text'>
                                
                                    <h3> <a href='details.php?pro_id=$pro_id'> $pro_title </a> </h3>
                                    
                                    <p class='price'> &#x9f3; $pro_price </p>
                                
                                </div>
                            
                            </div>
                        
                        </div>
                       
                       ";
                       
                   }
                   
                   ?>
                   
               </div><!-- #row same-heigh-row Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>
