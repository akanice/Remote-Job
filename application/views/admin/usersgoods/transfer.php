<aside class="right-side">
    <section class="content-header">
        <h1>
            Quản lý đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/orders')?>">Quản lý đơn hàng</a></li>
            <li class="active">Cập nhật đơn hàng</li>
        </ol>
    </section>
    <!-- Main content -->
	<link href="<?=base_url('assets/css/select.min.css')?>" rel="stylesheet" />
	<script src="<?=base_url('assets/js/plugins/select2/select2.full.min.js')?>"></script>
	<script>
		$(document).ready(function() {
			$(".select2").select2();
			$("#addmore_row").click(function() {
				// setTimeout(function(){ $(".select2").select2(); }, 100);
				$(".select2").select2();
			});
		}).change(function() {
			$(".select2").select2();
		})
	</script>
    <section class="content">
        <div class="row" style="margin-left: -15px" ng-controller="OrderEditCtrl">
            <!-- left column -->
			<form role="form" method="POST" enctype="multipart/form-data" action="">
				<div class="col-md-8 col-sm-6">
					<!-- general form elements -->
					<div class="box box-success box-solid">
						<div class="box-header with-border">
							<h3 class="box-title">Cập nhật đơn hàng</h3>
						</div>
						<div class="box-body">
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Sản phẩm</label>
                                <div class="col-md-12" ng-repeat="product in products track by $index" ng-init="product.id = $index">
                                    <div class="form-group">
                                        <div class="col-md-5">
                                            <label class="control-label" style="margin-left:20px">Tên sản phẩm</label>
                                            <select class="form-control select2 select2-hidden-accessible" ng-model="product.pro_id" required="" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <?php foreach ($products as $key => $value) {?>
                                                    <option value="<?=$value->id?>"><?=$value->name?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="control-label" style="margin-left:20px">Số lượng</label>
                                            <input type="number" min="1" class="form-control" ng-model="product.quantity" required="">
                                        </div>
                                        <div class="col-md-2">
                                            <div class="button-audio" style="margin: 25px 0 0 50px">
                                                [<a href="javascript:void(0)" ng-click="deleteProduct(product)">Xóa</a>]
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin: 10px 0 0 15px">
                                    [<a href="javascript:void(0)" ng-click="addProduct()" id="addmore_row">Thêm</a>]
                                </div>
							</div>
                            <input type="hidden" name="products" value="{{textProduct()}}">
                            <!-- /.box-body -->
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary" name="submit">Lưu lại</button>
							<a href="javascript:window.history.go(-1);" class="btn btn-default">Hủy</a>
						</div>
					</div>
				</div>
			</form>
        </div>
    </section>
</aside>
</div>
<script type="text/javascript">
    var products = <?php if($product_array){ echo ($product_array); } else { echo 'undefined';}?>;
</script>
