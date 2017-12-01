<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <div class="col-md-12">
                <div class="box">
					<div class="box-header">
						<h3 class="box-title">Thời hạn sử dụng linh kiện</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body no-padding">
						<table class="table table-striped">
							<tbody>
								<tr>
									<th style="width: 10px">#</th>
									<th style="width: 10%">Tên linh kiện</th>
									<th style="width: 10%">Ngày thay</th>
									<th style="width: 10%">Tuổi thọ</th>
									<th>Progress</th>
									<th style="width: 10%">Nên thay trước</th>
									<th style="width: 40px">Label</th>
								</tr>
								<?php $i=1;foreach ($product as $item) {
									$current_date = time();
									$used_date = $current_date - $item->start_date;
									$number_used_days =  floor($used_date/(60*60*24));
									$percent = floor($number_used_days/$item->product_longevity*100);
									?>
								<tr>
									<td><?=@$i++;echo $i;?></td>
									<td><?=@$item->product_name?></td>
									<td><?=@date('d/m/Y', $item->start_date)?></td>
									<td><?=@$item->product_longevity;?> ngày</td>
									<td>
										<div class="progress progress-xs progress-striped active">
											<div class="progress-bar progress-bar-success" style="width: <?php echo $percent;?>%"></div>
										</div>
									</td>
									<td><?php $expire_date = strtotime('+ '.$item->product_longevity.' day', $item->start_date);echo date('d/m/Y',$expire_date)?></td>
									<td><span class="badge bg-red"><?php echo $percent;?>%</span></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<p style="padding: 10px 15px;"><i>Chú ý: nên thay lõi trước khi hết hạn sử dụng khoảng 10 ngày để đảm bảo chất lượng sử dụng tốt nhất</i></p>
					<!-- /.box-body -->
				</div>
            </div>
			
			<div class="col-md-9">
				<div class="box box-primary box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Đơn hàng gần nhất</h3>
					</div>
					<div class="box-body">
						<div class="">
							<div class="invoice-col col-md-6">
								<b>Invoice #<?=@$orders->id?></b><br>
								<b>Order ID:</b> <?=@$orders->id?><br>
								<b>Payment Due:</b> <?=date('d/m/Y', $orders->create_date)?><br>
								<b>Mã NV tạo đơn:</b> <?=@$orders->staff_create_id?><br><br>
							</div>
							<div class="col-md-6">
								<b>Ngày thực hiện:</b> <?=date('d/m/Y h:i', $orders->implement_date)?>
							</div>
						</div>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Tên sản phẩm</th>
									<th>Mã sản phẩm #</th>
									<th>Số lượng</th>
									<th>Đơn giá</th>
									<th>Thành tiền</th>
								</tr>
							</thead>
							<?php $i=1;foreach ($product_array as $item) {?>
								<tr>
									<td><?=$i;$i++?></td>
									<td><?=$item->product_name?></td>
									<td><?=$item->sku?></td>
									<td><?=$item->quantity?></td>
									<td><?=number_format($item->sell_price,0,',','.')?></td>
									<td><?=number_format($item->quantity*$item->sell_price,0,',','.')?></td>
								</tr>
							<?php }?>
						</table><br><br>
						<div class="row">
							<!-- accepted payments column -->
							<div class="col-xs-6">
								<p class="lead">Phương thức thanh toán:</p>
								<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
									Nhận tiền sau khi hoàn thành lắp đặt cho khách hàng
								</p>
							</div>
							<!-- /.col -->
							<div class="col-xs-6">
								<p class="lead">Ngày chốt đơn: <?=@date('d/m/Y', $orders->complete_date)?></p>

								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr>
												<th>Thuế VAT</th>
												<td>10% (đã cộng)</td>
											</tr>
											<tr>
												<th>Shipping:</th>
												<td>Free</td>
											</tr>
											<tr>
												<th style="width:50%">Tổng cộng:</th>
												<td><?=number_format($orders->total_price,0,',','.')?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<div class="row" style="margin-left:-15px">
							<div class="col-xs-12">
								<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
								<button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
			
			<div class="col-md-3">
				<div class="box box-primary box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Thông tin cá nhân</h3>
					</div>
					<div class="box-body box-profile">
						<img class="profile-user-img img-responsive img-circle" src="/assets/img/profile_sample_icon.png" alt="User profile picture">
						<h3 class="profile-username text-center"><?php if ($customer->sex == 'male') {echo 'Ông';} else {echo 'Bà';}?><strong> <?=$customer->lastname.' '.$customer->firstname?></strong></h3><br>
						<strong><i class="fa fa-book margin-r-5"></i> Loại máy sử dụng: </strong>
						<span class="text-muted"><?=$device->name?></span>
						<hr>
						<strong><i class="fa fa-map-marker margin-r-5"></i> Địa chỉ: </strong><span class="text-muted"><?=$customer->address?></span>
						<hr>
						<strong><i class="fa fa-phone margin-r-5"></i> Số điện thoại: </strong><span class="text-muted"><?=$customer->phone?></span>
						<hr> 
						<strong><i class="fa fa-envelope margin-r-5"></i> Email: </strong><span class="text-muted"><?=$customer->email?></span>
						<hr>
						<a href="#" class="btn btn-primary btn-block"><b>Sửa thông tin</b></a>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
			
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->