<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>MSU</b> Social Network</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->

                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">

                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                        page and may cause design problems
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../images/students/<?php echo $std_image ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $full_names ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="../images/students/<?php echo $std_image ?>" class="img-circle" alt="User Image">

                            <p>
                                <?php echo $full_names ?>
                                <small><?php echo $std_regno ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">

                                <?php
                                if(isset($_SESSION['std_id'])){
                                    echo " <a href='index.php?destroy' class='btn btn-default btn-flat'>Sign out</a>";
                                }else{
                                    echo "<a class='dropdown-item' href='login.php'>Login</a>";

                                }
                                if(isset($_GET['destroy'])){
                                    unset($_SESSION['std_id']);
                                    header("Location: index.php");
                                }
                                ?>




                            </div>




                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->

            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="../images/students/<?php echo $std_image ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo $full_names ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>
        <li>
            <a href="home.php">
                <i class="fa fa-home"></i> <span>Home</span>
                <span class="pull-right-container">

            </span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-user"></i> <span>Personal Details</span>
                <span class="pull-right-container">
            </span>
            </a>
        </li>
        <li>
            <a href="direct_lec.php">
                <i class="fa fa-envelope"></i> <span>Direct Communication</span>
                <span class="pull-right-container">
            </span>
            </a>
        </li>
        <li>
            <a href="notes.php">
                <i class="fa fa-book"></i> <span>Online Notes</span>
                <span class="pull-right-container">
            </span>
            </a>
        </li>
        <li>
            <a href="advert.php">
                <i class="fa fa-desktop"></i> <span>Advertisement</span>
                <span class="pull-right-container">
            </span>
            </a>
        </li>
        <li><a href="view_notices.php"><i class="fa fa-bell-o text-aqua"></i> <span>Notices</span></a></li>

<!--        --><?php
//        if(isset($_SESSION['std_id'])){
//            echo "<a class='dropdown-item' href='index.php?destroy'>Logout</a>";
//        }else{
//            echo "<a class='dropdown-item' href='login.php'>Login</a>";
//
//        }
//        if(isset($_GET['destroy'])){
//            unset($_SESSION['std_id']);
//            session_destroy();
////            unset($_SESSION['cart_number']);
//
//            header("Location: index.php");
//        }
//        ?>

        <li>
            <form action="" method="post">
                <button class="btn btn-danger" name="logout" type="submit">logout</button>
            </form>
        </li>

        <?php
        if(isset($_POST['logout'])){
            unset($_SESSION['std_id']);
            header("Location: index.php");
        }
        ?>



    </ul>
</section>

</aside>