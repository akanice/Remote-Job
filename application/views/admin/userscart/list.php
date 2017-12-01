<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý túi đồ
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/userscart')?>">Quản lý túi đồ</a></li>
            <li class="active">Danh sách túi đồ</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách túi đồ</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Mã linh kiện</th>
                                <th>Tên</th>
                                <th>Số lượng (chiếc)</th>
                                <th>Hình ảnh</th>
                                <th>Giá bán (vnđ)</th>
                                <th>Tuổi thọ (ngày)</th>
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
									<td></td>
                                    <td style="text-align: center"><button type="submit" class="btn btn-default">Tìm kiếm</button></td>
                                </tr>
                            </form>
                            <tbody>
                            <?php if($list) foreach ($list as $item){ ?>
                            <tr class="odd gradeX">
                                <td> <strong>&nbsp;<?=@$item->sku?></strong></td>
                                <td><?=@$item->name?></td>
                                <td><?=@$item->product_number?></td>
                                <td><img src="<?=base_url($item->image)?>" height="32px"></td>
                                <td><?=number_format($item->sell_price,0,',','.')?></td>
                                <td><?=@$item->longevity?></td>
                                <td style="text-align: center">
									<a class="btn btn-success btn-sm" href="<?=@base_url('admin/products/detail/'.$item->id)?>"><i class="fa fa-pencil"></i> Xem chi tiết</a>
								</td>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
