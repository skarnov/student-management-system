<?php

    require_once '../controllers/super_admin.php';

    $obj_super_admin = new Super_admin();
    $result = $obj_super_admin->select_admin_info_by_id($admin_id);
    $admin_info = mysql_fetch_assoc($result);
    if (isset($_POST['btn'])) {
        $obj_super_admin->update_admin_info($_POST);
    }
?>
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add Admin</li>
    </ol>
</section>
<br/>
<ol class="breadcrumb">
    <h1 class="box-title">Add Admin</h1>
</ol>
<div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        <form name="edit_admin" role="form" action="" method="POST">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" name="admin_name" value="<?php echo $admin_info['admin_name']?>" class="form-control" id="exampleInputName" placeholder="Enter name">
                    <input type="hidden" name="admin_id"value="<?php echo $admin_info['admin_id']?>" class="form-control" id="exampleInputName" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail">Email</label>
                    <input type="email" name="admin_email" value="<?php echo $admin_info['admin_email']?>" class="form-control" id="exampleInputEmail" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Access Level</label>
                    <select name="admin_access_level" class="form-control">
                        <option value="0" >Select </option>
                        <option value="1" >Admin</option>
                        <option value="2">Clerk</option>
                        <option value="3">Accountant</option>
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
    document.forms['edit_admin'].elements['admin_access_level'].value = '<?php echo $admin_info['admin_access_level'] ?>';
</script>