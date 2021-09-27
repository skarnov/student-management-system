<?php
    require_once '../controllers/super_admin.php';

    $obj_super_admin = new Super_admin();
    $result = $obj_super_admin->select_student_info_by_id($student_id);
    $student_info = mysql_fetch_assoc($result);

    if (isset($_POST['btn']))
    {
        $obj_super_admin->update_student_info($_POST, $_FILES);
        $result = $obj_super_admin->select_student_info_by_id($student_id);
        $student_info = mysql_fetch_assoc($result);
    }

    $_GET['class_id'] = NULL;
    $all_class= $obj_super_admin->select_all_class($_GET['class_id']);
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Student</li>
    </ol>
</section>
<br/>
<ol class="breadcrumb">
    <h1 class="box-title">Edit Student</h1>
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
        <form role="form" name="edit_student" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
            <div class="box-body">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="exampleInputName">Name (<span style="color:red">*</span>)</label>
                        <input type="text" name="student_name" value="<?php echo $student_info['student_name'] ?>" class="form-control" id="exampleInputName" required required regexp="JSVAL_RX_ALPHA" err="Please Enter Valide Teacher Name" placeholder="Enter name">
                        <input type="hidden" name="student_id" value="<?php echo $student_info['student_id'] ?>" class="form-control" id="exampleInputName" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Roll(<span style="color:red">*</span>)</label>
                        <input type="text" name="student_roll" value="<?php echo $student_info['student_roll'] ?>" class="form-control" id="exampleInputName" required placeholder="Enter Roll">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email(<span style="color:red">*</span>)</label>
                        <input type="email" name="student_email" value="<?php echo $student_info['student_email'] ?>" class="form-control" id="exampleInputEmail" required placeholder="Enter email">
                        </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Profile Image (<span style="color:red">*</span>)</label>
                        <input type="file" name="student_image" value="<?php echo $student_info['student_image'] ?>" class="form-control">
                        <img width="300" height="200" src="<?php echo $student_info['student_image'] ?>">
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="exampleInputName">Full Address (<span style="color:red">*</span>)</label>
                        <div class='box'>
                            <div class='box-body pad'>
                                <textarea class="textarea" name="student_address" required placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $student_info['student_address'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Select Class(<span style="color:red">*</span>)</label>
                        <select name="class_id" class="form-control">
                            <option value="" >Select </option>
                            <?php  while ($row= mysql_fetch_array($all_class) ){?>
                            <option value="<?php echo $row['class_id'] ?>"><?php echo $row['class_name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Student Status  (<span style="color:red">*</span>)</label>
                        <select name="student_status" required exclude=" " class="form-control">
                            <option value="">Select Status.....</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
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
<script type="text/javascript">
    document.forms['edit_student'].elements['class_id'].value = '<?php echo $student_info['class_id'] ?>';
    document.forms['edit_student'].elements['student_status'].value = '<?php echo $student_info['student_status'] ?>';
</script>
