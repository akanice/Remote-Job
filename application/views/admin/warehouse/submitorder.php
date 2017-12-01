<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/orders')?>">Quản lý đơn hàng</a></li>
            <li class="active">Danh sách đơn hàng</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-th"></i> Danh sách đơn hàng có thể chốt</h3>
                    </div><!-- /.box-header -->
					
                    <div class="box-body table-responsive">
						<?php if ($notif_popup == 'done') {?>
						<div class="alert alert-success alert-dismissible fade in">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-check"></i> Submit thành công</h4>
							Đã hoàn thành gửi đơn hàng đã hoàn thành lên kho.
						</div>
						<?php }?>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Khách hàng</th>
                                    <th>Ngày tạo</th>
                                    <th>Hẹn khách</th>
                                    <th>Tổng giá trị</th>
                                    <th>Hành động</th>
                                    <th>Đóng đơn</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($list) foreach ($list as $item){ ?>
                                <tr class="odd gradeX">
									<td><?=@$item->id?></td>
									<td><?=@$item->customer_last_name .' '. $item->customer_first_name?></td>
                                    <td><?=@date('d/m/Y <b>H:i</b>', $item->create_date)?></td>
                                    <td><?=@date('d/m/Y <b>H:i</b>', $item->implement_date)?></td>
                                    <td><?=number_format($item->total_price,0,',','.')?> VNĐ</td>
                                    <td style="text-align: center">
                                        <a href="<?=@base_url('admin/orders/view/'.$item->id)?>" class="btn btn-default btn-sm"><i class="fa fa-print"></i> Xem và in</a>
                                    </td>
									<td></td>
                                </tr>
                            <?php } else {echo 'Hiện tại không có đơn hàng nào có thể submit';} ?>
                            </tbody>
                        </table><hr>
						<form role="form" method="POST" enctype="multipart/form-data" action="">
							<input type="hidden" value="<?=$warehouse_id?>" name="order_id">
							<button type="submit" class="btn btn-success" name="submitall" value="submitForm">Submit all</button>
						</form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
</aside>

<style>
.box .box-header .order_tabs {padding: 7px;}
.box .box-header .order_tabs a {padding: 3px 15px;color: #517282;display:inline-block}
.box .box-header .order_tabs a:hover,.box .box-header .order_tabs a:focus,.box .box-header .order_tabs a.active {color: #0088cc}
.box .box-header .order_tabs a:last-child {border-right:0;}
.divider {color: #ccc;}
</style>