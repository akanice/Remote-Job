<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/device')?>">Quản lý sản phẩm</a></li>
            <li class="active">Danh sách sản phẩm</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách sản phẩm</h3>
                    </div><!-- /.box-header -->
                    <div class="box-header">
                        <a href="<?=site_url('admin/device/add')?>"><button class="btn btn-primary add-new">Thêm mới</button></a>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Preview</th>
                                <th>Ảnh đại diện</th>
                                <th>Danh mục</th>
                                <th>Giá (đang bán)</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <form method="GET" action="<?=@$base?>">
                                <tr>
                                    <td></td>
                                    <td><input type="text" class="form-control" placeholder="Tên" name="name" value="<?=@$name?>"></td>
                                    <td></td>
                                    <td></td>
                                    <td>
										<select class="form-control" name="category">
                                            <option value="">--Chọn--</option>
                                            <?php foreach ($devicecategory as $c) {?>
                                                <option value="<?=@$c->id?>" <?php if($category==$c->id){echo 'selected="selected" ';}?>><?=@$c->name?></option>
                                            <?php }
                                            ?>
                                        </select>
									</td>
                                    <td></td>
                                    <td style="text-align: center"><button type="submit" class="btn btn-default">Tìm kiếm</button></td>
                                </tr>
                            </form>
                            <tbody>
                            <?php if($list) foreach ($list as $item){ ?>
                                <tr class="odd gradeX">
                                <td><?=@$item->id?></td>
                                <td><?=@$item->name?></td>
                                <td><a href="<?=base_url('san-pham/chi-tiet/'.$item->alias)?>" class="btn btn-primary btn-sm" role="button" target="_blank">Preview</a></td>
                                <td><img src="<?=@base_url($item->thumb)?>" width="80px"></td>
                                <td><?=@$item->category?></td>
                                <td><?=@$item->sell_price?></td>
                                <td style="text-align: center"><a href="<?=@base_url('admin/device/edit/'.$item->id)?>"><i class="fa fa-pencil"></i> Sửa</a> | <a href="<?=@base_url('admin/device/delete/'.$item->id)?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" ><i class="fa fa-trash"></i> Xóa</a></td>
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
