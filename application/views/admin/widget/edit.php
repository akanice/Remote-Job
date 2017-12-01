<aside class="right-side">
    <section class="content-header">
        <h1>
            Quản lý tùy chỉnh
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/options')?>">Quản lý tùy chỉnh</a></li>
            <li class="active">Cập nhật thông tin tùy chỉnh</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <!-- left column -->
            <div class="col-md-8 col-sm-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Cập nhật thông tin tùy chỉnh</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Tên</label>
                                <span class="options-title"><?=@$option->name?></span>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Mô tả</label>
                                <i class="options-title"><?=@$option->description?></i>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Giá trị</label>
                                <?php if($option->type == "text"){?>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="value" value="<?=@$option->value?>"/>
                                    </div>
                                <?php }elseif($option->type == "ckeditor"){?>
                                    <div class="col-md-9">
                                        <textarea class="form-control ckeditor" name="value"><?=@$option->value?></textarea>
                                    </div>
                                <?php }elseif ($option->type == 'advertise'){?>
                                <div class="col-md-9">
                                    <div class="controls">
                                        <?php if($option->value->file != ""){?>
                                            <img src="<?=@base_url($option->value->file)?>">
                                        <?php }?>
                                        <input type="file" name="file"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Link</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="link" value="<?=@$option->value->link?>" placeholder="Link"/>
                                    <?php }else{?>
                                        <div class="controls">
                                            <?php if($option->value != ""){?>
                                                <img src="<?=@base_url($option->value)?>" width="160px">
                                            <?php }?>
                                            <input type="file" name="value"/>
                                        </div>
                                    <?php }?>
                                </div>
                            </div><!-- /.box-body -->
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" name="submit" value="Lưu lại">
                            <a href="javascript:window.history.go(-1);" class="btn btn-default">Hủy</a>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->