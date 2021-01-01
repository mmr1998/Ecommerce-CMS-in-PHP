<?php 
$active = 'cart';
include("includes/header.php");
?>

		<div id="content"><!-- shop content begain-->
			<div class="container">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li>Cart</li>
					</ul>
				</div>
				<div id="cart" class="col-md-9">
					<div class="box">
						<form action="cart.php" method="post" enctype="multipart/form-data">
							<h1>Shopping Cart</h1>
							<?php 
								$ip_ad = getRealIpUser();
								$select_cart = "select * from cart where ip_add='$ip_ad'";
								$run_cart = mysqli_query($con,$select_cart);
								$count_cart = mysqli_num_rows($run_cart);
							
							?>
							<p class="text-muted">You currently have <?php echo $count_cart; ?> item(s) in your cart</p>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th colspan="2">Product</th>
											<th>Quantity</th>
											<th>Unit Price</th>
											<th>Size</th>
											<th>Delete</th>
											<th colspan="2">Sub-Total</th>
										</tr>
									</thead>
									<tbody>
									
										<?php 
										$total = 0;
										while($row_cart = mysqli_fetch_array($run_cart)){						
											$pro_id = $row_cart['p_id'];
											$pro_size = $row_cart['size'];
											$pro_qty = $row_cart['qty'];
											
											$get_products = "select * from products where product_id='$pro_id'";
											$run_product = mysqli_query($con,$get_products);
											while($row_products=mysqli_fetch_array($run_product)){
												$product_title = $row_products['product_title'];
												$product_img1 = $row_products['product_img1'];
												$only_price = $row_products['product_price'];
												$sub_total = $row_products['product_price']*$pro_qty;
												$total += $sub_total;
											
										?>
									
										<tr>
											<td>
												<img src="admin_area/product_images/<?php echo $product_img1; ?>" alt="product image" class="img-responsive">
											</td>
											<td>
												<a href="details.php?pro_id=<?php echo $pro_id; ?>"><?php echo $product_title; ?></a>
											</td>
											<td><?php echo $pro_qty; ?></td>
											<td><?php echo "&#x9f3; " . $only_price; ?></td>
											<td><?php echo $pro_size; ?></td>
											<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
											<td><?php echo "&#x9f3; " . $sub_total; ?></td>
										</tr>
										
										<?php } } ?>
										
									</tbody>
									<tfoot>
										<tr>
											<th colspan="5">Total</th>
											<th colspan="2"><?php echo "&#x9f3; " . $total; ?></th>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="box-footer">
								<div class="pull-left">
									<a href="index.php" class="btn btn-default">
										<i class="fa fa-chevron-left"></i>  Continue Shopping
									</a>
								</div>
								<div class="pull-right">
									<button type="submit" name="update" value="Update Cart" class="btn btn-default">
										<i class="fa fa-refresh"></i> Update Cart
									</button>
									<a href="checkout.php" class="btn btn-primary"> Proceed Checkout <i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
						</form>
					</div>
					
					<?php
					function update_cart(){
						global $con;
						if(isset($_POST['update'])){
							foreach($_POST['remove'] as $remove_id){
								$delete_product = "delete from cart where p_id='$remove_id'";
								$run_delete = mysqli_query($con,$delete_product);
								if($run_delete){
									echo "<script>window.open('cart.php', '_self')</script>";
								}
							}
						}
					}
					
					echo @$up_cart = update_cart();
					
					?>
					
					<div id="row same-heigh-row">
						<div class="col-md-12 col-sm-12">
							<div class="box same-height headline">
								<h3>Products You Maybe Like</h3>
							</div>
						</div>
						
						<?php
						$get_products = "select * from products order by rand() LIMIT 0,3";
						$run_products = mysqli_query($con,$get_products);
						while($row_products=mysqli_fetch_array($run_products)){
							$pro_id = $row_products['product_id'];
							$pro_title = $row_products['product_title'];
							$pro_price = $row_products['product_price'];
							$pro_img1 = $row_products['product_img1'];
							
							echo "
						
						<div class='col-md-4 col-sm-6 center-responsive'>
							<div class='box product same-height'>
								<a href='details.php?pro_id=$pro_id'>
									<img src='admin_area/product_images/$pro_img1' alt='product 3' class='img-responsive'>
								</a>
								<div class='text'>
									<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
									<p class='price'>&#x9f3; $pro_price</p>
								</div>
							</div>
						</div>
						";
						}
						?>
					</div>
				</div>
				<div class="col-md-3">
					<div id="order-summery" class="box">
						<div class="box-header">
							<h3>Order Summery</h3>
						</div>
						<p class="text-muted">
							Shipping and Additional Costs are Calculated based on value you have entered
						</p>
						<div class="table-responsive">
							<table class="table">
								<tbody>
									<tr>
										<td>Order All Sub-total</td>
										<th><?php echo "&#x9f3; " . $total; ?></th>
									</tr>
									<tr>
										<td>Shipping and Handling</td>
										<th>&#x9f3; 0</th>
									</tr>
									<tr>
										<td>Tax </td>
										<th>&#x9f3; 0</th>
									</tr>
									<tr class="total">
										<td>Total</td>
										<td><?php echo "&#x9f3; " . $total; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!-- shop content finished-->

		<?php include("includes/footer.php") ?>

		<script type="text/javascript" src="js/jquery-331.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-337.min.js"></script>

	</body>
</html>