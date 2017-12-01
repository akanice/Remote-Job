<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý Admins
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="<?=site_url('admin/admins')?>">Quản lý admins</a></li>
        <li class="active">Danh sách admins</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row" style="margin-left: -15px">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách admins</h3>
                </div><!-- /.box-header -->
                <div class="box-header">
                    <a href="<?=site_url('admin/admins/add')?>"><button class="btn btn-primary add-new">Thêm mới</button></a>
                </div>
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Group</th>
                                <th>Ngày đăng kí</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <form method="GET" action="<?=@$base?>">
                            <tr>
                                <td width='5%'></td>
                                <td width='25%'><input type="text" class="form-control" placeholder="Email" name="email" value="<?=@$email?>"></td>
                                <td width='20%'>
                                    <select class="form-control" name="group">
                                        <option value="">--Chọn--</option>
                                        <option value="admin" <?php if($group=="admin"){echo 'selected="selected" ';}?>>Admin</option>
                                        <option value="mod" <?php if($group=="mod"){echo 'selected="selected" ';}?>>Mod</option>
                                    </select>
                                </td>
                                <td width='25%'></td>
                                <td width='25%' style="text-align: center"><button type="submit" class="btn btn-default">Tìm kiếm</button></td>
                            </tr>
                        </form>
                        <tbody>
                        <?php if($list) foreach ($list as $item){ ?>
                            <tr class="odd gradeX">
                            <td><?=@$item->id?></td>
                            <td><?=@$item->email?></td>
                            <td><?=@$item->group?></td>
                            <td><?=date("d/m/Y",@$item->create_time)?></td>
                            <?php if($item->id!=1){?>
                                <td style="text-align: center"><a href="<?=@base_url('admin/admins/edit/'.$item->id)?>"><i class="fa fa-pencil"></i> Sửa</a> | <a href="<?=@base_url('admin/admins/delete/'.$item->id)?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" ><i class="fa fa-trash"></i> Xóa</a></td>
                            <?php }else{?>
                                <td></td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                    <div class="dataTables_paginate paging_bootstrap">
                        <ul class="pagination"><?php echo $page_links?></ul>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

</section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
