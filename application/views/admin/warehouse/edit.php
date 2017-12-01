<aside class="right-side">
    <section class="content-header">
        <h1>
            Quản lý kho - chi nhánh
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/warehouse')?>">Quản lý kho - chi nhánh</a></li>
            <li class="active">Cập nhật thông tin kho - chi nhánh</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <form role="form" method="POST" enctype="multipart/form-data" action="">
				<div class="col-md-8 col-sm-6">
					<!-- general form elements -->
					<div class="box box-success box-solid">
						<div class="box-header with-border">
							<h3 class="box-title">Cập nhật thông tin kho - chi nhánh</h3>
						</div>
						<div class="box-body">
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Tên kho - chi nhánh *</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="name" value="<?=$warehouse->name?>" required=""/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Địa chỉ</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="address" value="<?=$warehouse->address?>" /></div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-2">Số điện thoại</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="phone" value="<?=$warehouse->phone?>" /></div>
                            </div>
							<div class="form-group row-fluid">
								<label class="col-md-2">Ghi chú</label>
								<div class="col-md-10"><textarea class="ckeditor form-control" name="note"><?=$warehouse->note?></textarea></div>
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
							<h3 class="box-title">Timeline</h3>
						</div>
						<div class="box-body">
							<div class="form-group row-fluid">
								<div class="col-md-12">
									<a href="<?=site_url('admin/warehouse/viewlog/'.$warehouse->id)?>" class="btn btn-primary">Xem timeline</a>
									<br><br>
									<a href="<?=site_url('admin/warehouse/viewnumberproduct/'.$warehouse->id)?>" class="btn btn-success">Sản phẩm trong kho</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
        </div>
    </section>
</aside>
</div><!-- ./wrapper -->
<script src="<?=  base_url('assets/js/jquery-ui.min.js')?>"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".chosen-select").chosen();
    });
</script>