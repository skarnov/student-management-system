<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Admin Setting</li>
    </ol>
</section>
<br/>
<ol class="breadcrumb">
    <h1 class="box-title" style="color:mediumslateblue;">Evis Admin Setting</h1>
</ol>
<div class="col-xs-12">
    <div class='box box-default color-palette-box'>
        <div class='box-header'>
            <h2 class="page-header">Logo & Institute Name</h2>
        </div>
        <div class='box-body'>
            <div class='row'>
                <div class='col-sm-4'>
                    <form name="edit_news"   role="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword">Logo (<span style="color:red">*</span>)</label>
                                <input type="file" name="news_image" value="<?php echo $news_info['news_image'] ?>" class="form-control">

                                <img width="300" height="200" src="<?php echo $news_info['news_image'] ?>">
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="btn" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </form>
                </div>
                <div class='col-sm-8'>
                    <form name="edit_news"   role="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputName">Institute Name(<span style="color:red">*</span>)</label>
                                <div class='box'>
                                    <div class='box-body pad'>
                                        <textarea class="textarea" name="news_main" required placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><? echo $news_info[''] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="btn" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <div class='box box-default color-palette-box'>
        <div class='box-header'>
            <h2 class="page-header">About The Institute</h2>
        </div>
        <div class='box-body'>
            <div class='row'>
                <div class='col-sm-4'>
                    <form name="edit_news"   role="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword">Institution Image (<span style="color:red">*</span>)</label>
                                <input type="file" name="news_image" value="<?php echo $news_info['news_image'] ?>" class="form-control">

                                <img width="300" height="200" src="<?php echo $news_info['news_image'] ?>">
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="btn" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </form>
                </div>
                <div class='col-sm-8'>
                    <form name="edit_news"   role="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputName">About Institution(<span style="color:red">*</span>)</label>
                                <div class='box'>
                                    <div class='box-body pad'>

                                        <textarea class="textarea" name="news_main" required placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?ph echo $news_info['news_main'] ?></textarea>

                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="btn" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class='box box-default color-palette-box'>
        <div class='box-header'>
            <h2 class="page-header">Message of Headmaster</h2>
        </div>
        <div class='box-body'>
            <div class='row'>
                <div class='col-sm-4'>
                    <form name="edit_news"   role="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword">Institution Image (<span style="color:red">*</span>)</label>
                                <input type="file" name="news_image" value="<?php echo $news_info['news_image'] ?>" class="form-control">

                                <img width="300" height="200" src="<?php echo $news_info['news_image'] ?>">
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="btn" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </form>
                </div>
                <div class='col-sm-8'>
                    <form name="edit_news"   role="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputName">About Institution(<span style="color:red">*</span>)</label>
                                <div class='box'>
                                    <div class='box-body pad'>

                                        <textarea class="textarea" name="news_main" required placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?ph echo $news_info['news_main'] ?></textarea>

                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="btn" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class='box box-default color-palette-box'>
        <div class='box-header'>
            <h2 class="page-header">Message 2</h2>
        </div>
        <div class='box-body'>
            <div class='row'>
                <div class='col-sm-4'>
                    <form name="edit_news"   role="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword">Institution Image (<span style="color:red">*</span>)</label>
                                <input type="file" name="news_image" value="<?php echo $news_info['news_image'] ?>" class="form-control">

                                <img width="300" height="200" src="<?php echo $news_info['news_image'] ?>">
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="btn" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </form>
                </div>
                <div class='col-sm-8'>
                    <form name="edit_news"   role="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputName">About Institution(<span style="color:red">*</span>)</label>
                                <div class='box'>
                                    <div class='box-body pad'>

                                        <textarea class="textarea" name="news_main" required placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?ph echo $news_info['news_main'] ?></textarea>

                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="btn" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <h2 class="page-header">Footer Information</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-meanpath"> Copyright</i>

                </div>

                <div class="form-group">

                    <div class='box'>
                        <div class='box-body pad'>

                            <textarea class="textarea" name="news_main" required placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?ph echo $news_info['news_main'] ?></textarea>

                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-meanpath"> Facebook Page</i>

                </div>

                <div class="form-group">

                    <div class='box'>
                        <div class='box-body pad'>

                            <textarea class="textarea" name="news_main" required placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?ph echo $news_info['news_main'] ?></textarea>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2 class="page-header">About Us Page</h2>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-chevron-right"> Change Content</i>
                </div>
                <form name="edit_news" role="form" action="" method="POST">
                    <div class="form-group">
                        <div class='box'>
                            <div class='box-body pad'>
                                <textarea class="textarea" name="news_main" required placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?ph echo $news_info['news_main'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>
    
</div>