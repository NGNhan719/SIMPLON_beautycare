<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?> 
<div class="row"><!-- row no: 3 begin -->
    <div class="col-lg-8"><!-- col-lg-8 begin -->
        <div class="card"><!-- card begin -->
            <div class="card-header"><!-- card-header begin -->
                <h3 class="card-title"><!-- card-title begin -->
                    
                    <i class="fa fa-money fa-fw"></i> New Orders
                    
                </h3><!-- card-title finish -->
            </div><!-- card-header finish -->
            
            <div class="card-block"><!-- card-block begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- table table-hover table-striped table-bordered begin -->
                        
                        <thead><!-- thead begin -->
                          
                            <tr><!-- th begin -->
                           
                                <th> Order no: </th>
                                <th> Customer Email: </th>
                                <th> Invoice No: </th>
                                <th> Product ID: </th>
                                <th> Product Qty: </th>
                                <th> Status: </th>
                            
                            </tr><!-- th finish -->
                            
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                          
                            <?php 
                          
                                $i=0;
          
                                $get_order = "SELECT * FROM pending_orders ORDER BY 1 DESC LIMIT 0,5";
          
                                $run_order = mysqli_query($con,$get_order);
          
                                while($row_order=mysqli_fetch_array($run_order)){
                                    
                                    $order_id = $row_order['OrderID'];
                                    
                                    $c_id = $row_order['CustomerID'];
                                    
                                    $invoice_no = $row_order['InvoiceNo'];
                                    
                                    $product_id = $row_order['ProductID'];
                                    
                                    $qty = $row_order['Quantity'];
                                    
                                    $order_status = $row_order['OrderStatus'];
                                    
                                    $i++;
                            
                            ?>
                           
                            <tr><!-- tr begin -->
                               
                                <td> <?php echo $order_id; ?> </td>
                                <td>
                                    
                                    <?php 
                                    
                                        $get_customer = "SELECT * FROM customers WHERE CustomerID='$c_id'";
                                    
                                        $run_customer = mysqli_query($con,$get_customer);
                                    
                                        $row_customer = mysqli_fetch_array($run_customer);
                                    
                                        $customer_email = $row_customer['CustomerEmail'];
                                    
                                        echo $customer_email;
                                    
                                    ?>
                                    
                                </td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <?php echo $product_id; ?> </td>
                                <td> <?php echo $qty; ?> </td>
                                <td>
                                    
                                    <?php 
                                    
                                        if($order_status=='Pending'){
                                            
                                            echo $order_status='Pending';
                                            
                                        }else{
                                            
                                            echo $order_status='Complete';
                                            
                                        }
                                    
                                    ?>
                                    
                                </td>
                                
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
                
                <div class="text-right"><!-- text-right begin -->
                    
                    <a href="index.php?view_orders"><!-- a href begin -->
                        
                        View All Orders <i class="fa fa-arrow-circle-right"></i>
                        
                    </a><!-- a href finish -->
                    
                </div><!-- text-right finish -->
                
            </div><!-- card-block finish -->
            
        </div><!-- card finish -->
    </div><!-- col-lg-8 finish -->
    
    
</div><!-- row no: 3 finish -->


<?php } ?>