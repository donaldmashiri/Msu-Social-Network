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
                Lets talk
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Lets talk</a></li>
                <li><a href="#">students</a></li>
                <li class="active">Activities</li>
            </ol>
        </section>

        <?php




        ?>



        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">
                    <?php include('stdIncludes/user_details.php'); ?>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#activity" data-toggle="tab">Comments</a></li>
                            <!--                            <li><a href="#timeline" data-toggle="tab">Timeline</a></li>-->
                            <!--                            <li><a href="#settings" data-toggle="tab">Settings</a></li>-->
                        </ul>
                        <div class="tab-content">


                            <div class="active tab-pane" id="activity">

                                <div class="post">

                                    <!-- /.user-block -->
                                    <div class="form-group">

                                        <?php
                                        if(isset($_POST['submit'])){

                                            $topic_name = $_POST['topic_name'];
                                            $topic_date = date("Y-m-d h:i:sa");

                                            $topic_image = $_FILES['image']['name'];
                                            $topic_image_temp = $_FILES['image']['tmp_name'];

                                            move_uploaded_file($topic_image_temp, "../images/$topic_image");

                                            $sql = "INSERT INTO discussions (std_id, topic_name, topic_image, topic_date)
                        VALUES ({$_SESSION['std_id']}, '{$topic_name}', '{$topic_image}', '{$topic_date}')";

                                            if ($conn->query($sql) === TRUE) {
//                            echo "<p class='alert alert-success text-center'>Your Product was successfully added</p>";
                                            } else {
                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                            }
                                        }
                                        ?>

                                    </div>


                                </div>
                                <!-- /.post -->

                                <?php

                                $comm = $_GET['comments'];

                                $sql = "SELECT * FROM comments JOIN discussions On comments.discuss_id = discussions.discuss_id
                                        JOIN students ON discussions.std_id = students.std_id WHERE comments.discuss_id = $comm ";

                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while ($row = $result->fetch_assoc()) {
                                                        $discuss_id = $row["discuss_id"];
                                                        $std_id = $row["std_id"];
                                                        $topic_name = $row["topic_name"];
                                                        $topic_image = $row["topic_image"];
                                                        $topic_date = $row["topic_date"];
                                                        $comment_text = $row["comment_text"];
                                                        $comment_date = $row["comment_date"];

                                                        $full_names = $row["full_names"];
                                                        $std_image = $row["std_image"];

                                                    }
                                                }


                                        ?>

                                        <div class="tab-pane" id="timeline">
                                            <!-- The timeline -->
                                            <ul class="timeline timeline-inverse">
                                                <!-- timeline time label -->
                                                <li class="time-label">
                        <span class="bg-red">
                         <?php echo $topic_date; ?>
                        </span>
                                                </li>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->

                                                <li>
                                                    <i class="fa fa-camera bg-purple"></i>

                                                    <div class="timeline-item">
                                                        <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                                        <h3 class="timeline-header"><a href="#"><?php echo $full_names ?> </a> Post</h3>

                                                        <div class="timeline-body">
                                                            <?php
                                                            if($topic_image === "'not there'" OR $topic_image === ""){
                                                            }else{
                                                                echo " <img src='../images/$topic_image' width='150' height='100' alt='...' class='margin'>";
                                                            }
                                                            ?>

                                                            <div class="timeline-body">
                                                                <?php echo $topic_name ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <?php

//                                                $sql = "SELECT * FROM comments JOIN discussions On comments.discuss_id = discussions.discuss_id
//                                        JOIN students ON discussions.std_id = students.std_id WHERE comments.discuss_id = $comm ";

                                                $sql = "SELECT * FROM comments JOIN students ON comments.std_id = students.std_id WHERE comments.discuss_id = $comm ";

                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                // output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                                $discuss_id = $row["discuss_id"];
                                                $std_id = $row["std_id"];
                                                $topic_name = $row["topic_name"];
                                                $topic_image = $row["topic_image"];
                                                $topic_date = $row["topic_date"];
                                                $comment_text = $row["comment_text"];
                                                $comment_date = $row["comment_date"];

                                                $full_names = $row["full_names"];
                                                $std_image = $row["std_image"];
                                                ?>

                                                <li>
                                                    <i class="fa fa-comments bg-yellow"></i>

                                                    <div class="timeline-item">
                                                        <span class="time"><i class="fa fa-clock-o"></i> <?php $comment_date ?></span>
                                                        <h3 class="timeline-header"><a href="#"><?php echo $full_names ?></a> comment</h3>

                                                        <div class="timeline-body">
                                                            <?php echo $comment_text ?>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php }
                                                } else {
                                                    echo "No Commnets Yet";
                                                }
                                                ?>

                                            </ul>
                                        </div>








                                <!-- /.tab-pane -->

                                <!-- /.tab-pane -->




                                <!-- /.post -->


                            </div>
                            <!-- /.tab-pane -->

                        </div>
                        <!-- /.tab-content -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>

<?php include('stdIncludes/footer.php'); ?>