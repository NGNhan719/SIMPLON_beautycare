<?php

session_start();

if(!isset($_SESSION['CustomerEmail'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
} else {

include("include/db.php");
include("functions/functions.php");

?>

<?php 

if(filter_input(INPUT_GET, 'pro_id')){
    $product_id = filter_input(INPUT_GET, 'pro_id');
    
    $get_product = "SELECT * FROM products WHERE ProductID = '$product_id'";
    
    $run_product = mysqli_query($con, $get_product);
    
    $row_products = mysqli_fetch_array($run_product);
    
    $pro_cat_id = $row_products['ProductCatID'];
    
    $pro_name = $row_products['ProductName'];
    
    $pro_price = $row_products['Price'];
    
    $pro_desc = $row_products['ProductDesc'];
    
    $pro_img1 = $row_products['ProductImage1'];
    
    $pro_img2 = $row_products['ProductImage2'];
    
    $pro_img3 = $row_products['ProductImage3'];
    
    $get_p_cat = "SELECT * FROM perfumecategories WHERE PerCatID = '$pro_cat_id'";
    
    $run_p_cat = mysqli_query($con, $get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $per_cat_name = $row_p_cat['PerCatName'];
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SIMPLON Beauty Care</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontawesome.min.css">
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>

        <div id="top"><!-- Top Begin -->

            <div class="container"><!-- container Begin -->

                <div class="row"><!-- row Begin -->
                    <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->

                        <a href="#" class="btn btn-success btn-sm">
                        
                        <?php
                        
                        if(!isset($_SESSION['CustomerEmail'])){
                            
                            echo "Welcome: Guest";                            
                            
                        } else {
                            
                            echo "Welcome: " . $_SESSION['CustomerEmail'] . "";
                            
                        }
                        
                        ?>
                        
                        </a>
                        <a href="../cart.php"><?php items(); ?> Item(s) in your Cart | Total Price: <?php total_price(); ?></a>

                    </div><!-- col-md-6 offer end -->

                    <div class="col-md-6"><!-- col-md-6 Begin -->

                        <ul class="menu"><!-- menu Begin -->

                            <li>
                                <a href="../customer_register.php">Register</a>
                            </li>
                            <li>
                                <a href="my_account.php">My Account</a>
                            </li>
                            <li>
                                <a href="../cart.php">Go to Cart</a>
                            </li>                        
                            <li>
                                <a href="../checkout.php">
                                
                                <?php
                        
                                if(!isset($_SESSION['CustomerEmail'])){

                                    echo "<a href='checkout.php'>Login</a>";                            

                                } else {

                                    echo "<a href='logout.php'>Log Out</a>";

                                }

                                ?>  
                                
                                </a>
                            </li>

                        </ul><!-- menu end -->

                    </div><!-- col-md-6 end -->
                </div><!-- row end -->

            </div><!-- container end -->

        </div><!-- Top End -->


        <!-- Header -->
        <header class="header-section"><!-- Header-section Begin -->

            <div class="header-top"><!-- header-top Begin -->

                <div class="container"><!-- container Begin -->

                    <div class="row"><!-- row Begin -->

                        <div class="col-md-3 text-center text-lg-left"><!-- col-md-3 text-center text-lg-left Begin -->

                            <!--logo-->
                            <a href="../index.html" class="site-logo">
                                <img src="img/logo.jpg">
                            </a>	

                        </div><!-- col-md-3 text-center text-lg-left end -->

                        <div class="col-md-6"><!-- col-md-6 Begin -->

                            <form method="get" class="header-search-form"><!-- header-search-form Begin -->

                                <input type="text" class="form-control" placeholder="Search for product..." name="user_query" required>

                                <span>
                                    <button type="submit" name="search" value="search" class="btn btn-white">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>

                            </form><!-- header-search-form end -->

                        </div><!-- col-md-6 col-lg-5 end -->

                        <div class="col-md-3 shopping-cart"><!-- col-md-4 begin -->

                            <a href="../cart.php" class="btn navbar-btn btn-primary right">
                                <i class="fas fa-shopping-cart"></i>
                                <span><?php items() ?> Item In Your Cart</span>
                            </a>

                        </div><!-- col-md-4 end -->

                    </div><!-- row end -->

                </div><!-- container end -->

            </div><!-- Header-section end -->


            <!-- Main Navigation Bar -->

            <nav class="main-navbar">
                <div class="container">
                    <!-- Menu -->
                    <ul class="main-menu">
                        <li><a href="../index.php">HOME</a></li>
                        <li><a href="../shop.php">SHOP</a></li>
                        <li><a href="#">PERFUME</a></li>
                        <li><a href="#">SKINCARE
                                <span class="new">New</span></a>
                            <ul class="sub-menu">
                                <li><a href="#">Creams</a></li>
                                <li><a href="#">Lotions</a></li>
                                <li><a href="#">Powers</a></li>
                                <li><a href="#">Spray</a></li>
                            </ul>
                        </li>
                        <li><a href="../about.php">SIMPLON</a></li>
                        <li><a href="../contact.php">CONTACT US</a></li>
                    </ul>
                </div>
            </nav>
        </header><!-- Header-section end -->
        
        

        <div id="content"><!-- content begin -->

            <div class="container"><!-- container begin -->

                <div class="row"><!-- row begin -->

                    <div class="col-lg-12"><!-- col-lg-12 begin -->

                        <ul class="breadcrumb"><!-- breadcrumb begin -->

                            <li><a href="index.php">Home</a></li>
                            <li>Cart</li>

                        </ul><!-- breadcrumb end -->

                    </div><!-- col-lg-12 end -->

                    <div class="col-lg-3"><!-- col-lg-3 begin -->

                        <?php
                        include("include/sidebar.php");
                        ?>

                    </div><!-- col-lg-3 end -->
                    
                    <div class="col-lg-9"><!-- col-lg-9 begin -->
                        
                        <div class="box"><!-- box begin-->
                            
                            <?php 
                                if(isset($_GET['my_orders'])){
                                    include ("my_orders.php");
                                }
                            ?>
                            
                            <?php 
                                if(isset($_GET['edit_account'])){
                                    include ("edit_account.php");
                                }
                            ?>
                            
                            <?php 
                                if(isset($_GET['pay_offline'])){
                                    include ("pay_offline.php");
                                }
                            ?>
                            
                            <?php 
                                if(isset($_GET['change_pass'])){
                                    include ("change_pass.php");
                                }
                            ?>
                            
                            <?php 
                                if(isset($_GET['delete_account'])){
                                    include ("delete_account.php");
                                }
                            ?>
                            
                            <?php 
                                if(isset($_GET['log_out'])){
                                    include ("logout.php");
                                }
                            ?>
                            
                        </div><!-- box end -->
                        
                    </div><!-- col-lg-9 end -->
                    
            </div><!-- container end -->

        </div><!-- content end -->


        <?php
        include("include/footer.php");
        ?>


    </body>


    <script src="js/jquery-3.4.1.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>


</html>

<?php } ?>