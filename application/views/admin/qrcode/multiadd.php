<aside class="right-side">
    <section class="content-header">
        <h1>
            Quản lý qrcode
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/qrcode')?>">Quản lý qrcode</a></li>
            <li class="active">Thêm mới qrcode</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <!-- left column -->
            <div class="col-md-6 col-sm-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Thêm mới qrcode</h3><br>
                    </div><!-- /.box-header -->
                    <!-- form start -->
					<div class="col-md-12">
						<div class="list-group-item callout callout-warning">Số QR mới nhất: <span style="font-size:18px;font-weight:bold"><?=@$last_number->number?></span></div>
					</div>
					<br><br><br>
                    <form role="form" method="POST" enctype="multipart/form-data" action="">
                        <div class="box-body">
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Số tự nhiên</label>
                                <div class="col-md-9">
									Bắt đầu từ: <input type="number" class="form-control input-inline" name="from_number" required=""/> đến <input type="number" class="form-control input-inline" name="to_number" required=""/>
								</div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" name="submit" value="Tạo QR Code">
                            <a href="javascript:window.history.go(-1);" class="btn btn-default">Hủy</a>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<style>
	.input-inline {display: inline-block;width: 120px;}
</style>