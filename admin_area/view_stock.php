<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>


<div class="row">
	<div class="col-lg-12">
		<div class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / View Stock
			</li>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-houzz"></i> View Stock
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th> Product No: </th>
								<th> Product Image: </th>
								<th> Product Title: </th>
								<th> Product in Stock: </th>
								<th> Action: </th>
							</tr>
						</thead>
						<tbody>
							<?php 
	  						$i=0;
							$get_products = "select * from products";
	  						$run_products = mysqli_query($con,$get_products);
	  						while($row_products=mysqli_fetch_array($run_products)){
								$product_id = $row_products['product_id'];
								$product_title = $row_products['product_title'];
								$product_stock = $row_products['stock'];
								$product_img = $row_products['product_img1'];								
								$i++;
							
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td> <img src="product_images/<?php echo $product_img; ?>" alt="Product image" class="img-responsive" width="60" height="60"> </td>
								<td><?php echo $product_title; ?></td>
								<td><?php echo $product_stock; ?></td>								
								<td>
									<a class="btn btn-info" href="index.php?update_stock=<?php echo $product_id; ?>">
										<i class="fa fa-pencil"></i> Update
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


<?php } ?>