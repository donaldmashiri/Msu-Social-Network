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
                Online Notes
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> record</a></li>
                <li><a href="#">students</a></li>
                <li class="active">notes</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <div class="col-md-9">
                    <!-- TO DO List -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <i class="ion ion-clipboard"></i>

                            <h3 class="box-title">Onlince Notices</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                            <ul class="todo-list">
                                <?php
                                $sql = "SELECT * FROM notices";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $notice_id = $row["notice_id"];
                                        $notice = $row["notice"];
                                        $notice_date = $row["notice_date"];
                                        $notice_type = $row["notice_type"];

                                        ?>

                                <li>
                                    <!-- drag handle -->
                                    <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                                    <h4>From: <?php echo $notice_type ?></h4>
                                    <!-- checkbox -->
                                    <input type="checkbox" value="">
                                    <!-- todo text -->
                                    <span class="text"><?php echo $notice ?></span>
                                    <!-- Emphasis label -->
                                    <small class="label label-danger"><i class="fa fa-clock-o"></i> <?php echo $notice_date ?></small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fa fa-edit"></i>
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>


                                    <?php }
                                } else {
                                    echo "No Notice Yet";
                                }
                                ?>

                            </ul>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->
                    <!-- /.col -->
                </div>
                <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>


<?php include('stdIncludes/footer.php'); ?>