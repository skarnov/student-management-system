<?php
require_once '../controllers/super_admin.php';

$obj_super_admin = new Super_admin();
$result = $obj_super_admin->select_subject_info_by_id($subject_id);
$subject_info = mysql_fetch_assoc($result);

if (isset($_POST['btn'])) {
    $obj_super_admin->update_subject_info($_POST);
    $result = $obj_super_admin->select_subject_info_by_id($subject_id);
    $subject_info = mysql_fetch_assoc($result);
}
?>
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Subject</li>
    </ol>
</section>
<br/>
<ol class="breadcrumb">
    <h1 class="box-title">Edit Subject</h1>
</ol>
<div class="col-md-6">
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
        <form role="form" name="edit_subject"  action="" method="POST" onsubmit="return validateStandard(this)">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputName">Name  (<span style="color:red">*</span>)</label>
                    <input type="text" name="subject_name" value="<?php echo $subject_info['subject_name'] ?>" class="form-control" id="exampleInputName" required regexp="JSVAL_RX_ALPHA" err="Please Enter Valide Class Name"  placeholder="Enter Name" >
                    <input type="hidden" name="subject_id"value="<?php echo $subject_info['subject_id'] ?>" class="form-control" id="exampleInputName" placeholder="Enter class">
                    <span id="res"></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Code  (<span style="color:red">*</span>)</label>
                    <input type="text" name="subject_code" value="<?php echo $subject_info['subject_code'] ?>" class="form-control" id="exampleInputName" required   placeholder="Enter Digit" >
                    <span id="res"></span>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" name="btn" id="btn" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div><!-- /.box -->
</div><!--/.col (left) -->
