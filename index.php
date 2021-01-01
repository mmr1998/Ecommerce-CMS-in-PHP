
<?php 
$active = "home";
include("includes/header.php");

?>

		<div id="slider" class="container"><!-- slider section begain-->
			<div class="col-md-12">
				<div class="col-md-2 categories">
					<h4 class="cat-title">Products Categories</h4>
					<ul class="cat-list">
						<?php 
                        $get_p_cat = "SELECT * FROM products_categories LIMIT 0,5";
                        $run_p_cat = mysqli_query($con,$get_p_cat);
                    
                        while($row_p_cats = mysqli_fetch_array($run_p_cat)){
                            $p_cat_id = $row_p_cats['p_cat_id']; 
                            $p_cat_title = $row_p_cats['p_cat_title']; 
                        
                            echo "
                                <li><a href='shop.php?p_cat=$p_cat_id'><span class='glyphicon glyphicon-circle-arrow-right'></span> $p_cat_title</a></li>
                            ";
                            
                        }
                    ?>
					</ul>
				</div>
				<div class=" col-md-10 carousel slide" id="myCarousel" data-ride="carousel">
					<ol class="carousel-indicators">
						<li class="active" data-target="#myCarousel" data-slide-to="0"> </li>
						<li  data-target="#myCarousel" data-slide-to="1"> </li>
						<li  data-target="#myCarousel" data-slide-to="2"> </li>
						<li  data-target="#myCarousel" data-slide-to="3"> </li>
					</ol>
					<div class="carousel-inner">
						<?php 
                            $get_slides = "select * from slider LIMIT 0,1";
                            $run_slides = mysqli_query($con,$get_slides);
                            while($row_slides=mysqli_fetch_array($run_slides)){
                                $slide_name = $row_slides['slide_name'];
                                $slide_image = $row_slides['slide_image'];
								$slide_url = $row_slides['slide_url'];
                                echo " 
                                <div class='item active'>
								<a href='$slide_url'>
                                	<img src='admin_area/slides_images/$slide_image'>
								</a>
                                </div>
                                ";
                            }
                                $get_slides = "select * from slider LIMIT 1,3";
                            $run_slides = mysqli_query($con,$get_slides);
                            while($row_slides=mysqli_fetch_array($run_slides)){
                                $slide_name = $row_slides['slide_name'];
                                $slide_image = $row_slides['slide_image'];
								$slide_url = $row_slides['slide_url'];
                                echo " 
                                <div class='item'>
								<a href='$slide_url'>
                                	<img src='admin_area/slides_images/$slide_image'>
								</a>
                                </div>
                                ";
                            }
                        ?>
					</div>
					<a href="#myCarousel" class="left carousel-control" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a href="#myCarousel" class="right carousel-control" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div><!-- slider section finished-->

		<div id="advantages"> <!-- Advantage section begain -->
			<div class="container">
				<div class="same-height-row">
				
					<?php 
						$get_boxes = "select * from boxes_section";
						$run_boxes = mysqli_query($con,$get_boxes);
						while($row_boxes=mysqli_fetch_array($run_boxes)){
							$box_id = $row_boxes['box_id'];
							$box_title = $row_boxes['box_title'];
							$box_desc = $row_boxes['box_desc'];
						
					?>
				
					<div class="col-sm-4">
						<div class="box same-height">
							<div class="icon">
								<i class="fa fa-heart"></i>
							</div>
							<h3><a href="#"><?php echo $box_title; ?></a></h3>
							<p><?php echo $box_desc; ?></p>
						</div>
					</div>
				<?php } ?>
				</div>				
			</div>
		</div><!-- Advantage section finished -->

		<div id="hot"> <!-- #hot begain -->
			<div class="box">
				<div class="container">
					<div class="col-md-12">
						<h2>Our Latest Products</h2>
					</div>
				</div>
			</div>
		</div><!-- #hot begain -->

		<div id="content" class="container"> <!-- contents begain -->
			<div class="row">
				<?php 
                getPro();
                ?>
			</div>
			
		</div> <!-- contents finished -->

		<?php include("includes/footer.php") ?>

		<script type="text/javascript" src="js/jquery-331.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-337.min.js"></script>

	</body>
</html>