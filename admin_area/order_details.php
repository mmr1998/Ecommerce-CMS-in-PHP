<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<?php 
if(isset($_GET['order_details'])){
	$update_order_id = $_GET['order_details'];
	$get_orders = "select * from pending_orders where order_id='$update_order_id'";
	$run_orders = mysqli_query($con,$get_orders);
	$row_orders=mysqli_fetch_array($run_orders);
	$order_id = $row_orders['order_id'];
	$c_id = $row_orders['customer_id'];
	
	$get_customer = "select * from customers where customer_id='$c_id'";
	$run_customer = mysqli_query($con,$get_customer);
	$row_customer = mysqli_fetch_array($run_customer);
	$customer_name = $row_customer['customer_name'];
	$customer_email = $row_customer['customer_email'];
	$customer_contact = $row_customer['customer_contact'];
	$customer_address = $row_customer['customer_address'];
	$customer_city = $row_customer['customer_city'];
	$customer_country = $row_customer['customer_country'];
	
	$invoice_no = $row_orders['invoice_no'];
	$pro_id = $row_orders['product_id'];
	$qty = $row_orders['qty'];
	$size = $row_orders['size'];
	$status = $row_orders['order_status'];
	$get_c_orders = "select * from customer_orders where order_id='$update_order_id'";
	$run_c_order = mysqli_query($con,$get_c_orders);
	$row_c_order = mysqli_fetch_array($run_c_order);
	$order_date = $row_c_order['order_date'];
	$order_amount = $row_c_order['due_amount'];
}
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Order Details
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-houzz fa-fw"></i> Order Details				
				</h3>
			</div>
			<div class="panel-body">
				<div class="col-lg-2"></div>
				<div class="col-lg-8 table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<tr>
							<th>Customer Name</th>
							<td><?php echo $customer_name; ?></td>
						</tr>
						<tr>
							<th>Customer Email</th>
							<td><?php echo $customer_email; ?></td>
						</tr>
						<tr>
							<th>Customer Contact No</th>
							<td><?php echo $customer_contact; ?></td>
						</tr>
						<tr>
							<th>Customer Address</th>
							<td><?php echo $customer_address . ", " . $customer_city . ", " . $customer_country; ?></td>
						</tr>
						<tr>
							<th>Ordered Product</th>
							<td><?php 
								
									$get_pro = "select * from products where product_id='$pro_id'";
									$run_pro = mysqli_query($con,$get_pro);
									$row_pro = mysqli_fetch_array($run_pro);
									$pro_title = $row_pro['product_title'];
									echo $pro_title;
								
								?></td>
						</tr>
						<tr>
							<th>Invoice No</th>
							<td>
								<?php echo $invoice_no; ?></td>
						</tr>
						<tr>
							<th>Product Quantity</th>
							<td><?php echo $qty; ?></td>
						</tr>
						<tr>
							<th>Product Size</th>
							<td><?php echo $size; ?></td>
						</tr>
						<tr>
							<th>Order Status</th>
							<td><?php echo $status; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



<?php } ?>
