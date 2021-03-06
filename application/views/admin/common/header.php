<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Deviet CRM<?=@$title?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="Mosaddek" name="author" />
	<link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />
    <link href="<?=base_url('assets/css/jquery-ui.min.css')?>" rel="stylesheet"/>
	<link href="<?=base_url('assets/css/bootstrap-responsive.min.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/style-default.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/ionicons.min.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/AdminLTE.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/chosen.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/toastr.min.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/style-responsive.css')?>" rel="stylesheet" />

	<script src="<?=base_url('assets/js/jquery-1.11.1.min.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.slimscroll.min.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.min-v3.js')?>"></script>
	<script src="<?=base_url('assets/ckeditor/ckeditor.js')?>"></script>
	<script src="<?=base_url('assets/ckeditor/config.js')?>"></script>
	<script src="<?=base_url('assets/js/chosen.jquery.min.js')?>"></script>
	<script src="<?=base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>"></script>
	<script src="<?=base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>"></script>
	<script src="<?=base_url('assets/js/AdminLTE/app.js')?>"></script>
	<script src="<?=base_url('assets/js/angular.min.js')?>"></script>
	<script src="<?=base_url('assets/js/toastr.min.js')?>"></script>
	<script>
		var site_url = '<?=site_url()?>';
		var user_id = '<?=$this->session->userdata('adminid')?>';
		localStorage.setItem("notifications" + user_id, 0);
	</script>
	<script src="<?=base_url('assets/js/ajax_widget.js')?>"></script>
	<script src="<?=base_url('assets/js/notification.js')?>"></script>
	<!-- ie8 fixes -->
    <!--[if lt IE 9]>
       <script src="<?=base_url('assets/js/excanvas.js')?>"></script>
       <script src="<?=base_url('assets/js/respond.js')?>"></script>
    <![endif]-->
    <script type="text/javascript">
        function gotoHref(e){
            window.location.href = e.href;
        }
    </script>
</head>
<body class="hold-transition pace-done skin-black sidebar-mini" ng-app="locnuoc_crm">
    <!-- BEGIN HEADER -->
    <header class="header">
        <a href="<?=site_url('admin')?>" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            Deviet CRM
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
					<li class="dropdown notifications-menu" ng-controller="notificationCtrl">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
							<i class="fa fa-bell-o"></i>
							<span class="label label-warning">{{notifications.length}}</span>
						</a>
						<ul class="dropdown-menu">
							<li class="header" ng-if="notifications.length > 0">Bạn có {{notifications.length}} thông báo mới</li>
							<li class="header" ng-if="notifications.length == 0">Chưa có thông báo mới</li>
							<li>
								<!-- inner menu: contains the actual data -->
								<ul class="menu">
									<li ng-repeat="notification in notifications">
										<a href="javascript:void()" ng-click="readNotification(notification.id, notification.order_id)">
											<i class="fa fa-users text-aqua"></i> {{notification.from_user.lastname + ' ' + notification.from_user.firstname + ' ' + notification.content}}
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>

					<li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/assets/img/demo/user3-128x128.jpg" class="user-image">
                            <span><?=@$email_header?> <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
								<img src="/assets/img/demo/user3-128x128.jpg" class="img-circle" alt="User Image">
								<p>
									Donald Nguyễn - Kỹ thuật viên
									<small>Thành viên từ 11/2016</small>
								</p>
							</li>
							<li class="user-body">
								<div class="row">
									<div class="col-xs-6 text-center">
										<a href="<?=base_url('admin/profile')?>">Hồ sơ cá nhân</a>
									</div>
									<div class="col-xs-6 text-center">
										<a href="#">Báo cáo Doanh số</a>
									</div>
								</div>
								<!-- /.row -->
							</li>
							<li class="user-footer">
                                <div class="pull-right">
                                    <a href="<?=base_url('admin/logout')?>" class="btn btn-default btn-flat">Đăng xuất</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <?php /*if(($this->session->userdata('admingroup') == 1)){*/ $suffix_uri = $this->uri->segment(2); $suffix_uri3 = $this->uri->segment(3)?>
                <ul class="sidebar-menu">
                    <li class="">
                        <a href="<?=site_url()?>" target="_blank" style="color:#ffcb08">
                            <i class="fa fa-home"></i>
                            <span><strong>Visit homepage</strong></span>
                        </a>
                    </li>
					<li class="treeview active <?php if (($suffix_uri == '') or ($suffix_uri == 'users') or ($suffix_uri == 'usergroups') or ($suffix_uri == 'salary')) echo 'active';?>">
                        <a href="#">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span><i class="fa fa-angle-left pull-right"></i>
                        </a>
						<ul class="treeview-menu">
							<li <?php if ($suffix_uri == '') echo 'class="active"'?>><a href="<?=site_url('admin')?>" onclick="gotoHref(this)"><i class="fa fa-caret-right"></i> Thống kê sơ bộ</a></li>
							<li <?php if ($suffix_uri == 'users') echo 'class="active"'?>><a href="<?=site_url('admin/users')?>" onclick="gotoHref(this)"><i class="fa fa-caret-right"></i> Quản lý nhân viên</a></li>
							<li <?php if ($suffix_uri == 'usergroups') echo 'class="active"'?>><a href="<?=site_url('admin/usergroups')?>" onclick="gotoHref(this)"><i class="fa fa-caret-right"></i> Quản lý nhóm nhân viên</a></li>
							<li <?php if ($suffix_uri == 'salary') echo 'class="active"'?>><a href="<?=site_url('admin/salary')?>" onclick="gotoHref(this)"><i class="fa fa-caret-right"></i> Quỹ lương</a></li>
						</ul>
                    </li>
					<li class="treeview active <?php if (($suffix_uri == 'customers') or ($suffix_uri == 'qrcode')) echo 'active';?>">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Quản lý khách hàng</span><i class="fa fa-angle-left pull-right"></i>
                        </a>
						<ul class="treeview-menu">
							<li <?php if ($suffix_uri == '') echo 'class="active"'?>><a href="<?=site_url('admin/customers')?>" onclick="gotoHref(this)"><i class="fa fa-caret-right"></i> Danh sách khách hàng</a></li>
							<li <?php if ($suffix_uri == 'qrcode') echo 'class="active"'?>><a href="<?=site_url('admin/qrcode')?>" onclick="gotoHref(this)"><i class="fa fa-caret-right"></i> Mã QR Code</a></li>
						</ul>
                    </li>
					
					<li class="treeview active <?php if (($suffix_uri == 'orders')) echo 'active';?>">
                        <a href="<?=site_url('admin/orders')?>" onclick="gotoHref(this)">
                            <i class="fa fa-user-secret"></i>
                            <span>Quản lý đơn hàng</span>
                        </a>
                    </li>
					
					<li class="treeview active <?php if (($suffix_uri == 'campaign')) echo 'active';?>">
                        <a href="#">
                            <i class="fa fa-glass"></i>
                            <span>Quản lý sự kiện</span><i class="fa fa-angle-left pull-right"></i>
                        </a>
						<ul class="treeview-menu">
							<li <?php if ($suffix_uri == '') echo 'class="active"'?>><a href="<?=site_url('admin/campaign')?>" onclick="gotoHref(this)"><i class="fa fa-caret-right"></i> Danh sách sự kiện</a></li>
						</ul>
                    </li>
					
					<!--
					<?php if (($this->session->userdata('admingroup') == 1) || ($this->session->userdata('admingroup') == 5)){?>
					<li class=" <?php if (($suffix_uri == 'userscart')) echo 'active';?>">
                        <a href="<?=site_url('admin/userscart/submittowarehouse')?>" onclick="gotoHref(this)" class="btn btn-success">
                            <i class="fa fa-send"></i>
                            <span>Submit đơn hàng</span>
                        </a>
                    </li>
					<?php } ?>
					<?php if (($this->session->userdata('admingroup') == 1) || ($this->session->userdata('admingroup') == 6)){?>
					<li class=" <?php if (($suffix_uri == 'warehouse')) echo 'active';?>">
                        <a href="<?=site_url('admin/warehouse/orderprocessing/')?>" onclick="gotoHref(this)" class="btn btn-danger">
                            <i class="fa fa-amazon"></i>
                            <span>Xử lý tiếp nhận</span>
                        </a>
                    </li>
					<?php } ?>-->
				</ul>
                <?php /*}*/?>
            </section>
            <!-- /.sidebar -->
        </aside>
