<!--Password Match Ajax-->
<script>
    function checkPass()
    {
        //Store the password field objects into variables ...
        var pass1 = document.getElementById('pass1');
        var pass2 = document.getElementById('pass2');
        //Store the Confimation Message Object ...
        var message = document.getElementById('confirmMessage');
        //Set the colors we will be using ...
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        //Compare the values in the password field 
        //and the confirmation field
        if (pass1.value == pass2.value) {
            //The passwords match. 
            //Set the color to the good color and inform
            //the user that they have entered the correct password 
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Passwords Match!"
        } else {
            //The passwords do not match.
            //Set the color to the bad color and
            //notify the user.
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "Passwords Do Not Match!"
        }
    }
</script>
<!--END Password Match Ajax-->
<script type="text/javascript">
<!--
//Create a boolean variable to check for a valid Internet Explorer instance.
    var xmlhttp = false;
//Check if we are using IE.
    try {
//If the Javascript version is greater than 5.
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//alert(xmlhttp);
//alert ("You are using Microsoft Internet Explorer.");
    } catch (e) {
        // alert(e);

//If not, then use the older active x object.
        try {
//If we are using Internet Explorer.
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer");
        } catch (E) {
//Else we must be using a non-IE browser.
            xmlhttp = false;
        }
    }
//If we are using a non-IE browser, create a javascript instance of the object.
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
//alert ("You are not using Microsoft Internet Explorer");
    }

    function makerequest(given_text, objID)
    {
        //alert(given_text);
        //var obj = document.getElementById(objID);
        serverPage = 'check_admin.php?text=' + given_text;
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function ()
        {
            //alert(xmlhttp.readyState);
            //alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                //alert(xmlhttp.responseText);
                document.getElementById(objID).innerHTML = xmlhttp.responseText;
                //document.getElementById(objcw).innerHTML = xmlhttp.responseText;
                if (xmlhttp.responseText == 'Alredy Exists')
                {
                    document.getElementById('btn').disabled = true;
                }
                else {
                    document.getElementById('btn').disabled = false;
                }
            }
        }
        xmlhttp.send(null);
    }
</script>
<?php
require_once '../controllers/super_admin.php';

$obj_super_admin = new Super_admin();
if (isset($_POST['btn'])) {
    $obj_super_admin->save_teacher_info($_POST, $_FILES);
}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add Amin</li>
    </ol>
</section>
<br/>
<ol class="breadcrumb">
    <h1 class="box-title">Add Teacher</h1>
</ol>
<div class="col-xs-12">
    <h2 style="color: green; padding: 10px;">
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
    </h2>
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        <form role="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
            <div class="box-body">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="exampleInputName">Name (<span style="color:red">*</span>)</label>
                        <input type="text" name="teacher_name" class="form-control"  required regexp="JSVAL_RX_ALPHA" err="Please Enter Valide Teacher Name" placeholder="Enter name" onblur="return makerequest(this.value, 'res')">
                        <span id="res"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Join Date (<span style="color:red">*</span>)</label>
                        <input type="date" name="teacher_join_date" class="form-control" placeholder="Text input">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email (<span style="color:red">*</span>)</label>
                        <input type="email" name="teacher_email" class="form-control" id="exampleInputEmail" required placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password (<span style="color:red">*</span>)</label>
                        <input type="password" name="teacher_password" id="pass1" class="form-control" id="exampleInputPassword" required placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Confirm Password (<span style="color:red">*</span>)</label>
                        <input type="password" name="teacher_confirm_password" id="pass2" class="form-control" id="exampleInputPassword" onkeyup="checkPass();
                                return false;" required equals="teacher_password" err="Password does not match" placeholder="Enter password again">
                        <span id="confirmMessage" class="confirmMessage"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Profile Image (<span style="color:red">*</span>)</label>
                        <input type="file" name="teacher_image" class="form-control">
                    </div>
                </div>  
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="exampleInputName">Description(<span style="color:red">*</span>)</label>
                        <div class='box'>
                            <div class='box-body pad'>
                                <textarea class="textarea" name="teacher_description" required placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Designation (<span style="color:red">*</span>)</label>
                        <div class='box'>
                            <div class='box-body pad'>
                                <textarea class="textarea" name="teacher_designation" required placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div> 
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" name="btn" id="btn" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div><!-- /.box -->
</div><!--/.col (left) -->


