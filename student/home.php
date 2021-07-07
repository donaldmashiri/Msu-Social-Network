<?php include('stdIncludes/header.php'); ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


        <!-- sidebar: style can be found in sidebar.less -->
      <?php include('stdIncludes/sidebar.php'); ?>
        <!-- /.sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Lets talk
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Lets talk</a></li>
                <li><a href="#">students</a></li>
                <li class="active">Activities</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">
                    <?php include('stdIncludes/user_details.php'); ?>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <?php include('stdIncludes/discuss.php'); ?>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>

<?php include('stdIncludes/footer.php'); ?>