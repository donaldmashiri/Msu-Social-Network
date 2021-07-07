<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
        <!--                            <li><a href="#timeline" data-toggle="tab">Timeline</a></li>-->
        <!--                            <li><a href="#settings" data-toggle="tab">Settings</a></li>-->
    </ul>
    <div class="tab-content">


        <div class="active tab-pane" id="activity">

            <div class="post">

                <!-- /.user-block -->
                <div class="form-group">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-sm-10">
                        <textarea name="topic_name"  class="form-control" id="inputExperience" placeholder="Say Something"></textarea>
                    </div>

                    <div style="margin-top: 5px"  class="col-sm-2">
                        <div class="form-group">
                            <label for="exampleInputFile">Upload Image</label>
                            <input type="file" name="image" id="exampleInputFile">
                        </div>
                    </div>

                    <div  class="col-sm-2">
                        <button style="margin-top:10px;" type="submit" name="submit" class="btn btn-danger pull-left btn-block ">Send</button>
                    </div>
                    </form>

                    <?php
                    if(isset($_POST['submit'])){

                        $topic_name = $conn -> real_escape_string($_POST['topic_name']);
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

                <br>
                <br>
                <br>
                <br>
                <br><br>
                <br>
                <!--                                    <div class="form-horizontal text-center">-->
                <!--                                        <input class="form-control input-sm" type="file" placeholder="Type a comment">-->
                <!--                                    </div>-->

            </div>
            <!-- /.post -->

            <?php
            $sql = "SELECT * FROM discussions JOIN students On discussions.std_id = students.std_id ORDER BY discuss_id DESC ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            $discuss_id = $row["discuss_id"];
            $std_id = $row["std_id"];
            $topic_name = $row["topic_name"];
            $topic_image = $row["topic_image"];
            $topic_date = $row["topic_date"];

                $full_names = $row["full_names"];
                $std_image = $row["std_image"];

            ?>



            <div class="post clearfix">
                <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../images/students/<?php echo $std_image ?>" alt="User Image">
                    <span class="username">
                          <a href="#"><?php echo $full_names ?></a>
                        </span>
                    <span class="description">You a message on - <?php echo $topic_date ?></span>
                </div>
                <!-- /.user-block -->
                <?php
                if($topic_image === "'not there'" OR $topic_image === ""){
                }else{
                    echo "<img class='img-rounded img-bordered-sm' src='../images/$topic_image' width='200' height='100'>";
                }
                ?>

                <p>
                   <?php echo $topic_name ?>
                </p>
                <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                        <a href="comments.php?comments=<?php echo $discuss_id ?>" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                            </a></li>
                </ul>

                <form action="" method="post" class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                        <div class="input-group margin">

                            <input type="text" name="comment_text" class="form-control">
                            <input type="hidden" name="discuss_id" value="<?php echo $discuss_id ?>" class="form-control">
<!--                            <input type="hiiden" name="_id" class="form-control">-->
                            <span class="input-group-btn">

                                                <button type="submit" name="comment" class="btn btn-info btn-flat">Comment</button>
                                                </span>

                        </div>
                    </div>
                </form>
            </div>

            <?php }
            } else {
                echo "No messages Yet";
            }



            if (isset($_POST['comment'])) {



                $discuss_id = $_POST['discuss_id'];
                $comment_text = $_POST['comment_text'];
                $comment_date = date("Y-m-d h:i:sa");

                $sql = "INSERT INTO comments(std_id, discuss_id, comment_text, comment_date)
                VALUES ({$_SESSION['std_id']}, {$discuss_id}, '{$comment_text}','{$comment_date}' ) ";

                if ($conn->query($sql) === TRUE) {
                                    header("Location: comments.php?comments=".$discuss_id );

                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }





            }










            ?>






            <!-- /.post -->


        </div>
        <!-- /.tab-pane -->

    </div>
    <!-- /.tab-content -->
</div>