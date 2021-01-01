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
	$complete = "complete";							
	$update_customer_order = "update customer_orders set order_status='$complete' where order_id='$order_id'";
	$run_customer_order = mysqli_query($con,$update_customer_order);
	$update_pending_order = "update pending_orders set order_status='$complete' where order_id='$order_id'";
	$run_pending_order = mysqli_query($con,$update_pending_order);
	if($run_pending_order){
		echo "<script>alert('We are happy that you recieved your product!')</script>";
		echo "<script>window.open('my_account.php?my_orders','_self')</script>";
	}
}
}
?>