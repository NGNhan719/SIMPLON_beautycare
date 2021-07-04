<h1 class="text-center">Change Your Password</h1>

<form action="" method="POST"><!-- form begin -->

    <div class="form-group">

        <label> Your Old Password: </label>
        <input type="text" class="form-control" name="old_pass" required>

    </div>

    <div class="form-group">

        <label> Your New Password: </label>
        <input type="text" class="form-control" name="new_pass" required>

    </div>

    <div class="form-group">

        <label> Confirm Your New Password: </label>
        <input type="text" class="form-control" name="new_pass_again" required>

    </div>
    
    <div class="text-center">

        <button type="submit" name="submit" class="btn btn-primary">
            <i class="fas fa-user-tie"></i> 
            Update Now
        </button>

    </div>

</form><!-- form end -->

<?php 

if(isset($_POST['submit'])){
    
    $c_email = $_SESSION['CustomerEmail'];
    
    $c_old_pass = $_POST['old_pass'];
    
    $c_new_pass = $_POST['new_pass'];
    
    $c_new_pass_again = $_POST['new_pass_again'];
    
    $sel_c_old_pass = "SELECT * FROM customers WHERE CustomerPass='$c_old_pass'";
    
    $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
    
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    
    if($check_c_old_pass==0){
        
        echo "<script>alert('Sorry, your current password did not valid. Please try again')</script>";
        
        exit();
        
    }
    
    if($c_new_pass!=$c_new_pass_again){
        
        echo "<script>alert('Sorry, your new password did not match')</script>";
        
        exit();
        
    }
    
    $update_c_pass = "UPDATE customers SET CustomerPass='$c_new_pass' WHERE CustomerEmail='$c_email'";
    
    $run_c_pass = mysqli_query($con,$update_c_pass);
    
    if($run_c_pass){
        
        echo "<script>alert('Your password has been updated')</script>";
        
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        
    }
    
}

?>