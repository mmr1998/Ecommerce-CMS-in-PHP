<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<?php 
if(isset($_GET['update_stock'])){
	$update_stock_id = $_GET['update_stock'];
	$update_stock_query = "select * from products where product_id='$update_stock_id'";
	$run_update = mysqli_query($con,$update_stock_query);
	$row_update = mysqli_fetch_array($run_update);
	$pro_id = $row_update['product_id'];
	$pro_title = $row_update['product_title'];
	$pro_stock = $row_update['stock'];
}
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Update Stock / <?php echo $pro_title; ?>
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-houzz fa-fw"></i> Update Stock				
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Product Title
						</label>
						<div class="col-md-6">
							<input name="pro_title" type="text" class="form-control" value="<?php echo $pro_title; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Product in Stock
						</label>
						<div class="col-md-6">
							<input name="pro_stock" type="text" class="form-control" value="<?php echo $pro_stock; ?>">
						</div>
					</div><div class="form-group">
						<label for="" class="control-label col-md-3">
							Add more in stock
						</label>
						<div class="col-md-6">
							<input name="add_new" type="text" class="form-control" placeholder="Enter the unit number">
						</div>
					</div>
					
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						</label>
						<div class="col-md-6">
							<input value="Update Stock" name="submit" type="submit" class="form-control btn btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php 

if(isset($_POST['submit'])){
	$pro_stock = $_POST['pro_stock'];
	$add_new = $_POST['add_new'];
	$total_stock = $add_new + $pro_stock;
		$update_stock = "update products set stock='$total_stock' where product_id='$pro_id'";
		$run_update_stock = mysqli_query($con,$update_stock);
		if($run_update_stock){
			echo "<script>alert('Your Stock Has been Updated')</script>";
			echo "<script>window.open('index.php?view_stock','_self')</script>";
		}
	
	
	
}
	  
?>
<?php } ?>
