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

                    <?php
                    $open = $_GET['open'];

                    $sql = "SELECT * FROM performance";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $per_id = $row["per_id"];
                            $std_id = $row["std_id"];
                            $module = $row["module"];
                            $topic = $row["topic"];
                            $notes = $row["notes"];
                        }
                    }

                    ?>

                    <!-- Chat box -->
                                        <div class="box box-success">
                                            <div class="box-header">
                                                <i class="fa fa-bookmark-o"></i>

                                                <h3 class="box-title">Your notes ON <?php echo $open; ?> </h3>
                                            </div>
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
                                        </div>
                    <!-- /.box (chat box) -->







                    <!-- /.col -->
                </div>
                <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>


<?php include('stdIncludes/footer.php'); ?>