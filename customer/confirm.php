 <?php
$active = 'my_account';
session_start();

if(!isset($_SESSION['customer_email'])){
	echo "<script>window.open('../checkout.php','_self')</script>";
}else{

include("includes/db.php");
include("functions/functions.php");
	
if(isset($_GET['order_id'])){
	$order_id = $_GET['order_id'];
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
								}else{									
									echo "<a href='my_account.php?my_orders'> My Account</a>";
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

		<div id="content"><!-- shop content begain-->
			<div class="container">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="../index.php">Home</a></li>
						<li>My Account</li>
					</ul>
				</div>
				<div class="col-md-3">
					<?php include("includes/sidebar.php") ?>
				</div>
               <?php 
					$get_order_data = "select * from  customer_orders where order_id='$order_id'";
					$run_order_data = mysqli_query($con,$get_order_data);
					$row_order_data = mysqli_fetch_array($run_order_data);
					$invoice_no = $row_order_data['invoice_no'];
					$amount = $row_order_data['due_amount'];
				?>
                <div class="col-md-9">
                    <div class="box">
                        <h1 align="center">Please Confirm Your Payment</h1>
                        <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Invoice No: </label>
                                <input type="text" class="form-control" name="invoice_no" required value="<?php echo $invoice_no; ?>">
                                
                            </div>
                            <div class="form-group">
                                <label>Amount Sent: </label>
                                <input type="text" class="form-control" name="amount_sent" required value="<?php echo $amount; ?>">
                                
                            </div>
                            <div class="form-group">
                                <label>Select Payment Method: </label>
                                <select name="payment_mode" class="form-control">
                                    <option>Select Payment Mode</option>
                                    <option>Bkash</option>
                                    <option>Rocket</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Transaction / Reference ID: </label>
                                <input type="text" class="form-control" name="ref_no" required>
                                
                            </div>
                            <div class="form-group">
                                <label>Mobile No: </label>
                                <input type="text" class="form-control" name="code" required>
                                
                            </div>
                             <div class="form-group">
                                <label>Payment Date: </label>
                                <input type="date" class="form-control" name="date" required >
                                
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary btn-lg" name="confirm_payment">
                                    <i class="fa fa-user-md"></i> Confirm Payment
                                </button>
                            </div>
                        </form>
                        
                        <?php 
						if(isset($_POST['confirm_payment'])){
							$update_id = $_GET['update_id'];
							$invoice_no = $_POST['invoice_no'];
							$amount = $_POST['amount_sent'];
							$payment_mode = $_POST['payment_mode'];
							$ref_no = $_POST['ref_no'];
							$code = $_POST['code'];
							$payment_date = $_POST['date'];
							$complete = "processing";
							$insert_payment = "insert into payments (order_id, invoice_no, amount, payment_mode, ref_no, code, payment_date) values ('$update_id','$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
							$run_payment = mysqli_query($con,$insert_payment);
							$update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
							$run_customer_order = mysqli_query($con,$update_customer_order);
							$update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
							$run_pending_order = mysqli_query($con,$update_pending_order);
							if($run_pending_order){
								echo "<script>alert('Thank you for purchesing! your order will be shipped within 24 work hours!')</script>";
								echo "<script>window.open('my_account.php?my_orders','_self')</script>";
							}
						}
						?>
                        
                    </div>
                </div>

            </div>
		</div><!-- shop content finished-->

		<?php include("includes/footer.php") ?>

		<script type="text/javascript" src="js/jquery-331.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-337.min.js"></script>

	</body>
</html>
<?php } ?>