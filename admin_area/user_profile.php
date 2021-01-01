<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>
 
<?php 
if(isset($_GET['user_profile'])){
	$edit_user = $_GET['user_profile'];
	$get_user = "select * from admins where admin_id='$edit_user'";
	$run_user = mysqli_query($con,$get_user);
	$row_user = mysqli_fetch_array($run_user);
	$user_id = $row_user['admin_id'];
	$user_name = $row_user['admin_name'];
	$user_email = $row_user['admin_email'];
	$user_pass = $row_user['admin_pass'];
	$user_image = $row_user['admin_image'];
	$user_country = $row_user['admin_country'];
	$user_about = $row_user['admin_about'];
	$user_contact = $row_user['admin_contact'];
	$user_job = $row_user['admin_job'];
}
?>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Edit User
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-user fa-fw"></i> Edit User
                    </h3>
                </div>
                <div class="panel-body">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">User Name</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_name" class="form-control" required value="<?php echo $user_name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_email" class="form-control" required value="<?php echo $user_email; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Password</label>
                            <div class="col-md-6">
                               <input type="password" name="admin_pass" class="form-control" required value="<?php echo $user_pass; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Country </label>
                            <div class="col-md-6">
                                <input type="text" name="admin_country" class="form-control" required value="<?php echo $user_country; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Contact</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_contact" class="form-control" required value="<?php echo $user_contact; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Job</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_job" class="form-control" required value="<?php echo $user_job; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Image</label>
                            <div class="col-md-6">
                                <input type="file" name="admin_image" class="form-control" required>
                                <br>
                                <img src="admin_images/<?php echo $user_image; ?>" alt="User Image" class="img-responsive" width="100" height="100">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">About</label>
                            <div class="col-md-6">
                                <textarea name="admin_about" cols="30" rows="10" class="form-control"> <?php echo $user_about; ?></textarea>
                            </div>
                        </div>
                        
                       
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Update User" class="btn btn-primary form-control">
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
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];
    $admin_country = $_POST['admin_country'];
    $admin_contact = $_POST['admin_contact'];
    $admin_job = $_POST['admin_job'];
	$admin_about = $_POST['admin_about'];
    
    $admin_image = $_FILES['admin_image']['name'];
    $temp_name = $_FILES['admin_image']['tmp_name'];
    
    move_uploaded_file($temp_name,"admin_images/$admin_image");
    
    $update_user = "update admins set admin_name='$admin_name',admin_email='$admin_email',admin_pass='$admin_pass',admin_country='$admin_country',admin_contact='$admin_contact',admin_job='$admin_job',admin_about='$admin_about',admin_image='$admin_image' where admin_id='$user_id'";
    
    $run_user = mysqli_query($con,$update_user);
    if($run_user){
        echo "<script>alert('User has been updated Sucessfully')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
    }else{
        echo "<script>alert('Something Error Happening')</script>";
        echo "<script>window.open('insert_user.php','_self')</script>";
    }
}
?>


<?php } ?>