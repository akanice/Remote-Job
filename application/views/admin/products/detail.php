<aside class="right-side">
    <section class="content-header">
        <h1>
            Quản lý linh kiện
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/products')?>">Quản lý linh kiện</a></li>
            <li class="active">Cập nhật thông tin linh kiện</li>
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
							<h3 class="box-title">Cập nhật thông tin linh kiện</h3>
						</div>
						<div class="box-body">
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Tên linh kiện *</label>
                                <div class="col-md-10"><?=$products->name?></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-2">Mã linh kiện (SKU)</label>
                                <div class="col-md-10"><?=$products->sku?></div>
                            </div>
							<div class="form-group row-fluid">
								<label class="col-md-2">Tuổi thọ</label>
								<div class="col-md-10">
									<?=$products->longevity?> ngày
								</div>
							</div>
							<div class="form-group row-fluid">
								<label class="col-md-2">Giá bán</label>
								<div class="col-md-10">
									<?=number_format($products->sell_price,0,',','.')?>
								</div>
							</div>
							<div class="form-group row-fluid">
								<label class="col-md-2">Ghi chú</label>
								<div class="col-md-10"><?=$products->note?></div>
							</div>
                            <!-- /.box-body -->
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
                                <div class="col-md-12">
                                    <img src="<?=base_url($products->thumb)?>" style="width: 100%;"/>
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