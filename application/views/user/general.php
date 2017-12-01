<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <div class="col-md-3">
				<!-- Profile Image -->
				<div class="box box-primary">
					<div class="box-body box-profile">
						<div class="block-relative">
							<img class="profile-user-img img-responsive img-circle" src="<?=@base_url($user_data->avatar)?>" alt="User profile picture" id="current_avatar">
							<span class="block-absolute" data-toggle="modal" data-target="#edit_avatar_modal">
								<img src="/assets/img/paint-brush.png" class="">
							</span>
						</div>
						<h3 class="profile-username text-center">Donald Nguyễn</h3>
						<p class="text-muted text-center">Nhân viên kỹ thuật</p>
						<ul class="list-group list-group-unbordered">
							<li class="list-group-item">
								<b>Doanh thu</b> <a class="pull-right">12.000.000</a>
							</li>
							<li class="list-group-item">
								<b>Đơn hàng</b> <a class="pull-right">543</a>
							</li>
							<li class="list-group-item">
								<b>Hoa hồng</b> <a class="pull-right">1.000.000</a>
							</li>
						</ul>
						<a href="#" class="btn btn-primary btn-block"><b>Xem chi tiết</b></a>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			
			<div class="col-md-9">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#timeline" data-toggle="tab" aria-expanded="false">Timeline</a></li>
						<li class=""><a href="#activity" data-toggle="tab" aria-expanded="true">Thống kê</a></li>
						<li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Chỉnh sửa thông tin</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane " id="activity">
							[Biểu đồ doanh số]
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane active" id="timeline">
							<!-- The timeline -->
							<?php if (!isset($user_log) || ($user_log == null) || ($user_log == '')) {?>
									<h4>Chưa có lịch sử nào được lưu lại</h4>
							<?php } else {?>
									<h4>Timeline - <?=$user_log[0]->user_lastname?> <?=$user_log[0]->user_firstname?></h4>
								<div class="">
									<ul class="timeline timeline-inverse">
										<?php $lastDate = null;
										foreach ($user_log as $row) {
											$date = date('Y-m-d', $row->datetime);
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
														<h3 class="timeline-header"><a href="#"><?=$row->user_lastname?> <?=$row->user_firstname?></a> đã gán 1 đơn hàng cho ai đó &nbsp;&nbsp;<a class="btn btn-primary btn-xs" href="<?=base_url('/admin/orders/view/'.$row->id_order)?>">Xem đơn hàng</a></h3>
													</div>
												</li>
												<?php 
												break;
												default:
													echo "Không có gì xảy ra cả";
											}
											$lastDate = $date; } ?>
										
										<li>
											<i class="fa fa-clock-o bg-gray"></i>
										</li>
									</ul>
								</div>
							<?php } ?>
						</div>
						<!-- /.tab-pane -->

						<div class="tab-pane" id="settings">
							<form class="form-horizontal block-relative" method="POST" id="edit_info">
								<div class="form-group">
									<label for="inputName" class="col-sm-2 control-label">Họ</label>
									<div class="col-sm-10">
										<input type="text" class="form-control user_form_input" id="inputLName" placeholder="Họ" value="<?=@$user_data->lastname?>" disabled />
									</div>
								</div>
								<div class="form-group">
									<label for="inputName" class="col-sm-2 control-label">Tên</label>
									<div class="col-sm-10">
										<input type="text" class="form-control user_form_input" id="inputFName" placeholder="Name" value="<?=@$user_data->firstname?>" disabled />
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-10">
										<input type="email" class="form-control user_form_input" id="inputEmail" placeholder="Email" value="<?=@$user_data->email?>" disabled />
									</div>
								</div>
								<div class="form-group">
									<label for="inputAddress" class="col-sm-2 control-label">Địa chỉ</label>
									<div class="col-sm-10">
										<input type="text" class="form-control user_form_input" id="inputAddress" placeholder="Địa chỉ" value="<?=@$user_data->address?>" disabled />
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-2 control-label">Điện thoại</label>
									<div class="col-sm-10">
										<input type="text" class="form-control user_form_input" id="inputPhone" placeholder="Điện thoại" value="<?=@$user_data->phone?>" disabled />
									</div>
								</div>
								<div class="form-group">
									<label for="inputPwd" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control user_form_input" id="inputPwd" placeholder="" value="<?=@$user_data->password?>" disabled />
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="button" class="btn btn-primary" id="button_edit_info">Chỉnh sửa</button>
										<button type="button" class="btn btn-success" style="display:none;" id="button_cancel_info">Hủy bỏ</button>
										<button type="submit" class="btn btn-danger" style="display:none;" id="button_save">Lưu lại</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div>
				<!-- /.nav-tabs-custom -->
			</div>
						
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<div class="modal fade" id="edit_avatar_modal" tabindex="-1" role="dialog" aria-labelledby="edit_avatar_modal">
    <div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="POST" id="edit_avatar" enctype="multipart/form-data" action="">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Chỉnh sửa ảnh đại diện</h4>
				</div>
				<div class="modal-body">
					<input type="file" accept="image" name="avatar_image" id="avatar_image"/>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Lưu lại</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
</div>

<script src="<?=base_url('assets/js/jquery-1.11.1.min.js')?>"></script>
<script>
	$("#button_edit_info").click(function(e) {
		e.preventDefault();
		$(".user_form_input").prop("disabled", false);
		$(this).hide();
		$("#button_cancel_info").show();
		$("#button_save").show();
	});
	$("#button_cancel_info").click(function(e) {
		e.preventDefault();
		$(".user_form_input").prop("disabled", true);
		$(this).hide();
		$("#button_edit_info").show();
		$("#button_save").hide();
	});
</script>