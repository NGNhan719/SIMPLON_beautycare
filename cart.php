<?php 
$active = 'Cart';

include("include/header.php");

?>

        <div id="content"><!-- content begin -->

            <div class="container"><!-- container begin -->

                <div class="row"><!-- row begin -->

                    <div class="col-lg-12"><!-- col-lg-12 begin -->

                        <ul class="breadcrumb"><!-- breadcrumb begin -->

                            <li><a href="index.php">Home</a></li>
                            <li>Cart</li>

                        </ul><!-- breadcrumb end -->

                    </div><!-- col-lg-12 end -->

                    <div id="cart" class="col-lg-9"><!-- col-lg-9 begin -->

                        <div class="box"><!-- box begin -->

                            <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form begin -->

                                <h1>Shopping Cart</h1>
                                
                                <?php 
                                
                                $ip_add = getRealUserIp();
                                
                                $select_cart = "SELECT * FROM cart WHERE IpAdd='$ip_add'";
                                
                                $run_cart = mysqli_query($con, $select_cart);
                                
                                $count = mysqli_num_rows($run_cart);                                
                                                               
                                ?>
                                
                                <p class="text-muted">You currently have <?php echo $count ?> item(s) in your cart</p>

                                <div class="table-responsive"><!-- table-responsive begin -->

                                    <table class="table"><!-- table begin -->

                                        <thead>

                                            <tr>

                                                <th colspan="2">Product</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Type</th>
                                                <th colspan="1">Delete</th>
                                                <th colspan="2">Sub-Total</th>

                                            </tr>                                            

                                        </thead>

                                        <tbody>

                                            <?php
                                            
                                            $sub_total = 0;
                                            $total = 0;
                                            
                                            while($row_cart = mysqli_fetch_array($run_cart)){
                                                
                                                $pro_id = $row_cart['ProID'];
                                                
                                                $pro_quantity = $row_cart['Quantity'];
                                                
                                                $get_product = "SELECT * FROM products WHERE ProductID = '$pro_id'";
                                                
                                                $run_product = mysqli_query($con, $get_product);
                                                
                                                while($row_products = mysqli_fetch_array($run_product)){
                                                    
                                                    $product_name = $row_products['ProductName'];
                                                    
                                                    $product_img1 = $row_products['ProductImage1'];
                                                    
                                                    $only_price = $row_products['Price'];
                                                    
                                                    $sub_total = $row_products['Price'] * $pro_quantity;
                                                    
                                                    $total += $sub_total;
                                            
                                            ?>
                                            
                                            <tr>

                                                <td colspan="2">

                                                    <img class="img-fluid" src="admin/product-img/<?php echo $product_img1; ?>">

                                                </td>
                                                <td>

                                                    <a href="details.php?pro_id=<?php echo $pro_id ?>"> <?php echo $product_name; ?> </a>

                                                </td>
                                                <td>

                                                    <?php echo $pro_quantity; ?>

                                                </td>
                                                <td>

                                                    $ <?php echo $only_price; ?>

                                                </td>
                                                <td colspan="1">

                                                    <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">

                                                </td>
                                                <td colspan="2">

                                                    $ <?php echo $sub_total; ?>

                                                </td>

                                            </tr>
                                            
                                            <?php 
                                            
                                                }
                                            
                                            }
                                            
                                            ?>

                                        </tbody>

                                        <tfoot>

                                            <tr>

                                                <th colspan="6">Total</th>
                                                <th colspan="2">$ <?php echo $total; ?></th>

                                            </tr>

                                        </tfoot>

                                    </table><!-- table end -->

                                </div><!-- table-responsive end -->

                                <div class="box-footer"><!-- box-footer begin -->

                                    <div class="float-left">

                                        <a href="index.php" class="btn btn-white btn-sm">

                                            <i class="fas fa-chevron-left"></i>

                                            Continue Shopping

                                        </a>

                                    </div>

                                    <div class="float-right">

                                        <button type="submit" name="update" value="Update Cart" class="btn btn-white btn-sm">

                                            <i class="fas fa-sync"></i>

                                            Update Cart

                                        </button>

                                        <a href="checkout.php" class="btn btn-primary">

                                            <i class="fas fa-chevron-right"></i>
                                            Proceed Checkout

                                        </a>

                                    </div>

                                </div><!-- box-footer end -->

                            </form><!-- form end -->

                        </div><!-- box end -->
                        
                        <?php
                        
                        function update_cart(){
                            
                            global $con;
                            
                            if(filter_input(INPUT_POST, 'update')){
                                
                                foreach($_POST['remove'] as $remove_id){
                                    
                                    $delete_product = "DELETE FROM cart WHERE ProID = '$remove_id'";
                                    
                                    $run_delete = mysqli_query($con, $delete_product);
                                    
                                    if($run_delete){
                                        
                                        echo "<script>window.open('cart.php','_self')</script>";
                                        
                                    }
                                    
                                }
                                
                            }
                            
                        }
                        
                        echo @$up_cart = update_cart();
                        
                        ?>

                        <div class="row same-height-row"><!-- row same-height-row begin -->

                            <div class="col-md-3"><!-- col-md-3 begin -->

                                <div class="box same-height headline"><!-- box same-height headline begin -->

                                    <h4 class="text-center">Product You May Like</h4>

                                </div><!-- box same-height headline end -->

                            </div><!-- col-md-3 end -->
                            
                            <?php 
                            
                            $get_product = "SELECT * FROM products ORDER BY rand() LIMIT 0,3";
                            
                            $run_product = mysqli_query($con, $get_product);
                            
                            while($row_products = mysqli_fetch_array($run_product)){
                                
                                $pro_id = $row_products['ProductID'];
                                
                                $pro_name = $row_products['ProductName'];
                                
                                $pro_price = $row_products['Price'];
                                
                                $pro_img1 = $row_products['ProductImage1'];
                                
                                echo "
                                
                                    <div class='col-md-3 center-responsive'><!-- col-md-3 center-responsive begin -->

                                        <div class='product same-height'><!-- product same-height begin -->

                                            <a href='details.php?pro_id=$pro_id'>
                                                <img class='img-fluid' src='admin/product-img/$pro_img1'>
                                            </a>

                                            <div class='text-center'>                                        
                                                <h4><a href='details.php?pro_id=$pro_id'> $pro_name </a></h4>
                                                <p class='price'>$ $pro_price </p>
                                            </div>

                                        </div><!-- product same-height center-responsive end -->

                                    </div><!-- col-md-3 end -->

                                ";
                                        
                            }
                            
                            ?>

                        </div><!-- row same-height-row end -->

                    </div><!-- col-lg-9 end -->
                    
                    <div class="col-lg-3"><!-- col-lg-3 begin -->
                        
                        <div id="order-summary" class="box"><!-- box begin -->
                            
                            <div class="box-header"><!-- box header begin -->
                                
                                <h3>Order Summary</h3>
                                
                            </div><!-- box header end -->
                            
                            <p class="text-muted"><!-- text-muted begin -->
                                
                                Shipping and additional costs are calculated based on value you have entered
                                
                            </p><!-- text-muted end -->
                            
                            <div class="table-responsive"><!-- table-responsive begin -->
                                
                                <table class="table"><!-- table begin -->
                                    
                                    <tbody>
                                        
                                        <tr>
                                            
                                            <td> Order Sub-Total </td>
                                            <th> $<?php echo $sub_total; ?> </th>
                                            
                                        </tr>
                                        
                                        <tr>
                                            
                                            <td> Shipping and Handling </td>
                                            <th> $0 </th>
                                            
                                        </tr>
                                        
                                        <tr>
                                            
                                            <td> Tax </td>
                                            <th> $0 </th>
                                            
                                        </tr>
                                        
                                        <tr>
                                            
                                            <td> Total </td>
                                            <th> $<?php echo $total; ?> </th>
                                            
                                        </tr>
                                        
                                    </tbody>
                                    
                                </table><!-- table end -->
                                
                            </div><!-- table-responsive end -->
                            
                        </div><!-- box end -->
                        
                    </div><!-- col-lg-3 end -->

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