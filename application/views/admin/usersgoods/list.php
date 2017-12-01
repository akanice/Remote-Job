<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý nhân sự
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/users')?>">Quản lý nhân sự</a></li>
            <li class="active">Danh sách nhân viên</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row-fluid">
			<div class="col-lg-12">
				<div class="page-header">
					<a href="<?=site_url('admin/users/listall')?>"><button class="btn btn-warning">Xem dạng bảng</button></a>
				</div>
			</div>
			
			<div class="col-lg-12">
				<h4>Nhân viên kỹ thuật</h4>
			</div>
			<?php foreach($group_tech as $item) {?>
			<div class="col-md-4">
				<div class="box box-widget widget-user">
				<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-aqua">
						<h3 class="widget-user-username"><?=$item->lastname?> <?=$item->firstname?></h3>
						<h5 class="widget-user-desc">Technique</h5>
						<a href="<?=base_url('admin/users/viewlog/'.$item->id)?>" class="widget-btn-extra">Xem log</a> | <a href="<?=base_url('admin/users/timeline/'.$item->id)?>" class="widget-btn-extra">Chi tiết</a>
					</div>
					<div class="widget-user-image">
						<img class="img-circle" src="<?=base_url($item->avatar)?>" alt="User Avatar">
					</div>
					<div class="box-footer" style="padding-top:10px">
						<div class="row">
							<div class="col-sm-6">
								<div class="description-block">
									<a href="<?=base_url('admin/usersgoods/transfer/'.$item->id)?>" class="btn btn-warning">Chuyển linh kiện</a>
								</div>
							</div>
							<!-- /.col -->
						</div>
					</div>
				</div>
			</div>
			<?php }?>
			
		</div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
