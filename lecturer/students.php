<?php include('lecIncludes/header.php'); ?>
    <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


    <!-- sidebar: style can be found in sidebar.less -->
    <?php include('lecIncludes/sidebar.php'); ?>
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
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="row">

                        <!-- /.col -->

                        <div class="col-md-12">
                            <!-- USERS LIST -->
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Select Students</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <ul class="users-list clearfix">
                                        <?php
                                        $sql = "SELECT * FROM students";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                $std_id = $row["std_id"];
                                                $full_names = $row["full_names"];
                                                $std_program = $row["std_program"];
                                                $std_email = $row["std_email"];
                                                $std_phone = $row["std_phone"];
                                                $std_level = $row["std_level"];
                                                $std_regno = $row["std_regno"];
                                                $std_image = $row["std_image"];

                                                ?>
                                                <li>
                                                    <img src="../images/students/<?php echo $std_image ?>" width="128" height="128" alt="User Image">
                                                    <a class="users-list-name" href="open.php?open=<?php echo $std_id ?>"><?php echo $full_names ?></a>
                                                    <span class="users-list-date"><?php echo $std_regno ?></span>
                                                </li>

                                            <?php }
                                        } else {
                                            echo "No Students Yet";
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

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>

<?php include('lecIncludes/footer.php'); ?>