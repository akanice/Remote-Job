<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý qrcode
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/qrcode')?>">Quản lý qrcode</a></li>
            <li class="active">Danh sách qrcode</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách qrcode</h3>
                    </div><!-- /.box-header -->
                    <div class="box-header">
                        <a href="<?=site_url('admin/qrcode/add')?>"><button class="btn btn-primary add-new">Thêm mới</button></a>
						<a href="<?=site_url('admin/qrcode/multiadd')?>"><button class="btn btn-warning add-new">Thêm đồng loạt</button></a>
						<a href="<?=site_url('admin/qrcode/multidown')?>"><button class="btn btn-success add-new">Tải đồng loạt</button></a>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Số</th>
                                <th>Download</th>
                                <th>Mã</th>
                                <th>Trạng thái</th>
                                <th>Khách hàng</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <form method="GET" action="<?=@$base?>">
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Số tự nhiên" name="number" value="<?=@$number?>"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input type="text" class="form-control" placeholder="Tên" name="name" value="<?=@$name?>"></td>
                                    <td style="text-align: center"><button type="submit" class="btn btn-default">Tìm kiếm</button></td>
                                </tr>
                            </form>
                            <tbody>
                            <?php if($list) foreach ($list as $item){ ?>
                            <tr class="odd gradeX">
                                <td> <strong>&nbsp;<?=@$item->number?></strong></td>
                                <td> <a href="<?=@$item->qrcode_image?>" class="btn btn-success btn-sm" download="QRcode_number_<?=@$item->number?>"> <i class="fa fa-file-image-o"></i> tải về máy</a></td>
                                <td><?=@$item->code?></td>
                                <td><?=@$item->status?></td>
                                <td><?=@$item->customer_id?></td>
                                <td style="text-align: center"><a href="<?=@base_url('admin/qrcode/edit/'.$item->id)?>"><i class="fa fa-pencil"></i> Sửa</a> | <a href="<?=@base_url('admin/qrcode/delete/'.$item->id)?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" ><i class="fa fa-trash"></i> Xóa</a></td>
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
