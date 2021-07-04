<?php 

$db = mysqli_connect("localhost","root","","simplon");

// getRealIPUser function begin//
function getRealUserIp(){
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
 }

//add_cart function begin//
 
function add_cart(){
    global $db;
    
    if(filter_input(INPUT_GET, 'add_cart')){
        
        $ip_add = getRealUserIp();
        
        $p_id = filter_input(INPUT_GET, 'add_cart');
        
        $product_qty = filter_input(INPUT_POST, 'product_qty');
        
        $check_product = "SELECT * FROM cart WHERE IpAdd='$ip_add' AND ProID='$p_id'";
        
        $run_check = mysqli_query($db, $check_product);
        
        if(mysqli_num_rows($run_check) > 0){
            
            echo "<script>alert('This product has already added to Cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }else{
            
            $query = "INSERT INTO cart (ProID,IpAdd,Quantity) VALUES ('$p_id','$ip_add','$product_qty')";
            
            $run_query = mysqli_query($db, $query);
            
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";         
            
        }
        
    }
}


// getRealIPUser function begin//


// getPro function begin//

function getPro() {
    
    global $db;
    
    $get_product = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0,8";
    
    $run_product = mysqli_query($db, $get_product);
    
    while($row_products = mysqli_fetch_array($run_product)){
        $pro_id = $row_products['ProductID'];
        $pro_name = $row_products['ProductName'];
        $pro_price = $row_products['Price'];
        $pro_img1 = $row_products['ProductImage1'];
        
        echo"
        <div class='single col-lg-3 col-md-6'>
        
            <div class='product'>
                
                <a class = 'img-fix' href='details.php?pro_id=$pro_id'>

                    <img class='img-fluid' src='admin/product-img/$pro_img1'>

                </a>
                
                <div class='text'>
                
                    <h3>

                        <a href='details.php?pro_id=$pro_id'>
                            $pro_name
                        </a>

                    </h3>

                        <p class='price'>
                            $ $pro_price
                        </p>

                        <p class='button'>

                            <a href='details.php?pro_id=$pro_id' class='btn btn-light btn-sm'>View Details</a>

                            <a href='details.php?pro_id=$pro_id' class='btn btn-primary btn-sm'>

                                <i class='fas fa-shopping-cart'>
                                    Add to Cart
                                </i>

                            </a>

                         </p>
                                
                </div>

            </div>

         </div>
        
        ";
    }
    
}

// getPro function end//

// getProCart function begin//

function getPerCart(){
    global $db;
    
    $get_per_cart = "SELECT * FROM perfumecategories";
    $run_per_cart = mysqli_query($db, $get_per_cart);
    
    while($row_per_cat = mysqli_fetch_array($run_per_cart)){
        $percat_id = $row_per_cat['PerCatID'];
        $percat_name = $row_per_cat['PerCatName'];
        
        echo "
        <li class='nav-item'>
            <a class='nav-link' href='shop.php?percat=$percat_id'>$percat_name</a>
        </li>
        ";
    }
}

// getPerCart function end//


// getSkinCart function begin//

function getSkinCart(){
    global $db;
    
    $get_skin_cart = "SELECT * FROM skincategories";
    $run_skin_cart = mysqli_query($db, $get_skin_cart);
    
    while($row_skin_cat = mysqli_fetch_array($run_skin_cart)){
        $skincat_id = $row_skin_cat['SkinCatID'];
        $skincat_name = $row_skin_cat['SkinCatName'];
        
        echo "
        <li class='nav-item'>
            <a class='nav-link' href='shop.php?skincat=$skincat_id'>$skincat_name</a>
        </li>
        ";
    }
}

// getSkinCart function end//

// getCatPro function begin//

function getCatPro(){
    
    global $db;
    
if(filter_input(INPUT_GET, 'percat')){
    
    $per_cat_id = filter_input(INPUT_GET, 'percat');
    
    $get_per_cat = "SELECT * FROM perfumecategories WHERE PerCatID = '$per_cat_id'";
    
    $run_per_cat = mysqli_query($db, $get_per_cat);
    
    $row_per_cat = mysqli_fetch_array($run_per_cat);
    
    $per_cat_name = $row_per_cat['PerCatName'];
    
    $per_cat_desc = $row_per_cat['PerCatDesc'];
    
    $get_pro_cat = "SELECT * FROM products WHERE ProductCatID = '$per_cat_id' LIMIT 0,6";
    
    $run_product = mysqli_query($db, $get_pro_cat);
    
    $count = mysqli_num_rows($run_product);
    
    if($count == 0){
        echo "
            
            <div class= 'box'>
            
                <h1> No Products Found In This Product Categories </h1>

            </div>
            
            ";
    }else{
        echo "
            
            <div class= 'box'>
            
                <h1> $per_cat_name </h1>
                
                <p> $per_cat_desc </p>

            </div>
            
            ";
    }
    
    while($row_products = mysqli_fetch_array($run_product)){
        $pro_id = $row_products['ProductID'];
        $pro_name = $row_products['ProductName'];
        $pro_price = $row_products['Price'];
        $pro_img1 = $row_products['ProductImage1'];
        
        echo "
            
            <div class='single col-lg-3 col-md-6'>
        
            <div class='product'>
                
                <a href='details.php?pro_id=$pro_id'>

                    <img class='img-fluid' src='admin/product-img/$pro_img1'>

                </a>
                
                <div class='text'>
                
                    <h3>

                        <a href='details.php?pro_id=$pro_id'>
                            $pro_name;
                        </a>

                    </h3>

                        <p class='price'>
                            $ $pro_price;
                        </p>

                        <p class='button'>

                            <a href='details.php?pro_id=$pro_id' class='btn btn-light btn-sm'>View Details</a>

                            <a href='details.php?pro_id=$pro_id' class='btn btn-primary btn-sm'>

                                <i class='fas fa-shopping-cart'>
                                    Add to Cart
                                </i>

                            </a>

                         </p>
                                
                </div>

            </div>

         </div>
            
            ";
    }
}
            
            
}

// getCatPro function end//


/// finish getRealIpUser functions ///

function items(){
    
    global $db;
    
    $ip_add = getRealUserIp();
    
    $get_items = "SELECT * FROM cart WHERE IpAdd='$ip_add'";
    
    $run_items = mysqli_query($db,$get_items);
    
    $count_items = mysqli_num_rows($run_items);
    
    echo $count_items;
    
}

/// finish getRealIpUser functions ///

/// begin total_price functions ///

function total_price(){
    
    global $db;
    
    $ip_add = getRealUserIp();
    
    $total = 0;
    
    $select_cart = "SELECT * FROM cart WHERE IpAdd='$ip_add'";
    
    $run_cart = mysqli_query($db,$select_cart);
    
    while($record=mysqli_fetch_array($run_cart)){
        
        $pro_id = $record['ProID'];
        
        $pro_qty = $record['Quantity'];
        
        $get_price = "SELECT * FROM products WHERE ProductID='$pro_id'";
        
        $run_price = mysqli_query($db,$get_price);
        
        while($row_price=mysqli_fetch_array($run_price)){
            
            $sub_total = $row_price['Price']*$pro_qty;
            
            $total += $sub_total;
            
        }
        
    }
    
    echo "$" . $total;
    
}

/// finish total_price functions ///


?>