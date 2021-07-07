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
                                    <h3 class="box-title">Messages reports</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Message</th>
<!--                                                <th>sender</th>-->
<!--                                                <th>receiver</th>-->
                                                <th>Sender type</th>
                                                <th>Date sent</th>
                                                <!--                                                <th>Level</th>-->
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $sql = "SELECT * FROM messages ORDER BY msg_id DESC";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                                    $msg_id = $row["msg_id"];
                                                    $message = $row["message"];
                                                    $sender = $row["sender"];
                                                    $receiver = $row["receiver"];
                                                    $sender_type = $row["sender_type"];
                                                    $msg_date = $row["msg_date"];

                                                    ?>

                                                    <tr>
                                                        <td><?php echo $msg_id ?></td>
                                                        <td><?php echo $message ?></td>
                                                        <td>
                                                            <?php echo $sender_type ?>
                                                        </td>
                                                        <td><?php echo $msg_date ?></td>
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