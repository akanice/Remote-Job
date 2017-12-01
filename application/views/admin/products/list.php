<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý linh kiện
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/products')?>">Quản lý linh kiện</a></li>
            <li class="active">Danh sách linh kiện</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách linh kiện</h3>
                    </div><!-- /.box-header -->
                    <?php if (in_array($admingroup,$groups_permission)) {?>
						<div class="box-header">
                        <a href="<?=site_url('admin/products/add')?>"><button class="btn btn-primary add-new">Thêm mới</button></a>
                    </div>
					<?php }?>
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Tuổi thọ</th>
                                <th>Hình ảnh</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <form method="GET" action="<?=@$base?>">
                                <tr>
                                    <td></td>
                                    <td><input type="text" class="form-control" placeholder="Tên" name="name" value="<?=@$name?>"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: center"><button type="submit" class="btn btn-default">Tìm kiếm</button></td>
                                </tr>
                            </form>
                            <tbody>
                            <?php if($list) foreach ($list as $item){ ?>
                                <tr class="odd gradeX">
									<td><?=@$item->sku?></td>
									<td><?=@$item->name?></td>
									<td><?=number_format($item->sell_price,0,',','.')?></td>
									<td><?php 
									if (@$item->longevity < 30) { 
										echo $item->longevity." ngày";
									} elseif (($item->longevity >= 30) && ($item->longevity < 365) && ($item->longevity%30 == 0)) {
										echo ($item->longevity/30)." tháng";
									} elseif (($item->longevity >= 365) && ($item->longevity%365 == 0)) {
										echo ($item->longevity/365)." năm";
									} else {
										echo $item->longevity." ngày";
									}
									?>
										
									</td>
									<td><img src="<?=base_url(@$item->thumb)?>" height="32px" alt="hình ảnh - <?=@$item->name?>"></td>
									<td style="text-align: center"><a href="<?=@base_url('admin/products/edit/'.$item->id)?>"><i class="fa fa-pencil"></i> Sửa</a> | <a href="<?=@base_url('admin/products/delete/'.$item->id)?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" ><i class="fa fa-trash"></i> Xóa</a></td>
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
