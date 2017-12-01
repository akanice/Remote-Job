<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Xử lý tiếp nhận đơn
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/warehouse')?>">Quản lý kho hàng</a></li>
            <li class="active">Xử lý tiếp nhận đơn</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <?php if ($user_submit) { foreach ($user_submit as $user) {?>
			<div class="col-xs-12">
                <div class="box collapsed-box box-widget">
                    <div class="box-header with-padding">
                        <div class="user-block">
							<img class="img-circle" src="<?=base_url($user->avatar)?>" alt="User Image">
							<span class="username"><a href="#"><?=$user->firstname?></a></span>
							<span class="description">Shared publicly - 7:30 PM Today</span>
						</div>
						<div class="box-tools">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
						</div>
                    </div>
                    <div class="box-body">
					
                    </div><!-- /.box-body -->
                </div>
            </div>
			<?php }} ?>
        </div>

    </section><!-- /.content -->
</aside>

<style>
.box .box-header .order_tabs {padding: 7px;}
.box .box-header .order_tabs a {padding: 3px 15px;color: #517282;display:inline-block}
.box .box-header .order_tabs a:hover,.box .box-header .order_tabs a:focus,.box .box-header .order_tabs a.active {color: #0088cc}
.box .box-header .order_tabs a:last-child {border-right:0;}
.divider {color: #ccc;}
</style>