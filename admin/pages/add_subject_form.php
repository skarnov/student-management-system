

<?php
require_once '../controllers/super_admin.php';

$obj_super_admin = new Super_admin();

if (isset($_POST['btn'])) {
    $obj_super_admin->save_subject_info($_POST);
}
$classes=$obj_super_admin->select_all_class();
?>
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add Subject</li>
    </ol>
</section>
<br/>
<ol class="breadcrumb">
    <h1 class="box-title">Add Subject</h1>
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
        <form role="form" action="" method="POST" onsubmit="return validateStandard(this)">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputName">Name  (<span style="color:red">*</span>)</label>
                    <input type="text" name="subject_name" class="form-control" id="exampleInputName" required regexp="JSVAL_RX_ALPHA" err="Please Enter Valide Subject Name"  placeholder="Enter Name" onblur="return makerequest(this.value,'res')">
                    <span id="res"></span>
                </div>
                 <div class="form-group">
                    <label for="exampleInputName">Code  (<span style="color:red">*</span>)</label>
                    <input type="text" name="subject_code" class="form-control" id="exampleInputName" required   placeholder="Enter Code" >
                    <span id="res"></span>
                </div>
               
                <div class="form-group">
                    <label>Select Class(<span style="color:red">*</span>)</label>
                    <select name="class_id" required exclude=" " class="form-control">
                        <option value=" "  disabled="">Select </option>
                        <?php  while ($row= mysql_fetch_array($classes) ){?>
                        <option value="<?php echo $row['class_id'] ?>" ><?php echo $row['class_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
               
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" name="btn" id="btn" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div><!-- /.box -->
</div><!--/.col (left) -->