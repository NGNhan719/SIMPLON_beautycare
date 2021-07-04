<?php

session_start();

if(!isset($_SESSION['CustomerEmail'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
} else {

include("include/db.php");
include("functions/functions.php");

if(isset($_GET['order_id'])){
    
    $order_id = $_GET['order_id'];
    
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
                        
                        <div class="box"><!-- box begin -->
                            
                            <h1 align="center">Please Confirm Your Payment</h1>
                            
                            <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
                                
                                <div class="form-group">
                                    
                                    <label> Invoice Number: </label>
                                    <input type="text" class="form-control" name="invoice_no" required>
                                    
                                </div>
                                
                                <div class="form-group">
                                    
                                    <label> Amount Sent: </label>
                                    <input type="text" class="form-control" name="amount_sent" required>
                                    
                                </div>
                                
                                <div class="form-group">
                                    
                                    <label> Select Payment Mode: </label>
                                    <select name="payment_mode" class="form-control">
                                        
                                        <option> Select Payment Mode </option>
                                        <option> Bank Code </option>
                                        <option> UBL / Omni Paisa</option>
                                        <option> East Paisa </option>
                                        <option> Western Union </option>
                                        
                                    </select>
                                    
                                </div>
                                
                                <div class="form-group">
                                    
                                    <label> Transaction / Reference ID: </label>
                                    <input type="text" class="form-control" name="ref_no" required>
                                    
                                </div>
                                
                                <div class="form-group">
                                    
                                    <label> Paypall / Payoneer / Western Union Code: </label>
                                    <input type="text" class="form-control" name="code" required>
                                    
                                </div>
                                
                                <div class="form-group">
                                    
                                    <label> Payment Date: </label>
                                    <input type="text" class="form-control" name="date" required>
                                    
                                </div>
                                
                                <div class="text-center">
                                    
                                    <button class="btn btn-primary btn-lg" name="confirm_payment">
                                        <i class="fas fa-user-check"></i>
                                        Confirm Payment
                                    </button>
                                    
                                </div>
                                                                  
                            </form>
                            
                            <?php 
                   
                            if(isset($_POST['confirm_payment'])){

                                $update_id = $_GET['update_id'];

                                $invoice_no = $_POST['invoice_no'];

                                $amount = $_POST['amount_sent'];

                                $payment_mode = $_POST['payment_mode'];

                                $ref_no = $_POST['ref_no'];

                                $code = $_POST['code'];

                                $payment_date = $_POST['date'];

                                $complete = "Complete";

                                $insert_payment = "INSERT INTO payments (InvoiceNo,Amount,PaymentMode,RefNo,Code,PaymentDate) VALUES ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";

                                $run_payment = mysqli_query($con,$insert_payment);

                                $update_customer_order = "UPDATE customer_orders SET OrderStatus='$complete' WHERE OrderID='$update_id'";

                                $run_customer_order = mysqli_query($con,$update_customer_order);

                                $update_pending_order = "UPDATE pending_orders SET OrderStatus='$complete' WHERE OrderID='$update_id'";

                                $run_pending_order = mysqli_query($con,$update_pending_order);

                                if($run_pending_order){

                                    echo "<script>alert('Thank you for purchasing. Your orders will be completed within 24 hours work')</script>";

                                    echo "<script>window.open('my_account.php?my_orders','_self')</script>";

                                }

                            }

                            ?>
                            
                        </div><!-- box end -->
                        
                    </div><!-- col-lg-9 end -->
                    
             </div><!-- container end -->

        </div><!-- content end -->

        <!-- Latest product end -->
        
        <?php
        
        include("include/footer.php");
        
        ?>
        

    </body>


    <script src="js/jquery-3.4.1.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>


</html>

<?php } ?>