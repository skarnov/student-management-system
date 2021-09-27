

<?php
require_once '../controllers/super_admin.php';

$obj_super_admin = new Super_admin();

if (isset($_POST['btn'])) {
    $obj_super_admin->save_class_info($_POST);
}
?>
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add Class</li>
    </ol>
</section>
<br/>
<ol class="breadcrumb">
    <h1 class="box-title">Add Class</h1>
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
        <form role="form" action="" method="POST" onsubmit="return validateStandard(this)">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputName">Name  (<span style="color:red">*</span>)</label>
                    <input type="text" name="class_name" class="form-control" id="exampleInputName" required regexp="JSVAL_RX_ALPHA" err="Please Enter Valide Class Name"  placeholder="Enter Name" >
                    <span id="res"></span>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" name="btn" id="btn" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div><!-- /.box -->
</div><!--/.col (left) -->