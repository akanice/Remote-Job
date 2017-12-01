<aside class="right-side">
    <section class="content-header">
        <h1>
            Quản lý khách hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/customers')?>">Quản lý khách hàng</a></li>
            <li class="active">Thêm mới khách hàng</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <!-- left column -->
			<form role="form" method="POST" enctype="multipart/form-data" action="">
				<div class="col-md-8 col-sm-6">
					<!-- general form elements -->
					<div class="box box-danger box-solid">
						<div class="box-header with-border">
							<h3 class="box-title">Thêm mới khách hàng</h3>
						</div>
						<div class="box-body">
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Ảnh đại diện </label>
                                <div class="col-md-10"><input type="file" class="form-control" name="avatar"/></div>
                            </div>
                            <div class="form-group row-fluid">
								<label class="col-md-2">Họ </label>
								<div class="col-md-10"><input type="text" class="form-control" name="lastname" required=""/></div>
							</div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Tên </label>
                                <div class="col-md-10"><input type="text" class="form-control" name="firstname" required=""/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Email </label>
                                <div class="col-md-10"><input type="email" class="form-control" name="email" required=""/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Password </label>
                                <div class="col-md-10"><input type="password" class="form-control" name="password" required=""/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Ngày sinh </label>
                                <div class="col-md-10"><input type="text" class="form-control" name="birthday" id="birthday"/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Số điện thoại </label>
                                <div class="col-md-10"><input type="text" class="form-control" name="phone"/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Địa chỉ 1 </label>
                                <div class="col-md-10"><input type="text" class="form-control" name="address"/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Địa chỉ 2 </label>
                                <div class="col-md-10"><input type="text" class="form-control" name="address2"/></div>
                            </div>
							<div class="form-group row-fluid">
								<label class="col-md-2">Giới tính</label>
								<div class="col-md-10">
									<select class="form-control" name="sex">
										<option value="male">Nam</option>
										<option value="female">Nữ</option>
										<option value="other">N/A</option>
									</select>
								</div>
							</div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Loại</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="type">
                                        <option value="new">Mới</option>
                                        <option value="old">Cũ</option>
                                        <option value="lead">Đang dẫn dắt</option>
                                        <option value="caring">Đang chăm sóc</option>
                                        <option value="reject">Đã loại bỏ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">ID thiết bị </label>
                                <div class="col-md-10"><input type="number" class="form-control" name="id_device"/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">ID Đơn hàng </label>
                                <div class="col-md-10"><input type="number" class="form-control" name="id_order"/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Thời gian gọi </label>
                                <div class="col-md-10"><input type="text" class="form-control" name="time_call" id="time-call"/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Thời gian gọi chăm sóc cuối </label>
                                <div class="col-md-10"><input type="text" class="form-control" name="time_lastcare" id="time-lastcare"/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">QR Code</label>
                                <div class="col-md-10"><input type="number" class="form-control" name="qrcode"/></div>
                            </div>
							<!-- /.box-body -->
						</div>
						<div class="box-footer">
							<input type="submit" class="btn btn-primary" name="submit" value="Lưu lại">
							<a href="javascript:window.history.go(-1);" class="btn btn-default">Hủy</a>
						</div>
					</div>
				</div>
			</form>
        </div>
    </section>
</aside>
</div>
<script src="<?=  base_url('assets/js/jquery-ui.min.js')?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#birthday").datepicker();
        $("#time-call").datepicker();
        $("#time-lastcare").datepicker();
    });
</script>