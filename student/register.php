<?php
include('../includes/db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">


<!--    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
<!--    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="index.php">	<img class="rounded" src="../images/msu.jpeg" width="200" height="130" alt="" srcset=""> </a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a for Social Network</p>

        <?php
        if(isset($_POST['std_register'])){
            $full_names = $conn -> real_escape_string($_POST['full_names']);
            $std_email =  $conn -> real_escape_string($_POST['std_email']);
            $std_regno =  $conn -> real_escape_string($_POST['std_regno']);
            $std_level =  $conn -> real_escape_string($_POST['std_level']);
            $std_password =  $conn -> real_escape_string($_POST['std_password']);
            $std_password1 =  $conn -> real_escape_string($_POST['std_password1']);
            $std_program =  $conn -> real_escape_string($_POST['std_program']);
            $std_phone =  $conn -> real_escape_string($_POST['std_phone']);


//            echo $std_image;


            if($std_password != $std_password1){
                echo "<p class='alert alert-danger text-center'>Password Didnt Match</p>";
            }else{
                $std_image = $_FILES['image']['name'];
                $std_image_temp = $_FILES['image']['tmp_name'];
                move_uploaded_file($std_image_temp, "../images/students/$std_image");

//                echo $std_image;

                $sql = "INSERT INTO students (full_names, std_email, std_phone, std_regno, std_program, std_image, std_level, std_password)
                  VALUES ('{$full_names}','{$std_email}','{$std_phone}', '{$std_regno}','{$std_program}','{$std_image}', '{$std_level}', '{$std_password}')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p class='alert alert-success text-center'>Account successfully registered</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }





        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <input type="text" name="full_names" class="form-control" placeholder="Full name" minlength="4" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="std_email" class="form-control" placeholder="Email" minlength="4" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="number" name="std_phone" class="form-control" placeholder="phone number"  minlength="4" required>
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="std_regno" class="form-control" placeholder="Reg Number">
                <span class="glyphicon glyphicon-record form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <select class="form-control"  name="std_program" id="">
                    <option value="">select program</option>
                    <option value="InformationSystem">Information Systems</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Insurance Risk">Insurance Risk</option>
                    <option value="HR">HR</option>
                    <option value="Law">Law</option>
                </select>
            </div>
            <div class="form-group has-feedback">
                <select class="form-control"  name="std_level" id="">
                    <option value="">level</option>
                    <option value="1.1">1.1</option>
                    <option value="1.2">1.2</option>
                    <option value="2.1">2.1</option>
                    <option value="2.2">2.2</option>
                    <option value="3">3</option>
                    <option value="4.1">4.1</option>
                    <option value="4.2">4.2</option>
                </select>
            </div>
            <div class="form-group has-feedback">
                <input type="file" class="form-control" name="image" placeholder="Image">
                <span class="glyphicon glyphicon-upload form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="std_password" placeholder="Password" minlength="4" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="std_password1" placeholder="Retype password" minlength="4" required>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <a href="index.php" class="text-center">Signin</a>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="std_register" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>



    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
