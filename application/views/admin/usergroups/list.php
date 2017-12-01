<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý nhóm nhân viên
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="<?=site_url('admin/usergroups')?>">Quản lý nhóm nhân viên</a></li>
        <li class="active">Danh sách nhóm nhân viên</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row" style="margin-left: -15px">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách nhóm nhân viên</h3>
                </div><!-- /.box-header -->
                <div class="box-header">
                    <a href="<?=site_url('admin/usergroups/add')?>"><button class="btn btn-primary add-new">Thêm mới</button></a>
                </div>
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width='5%'>ID</th>
                            <th width='60%'>Tên</th>
                            <th width='35%'>Hành động</th>
                        </tr>
                        </thead>
                        <form method="GET" action="<?=@$base?>">
                            <tr>
                                <td width='5%'></td>
                                <td width='60%'><input type="text" class="form-control" placeholder="Name" name="name" value="<?=@$name?>"></td>
                                <td width='25%' style="text-align: center"><button type="submit" class="btn btn-default">Tìm kiếm</button></td>
                            </tr>
                        </form>
                        <tbody>
                        <?php if($list) foreach ($list as $item){ ?>
                            <tr class="odd gradeX">
                                <td><?=@$item->id?></td>
                                <td><?=@$item->name?></td>
                                <td style="text-align: center"><a href="<?=@base_url('admin/usergroups/edit/'.$item->id)?>"><i class="fa fa-pencil"></i> Sửa</a> | <a href="<?=@base_url('admin/usergroups/delete/'.$item->id)?>" onclick="return confirm('Bạn có muốn xóa không?')"><i class="fa fa-trash"></i> Xóa</a></td>
                            </tr>
                        <?php } ?>
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
