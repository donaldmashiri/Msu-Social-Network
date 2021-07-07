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

                    <?php
                    if(isset($_POST['send'])){

                        $advert_date = date("Y-m-d h:i:sa");

                        $advert_image = $_FILES['image']['name'];
                        $advert_image_temp = $_FILES['image']['tmp_name'];

                        move_uploaded_file($advert_image_temp, "../images/adverts/$advert_image");

                        $sql = "INSERT INTO adverts (std_id, advert_image, advert_date)
                        VALUES ({$_SESSION['std_id']}, '{$advert_image}', '{$advert_date}')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<p class='alert alert-success text-center'>Advertment was successfully created</p>";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }

                    }
                    ?>


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

                                                <?php
                                                $sql = "SELECT * FROM adverts JOIN students ON adverts.std_id = students.std_id";

                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                // output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                                $advert_id = $row["advert_id"];
                                                $std_id = $row["std_id"];
                                                $advert_image = $row["advert_image"];
                                                $advert_date = $row["advert_date"];
                                                $full_names = $row["full_names"];

                                                ?>
                                            <div class="col-md-6">
                                                <h3 class="timeline-header text-center"><a href="#"><?php echo $full_names ?></a></h3>
                                                <div class="timeline-body">
                                                    <img src="../images/adverts/<?php echo $advert_image ?>" width="400" height="270" alt="..." class="margin" >
                                                </div>
                                                <span class="time"><i class="fa fa-clock-o"></i><?php echo $advert_date ?></span>
                                            </div>
                                                <?php }
                                                } else {
                                                    echo "No Commnets Yet";
                                                }
                                                ?>
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