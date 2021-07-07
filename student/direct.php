<?php include('stdIncludes/header.php'); ?>
    <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php
$receiver = $_GET['direct'];

$sql = "SELECT * FROM lecturers WHERE lec_id = $receiver";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $lec_id = $row["lec_id"];
        $lec_names = $row["lec_names"];
        $lec_email = $row["lec_email"];
        $lec_image = $row["lec_image"];
        $module = $row["module"];

        echo $lec_names;
    }
}
?>



    <!-- sidebar: style can be found in sidebar.less -->
    <?php include('stdIncludes/sidebar.php'); ?>
    <!-- /.sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Direct Communication
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Lets talk</a></li>
                <li><a href="#">students</a></li>
                <li class="active">lecturer</li>
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

                            <div class="box-tools pull-right">
                                <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                                        data-widget="chat-pane-toggle">
                                    <i class="fa fa-comments"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <!-- Message. Default to the left -->
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

                                        <?php if($sender_type === "lecturer"){ ?>

                                            <div class="direct-chat-msg">
                                                <div class="direct-chat-info clearfix">
                                                    <span class="direct-chat-name pull-left"><?php echo $lec_names; ?></span>
                                                    <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
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
                                        <!-- /.direct-chat-msg -->

                                        <!-- Message to the right -->
                                        <?php if($sender_type === "student"){ ?>
                                            <div class="direct-chat-msg right">
                                                <div class="direct-chat-info clearfix">
                                                    <span class="direct-chat-name pull-right"><?php echo $full_names; ?></span>
                                                    <span class="direct-chat-timestamp pull-left"><?php echo $msg_date ?></span>
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




                                    <?php }
                                } else {
                                    echo "No Message Yet";
                                }
                                ?>

                                <!-- /.direct-chat-msg -->

                            </div>
                            <!--/.direct-chat-messages-->

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">

                            <?php
                            if(isset($_POST['submit'])){

                                $message = $_POST['message'];
                                $msg_date = date("Y-m-d h:i:sa");
                                $sender_type = "student";

                                $sql = "INSERT INTO messages (message, sender, receiver, sender_type, msg_date)
                                 VALUES ('{$message}', {$_SESSION['std_id']}, {$receiver}, '{$sender_type}', '{$msg_date}')";

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
                            <h3 class="box-title">Your Module Lecturers</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                                <?php
                                $sql = "SELECT * FROM lecturers";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $lec_id = $row["lec_id"];
                                        $lec_names = $row["lec_names"];
                                        $lec_email = $row["lec_email"];
                                        $lec_image = $row["lec_image"];
                                        $module = $row["module"];
                                        ?>
                                        <li>
                                            <img src="../images/<?php echo $lec_image ?>" width="110" height="110" alt="User Image">
                                            <a class="users-list-name" href="direct.php?direct=<?php echo $lec_id ?>"><?php echo $lec_names ?></a>
                                            <span class="users-list-date"><?php echo $lec_email ?></span>
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

<?php include('stdIncludes/footer.php'); ?>