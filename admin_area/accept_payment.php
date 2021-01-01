<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<?php 
if(isset($_GET['accept_payment'])){
	$accept_payment_id = $_GET['accept_payment'];
	$get_o_id = "select * from payments where payment_id='$accept_payment_id'";
	$run_o_id = mysqli_query($con,$get_o_id);
	$row_o_id = mysqli_fetch_array($run_o_id);
	$o_id = $row_o_id['order_id'];
	$complete = "confirmed";
	$update_customer_order = "update customer_orders set order_status='$complete' where order_id='$o_id'";
	$run_customer_order = mysqli_query($con,$update_customer_order);
	$update_pending_order = "update pending_orders set order_status='$complete' where order_id='$o_id'";
	$run_pending_order = mysqli_query($con,$update_pending_order);
	if($run_pending_order){
		echo "<script>alert('Payment Has been Confirmed. please go view orders to shipping product')</script>";
		echo "<script>window.open('index.php?view_payments','_self')</script>";
	}
}
?>

<?php } ?>