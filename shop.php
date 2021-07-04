<?php 

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

                    <div class="col-lg-3"><!-- col-lg-3 begin -->

                        <?php
                        include("include/sidebar.php");
                        ?>

                    </div><!-- col-lg-3 end -->

                    <div class="col-lg-9"><!-- col-lg-9 begin -->
                        
                        <div class="row"><!-- row begin -->
                            
                            <?php 
                            
                            if(!filter_input(INPUT_GET, 'percat')){
                            if(!filter_input(INPUT_GET, 'skincat')){
                            
                                $per_page = 6;
                                
                                if(filter_input(INPUT_GET, 'page')){
                                    $page = filter_input(INPUT_GET, 'page');
                                    
                                }else
                                {
                                        $page = 1;
                                }
                                    
                                    $start_from = ($page - 1) * $per_page;
                                    $get_product = "SELECT * FROM products ORDER BY 1 DESC LIMIT $start_from, $per_page";
                                    $run_product = mysqli_query($con, $get_product);
                                    
                                    while($row_products = mysqli_fetch_array($run_product)){
                                        $pro_id = $row_products['ProductID'];
                                        $pro_name = $row_products['ProductName'];
                                        $pro_price = $row_products['Price'];
                                        $pro_img1 = $row_products['ProductImage1'];
                                        
                                        echo "
                                        <div class='col-md-4 col-sm-6'><!-- col-lg-4 col-sm-6 begin -->
                                            <div class='product'><!-- product begin -->

                                                <a href='details.php?pro_id=$pro_id'>

                                                    <img class='img-fluid' src='admin/product-img/$pro_img1'>

                                                </a>

                                                <div class='text'><!-- text begin -->

                                                    <h3>

                                                        <a href='details.php?pro_id=$pro_id'>
                                                            $pro_name
                                                        </a>

                                                    </h3>

                                                    <p class='price'>$ $pro_price</p>

                                                    <p class='button'>

                                                        <a href=details.php?pro_id=$pro_id' class='btn btn-light btn-sm'>View Details</a>

                                                        <a href='details.php?pro_id=$pro_id' class='btn btn-primary btn-sm'>

                                                            <i class='fas fa-shopping-cart'>
                                                                Add to Cart
                                                            </i>

                                                        </a>

                                                    </p>

                                                </div><!-- text end -->

                                            </div><!-- product end -->

                                        </div><!-- col-lg-4 col-sm-6 end -->
                                        ";
                                    }
                                }
                            ?>

                        </div><!-- row end -->
                        
                        <div>
                            
                            <ul class="pagination justify-content-center"><!-- pagination begin -->
                                
                                <?php 
                                $query = "SELECT * FROM products";
                                $result = mysqli_query($con, $query);
                                $total_records = mysqli_num_rows($result);
                                $total_pages = ceil($total_records / $per_page);
                                
                                    echo "
                                        
                                        <li class='page-item'>
                                            
                                            <a class='page-link' href='shop.php?page=1'> ".'First Page' ."</a>

                                        </li>

                                    ";
                                
                                    for($i=1; $i<= $total_pages; $i++){
                                        
                                        echo "
                                        
                                        <li class='page-item'>
                                            
                                            <a class='page-link' href='shop.php?page=".$i."'> ".$i."</a>

                                        </li>

                                        ";
                                        
                                    }

                                    echo "
                                        
                                        <li class='page-item'>
                                            
                                            <a class='page-link' href='shop.php?page=$total_pages'> ".'Last Page' ."</a>

                                        </li>

                                    ";
                                        }
                                    
                                    
                                ?>
                                
                            </ul><!-- pagination end -->
                            
                        </div>
                        
                        <div class="row"><!-- row begin -->
                            
                            <?php
                            
                            getCatPro();
                            
                            ?>
                            
                        </div><!-- row end -->

                    </div><!-- col-lg-9 end -->

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

