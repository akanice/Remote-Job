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
				<div class="col-md-12 col-sm-12">
					<!-- general form elements -->
					<div class="box box-success box-solid">
						<div class="box-header with-border">
							<h3 class="box-title">Thêm mới khách hàng</h3>
						</div>
						<div class="box-body">
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Ảnh đại diện </label>
                                <div class="col-md-5"><input type="file" class="form-control" name="avatar"/></div>
                            </div>
                            <div class="form-group row-fluid">
								<label class="col-md-2">Họ tên</label>
								<div class="col-md-3"><input type="text" class="form-control" name="lastname" placeholder="Họ" required=""/></div>
								<div class="col-md-3"><input type="text" class="form-control" name="firstname" placeholder="Tên" required=""/></div>
								<div class="col-md-4"><input type="text" class="form-control" name="id_card" placeholder="CMND" /></div>
							</div>
							<div class="form-group row-fluid">
								<label class="col-md-2">Tình trạng hôn nhân</label>
								<div class="col-md-6">
									<select class="form-control" name="sex">
										<option value="single">Độc thân</option>
										<option value="married">Đã thành hôn</option>
										<option value="divorced">Ly dị</option>
										<option value="seperated">Ly thân</option>
										<option value="widow">Góa phụ / Góa chồng</option>
										<option value="widower">Góa vợ</option>
										<option value="engaged">Đã đính hôn</option>
									</select>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="gender">
										<option value="0">-- Giới tính --</option>
										<option value="male">Nam</option>
										<option value="female">Nữ</option>
										<option value="other">N/A</option>
									</select>
								</div>
							</div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Email </label>
                                <div class="col-md-4"><input type="email" class="form-control" name="email" placeholder="nguyenvana@gmail.com" required=""/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Ngày sinh </label>
                                <div class="col-md-4"><input type="text" class="form-control" name="birthday" id="birthday"/></div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-2">Số điện thoại </label>
                                <div class="col-md-4"><input type="text" class="form-control" name="phone"/></div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-2">Nghề nghiệp</label>
                                <div class="col-md-4"><input type="text" class="form-control" name="career"/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Địa chỉ thường trú </label>
                                <div class="col-md-6"><input type="text" class="form-control" name="address"/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Nguyên quán/Hộ khẩu</label>
                                <div class="col-md-6"><input type="text" class="form-control" name="address2"/></div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-2">Nơi công tác</label>
                                <div class="col-md-6"><input type="text" class="form-control" name="workplace"/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Loại khách hàng</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="type">
                                        <option value="new">Mới</option>
                                        <option value="old">Cũ</option>
                                        <option value="lead">Tiềm năng</option>
                                        <option value="caring">Đang chăm sóc</option>
                                        <option value="reject">Đã từ chối</option>
                                    </select>
                                </div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-2">Ghi chú</label>
                                <div class="col-md-10"><textarea class="form-control ckeditor" name="note"/></textarea></div>
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
        $("#birthday").datepicker({ dateFormat: 'd/m/yy' });
        $(".chosen-select").chosen();
    });
</script>
