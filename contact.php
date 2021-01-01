<?php 
$active = 'contact';
include("includes/header.php");
?>

		<div id="content"><!-- shop content begain-->
			<div class="container">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li>Contact Us</li>
					</ul>
				</div>
				<div class="col-md-12">
					<div class="box">
						<div class="box-header">
							<center>
								<h2>Feel free to Contact Us</h2>
								<p class="text-muted">
									If you have any Questions, feel free to contact us.Our Cistomer Service work <strong>24/7</strong>
								</p>
							</center>
							<form action="contact.php" method="post">
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" name="email" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Subject</label>
									<input type="text" name="subject" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Message</label>
									<textarea name="message" class="form-control"></textarea>
								</div>
								<div class="text-center">
									<button type="submit" name="submit" class="btn btn-primary">
									<i class="fa fa-user-md"></i> Send Message
									</button>
								</div>
							</form>
							<?php 
							if(isset($_POST['submit'])){
								
								$sender_name = $_POST['name'];
								$sender_email = $_POST['email'];
								$sender_subject = $_POST['subject'];
								$sender_message = $_POST['message'];
								
								$receiver_email = "mr.mmr1998@gmail.com";
								
								mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);
								
								$email = $_POST['email'];
								$subject = "Welcome to my website";
								$msg = "Thanks for sending us message. ASAP we will reply your message.";
								$from = "mr.mmr1998@gmail.com";
								mail($email,$subject,$msg,$from);
								echo "<h2>Your message has sent sucessfully</h2>";
								
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div><!-- shop content finished-->

		<?php include("includes/footer.php") ?>

		<script type="text/javascript" src="js/jquery-331.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-337.min.js"></script>

	</body>
</html>