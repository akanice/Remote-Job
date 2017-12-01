<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý nhân sự
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/users')?>">Quản lý nhân sự</a></li>
            <li class="active">Danh sách nhân viên</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row-fluid">
			<div class="col-lg-12">
				<h2 class="page-header">
					<a href="<?=site_url('admin/users/add')?>"><button class="btn btn-primary add-new">Thêm mới</button></a>
					<a href="<?=site_url('admin/users/listall')?>"><button class="btn btn-warning">Xem thống kê doanh thu</button></a>
				</h2>
			</div>
			<?php if (!isset($user_log) || ($user_log == null) || ($user_log == '')) {?>
				<div class="col-lg-12">
					<h4>Chưa có lịch sử nào được lưu lại</h4>
				</div>
			<?php } else {?>
				<div class="col-lg-12">
					<h4>Timeline - <?=$user_log[0]->user_lastname?> <?=$user_log[0]->user_firstname?></h4>
				</div>
				<div class="col-md-12">
					<ul class="timeline timeline-inverse">
						<?php $lastDate = null;
						if ($user_log) {foreach ($user_log as $row) {
							$date = date('d/m/Y', $row->datetime);
							$time = date('H:i', $row->datetime);
							if (is_null($lastDate) || $lastDate !== $date) {
						?>
						<!-- timeline time label -->
						<li class="time-label">
							<span class="bg-red"><?=$date?></span>
						</li>
						<?php }?>
						<!-- /.timeline-label -->
						
						<!-- timeline item -->
						<?php switch ($row->action) {
							case 'create': ?>
								<li>
									<i class="fa fa-hand-pointer-o bg-blue"></i>
									<div class="timeline-item">
										<span class="time"><i class="fa fa-clock-o"></i> <?=$time?></span>
										<h3 class="timeline-header"><a href="#"><?=$row->user_lastname?> <?=$row->user_firstname?></a> đã tạo 1 đơn hàng mới &nbsp;&nbsp;<a class="btn btn-primary btn-xs" href="<?=base_url('/admin/orders/view/'.$row->id_order)?>">Xem đơn hàng</a></h3>
									</div>
								</li>
								<?php 
								break;
							case 'assign':?>
								<li>
									<i class="fa fa-hand-o-right bg-yellow"></i>
									<div class="timeline-item">
										<span class="time"><i class="fa fa-clock-o"></i> <?=$time?></span>
										<h3 class="timeline-header"><a href="#"><?=$row->user_lastname?> <?=$row->user_firstname?></a> đã gán 1 đơn hàng cho <?=@$row->user2_lastname?> <?=@$row->user2_firstname?> &nbsp;&nbsp;<a class="btn btn-primary btn-xs" href="<?=base_url('/admin/orders/view/'.$row->id_order)?>">Xem đơn hàng</a></h3>
									</div>
								</li>
								<?php 
								break;
							case 'delayed':?>
								<li>
									<i class="fa fa-hand-o-right bg-yellow"></i>
									<div class="timeline-item">
										<span class="time"><i class="fa fa-clock-o"></i> <?=$time?></span>
										<h3 class="timeline-header"><a href="#"><?=$row->user_lastname?> <?=$row->user_firstname?></a> đã báo hoãn 1 đơn hàng tới <a href="<?=base_url('admin/users/viewlog/'.$row->id_user_to)?>"><?=@$row->user2_lastname?> <?=@$row->user2_firstname?></a> &nbsp;&nbsp;<a class="btn btn-primary btn-xs" href="<?=base_url('/admin/orders/view/'.$row->id_order)?>">Xem đơn hàng</a></h3>
									</div>
								</li>
								<?php 
								break;
							case 'closed':?>
								<li>
									<i class="fa fa-hand-o-right bg-yellow"></i>
									<div class="timeline-item">
										<span class="time"><i class="fa fa-clock-o"></i> <?=$time?></span>
										<h3 class="timeline-header"><a href="#"><?=$row->user_lastname?> <?=$row->user_firstname?></a> đã chốt 1 đơn hàng tới <a href="<?=base_url('admin/users/viewlog/'.$row->id_user_to)?>"><?=@$row->user2_lastname?> <?=@$row->user2_firstname?></a> &nbsp;&nbsp;<a class="btn btn-primary btn-xs" href="<?=base_url('/admin/orders/view/'.$row->id_order)?>">Xem đơn hàng</a></h3>
									</div>
								</li>
								<?php 
								break;								
							case 'complete':?>
								<li>
									<i class="fa fa-hand-o-right bg-yellow"></i>
									<div class="timeline-item">
										<span class="time"><i class="fa fa-clock-o"></i> <?=$time?></span>
										<h3 class="timeline-header"><a href="#"><?=$row->user_lastname?> <?=$row->user_firstname?></a> đã hoàn thành 1 đơn hàng được tạo bởi <a href="<?=base_url('admin/users/viewlog/'.$row->id_user_to)?>"><?=@$row->user2_lastname?> <?=@$row->user2_firstname?></a> &nbsp;&nbsp;<a class="btn btn-primary btn-xs" href="<?=base_url('/admin/orders/view/'.$row->id_order)?>">Xem đơn hàng</a></h3>
									</div>
								</li>
								<?php 
								break;
								default:
									echo "Không có gì xảy ra cả";
							}
						$lastDate = $date; }} else {echo 'Chưa có lịch sử được lưu lại';} ?>
						
						<li>
							<i class="fa fa-clock-o bg-gray"></i>
						</li>
					</ul>
				</div>
			<?php } ?>
		</div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
