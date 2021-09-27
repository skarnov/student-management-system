<?php
    require_once 'controllers/home.php';
    $obj_home = new Home();

    $all_slider = $obj_home->select_all_slider();
    $all_notices = $obj_home->select_all_notice();
    $all_faculty = $obj_home->select_all_faculty();
    $all_news = $obj_home->select_all_news();
    $all_events = $obj_home->select_all_event();

    $_GET['class_id'] = NULL;
    $all_class = $obj_home->select_all_class($_GET['class_id']);
    $query_result = $obj_home->select_all_teacher();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Evis School Website</title>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="public/css/bjqs.css">
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <link href="public/css/style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="institute_name">
                            <h1>Evis Student Management System</h1>
                            <script>
                                var today = new Date();
                                var dd = today.getDate();
                                var mm = today.getMonth() + 1; //January is 0!
                                var yyyy = today.getFullYear();
                                if (dd < 10) {
                                    dd = '0' + dd
                                }
                                if (mm < 10) {
                                    mm = '0' + mm
                                }
                                today = 'Today ' + dd + '-' + mm + '-' + yyyy;
                                document.write(today);
                            </script>
                        </div>
                    </div>
                </div>
                <br/>
                <nav class="navbar navbar navbar-inverse" role="navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- navbar header section -->
                                <div class="mainmenu">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <!-- navbar menu section -->
                                    <div class="collapse navbar-collapse navbar-responsive-collapse">
                                        <ul class="nav navbar-nav">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="all_notice.php">Notice Board</a></li>
                                            <li><a href="all_news.php">News</a></li>
                                            <li><a href="all_event.php">Events</a></li>
                                            <li><a href="student_area.php">Student Area</a></li>
                                            <li><a href="check_student_result.php">Check Student Result</a></li>
                                            <li><a href="about.php">About</a></li>
                                            <li><a href="contact.php">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="row">
                    <div class="col-xs-8">
                        <div id="banner-fade">
                            <!-- Start Basic Jquery Slider -->
                            <ul class="bjqs">
                                <?php
                                while ($row = mysql_fetch_assoc($all_slider)) {
                                    ?>
                                    <li><img src="<?php echo "slider_images/" . substr($row['slider_image'], strrpos($row['slider_image'], '/'), strlen($row['slider_image'])) ?>" title="<?php echo $row['slider_name']; ?>"></li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <!-- End Basic jQuery Slider -->
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Notice Board
                                </h3>
                            </div>
                            <ul class="list-group">
                                <?php
                                while ($row = mysql_fetch_assoc($all_notices)) {
                                    ?>
                                    <a href="notice_details.php?notice_id=<?php echo $row['notice_id']; ?>" class="list-group-item">  <?php echo $row['notice_title']; ?></a>
                                <?php } ?>
                            </ul>
                            <a href="all_notice.php" type="button" class="btn btn-info pull-right" style="margin: 2%;margin-right: 0%;">See All</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="col-md-12 institute">
                            <h1>About Evis School</h1>
                            <br/>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <img class="img-responsive img-rounded" src="slider_images/Slide%201.jpg" alt="">
                            <br/>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2>Faculty List</h2>
                        <?php
                        while ($row = mysql_fetch_assoc($all_faculty)) {
                            ?>
                            <div class="feature">
                                <div class="col-md-4">
                                    <a href="teacher_details.php?teacher_id=<?php echo $row['teacher_id']; ?>"><img src="<?php echo "teacher_images/" . substr($row['teacher_image'], strrpos($row['teacher_image'], '/'), strlen($row['teacher_image'])) ?>" class="feature_image"></a>
                                </div>
                                <div class="col-md-8" >
                                    <a href="teacher_details.php?teacher_id=<?php echo $row['teacher_id']; ?>"><p class="feature_description"><?php echo $row['teacher_designation']; ?></p></a>
                                </div>
                            </div>
                        <?php } ?>
                        <a href="all_faculty.php" type="button" class="btn btn-info pull-right" style="margin: 2%;">See All</a>
                    </div>
                    <div class="col-xs-4">
                        <h2>Latest News</h2>
                        <?php
                        while ($row = mysql_fetch_assoc($all_news)) {
                            ?>
                            <div class="feature">
                                <div class="col-md-4">
                                    <a href="news_details.php?news_id=<?php echo $row['news_id']; ?>"><img src="<?php echo "news_images/" . substr($row['news_image'], strrpos($row['news_image'], '/'), strlen($row['news_image'])) ?>" class="feature_image"></a>
                                </div>
                                <div class="col-md-8" >
                                    <a href="news_details.php?news_id=<?php echo $row['news_id']; ?>"><p class="feature_description"><?php echo $row['news_title']; ?></p></a>
                                </div>
                            </div>
                        <?php } ?>
                        <a href="all_news.php" type="button" class="btn btn-info pull-right" style="margin: 2%;">See All</a>
                    </div>
                    <div class="col-xs-4">
                        <h2>Events</h2>
                        <?php
                        while ($row = mysql_fetch_assoc($all_events)) {
                            ?>
                            <div class="feature">
                                <div class="col-xs-4">
                                    <a href="event_details.php?event_id=<?php echo $row['event_id']; ?>"><img src="public/img/event.jpg" class="feature_image"></a>
                                </div>
                                <div class="col-xs-8" >
                                    <a href="event_details.php?event_id=<?php echo $row['event_id']; ?>"><p class="feature_description"><?php echo $row['event_title']; ?></p></a>
                                </div>
                            </div>
                        <?php } ?>
                        <a href="all_event.php" type="button" class="btn btn-info pull-right" style="margin: 2%;">See All</a>
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-12 institute">
                            <h1>Evis School Facility</h1>
                            <br/>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <img class="img-responsive img-rounded" src="slider_images/Slide%203.jpg" alt="">
                            <br/>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        </div>
                    </div>
                    <div class="col-xs-4" style="background-color: white;">
                        <h1>Student Area</h1><br/><br/>
                        <form method="post" action="profile.php" class="form-horizontal">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-xs-3 control-label">Email</label>
                                <div class="col-xs-9">
                                    <input type="email" name="student_email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-xs-3 control-label">Password</label>
                                <div class="col-xs-9">
                                    <input type="password" name="student_password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-9 col-xs-offset-1">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-9 col-xs-offset-1">
                                    <button type="submit" name="btn" class="btn btn-default">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-4" style="background-color: white; margin-top: 2%;">
                        <h1>Check Student Result</h1><br/><br/>
                        <form method="post" action="student_result.php" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-xs-9 col-xs-offset-3" style="margin-top: -6%;">
                                    <select name="class_id" class="form-control">
                                        <option value="" >Select Class</option>
                                        <?php while ($row = mysql_fetch_array($all_class)) { ?>
                                            <option value="<?php echo $row['class_id'] ?>"><?php echo $row['class_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-xs-3 control-label">ID</label>
                                <div class="col-xs-9">
                                    <input type="text" name="student_id" class="form-control" id="inputEmail3" placeholder="Your Student ID">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-xs-3 control-label">Password</label>
                                <div class="col-xs-9">
                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Your Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-9 col-xs-offset-1">
                                    <button type="submit" class="btn btn-default">See Result</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12" style="background-color: black; color:white; padding: 1%; text-align: center;">
                    <p>Copyright © 2015 Evis School. All Right Revised.</p>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="public/js/bootstrap.min.js"></script>
        <script src="public/js/bjqs-1.3.min.js"></script>
        <script class="secret-source">
            jQuery(document).ready(function ($) {
                $('#banner-fade').bjqs({
                    height: 340,
                    width: 750,
                    responsive: true
                });
            });
        </script>
    </body>
</html>