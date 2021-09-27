<?php
require_once '../controllers/super_admin.php';

$obj_super_admin = new Super_admin();

if (isset($_POST['btn'])) {
    $obj_super_admin->save_event_info($_POST);
}
?>

<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add Event</li>
    </ol>
</section>
<br/>

<ol class="breadcrumb">
    <h1 class="box-title">Add Event</h1>
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
                    <label for="exampleInputName">Title (<span style="color:red">*</span>)</label>
                    <input type="text" name="event_title" class="form-control"  required regexp="JSVAL_RX_ALPHA" err="Please Enter Valide  Event Title"  placeholder="Enter title" >
                    
                </div>
               <div class="form-group">
                    <label for="exampleInputName">Main(<span style="color:red">*</span>)</label>
                    <div class='box'>
                        <div class='box-body pad'>
                            
                                <textarea class="textarea" name="event_main" required placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>Event Status  (<span style="color:red">*</span>)</label>
                    <select name="event_status" required exclude=" " class="form-control">
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

