<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / View Slides
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="card"><!-- card begin -->
            <div class="card-header"><!-- card-header begin -->
                <h3 class="card-title"><!-- card-title begin -->
                
                    <i class="fa fa-tags fa-fw"></i> View Slides
                
                </h3><!-- card-title finish -->
            </div><!-- card-header finish -->
            
            <div class="card-block"><!-- card-block begin -->
                <div class="row">
                <?php 
                
                    $get_slides = "SELECT * FROM slides";
        
                    $run_slides = mysqli_query($con,$get_slides);
        
                    while($row_slides=mysqli_fetch_array($run_slides)){
                        
                        $slide_id = $row_slides['SlideID'];
                        
                        $slide_name = $row_slides['SlideName'];
                        
                        $slide_image = $row_slides['SlideImage'];
                
                ?>
                
                
                <div class="col-lg-3 col-md-3"><!-- col-lg-3 col-md-3 begin -->
                    <div class="card card-primary"><!-- card begin -->
                        <div class="card-header"><!-- card-header begin -->
                            <h3 class="card-title" align="center"><!-- card-title begin -->
                            
                                <?php echo $slide_name; ?>
                                
                            </h3><!-- card-title finish -->
                        </div><!-- card-header finish -->
                        
                        <div class="card-block"><!-- card-block begin -->
                            
                            <img src="slide-img/<?php echo $slide_image; ?>" alt="<?php echo $slide_name; ?>" class="img-fluid">
                            
                        </div><!-- card-block finish -->
                        
                        <div class="card-footer"><!-- card-footer begin -->
                            <center><!-- center begin -->
                                
                                <a href="index.php?delete_slide=<?php echo $slide_id; ?>" class="float-right"><!-- float-right begin -->
                                
                                 <i class="fa fa-trash"></i> Delete
                                
                                </a><!-- pull-right finish -->
                                
                                <a href="index.php?edit_slide=<?php echo $slide_id; ?>" class="float-left"><!-- float-left begin -->
                                
                                 <i class="fas fa-pencil-ruler"></i> Edit
                                
                                </a><!-- pull-left finish -->
                                
                                <div class="clearfix"></div>
                                
                            </center><!-- center finish -->
                        </div><!-- panel-footer finish -->
                        
                    </div><!-- panel panel-primary finish -->
                </div><!-- col-lg-3 col-md-3 finish -->
                
                <?php } ?>
            
            </div><!-- card-block finish -->
            </div>
            
        </div><!-- card finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


<?php } ?>