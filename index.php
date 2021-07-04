<?php 
$active='Home';

include("include/header.php");

?>


        <!-- Slider begin -->

        <div class="container" id="slider"><!-- container begin -->

            <div class="row"><!-- row begin -->

                <div class="col-md-12"><!-- col-md-12 begin -->

                    <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide begin -->

                        <ul class="carousel-indicators"><!-- carousel indicators begin -->

                            <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>

                        </ul><!-- carousel indicators end -->

                        <div class="carousel-inner"><!-- carousel-inner begin -->
                            
                            <?php
                            
                            $get_slides = "SELECT * FROM slides LIMIT 0,1";
                            
                            $run_slider = mysqli_query($con, $get_slides);
                            
                            while($row_slides = mysqli_fetch_array($run_slider)){
                                $slide_name = $row_slides['SlideName'];
                                $slide_image = $row_slides['SlideImage'];
                                
                                echo "

                                <div class='carousel-item active'>

                                    <img src='admin/slide-img/$slide_image'>

                                </div>
                                
                                ";
                                 
                            }
                            
                            $get_slides = "SELECT * FROM slides LIMIT 1,3";
                            
                            $run_slider = mysqli_query($con, $get_slides);
                            
                            while($row_slides = mysqli_fetch_array($run_slider)){
                                $slide_name = $row_slides['SlideName'];
                                $slide_image = $row_slides['SlideImage'];
                                
                                echo "

                                <div class='carousel-item'>

                                    <img src='admin/slide-img/$slide_image'>

                                </div>
                                
                                ";
                                 
                            }
                            
                            
                            ?>

                        </div><!-- carousel-inner end -->

                        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">

                            <span class="carousel-control-prev-icon"></span>

                        </a>

                        <a class="carousel-control-next" href="#myCarousel" data-slide="next">

                            <span class="carousel-control-next-icon"></span>

                        </a>

                    </div><!-- carousel slide end -->

                </div><!-- col-md-12 end -->

            </div><!-- row end -->

        </div><!-- container end -->

        <!-- slider end -->


        <!-- Latest product begin -->

        <div id="latest"><!-- Latest begin -->

            <div class="box"><!-- box begin -->

                <div class="container"><!-- container begin -->

                    <div class="row"><!-- row begin -->

                        <div class="col-lg-12"><!-- col-lg-12 begin -->

                            <h2>Our Latest Product</h2>

                        </div><!-- col-lg-12 end -->

                    </div><!-- row end -->

                </div><!-- container end -->

            </div><!-- box end -->

        </div><!-- Latest end -->

        <div id="content"><!-- content begin -->

            <div class="container-fluid"><!-- container begin -->

                <div class="row"><!-- row begin -->
                    
                    <?php 
                    
                    getPro();
                    
                    ?>

                </div><!-- row end -->

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
