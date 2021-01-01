<center>
    <h1>Do you really want to Delete your Account ?</h1>
    <form action="" method="post">
        <input type="submit" name="Yes" value="Yes, I want to Delete" class="btn btn-danger">
        <input type="submit" name="No" value="No, I Don't want to Delete" class="btn btn-primary">
    </form>
</center>


<?php 

$c_email = $_SESSION['customer_email'];
if(isset($_POST['Yes'])){
	$delete_customer = "delete from customers where customer_email='$c_email'";
	$run_delete_customer = mysqli_query($con,$delete_customer);
	if($run_delete_customer){
		session_destroy();
		echo "<script>alert('Sucessfully delete your account, feel sorry for this! GOOD BYE')</script>";
		echo "<script>window.open('../index.php','_self')</script>";
	}
}
if(isset($_POST['No'])){
	echo "<script>window.open('my_account.php?my_orders','_self')</script>";
}

?>