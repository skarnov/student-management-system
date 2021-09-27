<?php
require_once '../controllers/super_admin.php';

$obj_super_admin = new Super_admin();
$result = $obj_super_admin->select_notice_info_by_id($notice_id);
$notice_info = mysql_fetch_assoc($result);

if (isset($_POST['btn'])) {
    $obj_super_admin->update_notice_info($_POST);
    $result = $obj_super_admin->select_notice_info_by_id($notice_id);
    $notice_info = mysql_fetch_assoc($result);
}
?>
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Notice</li>
    </ol>
</section>
<br/>
<ol class="breadcrumb">
    <h1 class="box-title">Edit Notice</h1>
    <ul class="breadcrumb">
        <li class="completed"><a href="dashbord.php">Home</a></li>
        <li class="completed"><a href="manage_notice.php">Manage Notice</a></li>
        <li class="active"><a href="add_notice.php">Add Notice</a></li>
    </ul>
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
    <div class="box box-primary">
        <form name="edit_notice"  role="form" action="" method="POST" onsubmit="return validateStandard(this)">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputName">Title (<span style="color:red">*</span>)</label>
                    <input type="text" name="notice_title" value="<?php echo $notice_info['notice_title'] ?>" class="form-control"  required regexp="JSVAL_RX_ALPHA" err="Please Enter Valide  Notice Title"  placeholder="Enter title" >
                    <input type="hidden" name="notice_id"value="<?php echo $notice_info['notice_id'] ?>" class="form-control" id="exampleInputName" placeholder="Enter event">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Main(<span style="color:red">*</span>)</label>
                    <div class='box'>
                        <div class='box-body pad'>
                            <textarea class="textarea" name="notice_main" required placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $notice_info['notice_main'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Notice Status  (<span style="color:red">*</span>)</label>
                    <select name="notice_status" required exclude=" " class="form-control">
                        <option value=" ">Select Status.....</option>
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option>
                    </select>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" name="btn" class="btn btn-primary">Update</button>
                <button type="reset" class="btn">Cancel</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    document.forms['edit_notice'].elements['notice_status'].value = '<?php echo $notice_info['notice_status'] ?>';
</script>