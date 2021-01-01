<?php 
    $db = mysqli_connect("localhost", "root", "", "project_ecom" );

function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}




function add_cart(){
    
    global $db;
    
    if(isset($_GET['add_cart'])){
        
        $ip_add = getRealIpUser();
        
        $p_id = $_GET['add_cart'];
        
        $product_qty = $_POST['product_qty'];
        
        $product_size = $_POST['product_size'];
		
		$p_stock = $_POST['stock'];
		
		$t_p_stock = $p_stock - $product_qty;
        
        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
        
        $run_check = mysqli_query($db,$check_product);
		
		
		
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }else{
            
			if($p_stock>=$product_qty){
				
				$query = "insert into cart (p_id,ip_add,qty,size) values ('$p_id','$ip_add','$product_qty','$product_size')";			
				$run_query = mysqli_query($db,$query);
			
				if($run_query){

					$update_p = "update products set stock='$t_p_stock' where product_id='$p_id'";
					$run_update = mysqli_query($db,$update_p);
					echo "<script>alert('Your Product added to the cart sucessfully')</script>";
					echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
				}
				
			}else{
				echo "<script>alert('sorry, Not enough Stock! we have only $p_stock product')</script>";
				echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
			}
		
            
        }
        
    }
    
}


function getPro(){
    global $db;
    $get_products = "select * from products order by 1 DESC LIMIT 0,8";
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products=mysqli_fetch_array($run_products)){
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];
        
        echo "
        <div class='col-sm-4 col-sm-6 single'>
					<div class='Product'>
						<a href='details.php?pro_id=$pro_id'>
							<img class='img-responsive' src='admin_area/product_images/$pro_img1'>
						</a>
						<div class='text'>
							<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
							<p class='price'> BDT $pro_price</p>
							<p class='button'>
                                 <a class='btn btn-default' href='details.php?pro_id=$pro_id'>View Details</a>
                                 <a class='btn btn-primary' href='details.php?pro_id=$pro_id'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
                            </p>
						</div>
					</div>
				</div>
        ";
    }
}

//function getPCats(){
//    global $db;
//    $get_p_cats = "select * from products_categories";
//    $run_p_cats= mysqli_query($db,$get_p_cats);
//    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
//        $p_cat_id = $row_p_cats['p_cat_id'];
//        $p_cat_title = $row_p_cats['p_cat_title'];
//        
//        echo "
//        <li>
//            <a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a>
//        </li>
//        ";
//        
//    }
//}

//function getCats(){
//    global $db;
//    $get_cats = "select * from categories";
//    $run_cats= mysqli_query($db,$get_cats);
//    while($row_cats=mysqli_fetch_array($run_cats)){
//        $cat_id = $row_cats['cat_id'];
//        $cat_title = $row_cats['cat_title'];
//        
//        echo "
//        <li>
//            <a href='shop.php?cat=$cat_id'>$cat_title</a>
//        </li>
//        ";
//        
//    }
//}



function items(){
	
	global $db;
	$ip_add =  getRealIpUser();
	$get_items = "SELECT * FROM cart where ip_add='$ip_add'";
	$run_items = mysqli_query($db,$get_items);
	$count_items = mysqli_num_rows($run_items);
	echo $count_items;
}

function total_price(){
	
	global $db;
	$ip_add = getRealIpUser();
	$total = 0;
	$select_cart = "select * from cart where ip_add='$ip_add'";
	$run_cart = mysqli_query($db,$select_cart);
	while($record=mysqli_fetch_array($run_cart)){
		$pro_id = $record['p_id'];
		$pro_qty= $record['qty'];
		$get_price = "select * from products where product_id='$pro_id'";
		$run_price = mysqli_query($db,$get_price);
		while($row_price=mysqli_fetch_array($run_price)){
			
			$sub_total = $row_price['product_price']*$pro_qty;
			$total += $sub_total;
			
		}
	}
	echo "&#x9f3; " . $total;
	
}

// getProducts() 

function getProducts(){
	global $db;
	$aWhere = array();
	//manufacturer
	if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){
		foreach($_REQUEST['man'] as $sKey=>$sVal){
			if((int)$sVal!=0){
				$aWhere[] = 'manufacturer_id='.(int)$sVal;
			}
		}
	}
	//product categories
	if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){
		foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
			if((int)$sVal!=0){
				$aWhere[] = 'p_cat_id='.(int)$sVal;
			}
		}
	}
	//categories
	if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
		foreach($_REQUEST['cat'] as $sKey=>$sVal){
			if((int)$sVal!=0){
				$aWhere[] = 'cat_id='.(int)$sVal;
			}
		}
	}
	$per_page=6;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page=1;
	}
	$start_form = ($page-1) * $per_page;
	$sLimit = " order by 1 DESC LIMIT $start_form,$per_page";
	$sWhere = (count($aWhere)>0?' WHERE ' .implode(' or ',$aWhere):'').$sLimit;
	$get_products = "select * from products ".$sWhere;
	$run_products = mysqli_query($db,$get_products);
	while($row_products=mysqli_fetch_array($run_products)){
		$pro_id = $row_products['product_id'];
		$pro_title = $row_products['product_title'];
		$pro_price = $row_products['product_price'];
		$pro_img1 = $row_products['product_img1'];
		
		echo "
			<div class='col-md-4 col-sm-6 center-responsive'>
				<div class='Product'>
					<a href='details.php?pro_id=$pro_id'>
						<img class='img-responsive' src='admin_area/product_images/$pro_img1' alt='$pro_title'>
					</a>
					<div class='text'>
						<h3> <a href='details.php?pro_id=$pro_id'> $pro_title </a> </h3>
						<p class='price'>&#x9f3; $pro_price </p>
						<p class='buttons'>
							<a class='btn btn-primary' href='details.php?pro_id=$pro_id'>Product Details</a>
							<a class='btn btn-default' href='details.php?pro_id=$pro_id'>
								<i class='fa fa-shopping-cart'></i> Add to Cart
							</a>
						</p>
					</div>
				</div>
			</div>
		
		";
		
	}
}

//getpaginator
function getPaginator(){
	global $db;
	$per_page=6;
	$aWhere = array();
	$aPath = '';
	
	if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){
		foreach($_REQUEST['man'] as $sKey=>$sVal){
			if((int)$sVal!=0){
				$aWhere[] = 'manufacturer_id='.(int)$sVal;
				$aPath .= 'man[]='.(int)$sVal.'&';
			}
		}
	}
	//product categories
	if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){
		foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
			if((int)$sVal!=0){
				$aWhere[] = 'p_cat_id='.(int)$sVal;
				$aPath .= 'p_cat[]='.(int)$sVal.'&';
			}
		}
	}
	//categories
	if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
		foreach($_REQUEST['cat'] as $sKey=>$sVal){
			if((int)$sVal!=0){
				$aWhere[] = 'cat_id='.(int)$sVal;
				$aPath .= 'cat[]='.(int)$sVal.'&';
			}
		}
	}
	$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere): '');
	$query = "select * from products ".$sWhere;
	$result = mysqli_query($db,$query);
	$total_records = mysqli_num_rows($result);
	$total_pages = ceil($total_records / $per_page);
	
	echo "
		<li><a href='shop.php?page=1";
		if(!empty($aPath)){
			echo "&".$aPath;
		}
	echo "'>".'First Page'."</a></li>";
	
	for($i=1;$i<=$total_pages;$i++){
		echo "<li><a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."'>".$i."</a></li>";
	}
	echo "<li><a href='shop.php?page=$total_pages";
	if(!empty($aPath)){
		echo "&".$aPath;
	}
	echo "'>".'Last Page'."</a></li>";
}

?>
