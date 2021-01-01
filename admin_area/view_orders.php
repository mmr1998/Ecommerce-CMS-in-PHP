<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>


<div class="row">
	<div class="col-lg-12">
		<div class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / View Orders
			</li>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="col-lg-12 panel-heading">
				<div class="col-lg-6">
					<h3 class="panel-title">
						<i class="fa fa-users"></i> View Orders
					</h3>
				</div>
				<div class="col-lg-6 search">
					<div class="w3-bar w3-black">
					  <button class="w3-bar-item w3-button" onclick="openCity('all')">All</button>
					  <button class="w3-bar-item w3-button" onclick="openCity('pending')">Pending</button>
					  <button class="w3-bar-item w3-button" onclick="openCity('processing')">Processing</button>
					  <button class="w3-bar-item w3-button" onclick="openCity('confirmed')">Confirmed</button>
					  <button class="w3-bar-item w3-button" onclick="openCity('shipped')">Shipped</button>
					  <button class="w3-bar-item w3-button" onclick="openCity('complete')">Complete</button>
					</div>
				</div>
			</div>
			<div class="col-lg-12 panel-body">
				<div id="all" class="w3-container city">
  					<h2>All Orders</h2>
  					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th> No: </th>
									<th> Customer Name: </th>
									<th> Customer Email: </th>
									<th> Invoice No: </th>
									<th> Product Name: </th>
									<th> Product QTY: </th>
									<th> Product Size: </th>
									<th> Order Date: </th>
									<th> Total Ammount: </th>
									<th> Order Status: </th>
									<th> Delete: </th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=0;
								$get_orders = "select * from pending_orders";
								$run_orders = mysqli_query($con,$get_orders);
								while($row_orders=mysqli_fetch_array($run_orders)){
									$order_id = $row_orders['order_id'];
									$c_id = $row_orders['customer_id'];
									$invoice_no = $row_orders['invoice_no'];
									$pro_id = $row_orders['product_id'];
									$qty = $row_orders['qty'];
									$size = $row_orders['size'];
									$status = $row_orders['order_status'];
									$get_c_orders = "select * from customer_orders where order_id='$order_id'";
									$run_c_order = mysqli_query($con,$get_c_orders);
									$row_c_order = mysqli_fetch_array($run_c_order);
									$order_date = $row_c_order['order_date'];
									$order_amount = $row_c_order['due_amount'];
									$i++;

								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td>
										<?php 
											$get_customer = "select * from customers where customer_id='$c_id'";
											$run_customer = mysqli_query($con,$get_customer);
											$row_customer = mysqli_fetch_array($run_customer);
											$customer_name = $row_customer['customer_name'];
											$customer_email = $row_customer['customer_email'];
											echo $customer_name;
										?>
									</td>
									<td><?php echo $customer_email; ?></td>
									<td><?php echo $invoice_no; ?></td>
									<td>
										<?php 
											$get_pro = "select * from products where product_id='$pro_id'";
											$run_pro = mysqli_query($con,$get_pro);
											$row_pro = mysqli_fetch_array($run_pro);
											$pro_title = $row_pro['product_title'];
											echo $pro_title;
										?>
									</td>
									<td><?php echo $qty; ?></td>
									<td><?php echo $size; ?></td>
									<td> <?php echo $order_date; ?></td>
									<td><?php echo $order_amount; ?></td>
									<td><?php echo $status; ?></td>
									<td>
										<?php 
											if($status=='confirmed'){ ?>
												<a class="btn btn-success" href="index.php?update_order=<?php echo $order_id; ?>">
													<i class="fa fa-paper-plane"></i> Send
												</a>
											<?php }else{ ?>
												<a class="btn btn-primary" href="index.php?update_order=<?php echo $order_id; ?>">
													<i class="fa fa-pencil"></i> Update
												</a>
											<?php } ?>

										
										<a class="btn btn-danger" href="index.php?delete_order=<?php echo $order_id; ?>">
											<i class="fa fa-trash-o"></i> Delete
										</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div id="pending" class="w3-container city" style="display:none">
				  <h2>Pending Orders</h2>
				  <div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th> No: </th>
									<th> Customer Name: </th>
									<th> Customer Email: </th>
									<th> Invoice No: </th>
									<th> Product Name: </th>
									<th> Product QTY: </th>
									<th> Product Size: </th>
									<th> Order Date: </th>
									<th> Total Ammount: </th>
									<th> Order Status: </th>
									<th> Delete: </th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=0;
								$get_orders = "select * from pending_orders where order_status='pending'";
								$run_orders = mysqli_query($con,$get_orders);
								while($row_orders=mysqli_fetch_array($run_orders)){
									$order_id = $row_orders['order_id'];
									$c_id = $row_orders['customer_id'];
									$invoice_no = $row_orders['invoice_no'];
									$pro_id = $row_orders['product_id'];
									$qty = $row_orders['qty'];
									$size = $row_orders['size'];
									$status = $row_orders['order_status'];
									$get_c_orders = "select * from customer_orders where order_id='$order_id'";
									$run_c_order = mysqli_query($con,$get_c_orders);
									$row_c_order = mysqli_fetch_array($run_c_order);
									$order_date = $row_c_order['order_date'];
									$order_amount = $row_c_order['due_amount'];
									$i++;

								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td>
										<?php 
											$get_customer = "select * from customers where customer_id='$c_id'";
											$run_customer = mysqli_query($con,$get_customer);
											$row_customer = mysqli_fetch_array($run_customer);
											$customer_name = $row_customer['customer_name'];
											$customer_email = $row_customer['customer_email'];
											echo $customer_name;
										?>
									</td>
									<td><?php echo $customer_email; ?></td>
									<td><?php echo $invoice_no; ?></td>
									<td>
										<?php 
											$get_pro = "select * from products where product_id='$pro_id'";
											$run_pro = mysqli_query($con,$get_pro);
											$row_pro = mysqli_fetch_array($run_pro);
											$pro_title = $row_pro['product_title'];
											echo $pro_title;
										?>
									</td>
									<td><?php echo $qty; ?></td>
									<td><?php echo $size; ?></td>
									<td> <?php echo $order_date; ?></td>
									<td><?php echo $order_amount; ?></td>
									<td><?php echo $status; ?></td>
									<td>
										<?php 
											if($status=='confirmed'){ ?>
												<a class="btn btn-success" href="index.php?update_order=<?php echo $order_id; ?>">
													<i class="fa fa-pencil"></i> Send
												</a>
											<?php }else{ ?>
												<a class="btn btn-primary" href="index.php?update_order=<?php echo $order_id; ?>">
													<i class="fa fa-pencil"></i> Update
												</a>
											<?php } ?>

										
										<a class="btn btn-danger" href="index.php?delete_order=<?php echo $order_id; ?>">
											<i class="fa fa-trash-o"></i> Delete
										</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div id="processing" class="w3-container city" style="display:none">
				  <h2>Processing Orders</h2>
				  <div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th> No: </th>
									<th> Customer Name: </th>
									<th> Customer Email: </th>
									<th> Invoice No: </th>
									<th> Product Name: </th>
									<th> Product QTY: </th>
									<th> Product Size: </th>
									<th> Order Date: </th>
									<th> Total Ammount: </th>
									<th> Order Status: </th>
									<th> Delete: </th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=0;
								$get_orders = "select * from pending_orders where order_status='processing'";
								$run_orders = mysqli_query($con,$get_orders);
								while($row_orders=mysqli_fetch_array($run_orders)){
									$order_id = $row_orders['order_id'];
									$c_id = $row_orders['customer_id'];
									$invoice_no = $row_orders['invoice_no'];
									$pro_id = $row_orders['product_id'];
									$qty = $row_orders['qty'];
									$size = $row_orders['size'];
									$status = $row_orders['order_status'];
									$get_c_orders = "select * from customer_orders where order_id='$order_id'";
									$run_c_order = mysqli_query($con,$get_c_orders);
									$row_c_order = mysqli_fetch_array($run_c_order);
									$order_date = $row_c_order['order_date'];
									$order_amount = $row_c_order['due_amount'];
									$i++;

								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td>
										<?php 
											$get_customer = "select * from customers where customer_id='$c_id'";
											$run_customer = mysqli_query($con,$get_customer);
											$row_customer = mysqli_fetch_array($run_customer);
											$customer_name = $row_customer['customer_name'];
											$customer_email = $row_customer['customer_email'];
											echo $customer_name;
										?>
									</td>
									<td><?php echo $customer_email; ?></td>
									<td><?php echo $invoice_no; ?></td>
									<td>
										<?php 
											$get_pro = "select * from products where product_id='$pro_id'";
											$run_pro = mysqli_query($con,$get_pro);
											$row_pro = mysqli_fetch_array($run_pro);
											$pro_title = $row_pro['product_title'];
											echo $pro_title;
										?>
									</td>
									<td><?php echo $qty; ?></td>
									<td><?php echo $size; ?></td>
									<td> <?php echo $order_date; ?></td>
									<td><?php echo $order_amount; ?></td>
									<td><?php echo $status; ?></td>
									<td>
										<?php 
											if($status=='confirmed'){ ?>
												<a class="btn btn-success" href="index.php?update_order=<?php echo $order_id; ?>">
													<i class="fa fa-pencil"></i> Send
												</a>
											<?php }else{ ?>
												<a class="btn btn-primary" href="index.php?update_order=<?php echo $order_id; ?>">
													<i class="fa fa-pencil"></i> Update
												</a>
											<?php } ?>

										
										<a class="btn btn-danger" href="index.php?delete_order=<?php echo $order_id; ?>">
											<i class="fa fa-trash-o"></i> Delete
										</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div id="confirmed" class="w3-container city" style="display:none">
				  <h2>Confirmed Orders</h2>
				  <div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th> No: </th>
									<th> Customer Name: </th>
									<th> Customer Email: </th>
									<th> Invoice No: </th>
									<th> Product Name: </th>
									<th> Product QTY: </th>
									<th> Product Size: </th>
									<th> Order Date: </th>
									<th> Total Ammount: </th>
									<th> Order Status: </th>
									<th> Delete: </th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=0;
								$get_orders = "select * from pending_orders where order_status='confirmed'";
								$run_orders = mysqli_query($con,$get_orders);
								while($row_orders=mysqli_fetch_array($run_orders)){
									$order_id = $row_orders['order_id'];
									$c_id = $row_orders['customer_id'];
									$invoice_no = $row_orders['invoice_no'];
									$pro_id = $row_orders['product_id'];
									$qty = $row_orders['qty'];
									$size = $row_orders['size'];
									$status = $row_orders['order_status'];
									$get_c_orders = "select * from customer_orders where order_id='$order_id'";
									$run_c_order = mysqli_query($con,$get_c_orders);
									$row_c_order = mysqli_fetch_array($run_c_order);
									$order_date = $row_c_order['order_date'];
									$order_amount = $row_c_order['due_amount'];
									$i++;

								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td>
										<?php 
											$get_customer = "select * from customers where customer_id='$c_id'";
											$run_customer = mysqli_query($con,$get_customer);
											$row_customer = mysqli_fetch_array($run_customer);
											$customer_name = $row_customer['customer_name'];
											$customer_email = $row_customer['customer_email'];
											echo $customer_name;
										?>
									</td>
									<td><?php echo $customer_email; ?></td>
									<td><?php echo $invoice_no; ?></td>
									<td>
										<?php 
											$get_pro = "select * from products where product_id='$pro_id'";
											$run_pro = mysqli_query($con,$get_pro);
											$row_pro = mysqli_fetch_array($run_pro);
											$pro_title = $row_pro['product_title'];
											echo $pro_title;
										?>
									</td>
									<td><?php echo $qty; ?></td>
									<td><?php echo $size; ?></td>
									<td> <?php echo $order_date; ?></td>
									<td><?php echo $order_amount; ?></td>
									<td><?php echo $status; ?></td>
									<td>
										<?php 
											if($status=='confirmed'){ ?>
												<a class="btn btn-success" href="index.php?update_order=<?php echo $order_id; ?>">
													<i class="fa fa-paper-plane"></i> Send
												</a>
											<?php }else{ ?>
												<a class="btn btn-primary" href="index.php?update_order=<?php echo $order_id; ?>">
													<i class="fa fa-pencil"></i> Update
												</a>
											<?php } ?>

										
										<a class="btn btn-danger" href="index.php?delete_order=<?php echo $order_id; ?>">
											<i class="fa fa-trash-o"></i> Delete
										</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div id="shipped" class="w3-container city" style="display:none">
				  <h2>Shipped Orders</h2>
				  <div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th> No: </th>
									<th> Customer Name: </th>
									<th> Customer Email: </th>
									<th> Invoice No: </th>
									<th> Product Name: </th>
									<th> Product QTY: </th>
									<th> Product Size: </th>
									<th> Order Date: </th>
									<th> Total Ammount: </th>
									<th> Order Status: </th>
									<th> Delete: </th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=0;
								$get_orders = "select * from pending_orders where order_status='shipped'";
								$run_orders = mysqli_query($con,$get_orders);
								while($row_orders=mysqli_fetch_array($run_orders)){
									$order_id = $row_orders['order_id'];
									$c_id = $row_orders['customer_id'];
									$invoice_no = $row_orders['invoice_no'];
									$pro_id = $row_orders['product_id'];
									$qty = $row_orders['qty'];
									$size = $row_orders['size'];
									$status = $row_orders['order_status'];
									$get_c_orders = "select * from customer_orders where order_id='$order_id'";
									$run_c_order = mysqli_query($con,$get_c_orders);
									$row_c_order = mysqli_fetch_array($run_c_order);
									$order_date = $row_c_order['order_date'];
									$order_amount = $row_c_order['due_amount'];
									$i++;

								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td>
										<?php 
											$get_customer = "select * from customers where customer_id='$c_id'";
											$run_customer = mysqli_query($con,$get_customer);
											$row_customer = mysqli_fetch_array($run_customer);
											$customer_name = $row_customer['customer_name'];
											$customer_email = $row_customer['customer_email'];
											echo $customer_name;
										?>
									</td>
									<td><?php echo $customer_email; ?></td>
									<td><?php echo $invoice_no; ?></td>
									<td>
										<?php 
											$get_pro = "select * from products where product_id='$pro_id'";
											$run_pro = mysqli_query($con,$get_pro);
											$row_pro = mysqli_fetch_array($run_pro);
											$pro_title = $row_pro['product_title'];
											echo $pro_title;
										?>
									</td>
									<td><?php echo $qty; ?></td>
									<td><?php echo $size; ?></td>
									<td> <?php echo $order_date; ?></td>
									<td><?php echo $order_amount; ?></td>
									<td><?php echo $status; ?></td>
									<td>
										<?php 
											if($status=='confirmed'){ ?>
												<a class="btn btn-success" href="index.php?update_order=<?php echo $order_id; ?>">
													<i class="fa fa-pencil"></i> Send
												</a>
											<?php }else{ ?>
												<a class="btn btn-primary" href="index.php?update_order=<?php echo $order_id; ?>">
													<i class="fa fa-pencil"></i> Update
												</a>
											<?php } ?>

										
										<a class="btn btn-danger" href="index.php?delete_order=<?php echo $order_id; ?>">
											<i class="fa fa-trash-o"></i> Delete
										</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div id="complete" class="w3-container city" style="display:none">
				  <h2>Complete Orders</h2>
				  <div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th> No: </th>
									<th> Customer Name: </th>
									<th> Customer Email: </th>
									<th> Invoice No: </th>
									<th> Product Name: </th>
									<th> Product QTY: </th>
									<th> Product Size: </th>
									<th> Order Date: </th>
									<th> Total Ammount: </th>
									<th> Order Status: </th>
									<th> Delete: </th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=0;
								$get_orders = "select * from pending_orders where order_status='complete'";
								$run_orders = mysqli_query($con,$get_orders);
								while($row_orders=mysqli_fetch_array($run_orders)){
									$order_id = $row_orders['order_id'];
									$c_id = $row_orders['customer_id'];
									$invoice_no = $row_orders['invoice_no'];
									$pro_id = $row_orders['product_id'];
									$qty = $row_orders['qty'];
									$size = $row_orders['size'];
									$status = $row_orders['order_status'];
									$get_c_orders = "select * from customer_orders where order_id='$order_id'";
									$run_c_order = mysqli_query($con,$get_c_orders);
									$row_c_order = mysqli_fetch_array($run_c_order);
									$order_date = $row_c_order['order_date'];
									$order_amount = $row_c_order['due_amount'];
									$i++;

								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td>
										<?php 
											$get_customer = "select * from customers where customer_id='$c_id'";
											$run_customer = mysqli_query($con,$get_customer);
											$row_customer = mysqli_fetch_array($run_customer);
											$customer_name = $row_customer['customer_name'];
											$customer_email = $row_customer['customer_email'];
											echo $customer_name;
										?>
									</td>
									<td><?php echo $customer_email; ?></td>
									<td><?php echo $invoice_no; ?></td>
									<td>
										<?php 
											$get_pro = "select * from products where product_id='$pro_id'";
											$run_pro = mysqli_query($con,$get_pro);
											$row_pro = mysqli_fetch_array($run_pro);
											$pro_title = $row_pro['product_title'];
											echo $pro_title;
										?>
									</td>
									<td><?php echo $qty; ?></td>
									<td><?php echo $size; ?></td>
									<td> <?php echo $order_date; ?></td>
									<td><?php echo $order_amount; ?></td>
									<td><?php echo $status; ?></td>
									<td>
										<?php 
											if($status=='confirmed'){ ?>
												<a class="btn btn-success" href="index.php?update_order=<?php echo $order_id; ?>">
													<i class="fa fa-pencil"></i> Send
												</a>
											<?php }else{ ?>
												<a class="btn btn-primary" href="index.php?update_order=<?php echo $order_id; ?>">
													<i class="fa fa-pencil"></i> Update
												</a>
											<?php } ?>

										
										<a class="btn btn-danger" href="index.php?delete_order=<?php echo $order_id; ?>">
											<i class="fa fa-trash-o"></i> Delete
										</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>


<?php } ?>