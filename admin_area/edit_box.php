<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<?php 
if(isset($_GET['edit_box'])){
	$edit_box_id = $_GET['edit_box'];
	$edit_box_query = "select * from boxes_section where box_id='$edit_box_id'";
	$run_edit = mysqli_query($con,$edit_box_query);
	$row_edit = mysqli_fetch_array($run_edit);
	$box_id = $row_edit['box_id'];
	$box_title = $row_edit['box_title'];
	$box_desc = $row_edit['box_desc'];
}
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Box / <?php echo $box_title; ?>
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Edit Box				
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							 Box Title
						</label>
						<div class="col-md-6">
							<input name="box_title" type="text" class="form-control" value="<?php echo $box_title; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							 Box Description
						</label>
						<div class="col-md-6">
							<textarea type="text" name="box_desc" id="" cols="30" rows="10" class="form-control">
								<?php echo $box_desc; ?>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							
						</label>
						<div class="col-md-6">
							<input value="Update Box Data" name="update" type="submit" class="form-control btn btn-primary">
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

if(isset($_POST['update'])){
	$box_title = $_POST['box_title'];
	$box_desc = $_POST['box_desc'];
	$update_box = "update boxes_section set box_title='$box_title', box_desc='$box_desc' where box_id='$box_id'";
	$run_box = mysqli_query($con,$update_box);
	if($run_box){
		echo "<script>alert('Your Box Has been Updated')</script>";
		echo "<script>window.open('index.php?view_boxes','_self')</script>";
	}
	
}
	  
?>
<?php } ?>
