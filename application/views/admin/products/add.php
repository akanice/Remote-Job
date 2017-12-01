<aside class="right-side">
    <section class="content-header">
        <h1>
            Quản lý linh kiện
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/products')?>">Quản lý linh kiện</a></li>
            <li class="active">Thêm mới linh kiện</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <!-- left column -->
			<form role="form" method="POST" enctype="multipart/form-data" action="">
				<div class="col-md-8 col-sm-6">
					<!-- general form elements -->
					<div class="box box-success box-solid">
						<div class="box-header with-border">
							<h3 class="box-title">Thêm mới linh kiện</h3>
						</div>
						<div class="box-body">
							<div class="form-group row-fluid">
								<label class="col-md-2">Tên linh kiện *</label>
								<div class="col-md-10"><input type="text" class="form-control" name="name" required=""/></div>
							</div>
							<div class="form-group row-fluid">
								<label class="col-md-2">Mã linh kiện (SKU)</label>
								<div class="col-md-10"><input type="text" class="form-control" name="sku" required=""/></div>
							</div>
							<div class="form-group row-fluid">
								<label class="col-md-2">Tuổi thọ</label>
								<div class="col-md-2">
									<input type="number" class="form-control" name="longevity" required=""/>
								</div>
								<div class="col-md-2">
									<select class="form-control" name="unit">
										<option value="months">Tháng</option>
										<option value="days">Ngày</option>
										<option value="years">Năm</option>
									</select>
								</div>
							</div>
							<div class="form-group row-fluid">
								<label class="col-md-2">Ghi chú</label>
								<div class="col-md-10"><textarea class="ckeditor form-control" name="note"></textarea></div>
							</div>
							<!-- /.box-body -->
						</div>
						<div class="box-footer">
							<input type="submit" class="btn btn-primary" name="submit" value="Lưu lại">
							<a href="javascript:window.history.go(-1);" class="btn btn-default">Hủy</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="box box-success box-solid">
						<div class="box-header with-border">
							<h3 class="box-title">Media</h3>
						</div>
						<div class="box-body">
							<div class="form-group row-fluid">
								<label class="col-md-4">Ảnh Linh kiện</label>
								<div class="col-md-8">
									<input type="file" accept="image" class="" name="images" style="width: 150px"/>
								</div>
							</div>
						</div>
					</div>
					<div class="box box-primary box-solid">
						<div class="box-header with-border">
							<h3 class="box-title">Hiển thị</h3>
						</div>
						<div class="box-body">
							<div class="form-group row-fluid">
								<label class="col-md-2">Giá nhập</label>
								<div class="col-md-10"><input type="text" class="form-control" name="input_price" required=""/></div>
							</div>
							<div class="form-group row-fluid">
								<label class="col-md-2">Giá bán</label>
								<div class="col-md-10"><input type="text" class="form-control" name="sell_price" required=""/></div>
							</div>
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
        $(".chosen-select").chosen();
    });
</script>