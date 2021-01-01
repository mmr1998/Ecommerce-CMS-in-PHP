<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<?php 
if(isset($_GET['edit_cat'])){
	$edit_cat_id = $_GET['edit_cat'];
	$edit_cat_query = "select * from categories where cat_id='$edit_cat_id'";
	$run_edit = mysqli_query($con,$edit_cat_query);
	$row_edit = mysqli_fetch_array($run_edit);
	$cat_id = $row_edit['cat_id'];
	$cat_title = $row_edit['cat_title'];
	$cat_top = $row_edit['cat_top'];
	$cat_img = $row_edit['cat_image'];
}
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Category / <?php echo $cat_title; ?>
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Edit Category				
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Category Title
						</label>
						<div class="col-md-6">
							<input name="cat_title" type="text" class="form-control" value="<?php echo $cat_title; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Category Image
						</label>
						<div class="col-md-6">
							<input type="file" name="cat_image" class="form-control"> <br>
							<img src="other_images/<?php echo $cat_img; ?>" alt="<?php echo $cat_title; ?>" class="img-responsive" height="70" width="70">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Choose as Top Category
						</label>
						<div class="col-md-6">
							<input name="cat_top" type="radio" value="yes"
							<?php 
							if($cat_top == 'yes'){
								echo "checked='checked'";
							}	   
							?>
							>
							<label>Yes</label>
							<input name="cat_top" type="radio" value="no"
							<?php 
							if($cat_top == 'no'){
								echo "checked='checked'";
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
							<input value="Update Category" name="submit" type="submit" class="form-control btn btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php 

if(isset($_POST['submit'])){
	$cat_title = $_POST['cat_title'];
	$cat_top = $_POST['cat_top'];
	
	if(is_uploaded_file($_FILES['cat_image']['tmp_name'])){
		$cat_img = $_FILES['cat_image']['name'];
		$tmp_name = $_FILES['cat_image']['tmp_name'];
		move_uploaded_file($tmp_name,"other_images/$cat_img");
		$update_cat = "update categories set cat_title='$cat_title', cat_image='$cat_img', cat_top='$cat_top' where cat_id='$cat_id'";
		$run_update_cat = mysqli_query($con,$update_cat);
		if($run_update_cat){
			echo "<script>alert('Your Category  Has been Updated')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
		}
	}else{
		$update_cat = "update categories set cat_title='$cat_title', cat_top='$cat_top' where cat_id='$cat_id'";
		$run_update_cat = mysqli_query($con,$update_cat);
		if($run_update_cat){
			echo "<script>alert('Your Category  Has been Updated')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
		}
	}
	
	
}
	  
?>
<?php } ?>
