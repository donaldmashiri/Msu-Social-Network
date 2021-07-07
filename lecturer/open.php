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

            <?php
            $open = $_GET['open'];

            $sql = "SELECT * FROM performance JOIN students ON performance.std_id = students.std_id WHERE  performance.std_id = $open";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $per_id = $row["per_id"];
                    $std_id = $row["std_id"];
                    $module = $row["module"];
                    $topic = $row["topic"];
                    $notes = $row["notes"];
                    $full_names = $row["full_names"];
                }
            }

            ?>

            <div class="row">
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="row">

                        <!-- /.col -->

                        <div class="col-md-12">
                            <!-- USERS LIST -->
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Check notes</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box box-success">
                                    <div class="box-header">
                                        <i class="fa fa-bookmark-o"></i>

                                        <h3 class="box-title">Notes For : <?php echo $full_names; ?> </h3>
                                    </div>
                                    <?php
                                    $open = $_GET['open'];

                                    $sql = "SELECT * FROM performance JOIN students ON performance.std_id = students.std_id WHERE module='{$module}' AND  performance.std_id = $open";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            $per_id = $row["per_id"];
                                            $std_id = $row["std_id"];
                                            $module = $row["module"];
                                            $topic = $row["topic"];
                                            $notes = $row["notes"];
                                            $full_names = $row["full_names"];
                                    ?>
                                    <div class="box-body chat" id="chat-box">
                                        <div class="item">
                                            <div class="attachment">
                                                <h4>Topic: <?php echo $topic; ?></h4>
                                                <p class="filename">
                                                    <?php echo $notes; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php }
                                } else {
                                    echo "No Message Yet";
                                }
                                ?>
                                </div>
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