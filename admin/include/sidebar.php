<?php
if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <nav class="navbar fixed-top"><!-- navbar navbar-inverse fixed-top begin -->
        <div><!-- navbar-header begin -->

            <a href="index.php?dashboard" class="navbar-brand text-center">WELCOME ADMIN</a>

        </div><!-- navbar-header end -->

        <ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav begin -->

            <li class="nav-item">

                <a class="nav-link" href="index.php?user_profile=<?php echo $admin_id; ?>"><!-- a href begin -->

                    <i class="fas fa-user"></i> <?php echo $admin_name; ?>

                </a><!-- a href end -->

            </li>
            
            <li class="nav-item"><!-- dropdown begin -->

                <a class="nav-link" href="logout.php"><!-- a href begin -->

                    <i class="fas fa-power-off"></i> Log Out

                </a><!-- a href end -->

            </li><!-- dropdown end -->

        </ul><!-- nav navbar-right top-nav end -->

        <ul class="navbar-nav float-left side-nav"><!-- nav navbar-nav side-nav begin -->
            <li class="nav-item"><!-- li begin -->
                <a class="nav-link" href="index.php?dashboard"><!-- a href begin -->

                    <i class="fab fa-dashcube"></i> Dashboard

                </a><!-- a href end -->

            </li><!-- li end -->

            <li class="nav-item"><!-- li begin -->
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#products"><!-- a href begin -->

                    <i class="fa fa-fw fa-tag"></i> Products
                    <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- a href end -->

                <ul id="products" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_product"> Insert Product </a>
                    </li><!-- li end -->
                    <li><!-- li begin -->
                        <a href="index.php?view_products"> View Products </a>
                    </li><!-- li end -->
                </ul><!-- collapse end -->

            </li><!-- li end -->

            <li class="nav-item"><!-- li begin -->
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#p_cat"><!-- a href begin -->

                    <i class="fa fa-fw fa-edit"></i> Products Categories
                    <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- a href end -->

                <ul id="p_cat" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_perf_cat"> Insert Product Category </a>
                    </li><!-- li end -->
                    <li><!-- li begin -->
                        <a href="index.php?view_perf_cats"> View Products Categories </a>
                    </li><!-- li end -->
                </ul><!-- collapse end -->

            </li><!-- li end -->

            <li class="nav-item"><!-- li begin -->
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#slides"><!-- a href begin -->

                    <i class="fas fa-sliders-h"></i> Slides
                    <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- a href end -->

                <ul id="slides" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_slide"> Insert Slide </a>
                    </li><!-- li end -->
                    <li><!-- li begin -->
                        <a href="index.php?view_slides"> View Slides </a>
                    </li><!-- li end -->
                </ul><!-- collapse end -->

            </li><!-- li end -->

            <li class="nav-item"><!-- li begin -->
                <a class="nav-link" href="index.php?view_customers"><!-- a href begin -->
                    <i class="fa fa-fw fa-users"></i> View Customers
                </a><!-- a href end -->
            </li><!-- li end -->

            <li class="nav-item"><!-- li begin -->
                <a class="nav-link" href="index.php?view_orders"><!-- a href begin -->
                    <i class="fa fa-fw fa-book"></i> View Orders
                </a><!-- a href end -->
            </li><!-- li end -->

            <li class="nav-item"><!-- li begin -->
                <a class="nav-link" href="index.php?view_payments"><!-- a href begin -->
                    <i class="far fa-money-bill-alt"></i> View Payments
                </a><!-- a href end -->
            </li><!-- li end -->

            <li class="nav-item"><!-- li begin -->
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#users"><!-- a href begin -->

                    <i class="fa fa-fw fa-users"></i> Users
                    <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- a href end -->

                <ul id="users" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_user"> Insert User </a>
                    </li><!-- li end -->
                    <li><!-- li begin -->
                        <a href="index.php?view_users"> View Users </a>
                    </li><!-- li end -->
                    <li><!-- li begin -->
                        <a href="index.php?user_profile=<?php echo $admin_id; ?>"> Edit User Profile </a>
                    </li><!-- li end -->
                </ul><!-- collapse end -->

            </li><!-- li end -->

        </ul><!-- nav navbar-nav side-nav end -->

    </nav><!-- navbar navbar-inverse fixed-top end -->


<?php } ?>