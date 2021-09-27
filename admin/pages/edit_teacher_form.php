<?php
require_once '../controllers/super_admin.php';

$obj_super_admin = new Super_admin();
$result = $obj_super_admin->select_teacher_info_by_id($teacher_id);
$teacher_info = mysql_fetch_assoc($result);

if (isset($_POST['btn'])) {
    $obj_super_admin->update_teacher_info($_POST, $_FILES);
    $result = $obj_super_admin->select_teacher_info_by_id($teacher_id);
    $teacher_info = mysql_fetch_assoc($result);
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Teacher</li>
    </ol>
</section>
<br/>
<ol class="breadcrumb">
    <h1 class="box-title">Edit Teacher</h1>
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
                        <input type="text" name="teacher_name" value="<?php echo $teacher_info['teacher_name'] ?>" class="form-control" id="exampleInputName" required required regexp="JSVAL_RX_ALPHA" err="Please Enter Valide Teacher Name" placeholder="Enter name">
                        <input type="hidden" name="teacher_id"value="<?php echo $teacher_info['teacher_id'] ?>" class="form-control" id="exampleInputName" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Join Date (<span style="color:red">*</span>)</label>
                        <input type="date" name="teacher_join_date" value="<?php echo $teacher_info['teacher_join_date'] ?>" class="form-control" placeholder="Text input">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email(<span style="color:red">*</span>)</label>
                        <input type="email" name="teacher_email" value="<?php echo $teacher_info['teacher_email'] ?>" class="form-control" id="exampleInputEmail" required placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword">Profile Image (<span style="color:red">*</span>)</label>
                        <input type="file" name="teacher_image" value="<?php echo $teacher_info['teacher_image'] ?>" class="form-control">
                        <img width="300" height="200" src="<?php echo $teacher_info['teacher_image'] ?>">
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="exampleInputName">Designation (<span style="color:red">*</span>)</label>
                        <div class='box'>
                            <div class='box-body pad'>
                                <textarea class="textarea" name="teacher_designation" required placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $teacher_info['teacher_designation'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Description (<span style="color:red">*</span>)</label>
                        <div class='box'>
                            <div class='box-body pad'>
                                <textarea class="textarea" name="teacher_description" required placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $teacher_info['teacher_description'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" name="btn" class="btn btn-primary">Update</button>
                <button type="reset" class="btn">Cancel</button>
            </div>
        </form>
    </div><!-- /.box -->
</div><!--/.col (left) -->