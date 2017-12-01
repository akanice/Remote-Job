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
            <!-- left column -->
			<form role="form" method="POST" enctype="multipart/form-data" action="">
				<div class="col-md-8 col-sm-6">
					<!-- general form elements -->
					<div class="box box-success box-solid">
						<div class="box-header with-border">
							<h3 class="box-title">Thêm mới nhân viên</h3>
						</div>
						<div class="box-body">
                            <div class="form-group row-fluid">
								<label class="col-md-2">Họ </label>
								<div class="col-md-10"><input type="text" class="form-control" name="lastname"/></div>
							</div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Tên </label>
                                <div class="col-md-10"><input type="text" class="form-control" name="firstname" required=""/></div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-2">Mã nhân viên </label>
                                <div class="col-md-10"><input type="text" class="form-control" name="user_code" /></div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-2">Mật khẩu </label>
                                <div class="col-md-10"><input type="text" class="form-control" name="password" required=""/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Email </label>
                                <div class="col-md-10"><input type="email" class="form-control" name="email" required=""/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Số điện thoại </label>
                                <div class="col-md-10"><input type="text" class="form-control" name="phone"/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Địa chỉ</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="address"/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Loại</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="group_id">
                                        <?php foreach ($usergroups as $item) {?>
											<option value="<?=$item->id?>"><?=$item->name?></option>
										<?php } ?>
                                    </select>
                                </div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-2">Thuộc chi nhánh</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="warehouse_id">
                                       <?php foreach ($userwarehouse as $item) {?>
											<option value="<?=$item->id?>"><?=$item->name?></option>
										<?php } ?>
                                    </select>
                                </div>
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
