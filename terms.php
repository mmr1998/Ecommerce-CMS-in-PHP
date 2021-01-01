<?php 
$active = '';
include("includes/header.php");
?>

		<div id="content"><!-- shop content begain-->
			<div class="container">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li>Terms & Conditions</li>
					</ul>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-3">
							<div class="box">
								<ul class="nav nav-pills nav-stacked">
									<?php 
									$get_term = "select * from terms limit 0,1";
									$run_terms = mysqli_query($con,$get_term);
									while($row_terms=mysqli_fetch_array($run_terms)){
										$term_title = $row_terms['term_title'];
										$term_link = $row_terms['term_link'];
									
									?>
									<li class="active"><a data-toggle="pill" href="#<?php echo $term_link; ?>"><?php echo $term_title; ?></a></li>
									<?php } ?>
									
									<?php 
									$count_terms = "select * from terms";
									$run_count_terms = mysqli_query($con, $count_terms);
									$count = mysqli_num_rows($run_count_terms);
									$get_terms = "select * from terms limit 1, $count";
									$run_terms = mysqli_query($con,$get_terms);
									while($row_terms=mysqli_fetch_array($run_terms)){
										$term_title = $row_terms['term_title'];
										$term_link = $row_terms['term_link'];
									
									?>
									<li>
										<a data-toggle="pill" href="#<?php echo $term_link; ?>" >
										<?php echo $term_title; ?>
										</a>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<div class="col-md-9">
							<div class="box">
								<div class="tab-content">
									<?php 
									$get_terms = "select * from terms limit 0,1";
									$run_terms = mysqli_query($con,$get_terms);
									
									while($row_terms=mysqli_fetch_array($run_terms)){
										$term_title = $row_terms['term_title'];
										$term_desc = $row_terms['term_desc'];
										$term_link = $row_terms['term_link'];
									
									?>
									<div id="<?php echo $term_link; ?>" class="tab-pane fade in active">
										<h1 class="tabTitle"><?php echo $term_title; ?></h1>
										<p class="tabDesc">
											<?php echo $term_desc; ?>
										</p>
									</div>
									<?php } ?>
									
									<?php 
									$count_terms = "select * from terms";
									$run_count_terms = mysqli_query($con, $count_terms);
									$count = mysqli_num_rows($run_count_terms);
									$get_terms = "select * from terms limit 1, $count";
									$run_terms = mysqli_query($con,$get_terms);
									while($row_terms=mysqli_fetch_array($run_terms)){
										$term_title = $row_terms['term_title'];
										$term_link = $row_terms['term_link'];
										$term_desc = $row_terms['term_desc'];
									
									?>
									<div id="<?php echo $term_link; ?>" class="tab-pane fade in ">
										<h1 class="tabTitle"><?php echo $term_title; ?></h1>
										<p class="tabDesc">
											<?php echo $term_desc; ?>
										</p>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<?php include("includes/footer.php") ?>

		<script type="text/javascript" src="js/jquery-331.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-337.min.js"></script>

	</body>
</html>
