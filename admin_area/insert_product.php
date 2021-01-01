<?php 

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Insert Product</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Insert Product  
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-pencil fa-fw"></i> Insert Product
                    </h3>
                </div>
                <div class="panel-body">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Title</label>
                            <div class="col-md-6">
                                <input type="text" name="product_title" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Manufacturer</label>
                            <div class="col-md-6">
                                <select name="manufacturer" class="form-control" required>
                                    <option value="select manufacturer">Select Manufacturer</option>
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
                                    <option>Select a product category </option>
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
                                    <option>Select a category </option>
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
                                <input type="file" name="product_img1" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product image 2</label>
                            <div class="col-md-6">
                                <input type="file" name="product_img2" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product image 3</label>
                            <div class="col-md-6">
                                <input type="file" name="product_img3" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Price</label>
                            <div class="col-md-6">
                                <input type="text" name="product_price" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product in Stock</label>
                            <div class="col-md-6">
                                <input type="text" name="product_stock" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Keywords</label>
                            <div class="col-md-6">
                                <input type="text" name="product_keywords" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Description</label>
                            <div class="col-md-6">
                                <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">
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
if(isset($_POST['submit'])){
	
	$product_title = $_POST['product_title'];
	$manufacturer = $_POST['manufacturer'];
	$product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $product_price = $_POST['product_price'];
    $product_stock = $_POST['product_stock'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];
    
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$product_img1");
    move_uploaded_file($temp_name2,"product_images/$product_img2");
    move_uploaded_file($temp_name3,"product_images/$product_img3");
	
    
    $insert_product = "insert into products (product_title,manufacturer_id,p_cat_id,cat_id,date,product_img1,product_img2,product_img3,product_price,stock,product_keywirds,product_desc) values ('$product_title','$manufacturer','$product_cat','$cat',NOW(),'$product_img1','$product_img2','$product_img3','$product_price','$product_stock','$product_keywords','$product_desc')";
    $run_product = mysqli_query($con,$insert_product);
    if($run_product){
        echo "<script>alert('Product has been inserted Sucessfully')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }else{
        echo "<script>alert('Something Error Happening')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}
?>


<?php } ?>