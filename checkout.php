<?php 
$active = 'my_account';
include("includes/header.php");
?>

		<div id="content"><!-- shop content begain-->
			<div class="container">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li>Register</li>
					</ul>
				</div>	
				<div class="col-md-12">
					<?php 
					if(!isset($_SESSION['customer_email'])){
						include("customer/customer_login.php");
					}else{
						include("payment_options.php");
					}
					?>
				</div>				
			</div>
		</div><!-- shop content finished-->

		<?php include("includes/footer.php") ?>

		<script type="text/javascript" src="js/jquery-331.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-337.min.js"></script>

	</body>
</html>
