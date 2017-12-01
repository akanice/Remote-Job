<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách nhân sự
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/users')?>">Quản lý nhân sự</a></li>
            <li class="active">Danh sách nhân sự</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row-fluid">
            <div class="col-xs-12">
				<div class="page-header">
					<a href="<?=site_url('admin/users/add')?>"><button class="btn btn-primary add-new">Thêm mới</button></a>
					<a href="<?=site_url('admin/users')?>"><button class="btn btn-warning">Xem dạng lưới</button></a>
				</div>
				<div class="box-body table-responsive">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
						<tr>
							<th>ID</th>
							<th style="text-align:center">Họ</th>
							<th style="text-align:center">Tên</th>
							<th style="text-align:center">Điện thoại</th>
							<th style="text-align:center">Chức vụ</th>
							<th style="text-align:center">Ảnh đại diện</th>
							<th style="text-align:center">Hành động</th>
						</tr>
						</thead>
						<form method="GET" action="<?=@$base?>">
							<tr>
								<td></td>
								<td><input type="text" class="form-control" placeholder="Họ" name="lastname" value="<?=@$lastname?>"></td>
								<td><input type="text" class="form-control" placeholder="Tên" name="firstname" value="<?=@$firstname?>"></td>
								<td></td>
								<td><input type="text" class="form-control" placeholder="Chức vụ" name="group_id" value="<?=@$group_id?>"></td>
								<td></td>
								<td style="text-align: center"><button type="submit" class="btn btn-default">Tìm kiếm</button></td>
							</tr>
						</form>
						<tbody>
						<?php if($list) foreach ($list as $item){ ?>
							<tr class="odd gradeX">
								<td><?=@$item->id?></td>
								<td><?=@$item->lastname?></td>
								<td><?=@$item->firstname?></td>
								<td><?=@$item->phone?></td>
								<td><img src="<?=base_url(@$item->avatar)?>" class="img-circle" width="36px" alt="ảnh đại diện - <?=@$item->firstname?>"></td>
								<td>
									<?php if (($item->group_id == 2) or ($item->group_id == 3) or ($item->group_id == 4)) {echo 'Sales';} else {echo 'Kỹ thuật';} ?>
								</td>
								<td style="text-align: center">
									<a href="<?=@base_url('admin/users/viewlog/'.$item->id)?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Xem log</a>
									<a href="<?=@base_url('admin/users/edit/'.$item->id)?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Sửa</a>
									<a href="<?=@base_url('admin/users/delete/'.$item->id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" ><i class="fa fa-trash"></i> Xóa</a>
								</td>
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

    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
