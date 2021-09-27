<?php
require_once '../controllers/super_admin.php';

$obj_super_admin = new Super_admin();
$result = $obj_super_admin->select_slider_info_by_id($slider_id);
$slider_info = mysql_fetch_assoc($result);

if (isset($_POST['btn'])) {
    $obj_super_admin->update_slider_info($_POST,$_FILES);
    $result = $obj_super_admin->select_slider_info_by_id($slider_id);
    $slider_info = mysql_fetch_assoc($result);
}
?>
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Slider</li>
    </ol>
</section>
<br/>

<ol class="breadcrumb">
    <h1 class="box-title">Edit Slider</h1>
</ol>

<div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        <form name="edit_slider"   role="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputName">Title (<span style="color:red">*</span>)</label>
                    <input type="text" name="slider_name" value="<?php echo $slider_info['slider_name'] ?>" class="form-control"  required regexp="JSVAL_RX_ALPHA" err="Please Enter Valide  Slider Title"  placeholder="Enter title" >
                     <input type="hidden" name="slider_id"value="<?php echo $slider_info['slider_id'] ?>" class="form-control" id="exampleInputName" placeholder="Enter slider">
                    
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword">News Image (<span style="color:red">*</span>)</label>
                    <input type="file" name="slider_image" value="<?php echo $slider_info['slider_image'] ?>" class="form-control">

                    <img width="300" height="200" src="<?php echo $slider_info['slider_image'] ?>">
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
                <button type="submit" name="btn" class="btn btn-primary">Update</button>
                <button type="reset" class="btn">Cancel</button>
            </div>
        </form>
    </div><!-- /.box -->
</div><!--/.col (left) -->
<script type="text/javascript">
    document.forms['edit_slider'].elements['slider_status'].value = '<?php echo $slider_info['slider_status'] ?>';
</script>
