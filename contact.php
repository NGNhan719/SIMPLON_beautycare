<?php 

$active='Contact';

include("include/header.php");

?>

        <div id="content"><!-- content begin -->

            <div class="container"><!-- container begin -->

                <div class="row"><!-- row begin -->

                    <div class="col-lg-12"><!-- col-lg-12 begin -->

                        <ul class="breadcrumb"><!-- breadcrumb begin -->

                            <li><a href="index.php">Home</a></li>
                            <li>Contact</li>

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
                                    
                                    <h3>Feel Free To Contact Us</h3>
                                    
                                    <p class="text-muted">
                                        
                                        If you have any question, please contact our Customer Service <strong>24/7</strong>
                                        
                                    </p>
                                    
                                </div><!-- text-center end -->
                                
                                <form action="contact.php" method="post"><!-- form begin -->
                                    
                                    <div class="form-group">
                                        
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" required>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        
                                        <label>Subject</label>
                                        <input type="text" class="form-control" name="subject" required>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        
                                        <label>Message</label>
                                        <textarea class="form-control" name="message" required></textarea>
                                        
                                    </div>
                                    
                                    <div class="text-center">
                                        
                                        <button type="submit" name="submit" class="btn btn-primary">
                                            <i class="fas fa-user-tie"></i> 
                                            Send Message
                                        </button>
                                        
                                    </div>
                                    
                                </form><!-- form end -->
                                
                                <?php
                                
                                if(isset($_POST['submit'])){
                                    
                                    ///Admin receives messages ///
                                        
                                    $sender_name = $_POST['name'];
                                    
                                    $sender_email = $_POST['email'];
                                    
                                    $sender_subject = $_POST['subject'];
                                    
                                    $sender_message = $_POST['message'];
                                    
                                    $receiver_email = "loremipsum@gmail.com";
                                    
                                    mail($receiver_email,$sender_name, $sender_email,$sender_subject, $sender_message);
                                    
                                    ///Auto reply sender ///
                                    
                                    $email = $_POST['email'];
                                    
                                    $subject = "Welcome to my website";
                                    
                                    $msg = "Thank you for sending us message. We will respond to you as soon as possible";
                                    
                                    $from = "loremipsum@gmail.com";
                                    
                                    mail($email,$subject,$msg, $from);
                                    
                                    echo "<h2 align='center'> Your message has been sent successfully ! </h2>";
                                    
                                }
                                
                                ?>
                                
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