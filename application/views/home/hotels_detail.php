	<section class="breadcrumbs">
		<div class="container">
			<div class="">
				<nav class="mc-breadcrumbs">
					<a href="<?=site_url()?>"><i class="fa fa-home"></i> Home</a>
					<span><i class="fa fa-angle-right"></i></span>
					<a href="<?=base_url('place')?>">Khách sạn - Nhà nghỉ - Bungalow</a>
					<span><i class="fa fa-angle-right"></i></span>
					<a href="<?=base_url('place/'.$category->alias)?>"><?=@$category->name?></a>
					<span><i class="fa fa-angle-right"></i></span>
					<?=@$hotels->name?>
				</nav>
			</div>
		</div>
	</section>
	
	<link href="<?=base_url('assets/css/lightslider.min.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/plugins/lightgallery/css/lightgallery.min.css')?>" rel="stylesheet">
	<section id="hotels-detail" class="hotels-listing hotels-detail">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12">
					<h1 class="hotels-heading"><?=$hotels->name?></h1>
					<div class="hotels-location">
						<i class="fa fa-map-marker"></i> <?=$hotels->location?>
						<span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
					</div>
				</div>
				<div class="col-md-9">
					<div clas="hotels-body">
						<!-- jssor slider -->
						<div class="slider-gallery" id="gallery">
							<ul id="imageGallery" class="gallery list-unstyled lightSlider lSSlide">
								<?php $gallery = json_decode($hotels->gallery); foreach ($gallery as $img_item) { ?>
								<li data-thumb="<?=base_url($img_item)?>" data-src="<?=base_url($img_item)?>">
									<img src="<?=base_url($img_item)?>" class="img-holder"/>
								</li>
								<?php }?>
							</ul>
						</div>
						<div class="hotels-content">
							<div class="inner" id="description">
								<h4 class="heading">Mô tả khách sạn</h4>
								<?=$hotels->description?>
							</div>
							<hr>
							<h4 class="heading">Tiện ích</h4>
							<div class="inner" id="services">
								<?=$hotels->services?>
							</div><hr>
							<div><a href="#" class="btn btn-readmore" style="width: 100%;"><i class="fa fa-calendar"></i> Đặt phòng</a></div>
						</div>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="hotels-shortinfo rightcol">
						<h2 class="center">Giá 1 đêm từ</h2>
						<?php if (isset($hotels->promo_price) && ($hotels->promo_price == 0)) {?>
							<div class="price center"><?=number_format($hotels->regular_price,0,',','.')?> vnđ</div>
						<?php } else {?>
							<div class="price center line-through"><?=number_format($hotels->regular_price,0,',','.')?> vnđ</div>
							<div class="promo_price"><?=number_format($hotels->promo_price,0,',','.')?> vnđ</div>
						<?php } ?>
						<br>
						<div class="center">
							<a href="#" class="btn btn-readmore"><i class="fa fa-calendar"></i> Đặt phòng</a>
						</div>
						<br>
					</div>
					<div class="tour-callus rightcol"><!-- Call us-->
						<h2 class="center">Gọi để được tư vấn</h2>
						<div class="inner">
							<div class="number-box">
								<span><?=$home_hotline?></span>
								<div class="icon-phone"><i class="fa fa-phone"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<script src="<?=base_url('assets/js/jquery-1.11.1.min.js')?>"></script>
	<script src="<?=base_url('assets/js/owl.carousel.min.js')?>"></script>
	<section id="related-hotels" class="booking-room related-hotels blocksection">
		<div class="container">
			<div class="row clearfix">
				<div class="col-sm-12 center">
					<h3 class="section-heading">Có thể bạn muốn xem</h3>
					<div class="section-description">&nbsp;</div>
				</div>
				<?php if ($related_hotels == '' or $related_hotels == null) { ?>
				<h5>Không có bài viết liên quan</h5>
				<?php } else { ?>
				<div id="owl-hotels" class="owl-carousel">
					<?php foreach ($related_hotels as $item) {?>
						<div class="item">
							<div class="">
								<div class="thumb">
									<a href="<?=base_url('place/'.$item->alias)?>"><img src="<?=base_url($item->thumb)?>" class="img-holder" alt=""/></a>
								</div>
								<div class="info"><a href="<?=base_url('place/'.$item->alias)?>">
									<h4><?=$item->name?></h4>
									<div class="detail"><?=$item->short_des?></div>
								</div></a>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="boxnp" id="block_direction_hotels">
					<a class="prev prevblog"><i class="fa fa-chevron-left"></i></a>
					<a class="next nextblog"><i class="fa fa-chevron-right"></i></a>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<script>
		var owl_hotel = $("#owl-hotels");
		owl_hotel.owlCarousel({
			items : 4,
			itemsDesktop : [1199,4],
			itemsDesktopSmall : [980,3],
			itemsTablet: [768,2],
			itemsTabletSmall: false,
			itemsMobile : [479,1],
		});
		$("#block_direction_hotels").find('.nextblog').click(function(){
			owl_hotel.trigger('owl.next');
		})
		$("#block_direction_hotels").find('.prevblog').click(function(){
			owl_hotel.trigger('owl.prev');
		}) 
	</script>