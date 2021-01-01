<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<?php 
if(isset($_GET['edit_product'])){
	$edit_id = $_GET['edit_product'];
	$get_n = "select * from products where product_id='$edit_id'";
	$run_edit = mysqli_query($con,$get_n);
	$row_edit = mysqli_fetch_array($run_edit);
	$p_id = $row_edit['product_id'];
	$p_title = $row_edit['product_title'];
	$manufacturer = $row_edit['manufacturer_id'];
	$p_cat = $row_edit['p_cat_id'];
	$cat = $row_edit['cat_id'];
	$p_img1 = $row_edit['product_img1'];
	$p_img2 = $row_edit['product_img2'];
	$p_img3 = $row_edit['product_img3'];
	$p_price = $row_edit['product_price'];
	$p_keywords = $row_edit['product_keywirds'];
	$p_desc = $row_edit['product_desc'];
}
	$get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer'";
	$run_manufacturer = mysqli_query($con,$get_manufacturer);
	$row_manufacturer = mysqli_fetch_array($run_manufacturer);
	$manufacturer_title = $row_manufacturer['manufacturer_title'];
	
	$get_p_cat = "select * from products_categories where p_cat_id='$p_cat'";
	$run_p_cat = mysqli_query($con,$get_p_cat);
	$row_p_cat = mysqli_fetch_array($run_p_cat);
	$p_cat_title = $row_p_cat['p_cat_title'];
	
	$get_cat = "select * from categories where cat_id='$cat'";
	$run_cat = mysqli_query($con,$get_cat);
	$row_cat = mysqli_fetch_array($run_cat);
	$cat_title = $row_cat['cat_title'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Edit Product</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Product / <?php echo $p_title; ?>
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-pencil fa-fw"></i> Edit Product
                    </h3>
                </div>
                <div class="panel-body">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Title</label>
                            <div class="col-md-6">
                                <input type="text" name="product_title" class="form-control" required value="<?php echo $p_title; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Manufacturer</label>
                            <div class="col-md-6">
                                <select name="manufacturer" class="form-control" required>
                                    <option disabled value="select manufacturer">Select Manufacturer</option>
                                    <option value="<?php echo $manufacturer; ?>"><?php echo $manufacturer_title; ?></option>
                                    <?php 
                                        
                                    $get_manufacturer = "SELECT * FROM manufacturers";
                                    $run_manufacturer = mysqli_query($con,$get_manufacturer);
                                    
                                    while($row_manufacturer=mysqli_fetch_array($run_manufacturer)){
                                        
                                        $manufacturer_id = $row_manufacturer['manufacturer_id'];
                                        $manufacturer_title = $row_manufacturer['manufacturer_title'];
                                        echo "
                                            <option value='$manufacturer_id'>$manufacturer_title</option>
                                        ";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category</label>
                            <div class="col-md-6">
                                <select name="product_cat" class="form-control" required>
                                    <option disabled value="select product category">Select Product Category</option>
                                    <option value="<?php echo $p_cat; ?>"><?php echo $p_cat_title; ?></option>
                                    <?php 
                                        
                                    $get_p_cats = "SELECT * FROM products_categories";
                                    $run_p_cats = mysqli_query($con,$get_p_cats);
                                    
                                    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                        
                                        $p_cat_id = $row_p_cats['p_cat_id'];
                                        $p_cat_title = $row_p_cats['p_cat_title'];
                                        echo "
                                            <option value='$p_cat_id'>$p_cat_title</option>
                                        ";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Category</label>
                            <div class="col-md-6">
                                <select name="cat" class="form-control" required>
                                    <option disabled value="select category">Select Category</option>
                                    <option value="<?php echo $cat; ?>"><?php echo $cat_title; ?></option>
                                    <?php 
                                        
                                    $get_cat = "SELECT * FROM categories";
                                    $run_cat = mysqli_query($con,$get_cat);
                                    
                                    while($row_cat=mysqli_fetch_array($run_cat)){
                                        
                                        $cat_id = $row_cat['cat_id'];
                                        $cat_title = $row_cat['cat_title'];
                                        echo "
                                            <option value='$cat_id'>$cat_title</option>
                                        ";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product image 1</label>
                            <div class="col-md-6">
                                <input type="file" name="product_img1" class="form-control" > <br>
                                <img width="70" height="70" src="product_images/<?php echo $p_img1; ?>" alt="<?php echo $p_title; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product image 2</label>
                            <div class="col-md-6">
                                <input type="file" name="product_img2" class="form-control"><br>
                                <img width="70" height="70" src="product_images/<?php echo $p_img2; ?>" alt="<?php echo $p_title; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product image 3</label>
                            <div class="col-md-6">
                                <input type="file" name="product_img3" class="form-control"><br>
                                <img width="70" height="70" src="product_images/<?php echo $p_img3; ?>" alt="<?php echo $p_title; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Price</label>
                            <div class="col-md-6">
                                <input type="text" name="product_price" class="form-control" required value="<?php echo $p_price; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Keywords</label>
                            <div class="col-md-6">
                                <input type="text" name="product_keywords" class="form-control" required value="<?php echo $p_keywords; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Description</label>
                            <div class="col-md-6">
                                <textarea name="product_desc" cols="19" rows="6" class="form-control">
                                	<?php echo $p_desc; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="update" value="Update Product" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</body>
</html>



<?php 
if(isset($_POST['update'])){
    $product_title = $_POST['product_title'];
	$product_manufacturer = $_POST['manufacturer'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc']; 
	
	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		$product_img1 = $_FILES['product_img1']['name'];
		$product_img2 = $_FILES['product_img2']['name'];
		$product_img3 = $_FILES['product_img3']['name'];

		$temp_name1 = $_FILES['product_img1']['tmp_name'];
		$temp_name2 = $_FILES['product_img2']['tmp_name'];
		$temp_name3 = $_FILES['product_img3']['tmp_name'];

		move_uploaded_file($temp_name1,"product_images/$product_img1");
		move_uploaded_file($temp_name2,"product_images/$product_img2");
		move_uploaded_file($temp_name3,"product_images/$product_img3");

		$update_product = "update products set product_title='$product_title', manufacturer_id='$product_manufacturer', p_cat_id='$product_cat', cat_id='$cat', product_img1='$product_img1', product_img2='$product_img2', product_img3='$product_img3', product_price='$product_price', product_keywirds='$product_keywords', product_desc='$product_desc', date=NOW() where product_id='$p_id'";
		$run_product = mysqli_query($con,$update_product);
		if($run_product){
			echo "<script>alert('Your product has been updated Sucessfully!')</script>";
			echo "<script>window.open('index.php?view_products','_self')</script>";
		}
		
	}else{
		$update_product = "update products set product_title='$product_title', manufacturer_id='$product_manufacturer', p_cat_id='$product_cat', cat_id='$cat', product_price='$product_price', product_keywirds='$product_keywords', product_desc='$product_desc', date=NOW() where product_id='$p_id'";
		$run_product = mysqli_query($con,$update_product);
		if($run_product){
			echo "<script>alert('Your product has been updated Sucessfully!')</script>";
			echo "<script>window.open('index.php?view_products','_self')</script>";
		}
	}
    
    
}
?>


<?php } ?>