<?php
require_once '../controllers/super_admin.php';

$obj_super_admin = new Super_admin();
if (isset($_POST['btn'])) {
    $obj_super_admin->save_slider_info($_POST,$_FILES);
}
?>
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add Slider</li>
    </ol>
</section>
<br/>
<ol class="breadcrumb">
    <h1 class="box-title">Add Slider</h1>
</ol>
<div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        <form role="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputName">Title (<span style="color:red">*</span>)</label>
                    <input type="text" name="slider_name" class="form-control"  required regexp="JSVAL_RX_ALPHA" err="Please Enter Valide  Slider Title"  placeholder="Enter title" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">Slider Image(<span style="color:red">*</span>)</label>
                    <input type="file" name="slider_image" class="form-control">
                </div>
                <div class="form-group">
                    <label>Slider Status  (<span style="color:red">*</span>)</label>
                    <select name="slider_status" required exclude=" " class="form-control">
                        <option value=" ">Select Status.....</option>
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option>
                    </select>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" name="btn" id="btn" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div><!-- /.box -->
</div><!--/.col (left) -->