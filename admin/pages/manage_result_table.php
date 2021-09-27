<?php
require_once '../controllers/super_admin.php';

$obj_super_admin = new Super_admin();
$query_result = $obj_super_admin->select_student_by_class($_GET['class_id']);

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $id = $_GET['id'];
    if ($status == 'active') {
        $obj_super_admin->published_student($id);
    } else if ($status == 'inactive') {
        $obj_super_admin->unpublished_student($id);
    } else if ($status == 'delete') {
        $obj_super_admin->delete_result($id);
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
        <li class="active">Manage Result</li>
    </ol>
</section>
<br/>
<ol class="breadcrumb">
    <h1 class="box-title">Manage Result</h1>
</ol>

<div class="col-md-12">

    <div class="box">
        <div class="box-body">
            <table id="example1" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Class</th>
                        <th>Mark Sheet</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
while ($row = mysql_fetch_assoc($query_result)) {
    ?>
                        <tr>
                            <td class="center"><?php echo $row['student_name'] ?></td>
                            <td class="center"><?php echo $row['student_roll'] ?></td>
                            <td class="center"><?php echo $row['student_email'] ?></td>
                            <td class="center"><img src="<?php echo $row['student_image'] ?>" class="img-thumbnail" width="100" height="100"> 
                            <td class="center"><?php echo $row['class_name'] ?></td>
                            <td class="left "><a style="float: left;" href="get_admin_result.php?student_id=<?php echo $row['student_id']; ?>">View Result</a></td>
                            <td class="center">
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
                                                <a href="?status=delete&id=<?php echo $row['result_id'] ?>" class="btn btn-success">Yes</a>
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

