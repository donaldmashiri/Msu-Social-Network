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

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">
                    <?php include('stdIncludes/user_details.php'); ?>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <div class="card-body">
                                <h4>Update Profile</h4>

                                <?php

                                if (isset($_POST['update'])) {

                                    $email = $_POST['email'];
                                    $level = $_POST['level'];
                                    $program = $_POST['program'];
                                    $phone_number = $_POST['phone_number'];

                                    $query = "UPDATE students SET ";
                                    $query .= "std_email  = '{$email}', ";
                                    $query .= "std_level  = '{$level}', ";
                                    $query .= "std_program  = '{$program}', ";
                                    $query .= "std_phone  = '{$phone_number}' ";
                                    $query .= "WHERE std_id = {$_SESSION['std_id']} ";

                                    $update_query = mysqli_query($conn, $query);
                                    header("Location: update.php");

                                    if (!$update_query) {
                                        die("Query failed" . mysqli_error($conn));
                                    }

                                }

                                ?>


                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" value="<?php echo $std_email ?>" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Level</label>
                                        <select class="form-control"  name="level" id="">
                                            <option value="<?php echo $std_level ?>"><?php echo $std_level ?></option>
                                            <option value="1.1">1.1</option>
                                            <option value="1.2">1.2</option>
                                            <option value="2.1">2.1</option>
                                            <option value="2.2">2.2</option>
                                            <option value="3">3</option>
                                            <option value="4.1">4.1</option>
                                            <option value="4.2">4.2</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Program</label>
                                        <select class="form-control"  name="program" id="">
                                            <option value="<?php echo $std_program ?>"><?php echo $std_program ?></option>
                                            <option value="InformationSystem">Information Systems</option>
                                            <option value="Mathematics">Mathematics</option>
                                            <option value="Accounting">Accounting</option>
                                            <option value="Insurance Risk">Insurance Risk</option>
                                            <option value="HR">HR</option>
                                            <option value="Law">Law</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="text" class="form-control" value="<?php echo $std_phone ?>" name="phone_number">
                                    </div>
                                    <div>
                                        <button name="update" type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>

<?php include('stdIncludes/footer.php'); ?>