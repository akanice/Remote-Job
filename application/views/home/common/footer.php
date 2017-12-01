<footer>
		<div class="top-footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<h4 class="heading center">Đăng ký nhận tin</h4>
						<form id="sub_form" method="POST">
							<div class="relative">
								<input type="email" class="mc-input" placeholder="email của bạn" id="sub_email">
								<button type="submit" class="btn btn-confirm" id="sub_submit">Subscribe <i class="fa fa-send"></i></button>
							</div>
						</form>
					</div>
					<div class="col-sm-6">
						<h4 class="heading center">Theo dõi chúng tôi trên</h4>
						<div class="social-icon center">
							<div class="thumb"><a href="<?=$link_facebook?>"><img src="<?=base_url('assets/img/icon/icon_facebook.png')?>" class="img-holder" alt="Facebook page"></a></div>
							<div class="thumb"><a href="<?=$link_twitter?>"><img src="<?=base_url('assets/img/icon/icon_twitter.png')?>" class="img-holder" alt="Follow us on twitter"></a></div>
							<div class="thumb"><a href="<?=$link_gplus?>"><img src="<?=base_url('assets/img/icon/icon_gplus_red.png')?>" class="img-holder" alt="Follow us on Google Plus"></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-footer">
			<div class="container">
				<div class="row clearfix">
					<div class="col-sm-4">
						<div class="col">
							<h3 class="title"><?=$w_footeruser1['heading']->value?></h3>
							<?=$w_footeruser1['content']->value?>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="col">
							<h3 class="title"><?=$w_footeruser2['heading']->value?></h3>
							<?=$w_footeruser2['content']->value?>
						</div>
					</div>
					<!--<div class="col-sm-4">
						<div class="col">
							<h3 class="title">Đăng ký nhận bản tin</h3>
							<p>Subscribe to our newsletters. Be in touch with latest news, special offers, etc.</p>
							<form>
								<input type="text" class="form-control" placeholder="your email"><br>
								<button type="submit" class="btn btn-success">Đăng ký</button>
							</form>
						</div>
					</div>-->
					<div class="col-sm-4">
						<div class="col">
							<h3 class="title">Thông tin thêm</h3>
							<ul class="address-info menu-list">
							<?php if($footer) foreach ($footer as $f) { 
								foreach ($f->list_content as $l) {?>
									<li><a href="<?=@site_url($l->link)?>"><i class="fa fa-angle-right"></i> <?=@$l->title?></a></li>
							<?php } }?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-footer">
			<div class="container">
				<h4 class="title">2016 © maichautourist.com</h4>
			</div>
		</div>
	</footer>

	<div class="telus hidden-lg hidden-md">
		<div class="block">
			<a href="tel:0941796556"><i class="fa fa-phone"></i></a>
		</div>
	</div>
	
	<div class="modal fade" id="sub_modal" tabindex="-1" role="dialog" aria-labelledby="sub_modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Đăng ký theo dõi thành công</h4>
				</div>
				<div class="modal-body">
					<p>Cám ơn bạn đã đăng ký theo dõi trên MaiChau Tourist</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal"><?=@$this->lang->line('close')?></button>
				</div>
			</div>
		</div>
	</div>
<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",50988]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>	
<script src="<?=base_url('assets/js/jquery-1.11.1.min.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/js/owl.carousel.min.js')?>"></script>
<script src="<?=base_url('assets/js/lightslider.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/lightgallery/js/lightgallery.min.js')?>"></script>
<script>
site_url = '<?php echo site_url();?>';
</script>
<script src="<?=base_url('assets/js/script.js')?>"></script>
<script type="text/javascript">
$(document).ready(function() {
	
});
</script>
</body>

</html>