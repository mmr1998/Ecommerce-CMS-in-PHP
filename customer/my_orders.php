<center>
    <h1>My Orders</h1>
    <p class="lead">Your Orders on the place</p>
    <p class="text-muted">
        If you have any Questions, feel free to <a href="../contact.php">contact us</a>.Our Cistomer Service work <strong>24/7</strong>
    </p>
</center>
<hr>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Invoice No:</th>
                <th>Product:</th>
                <th>Amount:</th>
                <th>Qty:</th>
                <th>Size:</th>
                <th>Date:</th>
                <th>Status: </th>
                <th>Payment: </th>
            </tr>
        </thead>
        <tbody>
            <?php 
			$customer_session = $_SESSION['customer_email'];
			$get_customer = "select * from customers where customer_email='$customer_session'";
			$run_customer = mysqli_query($con,$get_customer);
			$row_customer = mysqli_fetch_array($run_customer);
			$customer_id = $row_customer['customer_id'];
			$get_orders = "select * from customer_orders where customer_id='$customer_id'";
			$run_orders = mysqli_query($con,$get_orders);
			$i = 0;
			while($row_orders = mysqli_fetch_array($run_orders)){
				$order_id = $row_orders['order_id'];
				$due_amount = $row_orders['due_amount'];
				$invoice_no = $row_orders['invoice_no'];
				$qty = $row_orders['qty'];
				$size = $row_orders['size'];
				$order_date = $row_orders['order_date'];
				$order_status = $row_orders['order_status'];
				$i++;
				
				if($order_status=='pending'){
					$href_con = 'enabled';
				}else{
					$href_con = 'disabled';
				}
				
			?>
            <tr>
                <th><?php echo $invoice_no; ?></th>
                
                <?php 
					$get_p_id = "select * from pending_orders where order_id='$order_id'";
					$run_p_id = mysqli_query($con,$get_p_id);
					$row_p_id = mysqli_fetch_array($run_p_id);
					$p_id = $row_p_id['product_id'];
					$get_p_title = "select * from products where product_id='$p_id'";
					$run_p_title = mysqli_query($con,$get_p_title);
					$row_p_title = mysqli_fetch_array($run_p_title);
					$p_title = $row_p_title['product_title'];
				?>
                
                <td> <?php echo $p_title; ?></td>
                <td>&#x9f3; <?php echo $due_amount; ?></td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $size; ?></td>
                <td><?php echo $order_date; ?></td>
                <td><?php echo $order_status; ?></td>
                <td>
                   	<?php 
						if($order_status=='shipped'){ ?>
							<a href="recieved.php?order_id=<?php echo $order_id; ?>" class="btn btn-warning custom-r btn-sm"> 
								<i class="fa fa-gift"></i> recieved?
							</a>
					
					
					<?php }elseif($order_status=='complete'){ ?>
							<a href="#" class="btn btn-default btn-sm <?php echo $href_con; ?>">
							<i class="fa fa-gift"></i> Completed
							</a>
					<?php	}else{ ?>
							<a href="confirm.php?order_id=<?php echo $order_id; ?>" class="btn btn-primary btn-sm <?php echo $href_con; ?>">Confirm Paid</a>
					<?php 	} ?>
                    
                </td>
            </tr>  
            <?php } ?>          
        </tbody>
    </table>
</div>