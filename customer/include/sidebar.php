<div class="card card-default sidebar-menu"><!-- card card-default sidebar-menu begin -->

    <div class="card-header"><!-- card-header begin -->

        <?php 
        
        $customer_session = $_SESSION['CustomerEmail'];
        
        $get_customer = "SELECT * FROM customers WHERE CustomerEmail='$customer_session'";
        
        $run_customer = mysqli_query($con, $get_customer);
        
        $row_customer = mysqli_fetch_array($run_customer);
        
        $customer_img = $row_customer['CustomerImg'];
        
        $customer_name = $row_customer['CustomerName'];
        
        if(!isset($_SESSION['CustomerEmail'])){
                                   
        }else{
            
            echo "
                <div>

                <img src='customer_img/$customer_img' alt='SIMPLON Profile' class='img-fluid'>

                </div>

                <br/>

                <h5 align='center' class='card-title'><!-- card-title begin -->

                    Name: $customer_name

                </h5><!-- card-title end -->


            ";
            
        }
        
        ?>     
        
    </div><!-- card-header end -->

    <div class="card-block"><!-- card-block begin -->

        <ul class="nav nav-pills flex-column pad-menu"><!-- av nav-pills flex-column begin -->

            <li class="nav-item <?php
            if (isset($_GET['myorder'])) {
                echo "active";
            }
            ?>">
                <a class="nav-link" href="my_account.php?my_orders">
                    <i class="fas fa-list"></i>
                    My Orders
                </a>

            </li>

            <li class="nav-item <?php
            if (isset($_GET['pay_offline'])) {
                echo "active";
            }
            ?>">
                <a class="nav-link" href="my_account.php?pay_offline">
                    <i class="fas fa-bolt"></i>
                    Pay Offline
                </a>

            </li>

            <li class="nav-item <?php
            if (isset($_GET['edit_account'])) {
                echo "active";
            }
            ?>">
                <a class="nav-link" href="my_account.php?edit_account">
                    <i class="fas fa-pencil-alt"></i>
                    Edit Account
                </a>

            </li>

            <li class="nav-item <?php
            if (isset($_GET['change_pass'])) {
                echo "active";
            }
            ?>">
                <a class="nav-link" href="my_account.php?change_pass">
                    <i class="fas fa-user"></i>
                    Change Password
                </a>

            </li>

            <li class="nav-item <?php
            if (isset($_GET['delete_account'])) {
                echo "active";
            }
            ?>">
                <a class="nav-link" href="my_account.php?delete_account">
                    <i class="far fa-trash-alt"></i>
                    Delete Account
                </a>

            </li>

            <li class="nav-item <?php
            if (isset($_GET['log_out'])) {
                echo "active";
            }
            ?>">
                <a class="nav-link" href="my_account.php?log_out">
                    <i class="fas fa-sign-out-alt"></i>
                    Log Out
                </a>

            </li>

        </ul><!-- av nav-pills flex-column end -->

    </div><!-- card-block end -->

</div><!-- card card-default sidebar-menu end -->