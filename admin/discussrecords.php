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
                <li><a href="#">admin</a></li>
                <li class="active">admin</li>
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
                                    <h3 class="box-title">Discussion reports</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                            <tr>
                                                <th>Reg#</th>
                                                <th>Student Name</th>
                                                <th>topic</th>
                                                <th>date</th>
                                                <th>Number of Comments</th>
<!--                                                <th>Level</th>-->
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $sql = "SELECT * FROM discussions JOIN students On discussions.std_id = students.std_id ORDER BY discuss_id DESC ";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    $discuss_id = $row["discuss_id"];
                                                    $std_id = $row["std_id"];
                                                    $topic_name = $row["topic_name"];
                                                    $topic_image = $row["topic_image"];
                                                    $topic_date = $row["topic_date"];

                                                    $full_names = $row["full_names"];
                                                    $std_image = $row["std_image"];
                                                    $std_regno = $row["std_regno"];

                                                    ?>

                                                    <tr>
                                                        <td><?php echo $std_regno ?></td>
                                                        <td><?php echo $full_names ?></td>
                                                        <td>
                                                            <?php echo $topic_name ?>
                                                        </td>
                                                        <td><?php echo $topic_date ?></td>
                                                        <td>
<!--                                                            --><?php
//                                                            $query = "SELECT count(discuss_id) As CartNo FROM comments WHERE  discuss_id = $discuss_id";
//                                                            $result = $conn->query($query);
//
//                                                            if ($result->num_rows > 0) {
//                                                                // output data of each row
//                                                                while($row = $result->fetch_assoc()) {
//                                                                    $discuss_id = $row["discuss_id"];
//                                                                     $count = $row['CartNo'];}}
//                                                            echo $count;
//                                                                            ?>
                                                        </td>
<!--                                                        <td>--><?php //echo $std_level ?><!--</td>-->
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

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>

<?php include('lecIncludes/footer.php'); ?>