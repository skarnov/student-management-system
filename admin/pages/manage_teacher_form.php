<?php
require_once '../controllers/super_admin.php';

$obj_super_admin = new Super_admin();
$query_result = $obj_super_admin->select_all_teacher();

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $id = $_GET['id'];
    if ($status == 'active') {
        $obj_super_admin->published_teacher($id);
    } else if ($status == 'inactive') {
        $obj_super_admin->unpublished_teacher($id);
    } else if ($status == 'delete') {
        $obj_super_admin->delete_teacher($id);
    }
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Manage Teacher</li>
    </ol>
</section>
<br/>
<ol class="breadcrumb">
    <h1 class="box-title">Manage Teacher</h1>
</ol>
<div class="col-md-12">
    <div class="box">
        <div class="box-body">
            <table id="example1" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Designation</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysql_fetch_assoc($query_result)) {
                        ?>
                        <tr>
                            <td class="center"><?php echo $row['teacher_name'] ?></td>
                            <td class="center"><?php echo $row['teacher_email'] ?></td>
                            <td class="center"><img src="<?php echo $row['teacher_image'] ?>" class="img-thumbnail" width="100" height="100"> 
                            <td class="center"><?php echo $row['teacher_designation'] ?></td>
                            <td class="center">
                                <?php
                                if ($row['teacher_status'] == 1) {
                                    ?>
                                    <span class="label label-success">Active</span>
                                <?php } else { ?>
                                    <span class="label label-danger">Inactive</span>
                                <?php } ?>
                            </td>
                            <td class="center">
                                <?php
                                if ($row['teacher_status'] == 0) {
                                    ?>
                                    <a class="btn btn-success" href="?status=active&id=<?php echo $row['teacher_id'] ?>">
                                        <i class="icon-ok">Active</i>
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-danger" href="?status=inactive&id=<?php echo $row['teacher_id'] ?>">
                                        <i class="icon-remove">Inactive</i> 
                                    </a>

                                <?php } ?>
                                <a class="btn btn-info" href="edit_teacher.php?id=<?php echo $row['teacher_id'] ?>">
                                    <i class="icon-edit icon-white">Edit </i>  
                                </a>
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel" style="font-weight: bolder; color:black;">Delete Box</h4>
                                            </div>
                                            <div class="modal-body" style="font-weight: bolder; color:black;">
                                                Are you sure want to delete this?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                <a href="?status=delete&id=<?php echo $row['teacher_id'] ?>" class="btn btn-success">Yes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div><!--/.col (left) -->
