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
        if(pass1.value == pass2.value){
            //The passwords match. 
            //Set the color to the good color and inform
            //the user that they have entered the correct password 
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Passwords Match!"
        }else{
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
        $obj_super_admin->save_admin_info($_POST);
    }
?>
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
    <h1 class="box-title">Add Admin</h1>
</ol>
<div class="col-md-6">
    <h2 style="color: green; padding: 10px;">
        <?php
            if(isset($_SESSION['message']))
            {
                echo  $_SESSION['message'];
                unset( $_SESSION['message']);
            }
        ?>
      </h2>
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        <form role="form" action="" method="POST">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputName">Name  (<span style="color:red">*</span>)</label>
                    <input type="text" name="admin_name" class="form-control" id="exampleInputName" required regexp="JSVAL_RX_ALPHA" err="Please Enter Valide Admin Name"  placeholder="Enter Name" onblur="return makerequest(this.value,'res')">
                    <span id="res"></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail">Email  (<span style="color:red">*</span>)</label>
                    <input type="email" name="admin_email" class="form-control" id="exampleInputEmail" required placeholder="Enter Email">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">Password  (<span style="color:red">*</span>)</label>
                    <input type="password" name="admin_password" class="form-control" id="pass1" required placeholder="Enter Password">
                    <span id="confirmMessage" class="confirmMessage"></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">Conform Password  (<span style="color:red">*</span>)</label>
                    <input type="password" name="admin_confirm_password" class="form-control" id="pass2" onkeyup="checkPass(); return false;" placeholder="Enter Password Again">
                </div>
                <div class="form-group">
                    <label>Access Level  (<span style="color:red">*</span>)</label>
                    <select name="admin_access_level" class="form-control">
                        <option value="0" >Select </option>
                        <option value="1" >Admin</option>
                        <option value="2">Clerk</option>
                        <option value="3">Accountant</option>
                    </select>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" name="btn" id="btn" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div><!-- /.box -->
</div><!--/.col (left) -->