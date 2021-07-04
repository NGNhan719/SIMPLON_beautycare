<div>
    
    <h1 class="text-center">My Orders</h1>
    <p class="text-center lead">Yours orders in one place</p>
    <p class="text-center text-muted">
        If you have any questions, feel free to <a href="../contact.php">Contact Our Customer Services</a> <strong>24/7</strong>        
    </p>
    
</div>

<hr>

<div class="table-responsive"><!-- table-responsive begin -->
    
    <table class="table table-bordered table-hover">
        
        <thead>
            
            <tr>
                
                <th> ON: </th>
                <th> Due Amount: </th>
                <th> Invoice Number: </th>
                <th> Qty: </th>
                <th> Order Date: </th>
                <th> Paid / Unpaid: </th>
                <th> Status: </th>
                
            </tr>
            
        </thead>
        
        <tbody>
            
            <?php 
            
            $customer_session = $_SESSION['CustomerEmail'];
            
            $get_customer = "SELECT * FROM customers WHERE CustomerEmail='$customer_session'";
            
            $run_customer = mysqli_query($con,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['CustomerID'];
            
            $get_orders = "SELECT * FROM customer_orders WHERE CustomerID='$customer_id'";
            
            $run_orders = mysqli_query($con,$get_orders);
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['OrderID'];
                
                $due_amount = $row_orders['DueAmount'];
                
                $invoice_no = $row_orders['InvoiceNo'];
                
                $qty = $row_orders['Quantity'];
                
                $order_date = substr($row_orders['OrderDate'],0,11);
                
                $order_status = $row_orders['OrderStatus'];
                
                $i++;
                
                if($order_status=='Pending'){
                    
                    $order_status = 'Unpaid';
                    
                }else{
                    
                    $order_status = 'Paid';
                    
                }
            
            ?>
            
            <tr><!--  tr Begin  -->
                
                <th> <?php echo $i; ?> </th>
                <td> $<?php echo $due_amount; ?> </td>
                <td> <?php echo $invoice_no; ?> </td>
                <td> <?php echo $qty; ?> </td>
                <td> <?php echo $order_date; ?> </td>
                <td> <?php echo $order_status; ?> </td>
                <td>
                    
                    <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_blank" class="btn btn-primary btn-sm"> Confirm Paid </a>
                    
                </td>
                
            </tr><!--  tr Finish  -->
            
            <?php } ?>     
            
        </tbody>
        
    </table>
    
</div><!-- table-responsive end -->