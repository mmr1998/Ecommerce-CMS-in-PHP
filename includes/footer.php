<?php 
include("db.php");
?>
<div id="footer"> <!-- footer begain -->
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<h4>Pages</h4>
				<ul>
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="shop.php">Shop</a></li>
					<li><a href="Contact.php">Contact Us</a></li>
					<li>
					
					<?php 
								if(!isset($_SESSION['customer_email'])){
									echo "<a href='checkout.php'> My Account</a>";
								}else{									echo "<a href='customer/my_account.php?my_orders'> My Account</a>";
								}
								?>
					
					</li>
				</ul>
				<hr>
				<h4>User Section</h4>
				<ul>
					<?php 
					if(!isset($_SESSION['customer_email'])){
						echo "<a href='checkout.php'> Login</a>";
					}else{									
						echo "<a href='customer/my_account.php?my_orders'> My Account</a>";
					}
					?>
					<li>
						
						<?php 
						if(!isset($_SESSION['customer_email'])){
							echo "<a href='customer-register.php'> Register</a>";
						}else{									
							echo "<a href='customer/my_account.php?edit_account'> Edit Account</a>";
						}
						?>
						
					</li>
					<li><a href="terms.php">Terms and Conditions</a></li>
				</ul>
				<hr class="hidden-md hidden-lg hidden-sm">
			</div>
			<div class="col-sm-6 col-md-3">
				<h4>Top Products Categories</h4>
				<ul>
					<?php 
                        $get_p_cat = "SELECT * FROM products_categories";
                        $run_p_cat = mysqli_query($con,$get_p_cat);
                    
                        while($row_p_cats = mysqli_fetch_array($run_p_cat)){
                            $p_cat_id = $row_p_cats['p_cat_id']; 
                            $p_cat_title = $row_p_cats['p_cat_title']; 
                        
                            echo "
                                <li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>
                            ";
                            
                        }
                    ?>
				</ul>
				<hr class="hidden-md hidden-lg">
			</div>
			<div class="col-sm-6 col-md-3">
				<h4>Find Us:</h4>
				<p>
					<strong>Practicum Project</strong>
					<br/>Sector - 10, Uttara,
					<br/>Dhaka -1230, Bangladesh
					<br/>8801954947465
					<br/>mr.mmr1998@gmail.com
					<br/><a href="#">@MMR1998</a>					
				</p>
				<a href="Contact.php">Check our Contact Page</a>
				<hr class="hidden-md hidden-lg">
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Get The News</h4>
				<p class="text-muted">
					Don't miss our Update products. 
				</p>
				<form action="" method="post">
					<div class="input-group">
						<input type="text" class="form-control" name="email">
						<span class="input-group-btn">
							<input type="submit" value="Subscribe" class="btn btn-default">
						</span>
					</div>
				</form>
				<hr>
				<h4>Keep In Touch</h4>
				<p class="social">
					<a href="#" class="fa fa-facebook"></a>
					<a href="#" class="fa fa-twitter"></a>
					<a href="#" class="fa fa-instagram"></a>
					<a href="#" class="fa fa-envelope"></a>
					<a href="#" class="fa fa-google-plus"></a>
				</p>
			</div>
		</div>
	</div>
</div> <!-- footer finished -->

<div class="copyright">
	<div class="container">
		<div class="col-md-6">
			<p class="pull-left">&copy; Practicum Project of Summer-2020</p>
		</div>
		<div class="col-md-6">
			<p class="pull-right">&copy; Developed by MMR1998</p>
		</div>
	</div>
</div>