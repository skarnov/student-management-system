<?php
require_once '../controllers/super_admin.php';

$obj_super_admin = new Super_admin();
$query_result=$obj_super_admin->select_result_by_student_id($_GET['student_id']);

    if(isset($_GET['status']))
    {
        $status=$_GET['status'];
        $id=$_GET['id'];
        if($status=='active')
        {
            $obj_super_admin->published_student($id);
        }
        else if($status=='inactive')
        {
            $obj_super_admin->unpublished_student($id);
        }
        else if($status=='delete')
        {
            $obj_super_admin->delete_student($id);
        }
    }
?>
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
<div class="col-xs-6">
    <div class="box">
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Subject Name</th>
                        <th>Marks</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    while($row=  mysql_fetch_assoc($query_result))
                    {
                ?>
                    <tr>
                    
                        <td class="center"><?php echo $row['subject_name']?></td>
                        <td class="center"><?php echo $row['marks']?></td>
                        
                    </tr>
                    <?php }?>


                </tbody>
                
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div><!--/.col (left) -->