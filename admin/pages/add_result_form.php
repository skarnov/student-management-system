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
    $obj_super_admin->save_result_info($_POST, $_FILES);
}
$all_students = $obj_super_admin->select_student_by_class($_GET['class_id']);
$subjects = $obj_super_admin->select_subject_by_class($_GET['class_id']);
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add Result</li>
    </ol>
</section>
<br/>

<ol class="breadcrumb">
    <h1 class="box-title">Add Result</h1>
</ol>

<div class="col-md-8">
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        <form role="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
            <div class="box-body">
                <div class="form-group">
                    <label>Student Name(<span style="color:red">*</span>)</label>
                    <select name="student_id" required exclude=" " class="form-control">
                        <option value=" "  disabled="">Select </option>
                        <?php while ($row = mysql_fetch_array($all_students)) { ?>
                            <option value="<?php echo $row['student_id'] ?>" ><?php echo $row['student_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Subjects(<span style="color:red">*</span>)</label>
                    <select name="subject_id" required exclude=" " class="form-control">
                        <option value=" "  disabled="">Select </option>
                        <?php while ($row = mysql_fetch_array($subjects)) { ?>
                            <option value="<?php echo $row['subject_id'] ?>" ><?php echo $row['subject_name'] ?>(<?php echo $row['subject_code'] ?>)</option>
                        <?php } ?>
                    </select>
                </div>
                <input type="hidden" name="class_id"  value="<?php echo $_GET['class_id']; ?>"/>
                <div class="form-group">
                    <label for="exampleInputName">Marks (<span style="color:red">*</span>)</label>
                    <div class='box'>
                        <div class='box-body pad'>

                            <input type="text" name="marks" class="form-control" id="exampleInputPassword" required placeholder="Enter marks">

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Publication Status  (<span style="color:red">*</span>)</label>
                    <select name="result_status" required exclude=" " class="form-control">
                        <option value=" ">Select Status.....</option>
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option>
                    </select>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <input type="submit" name="btn" id="btn" value="Submit"class="btn btn-primary"/>
            </div>
        </form>
    </div><!-- /.box -->
</div><!--/.col (left) -->


