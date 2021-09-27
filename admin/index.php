<?php
    session_start();
    require_once '../controllers/administrator.php';
    
    $obj_login = new Administrator();
    $result=NULL;
    if (isset($_POST['btn']))
    {
        $message = $obj_login->admin_login_check($_POST);
    }
    
    if(isset($_SESSION['admin_id']))
    {
        header("Location:dashbord.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Evis Admin Login</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="../admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../admin/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="../admin/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href=""><b>Evis</b> Student Management System</a>
            </div>
            <div class="login-box-body">
                <form action="" method="POST">
                    <h2 style="color: red">
                        <?php
                            if(isset($message))
                            {
                                echo  $message;
                                unset($message);
                            }
                        ?>
                    </h2>
                    <h2 style="color: red">
                        <?php
                            if(isset($_SESSION['message']))
                            {
                                echo  $_SESSION['message'];
                                unset( $_SESSION['message']);
                            }
                        ?>
                    </h2>
                    <div class="form-group has-feedback">
                        <input type="email" name="admin_email" class="form-control" value="admin@evis.com"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="admin_password" class="form-control" value="111111"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">    
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>                        
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" name="btn" class="btn btn-primary btn-block btn-flat">Login</button>
                        </div>  
                    </div>
                </form>
                <a href="#">Forgot Password ?</a><br>
            </div>
        </div> 
        <script src="../admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="../admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../admin/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
