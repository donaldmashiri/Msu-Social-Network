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
                <div class="col-md-3">
                    <?php include('lecIncludes/lec_details.php'); ?>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="row">

                        <!-- /.col -->

                        <div class="col-md-12">
                            <!-- USERS LIST -->
                            <div class="box box-danger">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <h3>Notices</h3>

                                    <?php
                                    if(isset($_POST['submit'])){

                                        $notice = $_POST['notice'];
                                        $notice_date = date("Y-m-d h:i:sa");
                                        $notice_type = "Lecturer";

                                        $sql = "INSERT INTO notices (notice, notice_type, notice_date)
                                     VALUES ( '{$notice}','{$notice_type}', '{$notice_date}')";

                                        if ($conn->query($sql) === TRUE) {
                                            echo "<p class='alert alert-success text-center'>Notice Successfully</p>";
                                        } else {
                                            echo "Error: " . $sql . "<br>" . $conn->error;
                                        }

                                    }
                                    ?>


                                    <div class="col-sm-10">
                                        <textarea name="notice"  class="form-control" id="inputExperience" placeholder="Say Something"></textarea>
                                    </div>

                                    <div  class="col-sm-2">
                                        <button style="margin-top:10px;" type="submit" name="submit" class="btn btn-danger pull-left btn-block ">Send</button>
                                    </div>
                                </form>





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