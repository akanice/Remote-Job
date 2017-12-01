<!DOCTYPE html>
<html lang="en"><script id="tinyhippos-injected">if (window.top.ripple) { window.top.ripple("bootstrap").inject(window, document); }</script>
<head>
    <meta charset="UTF-8">
    <title>AdminCP Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-theme.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style-admin.css')?>"/>
    <style type="text/css">
    </style>
</head>
<body class="login-page">
	<div class="container">
		<div class="row clearfix">
			<div class="login-box">
				<div class="login-logo">
					<a href="../../index2.html"><b>Admin</b>LTE</a>
				</div>
				<div class="loginform">
					<form action="" method="POST" class="form-horizontal">
						<p class="login-box-msg center">Sign in to start your session</p>
						<div class="form-group">
							<div class="col-sm-12">
								<input name="email" type="email" required="" placeholder="Email" class="form-control" style="border-radius: 0">
								<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input name="pass" type="password" required="" placeholder="Password" class="form-control" style="border-radius: 0">
								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							</div>
						</div>
						<div class="col-md-8 col-md-offset-4"><p class="notif"><?php if(isset($error) && $error) echo $error; else echo "" ?></p></div>
						<input type="hidden" name="type" value="login">
						<div class="form-group">
							<div class="col-sm-12">
								<button class="btn btn-info btn-lg" style="display: block;width: 100%" type="submit">Sign in</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="center">
                    <h5>© Copyright by CRTEAM 2016</h5>
                    <h5>Công ty TNHH DND</h5>
                </div>
			</div>
		</div>
	</div>
</body>
</html>
