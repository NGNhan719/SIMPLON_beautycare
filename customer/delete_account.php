<div class="text-center">

    <h1>Do You Really Want To Delete Your Account ?</h1>

    <form action="" method="POST"><!-- form begin -->

        <input type="submit" name="yes" value="Yes, I Want To Delete" class="btn btn-danger">
        <input type="submit" name="no" value="No, I Donot Want To Delete" class="btn btn-success">

    </form><!-- form end -->

</div>

<?php 

$c_email = $_SESSION['CustomerEmail'];

if(isset($_POST['yes'])){
    
    $delete_customer = "DELETE FROM customers WHERE CustomerEmail='$c_email'";
    
    $run_delete_customer = mysqli_query($con, $delete_customer);
    
    if($run_delete_customer){
        
        session_destroy();
        
        echo "<script>alert('\\nSuccessfully Delete Your Account.\\n\\nHope to See You Again.')</script>";
        
        echo "<script>window.open('../index.php','_self')</script>";
        
    }
        
}

if(isset($_POST['no'])){
    
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    
}

?>