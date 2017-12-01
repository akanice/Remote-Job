<aside class="right-side">
    <section class="content-header">
        <h1>
            Quản lý nhân viên
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/users')?>">Quản lý nhân viên</a></li>
            <li class="active">Thêm mới nhân viên</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row-fluid">
            <div class="col-md-12">
                <!-- BEGIN VALIDATION STATES-->
                <div class="widget red">
                    <div class="widget-title">
                        <h4>Thông tin chi tiết nhân viên</h4>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered">
                            <tr class="odd gradeX">
                                <td width="20%">Email</td>
                                <td><?=@$user->email?></td>
                            </tr>
                            <tr class="odd gradeX">
                                <td width="20%">Tên</td>
                                <td><?=@$user->lastname?> <?=@$user->firstname?></td>
                            </tr>
                            <tr class="odd gradeX">
                                <td width="20%">Số điện thoại</td>
                                <td><?=@$user->phone?></td>
                            </tr>
                            <tr class="odd gradeX">
                                <td width="20%">Tỉnh/Thành Phố</td>
                                <td><?=@$user->city?></td>
                            </tr>
                            <tr class="odd gradeX">
                                <td width="20%">Địa chỉ</td>
                                <td><?=@$user->address?></td>
                            </tr>
                            <tr class="odd gradeX">
                                <td width="20%">Ngày đăng kí</td>
                                <td><?=date("d/m/Y",@$user->create_time)?></td>
                            </tr>
							<tr class="odd gradeX">
								<td></td>
                                <td><button class="btn btn-success" data-toggle="modal" data-target="#ModalPopup">Cấp mới mật khẩu</button></td>
							</tr>
                        </table>
                </div>
            </div>
                <!-- END VALIDATION STATES-->
            </div>
            <!-- END PAGE CONTAINER-->
        </div>
        <!-- END PAGE -->
    </section>
	
	<div class="modal fade" id="ModalPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Cấp mới mật khẩu cho người dùng</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="POST" action="<?=site_url('admin/users/updatePassword')?>">
						<div class="form-group">
							<input type="password" name="password" id="newpw" class="form-control" placeholder="mật khẩu mới" required="" /> <a href="#" id="showpw" class="btn btn-warning">Hiện mật khẩu <i class="fa fa-eye"></i></a> <a href="#" id="hidepw" style="display:none" class="btn btn-warning">Ẩn mật khẩu <i class="fa fa-eye"></i></a>
							<input type="hidden" name="id" value="<?=$user->id?>">
							<input type="hidden" name="email" value="<?=$user->email?>">
						</div>
						<br>
						<div class="form-group">
							<div style="float: right">
								<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
								<button type="submit" class="btn btn-primary">Lưu lại</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		$('#showpw').click(function(e) {
			e.preventDefault();
			$(this).hide();
			$("#newpw").prop("type", "text");
			$('#hidepw').show();
		});
		$('#hidepw').click(function(e) {
			e.preventDefault();
			$(this).hide();
			$("#newpw").prop("type", "password");
			$('#showpw').show();
		});
	</script>