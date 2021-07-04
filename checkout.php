<?php 

$active='Account';
include("include/header.php");

?>

        <div id="content"><!-- content begin -->

            <div class="container"><!-- container begin -->

                <div class="row"><!-- row begin -->

                    <div class="col-lg-12"><!-- col-lg-12 begin -->

                        <ul class="breadcrumb"><!-- breadcrumb begin -->

                            <li><a href="index.php">Home</a></li>
                            <li>Register</li>

                        </ul><!-- breadcrumb end -->

                    </div><!-- col-lg-12 end -->

                    <div class="col-lg-3"><!-- col-lg-3 begin -->
                        
                        <?php
                        include("include/sidebar.php");
                        ?>

                    </div><!-- col-lg-3 end -->
                    
                    <div class="col-lg-9"><!-- col-md-9 Begin -->
                    
                    <?php
                    
                    if(!isset($_SESSION['CustomerEmail'])){

                        include("customer/customer_login.php");
                        
                    } else {

                        include("payment_option.php");

                    }
                    
                    ?>
                        
                    </div><!-- col-lg-9 Finish -->
                    
                </div><!-- row end -->
                    
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