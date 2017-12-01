<link href="<?=base_url('assets/css/datepicker/datepicker3.css')?>" rel="stylesheet" />
<script src="<?=base_url('assets/js/plugins/datepicker/bootstrap-datepicker.js')?>"></script>
<script>
$(function() {
	$("#calendar").datepicker();
});
</script>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->  
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row-fluid">
			<div class="col-lg-12">
				<h2 class="page-header">Thống kê trong ngày</h2>
			</div>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3><?php if($count_ordersnew) {echo $count_ordersnew;} else {echo '0';}?></h3>
						<p>Đơn hàng mới</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">
						More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner">
						<h3><?php if ($total_ordersnew) {echo $total_ordersnew;} else {echo '0';}?><sup style="font-size: 20px"> đ</sup></h3>
						<p>Tổng giá trị</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="#" class="small-box-footer">
						More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3>44</h3>
						<p>Khách hàng mới</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="#" class="small-box-footer">
						More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3>65</h3>
						<p>Khách hàng cũ</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="#" class="small-box-footer">
						More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><!-- ./col -->
		</div><!-- /.row -->

		<!-- Main row -->
		<div class="row-fluid">
			<div class="col-lg-12"><h2 class="page-header">Biểu đồ</h2></div>
		</div><!-- /.row (main row) -->

	</section>
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->