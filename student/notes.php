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
                <div class="col-md-3">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Your Modules</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th>Module Code</th>
                                        <th>Module</th>
<!--                                        <th>Status</th>-->

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><a href="open.php?open=HCS111 - Costing">HCS111</a></td>
                                        <td>Costing</td>

                                    </tr>
                                    <tr>
                                        <td><a href="open.php?open=HCS405 - Introduction to Programming">HCS405</a></td>
                                        <td>Programming</td>

                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">

                    <!-- Chat box -->
<!--                    <div class="box box-success">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-bookmark-o"></i>-->
<!---->
<!--                            <h3 class="box-title">Your notes</h3>-->
<!--                        </div>-->
<!--                        <div class="box-body chat" id="chat-box">-->
<!--                            <div class="item">-->
<!--                                <div class="attachment">-->
<!--                                    <h4>Attachments:</h4>-->
<!--                                    <p class="filename">-->
<!--                                        Theme-thumbnail-image.jpg-->
<!--                                    </p>-->
<!--                                    <div class="pull-right">-->
<!--                                        <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <!-- /.box (chat box) -->





                    <!-- quick email widget -->
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-envelope"></i>

                            <h3 class="box-title">Update Notes</h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">

                            </div>
                            <!-- /. tools -->
                        </div>
                        <div class="box-body">
                            <form action="#" method="post">
                                <div>
                                    <select class="form-group form-control" name="module" id="">
                                        <option value="">Select topic</option>
                                        <option value="HCS111 - Costing">HCS111 - Costing</option>
                                        <option value="HCS405 - Introduction to Programming">HCS405 - Introduction to Programming</option>
                                    </select>
                                </div>
                               <div>
                                   <input type="text" name="topic" class="form-group form-control" placeholder="Topic">
                        </div>

                                <div>
                  <textarea class="textarea" name="notes" placeholder="Message"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>

                                <div class="box-footer clearfix">
                                    <button type="submit" name="submit" class="pull-right btn btn-default" id="sendEmail">Submit
                                        <i class="fa fa-arrow-circle-right"></i></button>
                                </div>

                            </form>


                            <?php
                            if(isset($_POST['submit'])){

                                $module = $_POST['module'];
                                $topic = $conn -> real_escape_string($_POST['topic']);
                                $notes = $conn -> real_escape_string($_POST['notes']);

                                $sql = "INSERT INTO performance (std_id, module, topic, notes)
                                     VALUES ( {$_SESSION['std_id']},'{$module}','{$topic}', '{$notes}')";

                                if ($conn->query($sql) === TRUE) {
                                    echo "<p class='alert alert-success text-center'>Notes Record Successfully</p>";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }

                            }
                            ?>

                        </div>

                    </div>







                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>


<?php include('stdIncludes/footer.php'); ?>