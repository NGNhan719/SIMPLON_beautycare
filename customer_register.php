<?php 

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
                    
                    <div class="col-lg-9"><!-- col-lg-9 begin -->
                        
                        <div class="box"><!-- box begin -->
                            
                            <div class="box-header"><!-- box-header begin -->
                                
                                <div class="text-center"><!-- text-center begin -->
                                    
                                    <h3>Register A New Account</h3>
                                    
                                </div><!-- text-center end -->
                                
                                <form action="customer_register.php" method="post" enctype="multipart/form-data"><!-- form begin -->
                                    
                                    <div class="form-group">
                                        
                                        <label>Your Name</label>
                                        <input type="text" class="form-control" name="c_name" required>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        
                                        <label>Your Email</label>
                                        <input type="text" class="form-control" name="c_email" required>
                                        
                                    </div>
                                    
                                     <div class="form-group">
                                        
                                        <label>Your Password</label>
                                        <input type="password" class="form-control" name="c_pass" required>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        
                                        <label>Your City</label>
                                        <input type="text" class="form-control" name="c_city" required>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        
                                        <label>Your Contact</label>
                                        <input type="text" class="form-control" name="c_contact" required>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        
                                        <label>Your Address</label>
                                        <input type="text" class="form-control" name="c_address" required>
                                        
                                    </div>
                                                                                                          
                                     <div class="form-group">
                                        
                                        <label>Your Profile Picture</label>
                                        <input name="c_img"  type="file" class="form-control form-height-custom" required>
                                        
                                    </div>
                                    
                                    <div class="text-center">
                                        
                                        <button type="submit" name="register" class="btn btn-primary">
                                            <i class="fas fa-user-tie"></i> 
                                            Register
                                        </button>
                                        
                                    </div>
                                    
                                </form><!-- form end -->
                                
                            </div><!-- box-header end -->
                            
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

<?php 

if(isset($_POST['register'])){
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $c_pass = $_POST['c_pass'];
    
    $c_city = $_POST['c_city'];
    
    $c_contact = $_POST['c_contact'];
    
    $c_address = $_POST['c_address'];
    
    $c_img = $_FILES['c_img']['name'];
    
    $c_img_tmp = $_FILES['c_img']['tmp_name'];
    
    $c_ip = getRealUserIp();
    
    move_uploaded_file($c_img_tmp, "customer/customer_img/$c_img");
    
    $insert_customer = "INSERT INTO `customers` (`CustomerName`,`CustomerEmail`,`CustomerPass`,`CustomerCity`,`CustomerContact`,`CustomerAddress`,`CustomerImg`,`CustomerIp`) VALUES ('$c_name','$c_email','$c_pass','$c_city','$c_contact','$c_address','$c_img','$c_ip')";
    
    $run_customer = mysqli_query($con, $insert_customer);
    
    $sel_cart = "SELECT * FROM cart WHERE IpAdd='$c_ip'";
    
    $run_cart = mysqli_query($con, $sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart > 0){
        
        /// If register with cart ///
                
        $_SESSION['CustomerEmail'] = $c_email;
        
        echo "<script>alert('You have been registered successfully !')</script>";
        
        echo "<script>window.open('checkout.php','_self')</script>";
        
    } else {
        
        /// If register without cart ///
        
        $_SESSION['CustomerEmail'] = $c_email;
        
        echo "<script>alert('You have been registered successfully !')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
        
    }
    
}

?>