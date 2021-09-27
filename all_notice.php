<?php
    require_once 'controllers/home.php';
    $obj_home = new Home();
    $result = $obj_home->select_all_notice();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Evis School Website</title>
        <!-- Bootstrap -->
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
                <div class="row" style="min-height: 350px;">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="completed"><a href="index.php">Home</a></li>
                            <li class="active"><a href="all_notice.php">All Notice</a></li>
                        </ul>
                        <?php
                        while ($row = mysql_fetch_assoc($result)) {
                            ?>
                            <h1 style="margin-left: 1%;"><?php echo $row['notice_title']; ?></h1><h4 style="margin-left: 1%;"><?php echo $row['notice_time']; ?></h4><hr/>
                            <p style="margin-left: 1%;"><?php echo $row['notice_main']; ?></p><br/><br/><br/>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-12" style="background-color: black; color:white; padding: 1%; text-align: center;">
                    <p>Copyright © 2015 Evis School. All Right Revised.</p>
                </div>
            </div>
        </div>
    </body>
</html>