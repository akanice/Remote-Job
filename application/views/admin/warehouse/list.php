<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý kho - chi nhánh
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/warehouse')?>">Quản lý kho - chi nhánh</a></li>
            <li class="active">Danh sách kho - chi nhánh</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách kho - chi nhánh</h3>
                    </div><!-- /.box-header -->
                    <?php if($this->session->userdata('admingroup') == 1) {?>
					<div class="box-header">
                        <a href="<?=site_url('admin/warehouse/add')?>"><button class="btn btn-primary add-new">Thêm mới</button></a>
                    </div>
					<?php }?>
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên kho - Chi nhánh</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <form method="GET" action="<?=@$base?>">
                                <tr>
                                    <td></td>
                                    <td><input type="text" class="form-control" placeholder="Tên" name="name" value="<?=@$name?>"></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: center"><button type="submit" class="btn btn-default">Tìm kiếm</button></td>
                                </tr>
                            </form>
                            <tbody>
                            <?php if($list) foreach ($list as $item){ ?>
                                <tr class="odd gradeX">
									<td><?=@$item->id?></td>
									<td><?=@$item->name?></td>
									<td><?=@$item->address?></td>
									<td><?=@$item->phone?></td>
									<td style="text-align: center">
										<a href="<?=@base_url('admin/warehouse/viewnumberproduct/'.$item->id)?>" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> Sản phẩm trong kho</a>
										<?php if (($this->session->userdata('admingroup') == 1) || ($this->session->userdata('admingroup') == 6)) {?>
										<a href="<?=@base_url('admin/warehouse/viewlog/'.$item->id)?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Log</a>
										<a href="<?=@base_url('admin/warehouse/edit/'.$item->id)?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Sửa</a>
										<a href="<?=@base_url('admin/warehouse/delete/'.$item->id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" ><i class="fa fa-trash"></i> Xóa</a></td>
										<?php }?>
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
