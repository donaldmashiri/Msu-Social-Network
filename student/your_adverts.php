<?php include('stdIncludes/header.php'); ?>
    <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php

$id = $_GET['adverts'];

$sql = "SELECT * FROM adverts WHERE std_id = $id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while ($row = $result->fetch_assoc()) {
    $advert_id = $row["advert_id"];
    $std_id = $row["std_id"];
    $advert_image = $row["advert_image"];
    $advert_date = $row["advert_date"];
    $full_names = $row["full_names"];

}
} else {
    echo "No Commnets Yet";
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
                Lets talk
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Advertisement</a></li>
                <li><a href="#">Advertisement</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">
                    <a href="your_adverts.php?adverts=<?php echo $_SESSION['std_id']; ?>" class="btn btn-block btn-social btn-facebook">
                        <i class="fa fa-vk"></i> View your advertisement records
                    </a>
                    <a class="btn btn-block btn-social btn-twitter">
                        <i class="fa fa-twitter"></i> Create an advertisement    </a>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="image" class="from-group form-control">
                        <button type="submit" name="send" class="btn btn-primary">Send</button>
                    </form>




                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <ul class="timeline">
                                <li class="time-label">
                  <span class="bg-blue">
                   Advertisements
                  </span>
                                </li>

                                <li>

                                    <i class="fa fa-camera bg-purple"></i>

                                    <div class="timeline-item">
                                        <div class="row">


                                                    <div class="col-md-6">
                                                        <span class="time"><i class="fa fa-clock-o"></i><?php echo $advert_date ?></span>
                                                        <div class="timeline-body">
                                                            <img src="../images/adverts/<?php echo $advert_image ?>" width="250" height="170" alt="..." class="margin" >
                                                        </div>
                                                    </div>

                                        </div>
                                        <hr>
                                    </div>
                                </li>

                                <li>
                                    <i class="fa fa-clock-o bg-gray"></i>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>

<?php include('stdIncludes/footer.php'); ?>