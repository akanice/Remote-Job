<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Lọc nước CRM <?=@$title?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="Mosaddek" name="author" />
	<link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />
    <link href="<?=base_url('assets/css/jquery-ui.min.css')?>" rel="stylesheet"/>
	<link href="<?=base_url('assets/css/bootstrap-responsive.min.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/style-responsive.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/style-default.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/ionicons.min.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/AdminLTE.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/chosen.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/admin-custom.css')?>" rel="stylesheet" />

	<script src="<?=base_url('assets/js/jquery-1.8.3.min.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.slimscroll.min.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.min-v2.js')?>"></script>
	<script src="<?=base_url('assets/ckeditor/ckeditor.js')?>"></script>
	<script src="<?=base_url('assets/ckeditor/config.js')?>"></script>
	<script src="<?=base_url('assets/js/chosen.jquery.min.js')?>"></script>
	<script src="<?=base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>"></script>
	<script src="<?=base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>"></script>
	<script src="<?=base_url('assets/js/AdminLTE/app.js')?>"></script>
	<script>
		var site_url = '<?=site_url()?>';
	</script>
	<script src="<?=base_url('assets/js/ajax_widget.js')?>"></script>
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
<body class="hold-transition pace-done skin-black sidebar-mini">
    <!-- BEGIN HEADER -->
    <header class="header">
        <a href="<?=site_url('admin')?>" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            LOCNUOC365
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
					<li>
						<span style="margin-top:8px;display:block"><a href="#" class="btn btn-default" data-toggle="modal" data-target="#register_now"><i class="fa fa-arrow-circle-o-right"></i> Dùng dịch vụ 24/7</a></span>
					</li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span><?=@$email_header?> <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
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
                <?php $suffix_uri = $this->uri->segment(2); $sufix_uri3 = $this->uri->segment(3)?>
                <ul class="sidebar-menu">
                    <li class="">
                        <a href="<?=site_url()?>" target="_blank" style="color:#ccc;text-shadow: none;font-weight: 100">
                            <i class="fa fa-home"></i>
                            <span><strong>Visit website</strong></span>
                        </a>
                    </li>
					<li class="treeview">
                        <a href="<?=site_url('admin')?>" onclick="gotoHref(this)">
                            <i class="fa fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
					<li class="treeview <?php if (($suffix_uri == 'ho-so')) echo 'active';?>">
                        <a href="<?=site_url('admin/customers')?>" onclick="gotoHref(this)">
                            <i class="fa fa-user-secret"></i>
                            <span>Hồ sơ cá nhân</span>
                        </a>
                    </li>
					<li class="treeview <?php if (($suffix_uri == 'products')) echo 'active';?>">
                        <a href="<?=site_url('admin/products')?>" onclick="gotoHref(this)">
                            <i class="fa fa-cubes"></i>
                            <span>Hóa đơn</span>
                        </a>
                    </li>
					<li class="treeview <?php if (($suffix_uri == 'warehouse')) echo 'active';?>">
                        <a href="<?=site_url('admin/warehouse')?>" onclick="gotoHref(this)">
                            <i class="fa fa-building"></i>
                            <span>Liên hệ</span>
                        </a>
                    </li>
				</ul>
            </section>
            <!-- /.sidebar -->
        </aside>

		
<div class="modal fade" id="register_now" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Gửi yêu cầu</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" onsubmit="assignOrder(event)">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="staff_technique">Họ tên</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?=$customer->lastname?> <?=$customer->firstname?>" placeholder="Tên của bạn">
                            <input type="hidden" name="f_name" id="f_name" value="<?=$customer->id?>"/>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label" for="staff_technique">Số điện thoại</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?=$customer->phone?>" placeholder="0904666888">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label" for="staff_technique">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?=$customer->email?>" placeholder="mailcuaban@email.com">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label" for="staff_technique">Yêu cầu</label>
                        <div class="col-sm-9">
							<select name="f_request" class="form-control">
								<option value="1" selected>Thay lõi và bảo dưỡng máy miễn phí</option>
								<option value="2" >Kiểm tra máy bị trục trặc</option>
								<option value="3" >Thay thế thiết bị khác</option>
							</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reason" class="col-sm-3 control-label">Ghi chú</label>
                        <div class="col-sm-9">
                            <textarea name="note" class="form-control" rows="5" id="order-note"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Lưu lại</button>
            </div>
            </form>
        </div>
    </div>
</div>