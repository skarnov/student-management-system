<?php
require_once '../controllers/super_admin.php';

$obj_super_admin = new Super_admin();
$result = $obj_super_admin->select_news_info_by_id($news_id);
$news_info = mysql_fetch_assoc($result);

if (isset($_POST['btn'])) {
    $obj_super_admin->update_news_info($_POST, $_FILES);
    $result = $obj_super_admin->select_news_info_by_id($news_id);
    $news_info = mysql_fetch_assoc($result);
}
?>
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit News</li>
    </ol>
</section>
<br/>

<ol class="breadcrumb">
    <h1 class="box-title">Edit News</h1>
</ol>

<div class="col-xs-10">
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        <form name="edit_news"   role="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
            <div class="box-body">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="exampleInputName">Title (<span style="color:red">*</span>)</label>
                        <input type="text" name="news_title" value="<?php echo $news_info['news_title'] ?>" class="form-control"  required regexp="JSVAL_RX_ALPHA" err="Please Enter Valide  News Title"  placeholder="Enter title" >
                        <input type="hidden" name="news_id"value="<?php echo $news_info['news_id'] ?>" class="form-control" id="exampleInputName" placeholder="Enter news">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Main(<span style="color:red">*</span>)</label>
                        <div class='box'>
                            <div class='box-body pad'>

                                <textarea class="textarea" name="news_main" required placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $news_info['news_main'] ?></textarea>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="exampleInputPassword">News Image (<span style="color:red">*</span>)</label>
                        <input type="file" name="news_image" value="<?php echo $news_info['news_image'] ?>" class="form-control">

                        <img width="300" height="200" src="<?php echo $news_info['news_image'] ?>">
                    </div>
                    <div class="form-group">
                        <label>News Status  (<span style="color:red">*</span>)</label>
                        <select name="news_status" required exclude=" " class="form-control">
                            <option value=" ">Select Status.....</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
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
    document.forms['edit_news'].elements['news_status'].value = '<?php echo $news_info['news_status'] ?>';
</script>
