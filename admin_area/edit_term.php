<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<?php 
if(isset($_GET['edit_term'])){
	$edit_term_id = $_GET['edit_term'];
	$edit_term_query = "select * from terms where term_id='$edit_term_id'";
	$run_edit = mysqli_query($con,$edit_term_query);
	$row_edit = mysqli_fetch_array($run_edit);
	$term_id = $row_edit['term_id'];
	$term_title = $row_edit['term_title'];
	$term_desc = $row_edit['term_desc'];
	$term_link = $row_edit['term_link'];
}
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Term / <?php echo $term_title; ?>
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Edit Term				
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							 Term Title
						</label>
						<div class="col-md-6">
							<input name="term_title" type="text" class="form-control" value="<?php echo $term_title; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							 Term Link
						</label>
						<div class="col-md-6">
							<input name="term_link" type="text" class="form-control" value="<?php echo $term_link; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							 Term Description
						</label>
						<div class="col-md-6">
							<textarea type="text" name="term_desc" id="" cols="30" rows="10" class="form-control">
								<?php echo $term_desc; ?>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							
						</label>
						<div class="col-md-6">
							<input value="Update Term Data" name="update" type="submit" class="form-control btn btn-primary">
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
	$term_title = $_POST['term_title'];
	$term_link = $_POST['term_link'];
	$term_desc = $_POST['term_desc'];
	$update_term = "update terms set term_title='$term_title',term_link='$term_link', term_desc='$term_desc' where term_id='$term_id'";
	$run_term = mysqli_query($con,$update_term);
	if($run_term){
		echo "<script>alert('Your Term Has been Updated')</script>";
		echo "<script>window.open('index.php?view_terms','_self')</script>";
	}
	
}
	  
?>
<?php } ?>
