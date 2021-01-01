<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<?php 

	if(isset($_GET['edit_manufacturer'])){
		$edit_manufacturer_id = $_GET['edit_manufacturer'];
		$edit_manufacturer = "select * from manufacturers where manufacturer_id='$edit_manufacturer_id'";
		$run_edit_manufacturer = mysqli_query($con,$edit_manufacturer);
		$row_edit_manufacturer= mysqli_fetch_array($run_edit_manufacturer);
		$manufacturer_id = $row_edit_manufacturer['manufacturer_id'];
		$manufacturer_name = $row_edit_manufacturer['manufacturer_title'];
		$manufacturer_image = $row_edit_manufacturer['manufacturer_image'];
		$manufacturer_top = $row_edit_manufacturer['manufacturer_top'];
	}
	
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Manufacturer
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Edit Manufacturer				
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Manufacturer Title
						</label>
						<div class="col-md-6">
							<input name="manufacturer_name" type="text" class="form-control" value="<?php echo $manufacturer_name; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Manufacturer Image
						</label>
						<div class="col-md-6">
							<input type="file" name="manufacturer_image" class="form-control">
							<br>
							<img src="other_images/<?php echo $manufacturer_image; ?>" alt="<?php echo $manufacturer_name; ?>" class="img-responsive" width="70" height="70">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Is Manufacturer top?
						</label>
						<div class="col-md-6">
							<input name="manufacturer_top" type="radio" value="yes"
							<?php 
								if($manufacturer_top == 'yes'){
									echo "checked=''checked";
								}   
							?>
							>
							<label>Yes</label>
							<input name="manufacturer_top" type="radio" value="no"
							<?php 
								if($manufacturer_top == 'no'){
									echo "checked=''checked";
								}   
							?>
							>
							<label>No</label>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							
						</label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Update Now" class="btn btn-primary form-control">
						</div>
					</div>
				</form>				
			</div>
		</div>
	</div>
</div>



<?php 

if(isset($_POST['submit'])){
	$manufacturer_name = $_POST['manufacturer_name'];
	$manufacturer_top = $_POST['manufacturer_top'];
	
	if(is_uploaded_file($_FILES['manufacturer_image']['tmp_name'])){
		$manufacturer_image = $_FILES['manufacturer_image']['name'];
		$tmp_name = $_FILES['manufacturer_image']['tmp_name'];
		move_uploaded_file($tmp_name,"other_images/$manufacturer_image");
		$update_manufacturer = "update manufacturers set manufacturer_title='$manufacturer_name', manufacturer_image='$manufacturer_image', manufacturer_top='$manufacturer_top' where manufacturer_id='$manufacturer_id'";
		$run_update_manufacturer = mysqli_query($con,$update_manufacturer);
		if($run_update_manufacturer){
			echo "<script>alert('Your Manufacturer Has been Updated')</script>";
			echo "<script>window.open('index.php?view_manufacturers','_self')</script>";
		}
	}else{
		$update_manufacturer = "update manufacturers set manufacturer_title='$manufacturer_name', manufacturer_top='$manufacturer_top' where manufacturer_id='$manufacturer_id'";
		$run_update_manufacturer = mysqli_query($con,$update_manufacturer);
		if($run_update_manufacturer){
			echo "<script>alert('Your Manufacturer Has been Updated')</script>";
			echo "<script>window.open('index.php?view_manufacturers','_self')</script>";
		}
	}
	
	
}
	  
?>

<?php } ?>