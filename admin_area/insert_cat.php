<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Insert Category
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Insert Category				
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Category Title
						</label>
						<div class="col-md-6">
							<input name="cat_title" type="text" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Category Image
						</label>
						<div class="col-md-6">
							<input type="file" name="categoty_image" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Choose as Top Category
						</label>
						<div class="col-md-6">
							<input name="category_top" type="radio" value="yes">
							<label>Yes</label>
							<input name="category_top" type="radio" value="no">
							<label>No</label>
						</div>
					</div>
					
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						</label>
						<div class="col-md-6">
							<input value="Insert Category" name="submit" type="submit" class="form-control btn btn-primary">
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
	$cat_top = $_POST['category_top'];
	$cat_img = $_FILES['categoty_image']['name'];
	$tmp_name = $_FILES['categoty_image']['tmp_name'];
	move_uploaded_file($tmp_name,"other_images/$cat_img");
	$insert_cat = "insert into categories (cat_title, cat_top, cat_image) values ('$cat_title','$cat_top','$cat_img')";
	$run_cat = mysqli_query($con,$insert_cat);
	if($run_cat){
		echo "<script>alert('Your new Category has ben inserted!')</script>";
		echo "<script>window.open('index.php?view_cats','_self')</script>";
	}
}
	  
?>

<?php } ?>