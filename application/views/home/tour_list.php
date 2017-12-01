	<section class="breadcrumbs">
		<div class="container">
			<div class="">
				<nav class="mc-breadcrumbs">
					<a href="<?=site_url()?>"><i class="fa fa-home"></i> Home</a>
					<span><i class="fa fa-angle-right"></i></span>
					<a href="<?=base_url('tour-du-lich')?>">Tour</a>
					<span><i class="fa fa-angle-right"></i></span>
					<?=@$tourcategory->name?>
				</nav>
			</div>
		</div>
	</section>
	
	<script src="<?=base_url('assets/js/jquery-1.11.1.min.js')?>"></script>
	<script src="<?=base_url('assets/js/owl.carousel.min.js')?>"></script>
	<section id="tour-listing" class="tour-listing tour-detail blocksection">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12">
					<h1 class="tour-heading">
						<?php if (!isset($tourcategory->name) || ($tourcategory->name=='')) {?>
						Các Tour du lịch của chúng tôi
						<?php } else { echo 'Tour du lịch '.$tourcategory->name;}?>
					</h1>
				</div>
				<div class="col-md-9">
					<?php if ($tours == '' or $tours == null) { ?>
					<h5>Chưa có nội dung trong mục này</h5>
					<?php } else { foreach ($tours as $item) {?>
					<div class="item">
						<div class="flexible">
							<div class="thumb">
								<a href="<?=base_url('tour/'.$item->alias)?>"><img src="<?=base_url($item->cover_image)?>" class="" style="height:100%" alt=""></a>
							</div>
							<div class="main">
								<a href="<?=base_url('tour/'.$item->alias)?>"><h4 class="heading"><?=@$item->name?></h4></a>
								<div class="first-line">
									<span class="destination"><i class="fa fa-map-marker"></i> <?=@$item->destination?></span> - 
									<span class="time"><i class="fa fa-calendar"></i> <?=@$item->duration?></span> - 
									<span class="rating">
										<?php $n = $item->rating; for ($i = 1; $i <= $n; $i++) {?>
											<i class="fa fa-star" id="<?php echo 'star-'.$i;?>"></i>
										<?php }?>
									</span>
								</div>
								<div class="second-line row clearfix">
									<div class="col-sm-9" style="padding-right:0">
										<div class="short_info"><?=@$item->short_des?></div>
										<div class="tags">
											<?php if (!isset($item->tag) || $item->tag == '') { ?>
											<?php } else { $tags = explode(',',$item->tag); foreach ($tags as $tag) {?>
											<a href="<?=base_url('tags/'.make_alias($tag))?>"><i class="fa fa-tags"></i> <?=$tag?></a>
											<?php } }?>
										</div>
									</div>
									<div class="col-sm-3 center">
										<?php if (isset($item->promo_price) && ($item->promo_price == 0)) {?>
											<div class="price"><?=number_format($item->regular_price,0,',','.')?> đ</div>
										<?php } else {?>
											<div class="price line-through"><?=number_format($item->regular_price,0,',','.')?></div>
											<div class="promo_price"><?=number_format($item->promo_price,0,',','.')?> đ</div>
										<?php } ?>
										<!--<div class="currency">(VNĐ)</div>-->
										<div class="btn-ordering"><a href="<?=base_url('tour/'.$item->alias)?>" class="btn btn-readmore">Đặt tour</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } } ?>
					<div class="tour-pagination">
						<?=$page_links?>
					</div>
				</div>
				<aside class="col-md-3">
					<div class="related-tour newest-article rightcol">
						<h2 class="center" style="background: #f1c40f">Tour nổi bật nhất</h2>
						<div class="item">
							<div class="thumb">
								<a rel="nofollow" href="<?=@base_url('tour/'.$biggest_tour->alias)?>"><img src="<?=@base_url($biggest_tour->thumb)?>" class="img-holder" alt="<?=@$biggest_tour->name?>"/></a>
							</div>
							<div class="info">
								<h4><?=@$biggest_tour->name?></h4>
								<div class="time"><?=@$biggest_tour->duration?></div>
								<div class="price"><?=number_format($biggest_tour->regular_price,0,',','.')?> vnđ</div>
								<a rel="nofollow" href="<?=@base_url('tour/'.$biggest_tour->alias)?>" class="btn btn-viewmore">Xem thêm <i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
					</div>
					<?php if ($testimonials != '' or $testimonials != null) { ?>
					<div class="tour-shortinfo rightcol">
						<h2 class="center">Cảm nhận khách hàng</h2>
						<div class="slick_control">
							<div class="prev slick-arrow" style="display: block;">
								<i class="fa fa-chevron-left"></i>
							</div>
							<div class="next slick-arrow" style="display: block;">
								<i class="fa fa-chevron-right"></i>
							</div>
						</div>
						<div class="right-col-feedback owl-carousel" id="owl_customer_2">
							<?php foreach ($testimonials as $item) {?>
							<div class="item">
								<div class="testi-avatar center">
									<img src="<?=base_url($item['thumb'])?>" class="img-circle img-holder" alt="customer 1">
								</div>
								<div class="testi-quote">
									<div class="text"><?=$item['quote']?></div>
									<a href="<?=base_url('tour/'.$item['alias'])?>">
										<div class="name"><?=$item['name']?> - <span><?=$item['address']?></span><a href="<?=base_url('tour/'.$item['alias'])?>"><img src="<?=base_url('assets/img/icon-facebook.png')?>" width="20px" class="img-circle"></a></div>
									</a>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<?php } ?>
					<div class="tour-callus rightcol"><!-- Call us-->
							<h2 class="center">Gọi để được tư vấn</h2>
							<div class="inner">
								<div class="number-box">
									<span><?=$home_hotline?></span>
									<div class="icon-phone"><i class="fa fa-phone"></i></div>
								</div>
							</div>
						</div>
				</aside>
			</div>
		</div>
	</section>
	<script>
	var owl_customer_2 = $("#owl_customer_2");
	owl_customer_2.owlCarousel({
		items: 1,
		navigation : false, // Show next and prev buttons
		slideSpeed : 300,
		pagination: false,
		//singleItem:true,
	});
	$(".slick_control").find('.next').click(function(){
		owl_customer_2.trigger('owl.next');
	})
	$(".slick_control").find('.prev').click(function(){
		owl_customer_2.trigger('owl.prev');
	}) 
	</script>