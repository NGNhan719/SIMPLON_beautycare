<?php 

include("include/header.php");

?>

        <div id="content"><!-- content begin -->

            <div class="container"><!-- container begin -->

                <div class="row"><!-- row begin -->

                    <div class="col-lg-12"><!-- col-lg-12 begin -->

                        <ul class="breadcrumb"><!-- breadcrumb begin -->

                            <li><a href="index.php">Home</a></li>
                            <li>Shop</li>
                            <li><a href="shop.php?p_cat=<?php echo $pro_cat_id; ?>"><?php echo $per_cat_name; ?></a></li>
                            <li><?php echo $pro_name; ?></li>

                        </ul><!-- breadcrumb end -->

                    </div><!-- col-lg-12 end -->

                    <div class="col-lg-3"><!-- col-lg-3 begin -->

                        <?php
                        include("include/sidebar.php");
                        ?>

                    </div><!-- col-lg-3 end -->

                    <div class="col-lg-9"><!-- col-lg-9 begin -->

                        <div id="productMain" class="row"><!-- row begin -->

                            <div class="col-6"><!-- col-md-6 begin -->

                                <div id="mainImage"><!-- mainImage begin -->

                                    <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide begin -->

                                        <ul class="carousel-indicators">

                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#myCarousel" data-slide-to="1"></li>
                                            <li data-target="#myCarousel" data-slide-to="2"></li>

                                        </ul>

                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="img-fluid" src="admin/product-img/<?php echo $pro_img1; ?>">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="img-fluid" src="admin/product-img/<?php echo $pro_img2; ?>">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="img-fluid" src="admin/product-img/<?php echo $pro_img3; ?>">
                                            </div>
                                        </div>

                                        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>

                                    </div><!-- carousel slide end -->

                                </div><!-- mainImage end -->

                            </div><!-- col-md-6 end -->

                            <div class="col-6"><!-- col-md-6 begin -->

                                <div class="box"><!-- box begin -->

                                    <h1 class="text-center"><?php echo $pro_name; ?></h1>
                                    
                                    <?php 
                                    
                                    add_cart(); 
                                    
                                    ?>

                                    <form action="details.php?add_cart=<?php echo $product_id; ?>" method="post">
                                        <div class="form-inline">
                                            <label for="">Product Quantity:</label>
                                            <select name="product_qty" id="" class="custom-select custom-select-sm" style="width: 200px">
                                                <option selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                                                                
                                        <p class="price">$ <?php echo $pro_price; ?></p>
                                        <p class="text-center button">
                                            <button class="btn btn-primary btn-sm">
                                                <i class="fas fa-shopping-cart"></i>
                                                Add To Cart
                                            </button>
                                        </p>
                                    </form>
                                    
                                </div><!-- box end -->
                                
                                <div class="row" id="thumbs"><!-- row begin -->
                                    
                                    <div class="col-4"><!-- col-4 begin -->
                                        <a href="#" class="thumbs">
                                            <img src="admin/product-img/<?php echo $pro_img1; ?>" alt="" class="img-fluid">
                                        </a>
                                    </div><!-- col-4 end -->
                                    <div class="col-4"><!-- col-4 begin -->
                                        <a href="#" class="thumbs">
                                            <img src="admin/product-img/<?php echo $pro_img2; ?>" alt="" class="img-fluid">
                                        </a>
                                    </div><!-- col-4 end -->
                                    <div class="col-4"><!-- col-4 begin -->
                                        <a href="#" class="thumbs">
                                            <img src="admin/product-img/<?php echo $pro_img3; ?>" alt="" class="img-fluid">
                                        </a>
                                    </div><!-- col-4 end -->
                                    
                                </div><!-- end begin -->                                

                            </div><!-- col-md-6 end -->

                        </div><!-- row end -->
                        
                        <div class="box" id="details"><!-- box begin -->
                            
                            <h4>Product Details</h4>
                            
                            <p><?php echo $pro_desc; ?></p>
                            
                        </div><!-- box end -->
                        
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
                                            
                                            </div>

                                        </div><!-- product same-height center-responsive end -->
                                    ";
                                }                           
                            ?>
                        
                        </div><!-- row same-height-row end -->

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