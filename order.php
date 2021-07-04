<?php

session_start();

include("include/db.php");
include("functions/functions.php");

?>

<?php

if(isset($_GET['c_id'])){
    
    $customer_id = $_GET['c_id'];
    
}

$ip_add = getRealUserIp();

$status = "Pending";

$invoice_no = mt_rand();

$select_cart = "SELECT * FROM cart WHERE IpAdd='$ip_add'";

$run_cart = mysqli_query($con, $select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){
    
    $pro_id = $row_cart['ProID'];
    
    $pro_qty = $row_cart['Quantity'];
    
    $get_product = "SELECT * FROM products WHERE ProductID='$pro_id'";
    
    $run_product = mysqli_query($con, $get_product);
    
    while($row_products = mysqli_fetch_array($run_product)){
        
        $sub_total = $row_products['Price']*$pro_qty;
        
        $insert_customer_order = "INSERT INTO customer_orders
        (CustomerID,DueAmount,InvoiceNo,Quantity,OrderDate,OrderStatus) 
        VALUES ('$customer_id','$sub_total','$invoice_no','$pro_qty',NOW(),'$status')";
        
        $run_customer_order = mysqli_query($con, $insert_customer_order);
        
        $insert_pending_order = "INSERT INTO pending_orders
        (CustomerID,InvoiceNo,ProductID,Quantity,OrderStatus) 
        VALUES ('$customer_id','$invoice_no','$pro_id','$pro_qty','$status')";
        
        $run_pending_order = mysqli_query($con, $insert_pending_order);
        
        $delete_cart = "DELETE FROM cart WHERE IpAdd='$ip_add'";
        
        $run_delete = mysqli_query($con, $delete_cart);
        
        echo "<script>alert('Your orders have been submitted. Thank you')</script>"; 
        
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        
        
        
    }
    
}

?>