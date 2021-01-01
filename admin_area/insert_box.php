<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Insert Box
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-square fa-fw"></i> Insert Box				
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Box Title
						</label>
						<div class="col-md-6">
							<input name="box_title" type="text" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Box Description
						</label>
						<div class="col-md-6">
							<textarea type="text" name="box_desc" id="" cols="30" rows="10" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							
						</label>
						<div class="col-md-6">
							<input value="Submit Now" name="submit" type="submit" class="form-control btn btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>


<?php 

if(isset($_POST['submit'])){
	$box_title = $_POST['box_title'];
	$box_desc = $_POST['box_desc'];
	$insert_box = "insert into boxes_section (box_title, box_desc) values ('$box_title','$box_desc')";
	$run_box = mysqli_query($con,$insert_box);
	if($run_box){
		echo "<script>alert('Your new Category has ben inserted!')</script>";
		echo "<script>window.open('index.php?view_boxes','_self')</script>";
	}
}
	  
?>

<?php } ?>