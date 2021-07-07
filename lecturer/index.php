<?php include('lecIncludes/header.php'); ?>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="register-logo">
        <a href="index.php">	<img class="rounded" src="../images/msu.jpeg" width="200" height="130" alt="" srcset=""> </a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">LECTURER LOGIN</p>

        <?php
        if(isset($_POST['signin'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "select * from lecturers where lec_email = '$email' and lec_pass = '$password'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if ($count == 1) {
                $_SESSION['lec_id'] = $row['lec_id'];
                echo "<script>window.location.href='home.php';</script>";
//                            echo   $_SESSION['lec_id'];
            } else {
                echo "<a class='bg-light nav-link text-danger'>Invalid email and password</a>";
            }
        }
        ?>

        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">

                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="signin" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>




    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>

</html>