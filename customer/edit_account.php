<?php 

$customer_session = $_SESSION['CustomerEmail'];

$get_customer = "SELECT * FROM customers WHERE CustomerEmail='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['CustomerID'];

$customer_name = $row_customer['CustomerName'];

$customer_email = $row_customer['CustomerEmail'];

$customer_city = $row_customer['CustomerCity'];

$customer_contact = $row_customer['CustomerContact'];

$customer_address = $row_customer['CustomerAddress'];

$customer_image = $row_customer['CustomerImg'];

?>


<h1 class="text-center">Edit Your Account</h1>

<form action="" method="POST" enctype="multipart/form-data"><!-- form begin -->

    <div class="form-group">

        <label> Customer Name: </label>
        <input type="text" class="form-control" name="c_name" value="<?php echo $customer_name; ?>" required>

    </div>

    <div class="form-group">

        <label> Customer Email: </label>
        <input type="text" class="form-control" name="c_email" value="<?php echo $customer_email; ?>" required>

    </div>

    <div class="form-group">

        <label> Customer City: </label>
        <input type="text" class="form-control" name="c_city" value="<?php echo $customer_city; ?>" required>

    </div>

    <div class="form-group">

        <label> Customer Contact: </label>
        <input type="text" class="form-control" name="c_contact" value="<?php echo $customer_contact; ?>" required>

    </div>

    <div class="form-group">

        <label> Customer Address: </label>
        <input type="text" class="form-control" name="c_address" value="<?php echo $customer_address; ?>" required>

    </div>

    <div class="form-group">

        <label> Customer Image: </label>
        <input type="file" class="form-control form-height-custom" name="c_image">
        <img class="img-fluid" src="customer_img/<?php echo $customer_image; ?>" alt="Customer Image">
        
    </div>

    <div class="text-center">

        <button type="submit" name="update" class="btn btn-primary">
            <i class="fas fa-user-tie"></i> 
            Update Now
        </button>

    </div>

</form><!-- form end -->

<?php 

if(isset($_POST['update'])){
    
    $update_id = $customer_id;
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $c_city = $_POST['c_city'];
    
    $c_address = $_POST['c_address'];
    
    $c_contact = $_POST['c_contact'];
    
    $c_image = $_FILES['c_image']['name'];
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    move_uploaded_file ($c_image_tmp,"customer_img/$c_image");
    
    $update_customer = "UPDATE customers SET CustomerName='$c_name',CustomerEmail='$c_email',CustomerCity='$c_city',CustomerAddress='$c_address',CustomerContact='$c_contact',CustomerImg='$c_image' WHERE CustomerID='$update_id' ";
    
    $run_customer = mysqli_query($con,$update_customer);
    
    if($run_customer){
        
        echo "<script>alert('Your account has been edited.\\n\\nTo complete the process, please Relogin')</script>";
        
        echo "<script>window.open('logout.php','_self')</script>";
        
    }
    
}


?>