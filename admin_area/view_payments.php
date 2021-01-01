<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>


<div class="row">
	<div class="col-lg-12">
		<div class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / View Payments
			</li>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="col-lg-12 panel-heading">
				<div class="col-lg-9">
					<h3 class="panel-title">
						<i class="fa fa-users"></i> View Payments
					</h3>
				</div>
				<div class="col-lg-3 search">
					<div class="w3-bar w3-black">
					  <button class="w3-bar-item w3-button" onclick="openCity('all')">All</button>					  
					  <button class="w3-bar-item w3-button" onclick="openCity('unapproved')">Unapproved</button>
					  <button class="w3-bar-item w3-button" onclick="openCity('approved')">Approved</button>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div id="all" class="w3-container city">
				  <h2>All Payments</h2>
				  <div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th> No: </th>
								<th> Invoice No: </th>
								<th> Amount Paid: </th>
								<th> Payment Method: </th>
								<th> Reference No: </th>
								<th> Number: </th>
								<th> Payment Date: </th>
								<th> Action: </th>
							</tr>
						</thead>
						<tbody>
							<?php 
	  						$i=0;
							$get_payments = "select * from payments order by payment_id DESC";
	  						$run_payments = mysqli_query($con,$get_payments);
	  						while($row_payments=mysqli_fetch_array($run_payments)){
								$payment_id = $row_payments['payment_id'];
								$order_id = $row_payments['order_id'];
								$invoice_no = $row_payments['invoice_no'];
								$amount = $row_payments['amount'];
								$payment_method = $row_payments['payment_mode'];
								$ref_id = $row_payments['ref_no'];
								$number = $row_payments['code'];
								$pay_date = $row_payments['payment_date'];
								
								$get_orders = "select * from pending_orders where order_id='$order_id'";
								$run_orders = mysqli_query($con,$get_orders);
								$row_orders = mysqli_fetch_array($run_orders);
								$status = $row_orders['order_status'];
								
								$i++;
							
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $invoice_no; ?></td>
								<td><?php echo $amount; ?></td>
								<td><?php echo $payment_method; ?></td>
								<td><?php echo $ref_id; ?></td>
								<td><?php echo $number; ?></td>
								<td><?php echo $pay_date; ?></td>
								<td>
								<?php  if($status=='processing'){ ?>
									<a class="btn btn-warning" href="index.php?accept_payment=<?php echo $payment_id; ?>">
										<i class="fa fa-trash-o"></i> Confirm
									</a>
									<?php }else{ ?>
										<a class="btn btn-warning disabled" href="index.php?accept_payment=<?php echo $payment_id; ?>">
										<i class="fa fa-trash-o"></i> Confirm
									</a>
									<?php } ?>
									<a class="btn btn-danger" href="index.php?delete_payment=<?php echo $payment_id; ?>">
										<i class="fa fa-trash-o"></i> Delete
									</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					</div>
				</div>
				<div id="unapproved" class="w3-container city" style="display:none">
				  <h2>Unapproved Payments</h2>
				  <div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th> No: </th>
								<th> Invoice No: </th>
								<th> Amount Paid: </th>
								<th> Payment Method: </th>
								<th> Reference No: </th>
								<th> Number: </th>
								<th> Payment Date: </th>
								<th> Action: </th>
							</tr>
						</thead>
						<tbody>
							<?php 
	  						$i=0;
							$get_payments = "select * from payments order by payment_id DESC";
	  						$run_payments = mysqli_query($con,$get_payments);
	  						while($row_payments=mysqli_fetch_array($run_payments)){
								$payment_id = $row_payments['payment_id'];
								$order_id = $row_payments['order_id'];
								$invoice_no = $row_payments['invoice_no'];
								$amount = $row_payments['amount'];
								$payment_method = $row_payments['payment_mode'];
								$ref_id = $row_payments['ref_no'];
								$number = $row_payments['code'];
								$pay_date = $row_payments['payment_date'];
								
								$get_orders = "select * from pending_orders where order_id='$order_id'";
								$run_orders = mysqli_query($con,$get_orders);
								$row_orders = mysqli_fetch_array($run_orders);
								$status = $row_orders['order_status'];
								
								$i++;
							
							?>
							<?php if($status==='processing'){ ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $invoice_no; ?></td>
								<td><?php echo $amount; ?></td>
								<td><?php echo $payment_method; ?></td>
								<td><?php echo $ref_id; ?></td>
								<td><?php echo $number; ?></td>
								<td><?php echo $pay_date; ?></td>
								<td>
								<?php  if($status=='processing'){ ?>
									<a class="btn btn-warning" href="index.php?accept_payment=<?php echo $payment_id; ?>">
										<i class="fa fa-trash-o"></i> Confirm
									</a>
									<?php }else{ ?>
										<a class="btn btn-warning disabled" href="index.php?accept_payment=<?php echo $payment_id; ?>">
										<i class="fa fa-trash-o"></i> Confirm
									</a>
									<?php } ?>
									<a class="btn btn-danger" href="index.php?delete_payment=<?php echo $payment_id; ?>">
										<i class="fa fa-trash-o"></i> Delete
									</a>
								</td>
							</tr>
							<?php }  ?>
							<?php }  ?>
						</tbody>
					</table>
					</div>
				</div>
				<div id="approved" class="w3-container city" style="display:none">
				  <h2>Approved Payments</h2>
				  <div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th> No: </th>
								<th> Invoice No: </th>
								<th> Amount Paid: </th>
								<th> Payment Method: </th>
								<th> Reference No: </th>
								<th> Number: </th>
								<th> Payment Date: </th>
								<th> Action: </th>
							</tr>
						</thead>
						<tbody>
							<?php 
	  						$i=0;
							$get_payments = "select * from payments order by payment_id DESC";
	  						$run_payments = mysqli_query($con,$get_payments);
	  						while($row_payments=mysqli_fetch_array($run_payments)){
								$payment_id = $row_payments['payment_id'];
								$order_id = $row_payments['order_id'];
								$invoice_no = $row_payments['invoice_no'];
								$amount = $row_payments['amount'];
								$payment_method = $row_payments['payment_mode'];
								$ref_id = $row_payments['ref_no'];
								$number = $row_payments['code'];
								$pay_date = $row_payments['payment_date'];
								
								$get_orders = "select * from pending_orders where order_id='$order_id'";
								$run_orders = mysqli_query($con,$get_orders);
								$row_orders = mysqli_fetch_array($run_orders);
								$status = $row_orders['order_status'];
								
								$i++;
							
							?>
							<?php if($status!='processing'){ ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $invoice_no; ?></td>
								<td><?php echo $amount; ?></td>
								<td><?php echo $payment_method; ?></td>
								<td><?php echo $ref_id; ?></td>
								<td><?php echo $number; ?></td>
								<td><?php echo $pay_date; ?></td>
								<td>
								<?php  if($status=='processing'){ ?>
									<a class="btn btn-warning" href="index.php?accept_payment=<?php echo $payment_id; ?>">
										<i class="fa fa-trash-o"></i> Confirm
									</a>
									<?php }else{ ?>
										<a class="btn btn-warning disabled" href="index.php?accept_payment=<?php echo $payment_id; ?>">
										<i class="fa fa-trash-o"></i> Confirm
									</a>
									<?php } ?>
									<a class="btn btn-danger" href="index.php?delete_payment=<?php echo $payment_id; ?>">
										<i class="fa fa-trash-o"></i> Delete
									</a>
								</td>
							</tr>
							<?php }  ?>
							<?php }  ?>
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