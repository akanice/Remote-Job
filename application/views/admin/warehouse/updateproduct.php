<aside class="right-side">
    <section class="content-header">
        <h1>
            Cập nhật sản phẩm trong kho
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
			<?php if(($this->session->userdata('admingroup') == 1) || ($warehouse->access == 0)) {?>
            <form role="form" method="POST" enctype="multipart/form-data" action="">
				<div class="col-md-9 col-sm-9">
					<!-- general form elements -->
					<div class="box box-success box-solid">
						<div class="box-header with-border">
							<h3 class="box-title">Cập nhật sản phẩm trong kho - chi nhánh</h3>
						</div>
						<div class="box-body wh-page">
							<div class="row-fluid">
                            <?php foreach ($products as $item) {?>
							<div class="col-md-4">
								<div class="form-group row-fluid wh-form">
									<label><?=$item->name?></label>&nbsp;
									<input type="number" name="<?=$item->id?>" class="form-control" value="0" placeholder="số sản phẩm"/>
								</div>
							</div>
							<?php } ?>
							</div>
                            <!-- /.box-body -->
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" name="submit" value="Lưu lại">
                            <a href="javascript:window.history.go(-1);" class="btn btn-default">Hủy</a>
                        </div>
                    </div>
				</div>
				<div class="col-md-3 col-sm-3">
					<div class="box box-success box-solid">
						<div class="box-header with-border">
							<h3 class="box-title">Kho <?=$warehouse->name?></h3>
						</div>
						<div class="box-body">
							<div class="form-group row-fluid">
								<p><strong><i class="fa fa-map-marker"></i></strong> - <?=$warehouse->address?></p>
								<p><strong><i class="fa fa-phone"></i></strong> - <?=$warehouse->phone?></p>
							</div>
						</div>
					</div>
				</div>
			</form>
			<?php } ?>
        </div>
    </section>
</aside>
</div><!-- ./wrapper -->
<style>
.wh-page .col-md-4 {align-items: stretch;display:flex;}
.wh-form {display: flex;}
.wh-form label {line-height: 33px; margin-right:10px;}
.wh-form input.form-control {display:inline-block;max-width: 100px}
</style>
<script src="<?=  base_url('assets/js/jquery-ui.min.js')?>"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".chosen-select").chosen();
    });
</script>
