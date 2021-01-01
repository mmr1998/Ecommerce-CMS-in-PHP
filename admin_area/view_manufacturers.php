<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>


<div class="row">
	<div class="col-lg-12">
		<div class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / View Manufacturers
			</li>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-flags"></i> View Manufacturers
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th> No: </th>
								<th> Manufacturer Title: </th>
								<th> Manufacturer Top: </th>
								<th> Manufacturer Image: </th>
								<th> Action: </th>
							</tr>
						</thead>
						<tbody>
							<?php 
	  						$i=0;
							$get_manufacturer = "select * from manufacturers";
	  						$run_manufacturer = mysqli_query($con,$get_manufacturer);
	  						while($row_manufacturer=mysqli_fetch_array($run_manufacturer)){
								$manufacturer_id = $row_manufacturer['manufacturer_id'];
								$manufacturer_title = $row_manufacturer['manufacturer_title'];
								$manufacturer_top = $row_manufacturer['manufacturer_top'];
								$manufacturer_img = $row_manufacturer['manufacturer_image'];								
								$i++;
							
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $manufacturer_title; ?></td>
								<td><?php echo $manufacturer_top; ?></td>
								<td> <img src="other_images/<?php echo $manufacturer_img; ?>" alt="Manufacturer image" class="img-responsive" width="60" height="60"> </td>
								<td>
									<a class="btn btn-info" href="index.php?edit_manufacturer=<?php echo $manufacturer_id; ?>">
										<i class="fa fa-pencil"></i> Edit
									</a>
									<a class="btn btn-danger" href="index.php?delete_manufacturer=<?php echo $manufacturer_id; ?>">
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


<?php } ?>