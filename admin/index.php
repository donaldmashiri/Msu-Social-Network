<?php include('lecIncludes/header.php'); ?>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="register-logo">
        <a href="index.php">	<img class="rounded" src="../images/msu.jpeg" width="200" height="130" alt="" srcset=""> </a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Admin LOGIN</p>

        <?php
        if(isset($_POST['signin'])){

            $password = $_POST['password'];

            if ($password === '12345') {

                echo "<script>window.location.href='home.php';</script>";
            } else {
                echo "<a class='bg-light nav-link text-danger'>Invalid password</a>";
            }
        }
        ?>

        <form action="" method="post">
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