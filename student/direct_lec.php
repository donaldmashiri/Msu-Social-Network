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
                Direct Communication
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Lets talk</a></li>
                <li><a href="#">students</a></li>
                <li class="active">lecturer</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Your Module Lecturers</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                                <?php
                                $sql = "SELECT * FROM lecturers";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $lec_id = $row["lec_id"];
                                        $lec_names = $row["lec_names"];
                                        $lec_email = $row["lec_email"];
                                        $lec_image = $row["lec_image"];
                                        $module = $row["module"];
                                        ?>
                                        <li>
                                            <img src="../images/<?php echo $lec_image ?>" width="110" height="110" alt="User Image">
                                            <a class="users-list-name" href="direct.php?direct=<?php echo $lec_id ?>"><?php echo $lec_names ?></a>
                                            <span class="users-list-date"><?php echo $lec_email ?></span>
                                        </li>

                                    <?php }
                                } else {
                                    echo "No Yet";
                                }
                                ?>
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->

                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->


        </section>
        <!-- /.content -->
    </div>

<?php include('stdIncludes/footer.php'); ?>