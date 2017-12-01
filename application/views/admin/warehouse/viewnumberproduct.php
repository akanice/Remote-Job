<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý kho - chi nhánh
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/warehouse')?>">Quản lý kho - chi nhánh</a></li>
            <li class="active">Sản phẩm trong kho</li>
        </ol>
    </section>

    <div class="content">

		<!-- Main content -->
		<section class="content">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<?php if($list) {?><a href="<?=site_url('admin/warehouse/edit/'.$list[0]->warehouse_id)?>" class="btn btn-primary add-new"><i class="fa fa-pencil"></i> Sửa thông tin quản lý kho</a><br><br><?php } ?>
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Danh sách linh kiện trong kho <?=@$list[0]->warehouse_name?></h3>
						</div><!-- /.box-header -->
						<div class="box-header">
							
						</div>
						<div class="box-body table-responsive">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>STT</th>
									<th>Tên</th>
									<th>Hình ảnh</th>
									<th>Số lượng</th>
								</tr>
								</thead>
								<form method="GET" action="<?=@$base?>">
									<tr>
										<td></td>
										<td><input type="text" class="form-control" placeholder="Tên" name="name" value="<?=@$name?>"></td>
										<td></td>
										<td style="text-align: center"><button type="submit" class="btn btn-default">Tìm kiếm</button></td>
									</tr>
								</form>
								<tbody>
								<?php if($list) foreach ($list as $item){ ?>
									<tr class="odd gradeX">
										<td><?=@$item->id?></td>
										<td><?=@$item->name?></td>
										<td><img src="<?=base_url(@$item->thumb)?>" height="32px" alt="hình ảnh - <?=@$item->name?>"></td>
										<td><?=@$item->number_product?></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
							<div class="dataTables_paginate paging_bootstrap">
								<ul class="pagination"><?php echo $page_links?></ul>
							</div>
						</div><!-- /.box-body -->
					</div>
				</div>
			</div>
		</section>
	</div>
	
</aside>
</div>
