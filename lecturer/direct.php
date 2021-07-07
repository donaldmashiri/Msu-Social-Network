<?php include('lecIncludes/header.php'); ?>
    <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


<?php
 $receiver = $_GET['direct'];

$sql = "SELECT * FROM students WHERE std_id = $receiver";

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
        $message = $row["message"];
        $sender_type = $row["sender_type"];

    }
}



?>

    <!-- sidebar: style can be found in sidebar.less -->
    <?php include('lecIncludes/sidebar.php'); ?>
    <!-- /.sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Direct Communication
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Students</a></li>
                <li><a href="#">students</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-6">
                    <!-- DIRECT CHAT -->
                    <div class="box box-warning direct-chat direct-chat-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Direct Chat</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <!-- Message. Default to the left -->

                                <?php
                                $sql = "SELECT * FROM messages";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $message = $row["message"];
                                        $sender_type = $row["sender_type"];
                                        $msg_date = $row["msg_date"];

                                ?>

                                   <?php if($sender_type === "student"){ ?>

                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-left"><?php echo $full_names; ?></span>
                                        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="../images/students/<?php echo $std_image; ?>" width="100" height="100" alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        <?php
                                        echo $message;
                                        ?>
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>

                                  <?php }; ?>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                        <?php if($sender_type === "lecturer"){ ?>
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-right"><?php echo $lec_names; ?></span>
                                        <span class="direct-chat-timestamp pull-left"><?php echo $msg_date ?></span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="../images/<?php echo $lec_image; ?>" width="100" height="100" alt="message user image">

                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        <?php
                                            echo $message;

                                        ?>
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                        <?php }; ?>




                                <?php }
                                                } else {
                                                    echo "No Message Yet";
                                                }
                                                ?>




                                <!-- /.direct-chat-msg -->
                            </div>
                            <!--/.direct-chat-messages-->

                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">

                            <?php
                            if(isset($_POST['submit'])){

                                $message = $_POST['message'];
                                $msg_date = date("Y-m-d h:i:sa");
                                $sender_type = "lecturer";

                                $sql = "INSERT INTO messages (message, sender, receiver, sender_type, msg_date)
                                 VALUES ('{$message}', {$_SESSION['lec_id']}, {$receiver}, '{$sender_type}', '{$msg_date}')";

                                if ($conn->query($sql) === TRUE) {
                                    header("Location: direct.php?direct=".$receiver );
//                            echo "<p class='alert alert-success text-center'>Your Product was successfully added</p>";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }
                            ?>

                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                    <span class="input-group-btn">
                            <button type="submit" name="submit" class="btn btn-warning btn-flat">Send</button>

<!--                                         <button type="submit" name="submit" class="btn btn-success btn-flat">WhatsAPP</button>-->

                                        <a href="https://wa.me/263<?php echo $std_phone ?>?text=<?php echo "Hie Student" ?>" target="_blank" class="btn btn-success m-3"> <i class="fa fa-wechat">
                                </i>WhatApp</a>

                          </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-footer-->
                    </div>
                    <!--/.direct-chat -->
                </div>
                <!-- /.col -->

                <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Your Module Students</h3>
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
                                            <img src="../images/students/<?php echo $std_image ?>" width="110" height="110" alt="User Image">
                                            <a class="users-list-name" href="direct.php?direct=<?php echo $std_id ?>"><?php echo $full_names ?></a>
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
            <!-- /.row -->


        </section>
        <!-- /.content -->
    </div>

<?php include('lecIncludes/footer.php'); ?>