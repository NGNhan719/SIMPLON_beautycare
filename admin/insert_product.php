<?php
include("include/db.php");
?>


<!DOCTYPE html>
<html>
    <head>


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Insert Products</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontawesome.min.css">
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>

        <div class="row"><!-- row begin -->

            <div class="col-lg-12"><!-- col-lg-12 begin -->

                <ul class="breadcrumb"><!-- breadcrumb begin -->

                    <li class="active">

                        <i class="fas fa-clipboard-check"></i>
                        Dashboard / Insert Products

                    </li>

                </ul><!-- breadcrumb end -->

            </div><!-- col-lg-12 end -->

        </div><!-- row end -->

        <div class="row"><!-- row begin -->

            <div class="col-lg-12"><!-- col-lg-12 begin -->

                <div class="card"><!-- card begin -->

                    <div class="card-header"><!-- card-header begin -->

                        <h4 class="card-title">
                            Insert Product
                        </h4>

                    </div><!-- card-header end -->

                    <div class="card-block"><!-- card-block begin -->

                        <form method="post" enctype="multipart/form-data"><!-- form begin -->

                            <div class="form-inline" style="width: 100%"><!-- form-inline begin -->

                                <label class="col-md-3 custom-control-label"> Product Name </label>
                                <div class="col-md-6">

                                    <input name="product_name" type="text" class="form-control" style="width: 100%">

                                </div>

                            </div><!-- form-inline end -->

                            <div class="form-inline" style="width: 100%"><!-- form-inline begin -->

                                <label class="col-md-3 custom-control-label"> Product Category </label>
                                <div class="col-md-6">

                                    <select name="product_cat" class="custom-select" style="width: 100%">
                                        <option selected>Select a Category</option>
                                        <?php
                                        
                                        $get_p_cats = "SELECT * FROM `perfumecategories`";
                                        $run_p_cats = mysqli_query($con, $get_p_cats);
                                        
                                        while($row_p_cats = mysqli_fetch_array($run_p_cats)){
                                            $p_cat_id = $row_p_cats['PerCatID'];
                                            $p_cat_name = $row_p_cats['PerCatName'];
                                            
                                            echo "<option value = '$p_cat_id'> $p_cat_name </option>";
                                            
                                        }
                                        
                                        ?>
                                        
                                        
                                    </select>

                                </div>

                            </div><!-- form-inline end -->

                            <div class="form-inline" style="width: 100%"><!-- form-inline begin -->

                                <label class="col-md-3 custom-control-label"> Product Image 1 </label>
                                <div class="col-md-6">

                                    <input name="product_img1" type="file" class="form-control" style="width: 100%">

                                </div>

                            </div><!-- form-inline end -->
                            
                            <div class="form-inline" style="width: 100%"><!-- form-inline begin -->

                                <label class="col-md-3 custom-control-label"> Product Image 2 </label>
                                <div class="col-md-6">

                                    <input name="product_img2" type="file" class="form-control" style="width: 100%">

                                </div>

                            </div><!-- form-inline end -->
                            
                            <div class="form-inline" style="width: 100%"><!-- form-inline begin -->

                                <label class="col-md-3 custom-control-label"> Product Image 3 </label>
                                <div class="col-md-6">

                                    <input name="product_img3" type="file" class="form-control" style="width: 100%">

                                </div>

                            </div><!-- form-inline end -->
                            
                            <div class="form-inline" style="width: 100%"><!-- form-inline begin -->

                                <label class="col-md-3 custom-control-label"> Product Price </label>
                                <div class="col-md-6">

                                    <input name="product_price" type="text" class="form-control" style="width: 100%">

                                </div>

                            </div><!-- form-inline end -->
                            
                            <div class="form-inline" style="width: 100%"><!-- form-inline begin -->

                                <label class="col-md-3 custom-control-label"> Product Keywords </label>
                                <div class="col-md-6">

                                    <input name="product_keywords" type="text" class="form-control" style="width: 100%">

                                </div>

                            </div><!-- form-inline end -->
                            
                            <div class="form-inline" style="width: 100%"><!-- form-inline begin -->

                                <label class="col-md-3 custom-control-label"> Product Desc </label>
                                <div class="col-md-6">

                                    <textarea name="product_desc" cols="19" rows="15" class="form-control" style="width: 100%"></textarea>

                                </div>

                            </div><!-- form-inline end -->
                            
                            <div class="form-inline" style="width: 100%"><!-- form-inline begin -->

                                <label class="col-md-3 custom-control-label"></label>
                                <div class="col-md-6">

                                    <input name="submit" type="submit" value="Insert Product" class="btn btn-success form-control" style="width: 100%">

                                </div>

                            </div><!-- form-inline end -->

                        </form><!-- form end -->

                    </div><!-- card-block end -->

                </div><!-- card end -->

            </div><!-- col-lg-12 end -->

        </div><!-- row end -->

    </body>

    <script src="js/jquery-3.4.1.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
    <script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
    
    <script>tinymce.init({selector: 'textarea'});</script>

</html>

<?php

if(filter_input(INPUT_POST, 'submit')){
    $product_name = filter_input(INPUT_POST, 'product_name');
    $product_cat = filter_input(INPUT_POST, 'product_cat');
    
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    
    $product_price = filter_input(INPUT_POST, 'product_price');
    $product_keywords = filter_input(INPUT_POST, 'product_keywords');
    $product_desc = filter_input(INPUT_POST, 'product_desc');
    
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1, "product-img/$product_img1");
    move_uploaded_file($temp_name2, "product-img/$product_img2");
    move_uploaded_file($temp_name3, "product-img/$product_img3");
    
    $insert_product = "INSERT INTO `products` (`ProductCatID`,`Date`,`ProductName`,`ProductImage1`,`ProductImage2`,`ProductImage3`,`Price`,`ProductKeywords`,`ProductDesc`) VALUES('$product_cat',NOW(),'$product_name','$product_img1','$product_img2','$product_img3','$product_price','$product_keywords','$product_desc')";
    
    $run_product = mysqli_query($con, $insert_product);
    
    if($run_product){
        
        echo "<script>alert('Product has been inserted sucessfully');</script>";
        echo "<script>window.open('insert_product.php,'_self')</script>";
        
    }
}

?>