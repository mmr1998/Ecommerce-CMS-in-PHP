
<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>


<div class="row">
	<div col-lg-12>
		
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / Report
			</li>
		</ol>		
	</div>
</div>


<div class="row">
	
	<div class="col-lg-4 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-first-order  fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_pending_orders; ?></div>
						<div>Total Orders</div>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<?php 
		$t_qty = 0;
	  	$get_total = "select * from pending_orders";
		$run_total = mysqli_query($con,$get_total);
	  	while($row_total=mysqli_fetch_array($run_total)){
			$qty = $row_total['qty'];
			$t_qty += $qty;
		}
	  
	?>
	<div class="col-lg-4 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-shopping-cart fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $t_qty; ?></div>
						<div>Units Sold</div>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
	<?php 
		$total = 0;
	  	$get_total = "select * from customer_orders";
		$run_total = mysqli_query($con,$get_total);
	  	while($row_total=mysqli_fetch_array($run_total)){
			$row_price = $row_total['due_amount'];
			$total += $row_price;
		}
	  
	?>
	
	<div class="col-lg-4 col-md-6">
		<div class="panel panel-orange">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-money fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo "&#x9f3; " . $total; ?></div>
						<div>Total Sales</div>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Sales Summery
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th> Sales No </th>
								<th> Invoice No </th>
								<th> Sold Date </th>
								<th> Product Name </th>
								<th> Unit Price </th>
								<th> Quantity Solds </th>
								<th> Product Revenue </th>
							</tr>	
						</thead>
						<tbody>
							<?php 
	  							$total_amount = $t_qty = $i = 0;
	  							$get_order = "select * from pending_orders";
	  							$run_order = mysqli_query($con,$get_order);
	  							while($row_order=mysqli_fetch_array($run_order)){
									$order_id = $row_order['order_id'];
									$c_id = $row_order['customer_id'];
									$invoice_no = $row_order['invoice_no'];
									$product_id = $row_order['product_id'];
									$qty = $row_order['qty'];
									$t_qty += $qty;
									$size = $row_order['size'];
									$order_status = $row_order['order_status'];
									$i++;
								
							?>
							<tr>
								<td> <?php echo $i; ?></td>	
								<td> <a target="_blank" href="index.php?order_details=<?php echo $order_id; ?>"> <?php echo $invoice_no; ?></a></td>	
								<td> 
									<?php 
										$get_product = "select * from customer_orders where order_id='$order_id'";
										$run_product = mysqli_query($con,$get_product);
										$row_product = mysqli_fetch_array($run_product);
										$o_date = $row_product['order_date'];										
										echo $o_date;
									?>
								</td>							
								<td> 
									<?php 
										$get_product = "select * from products where product_id='$product_id'";
										$run_product = mysqli_query($con,$get_product);
										$row_product = mysqli_fetch_array($run_product);
										$p_name = $row_product['product_title'];
										echo $p_name;
									?>
								</td>
								<td> 
									<?php 
										$get_product = "select * from products where product_id='$product_id'";
										$run_product = mysqli_query($con,$get_product);
										$row_product = mysqli_fetch_array($run_product);
										$p_price = $row_product['product_price'];
										echo "&#x9f3; " . $p_price;
									?>
								</td>
								<td> <?php echo $qty; ?></td>
								<td> <?php 
										$get_product = "select * from customer_orders where order_id='$order_id'";
										$run_product = mysqli_query($con,$get_product);
										$row_product = mysqli_fetch_array($run_product);
										$o_due = $row_product['due_amount'];	
										$total_amount += $o_due;
										echo "&#x9f3; " . $o_due;
									?>
								</td>
							</tr>
							<?php } ?>	
							
													
						</tbody>
						<tfoot>
								<tr>
									<td colspan="5"><b>Total</b></td>
									<td><b><?php echo $t_qty; ?></b></td>
									<td><b><?php echo "&#x9f3; " . $total_amount; ?></b></td>
								</tr>
							</tfoot>
					</table>
				</div>				
			</div>
		</div>
	</div>
</div>


<?php } ?>