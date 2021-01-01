
<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>


<div class="row">
	<div col-lg-12>
		<h1 class="page-header">Dashboard</h1>
		
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard
			</li>
		</ol>		
	</div>
</div>


<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-tasks fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_products; ?></div>
						<div>Products</div>
						
					</div>
				</div>
			</div>
			<a href="index.php?view_products">
				<div class="panel-footer">
					<span class="pull-left">
						View Details 
					</span>
					<span class="pull-right"> 
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-users fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_customers; ?></div>
						<div>Customers</div>
						
					</div>
				</div>
			</div>
			<a href="index.php?view_customers">
				<div class="panel-footer">
					<span class="pull-left">
						View Details 
					</span>
					<span class="pull-right"> 
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-orange">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-tags fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_p_categories; ?></div>
						<div>Product Categories</div>
						
					</div>
				</div>
			</div>
			<a href="index.php?view_p_cats">
				<div class="panel-footer">
					<span class="pull-left">
						View Details 
					</span>
					<span class="pull-right"> 
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-shopping-cart fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_pending_orders; ?></div>
						<div>Orders</div>
						
					</div>
				</div>
			</div>
			<a href="index.php?view_orders">
				<div class="panel-footer">
					<span class="pull-left">
						View Details 
					</span>
					<span class="pull-right"> 
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> New Orders
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th> Order No: </th>
								<th> Customer Name: </th>
								<th> Invoice No: </th>
								<th> Product Name: </th>
								<th> Product Qty: </th>
								<th> Product Size: </th>
								<th> Status: </th>
							</tr>	
						</thead>
						<tbody>
							<?php 
								$i=0;
	  							$get_order = "select * from pending_orders order by 1 DESC LIMIT 0,5";
	  							$run_order = mysqli_query($con,$get_order);
	  							while($row_order=mysqli_fetch_array($run_order)){
									$order_id = $row_order['order_id'];
									$c_id = $row_order['customer_id'];
									$invoice_no = $row_order['invoice_no'];
									$product_id = $row_order['product_id'];
									$qty = $row_order['qty'];
									$size = $row_order['size'];
									$order_status = $row_order['order_status'];
									$i++;
								
							?>
							<tr>
								<td> <?php echo $i; ?></td>
								<td>
									<?php 
										$get_name = "select * from customers where customer_id='$c_id'";
										$run_name = mysqli_query($con,$get_name);
										$row_name = mysqli_fetch_array($run_name);
										$c_name = $row_name['customer_name'];
										
										if($c_name===null){
											echo "<b style='color:red;'>Customer deleted the account!</b>";
										}else{
											echo $c_name;
										}
									?>
								</td>
								<td> <?php echo $invoice_no; ?></td>
								<td> 
									<?php 
										$get_product = "select * from products where product_id='$product_id'";
										$run_product = mysqli_query($con,$get_product);
										$row_product = mysqli_fetch_array($run_product);
										$p_name = $row_product['product_title'];
										
										if($p_name===null){
											echo "<b style='color:red;'>Customer deleted the account!</b>";
										}else{
											echo $p_name;
										}
									?>
								</td>
								<td> <?php echo $qty; ?></td>
								<td> <?php echo $size; ?></td>
								<td> 
									<?php echo $order_status; ?>
								</td>
							</tr>
							<?php } ?>							
						</tbody>
					</table>
				</div>
				<div class="text-right">
					<a href="index.php?view_orders">
						View All Orders <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>


<?php } ?>