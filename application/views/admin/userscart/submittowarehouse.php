<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chuyển giao đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Chuyển giao đơn hàng</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chọn kho để chuyển giao đơn hàng</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
					<?php if (isset($warehouse)) foreach ($warehouse as $item) {?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
							<div class="box box-widget widget-user">
							<!-- Add the bg color to the header using any of the bg-* classes -->
								<div class="widget-user-header bg-yellow">
									<h3 class="widget-user-username"><?=$item->name?></h3>
									<h5 class="widget-user-desc"><i class="fa fa-home"></i> <?=$item->address?></h5>
									<h5 class="widget-user-desc"><i class="fa fa-phone"></i> <?=$item->phone?></h5>
								</div>
								<div class="box-footer">
									<div class="description-block">
										<a href="<?=base_url('admin/warehouse/getorder/'.$item->alias)?>" class="btn btn-default"  onclick="return confirm('Chọn kho hàng này để chuyển giao đơn?')">CHỌN <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					<?php }?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<style>
.widget-user .box-footer {padding:5px;background:#c57f10}
.widget-user .box-footer .description-block{margin:0}
.widget-user .box-footer .btn.btn-default {width:100%}
</style>