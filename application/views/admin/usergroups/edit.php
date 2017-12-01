<aside class="right-side">
    <section class="content-header">
        <h1>
            Quản lý nhóm nhân viên
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/usergroups')?>">Quản lý nhóm nhân viên</a></li>
            <li class="active">Cập nhật nhóm nhân viên</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cập nhật nhóm nhân viên</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="<?=base_url('admin/usergroups/edit/'.$usergroup->id)?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="control-label">Tên</label>
                                <div class="controls">
                                    <input type="text" class="form-control" name="name" value="<?=@$usergroup->name?>" required=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Quyền</label>
                                <div class="controls permission-input row">
                                    <?php
                                    $i = 0;
                                    $c = 0;
                                    foreach ($permission as $controller => $p){
                                        $c++;?>
                                        <div class="col-xs-3 margin-bottom" style="margin-left: 15px">
                                            <input class="input-c" id="input-c<?=$c?>" type="checkbox">
                                            <label for="input-c<?=$c?>"><?=ucfirst($controller)?></label>
                                            <?php
                                            foreach ($p as $v => $name){
                                                $i++;?>
                                                <div style="padding-left: 20px;">
                                                    <input class="input-p input-c<?=$c?>" id="input-p<?=$i?>" type="checkbox" name="permission[]" value="<?=strtolower($controller)?>,<?=$v?>" <?=(isset($usergroup->permission[$controller]) && in_array($v,$usergroup->permission[$controller])) ? 'checked' : ''?>>
                                                    <label for="input-p<?=$i?>"><?=$name?></label>
                                                </div>
                                            <?php
                                            }?>
                                        </div>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                        </div><!-- /.box-body -->

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
