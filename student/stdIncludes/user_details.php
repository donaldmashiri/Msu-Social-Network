
<!-- Profile Image -->
<div class="box box-primary">
    <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="../images/students/<?php echo $std_image ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo $full_names ?></h3>

        <p class="text-muted text-center"><?php echo $std_regno ?></p>

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Email</b> <a class="pull-right"><?php echo $std_email ?></a>
            </li>
            <li class="list-group-item">
                <b>Level</b> <a class="pull-right"><?php echo $std_level ?></a>
            </li>

        </ul>

        <a href="update.php" class="btn btn-primary btn-block"><b>Update Profile</b></a>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<!-- About Me Box -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">About Me</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <strong><i class="fa fa-book margin-r-5"></i> Program</strong>

        <p class="text-muted">
            B.S. in <?php echo $std_program ?> at the Midlands State University
        </p>

        <hr>

        <strong><i class="fa fa-map-marker margin-r-5"></i> Contact Number</strong>

         <p class="text-muted">0<?php echo $std_phone ?></p>

        <hr>

    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->