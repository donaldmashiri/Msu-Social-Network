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
                All records
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
                                    <h3 class="box-title">Students</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                            <tr>
                                                <th>Reg#</th>
                                                <th>Student Name</th>
                                                <th>Image</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Level</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                <?php
                                $sql = "SELECT * FROM students";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $std_id = $row["std_id"];
                                        $full_names = $row["full_names"];
                                        $std_program = $row["std_program"];
                                        $std_email = $row["std_email"];
                                        $std_phone = $row["std_phone"];
                                        $std_level = $row["std_level"];
                                        $std_regno = $row["std_regno"];
                                        $std_image = $row["std_image"];
                                        ?>
                                            <tr>
                                                <td><?php echo $std_regno ?></td>
                                                <td><?php echo $full_names ?></td>
                                                <td>
                                                    <img src="../images/students/<?php echo $std_image ?>" class="img-circle" width="60" height="60">
                                                </td>
                                                <td><?php echo $std_email ?></td>
                                                <td><?php echo $std_phone ?></td>
                                                <td><?php echo $std_level ?></td>
                                            </tr>

                                    <?php }
                                } else {
                                    echo "No Message Yet";
                                }
                                ?>

                                            </tbody>
                                        </table>
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


                    <div class="row">
                        <!-- /.col -->

                        <div class="col-md-12">
                            <!-- USERS LIST -->
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Lectuers</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                            <tr>
                                                <th>Lec#</th>
                                                <th>Image</th>
                                                <th>Lec Name</th>
                                                <th>Email</th>
                                                <th>module</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $sql = "SELECT * FROM lecturers";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                                    $lec_id = $row["lec_id"];
                                                    $lec_names = $row["lec_names"];
                                                    $lec_email = $row["lec_email"];
                                                    $lec_image = $row["lec_image"];
                                                    $module = $row["module"];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $lec_id ?></td>
                                                        <td>
                                                            <img src="../images/<?php echo $lec_image ?>" class="img-circle" width="60" height="60">
                                                        </td>
                                                        <td><?php echo $lec_names ?></td>
                                                        <td><?php echo $lec_email ?></td>
                                                        <td><?php echo $module ?></td>
                                                    </tr>

                                                <?php }
                                            } else {
                                                echo "No Lecturers Yet";
                                            }
                                            ?>

                                            </tbody>
                                        </table>
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


                    <div class="row">
                        <!-- /.col -->

                        <div class="col-md-12">
                            <!-- USERS LIST -->
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Online Notes</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                            <tr>
                                                <th>Reg#</th>
                                                <th>student Name</th>
                                                <th>Topic</th>
                                                <th>Notes</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $sql = "SELECT * FROM performance JOIN students On performance.std_id = students.std_id";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                                    $per_id = $row["per_id"];
                                                    $topic = $row["topic"];
                                                    $std_regno = $row["std_regno"];
                                                    $full_names = $row["full_names"];
                                                    $notes = $row["notes"];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $std_regno ?></td>
                                                        <td><?php echo $full_names ?></td>
                                                        <td><?php echo $topic ?></td>
                                                        <td><?php echo $notes ?></td>
                                                    </tr>

                                                <?php }
                                            } else {
                                                echo "No Lecturers Yet";
                                            }
                                            ?>

                                            </tbody>
                                        </table>
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