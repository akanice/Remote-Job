	<section id="slider" class="slideshow hidden-xs hidden-sm">
		<div id="slideshow" class="carousel slide carousel-fade" data-ride="carousel">
			<!-- Indicators -->
			<div class="act-indicators">
				<ol class="carousel-indicators">
					<?php $n = $number_slider; for ($i = 0; $i < $n; $i++) { ?>
						<li data-target="#slideshow" data-slide-to="<?php echo $i;?>" class="<?php if ($i == '0') {echo 'active';}?>"></li>
					<?php } ?>
				</ol>
			</div>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<?php 
					if (!empty($slider)) {
					foreach ($slider as $item) { 
						$item_id[] = $item->id;
					}
					$min_value = min($item_id);
				?>
				<?php foreach ($slider as $item) { ?>
				<div class="item <?php if ($item->id == $min_value) {echo 'active';}?>">
					<a href="<?=$item->link?>"><img src="<?=base_url($item->image)?>" alt="<?=$item->name?>" class="img-holder"></a>
				</div>
				<?php } } ?>
			</div>
			
			<a class="left carousel-control" href="#slideshow" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#slideshow" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</section>
	
	<?php if (isset($home_short_introduction) && ($home_short_introduction != '')) {?>
	<section class="blocksection home_short_introduction">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?=@$home_short_introduction ?>
				</div>
			</div>
		</div>
	</section>	
	<?php } ?>
	
	<section id="featured-tour" class="featured-tour blocksection">
		<div class="container">
			<div class="row clearfix">
				<div class="col-sm-12 center">
					<h3 class="section-heading">Các tour nổi bật</h3>
					<div class="section-description">Gợi ý các tour hấp dẫn của MaiChauTourist</div>
				</div>
				
				<div class="col-md-8">
					<div class="wrap first-tour">
						<a href="<?=base_url('tour/'.$biggest_tour->alias)?>"><img src="<?=base_url($biggest_tour->cover_image)?>" class="attachment-tour_big_index wp-post-image img-holder" alt="<?=$biggest_tour->name?>"></a>
						<div class="tbToursInfo">
							<div class="left">
								<h3><a href="<?=base_url('tour/'.$biggest_tour->alias)?>" title="<?=$biggest_tour->name?>"><?=$biggest_tour->name?>
								<div class="star">
									<?php $n = $biggest_tour->rating; for ($i = 1; $i <= $n; $i++) {?>
										<i class="fa fa-star" id="<?php echo 'star-'.$i;?>"></i>
									<?php }?>
								</div>
								</a></h3>
								<span class="time"><?=$biggest_tour->duration?></span>
								<?php if (isset($biggest_tour->promo_price) && ($biggest_tour->promo_price == 0)) {?>
									<span class="price">2.780.000đ</span>
								<?php } else {?>
									<span class="price line-through"><?=number_format($biggest_tour->regular_price,0,',','.')?> vnđ</span>
									<span class="promo_price"><?=number_format($biggest_tour->promo_price,0,',','.')?> vnđ</span>
								<?php } ?>									
								<div class="excerpt">
									<a href="<?=base_url('tour/'.$biggest_tour->alias)?>">
										<p><?=$biggest_tour->short_des?></p>
									</a>
								</div>
							</div>
							<div class="right">
								<a rel="nofollow" href="<?=base_url('tour/'.$biggest_tour->alias)?>" class="btn btn-viewmore">Xem thêm <i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				
				<?php foreach ($featured_tours as $item) {?>
				<div class="col-md-4">
					<div class="wrap">
						<a href="<?=base_url('tour/'.$item->alias)?>"><img src="<?=base_url($item->cover_image)?>" class="attachment-tour_big_index wp-post-image" style="width:auto;height:100%" alt="<?=$item->name?>"></a>
						<div class="tbToursInfo">
							<div class="left">
								<h3><a href="<?=base_url('tour/'.$item->alias)?>" title="<?=$item->name?>"><?=$item->name?>
								<div class="star">
									<?php $n = $item->rating; for ($i = 1; $i <= $n; $i++) {?>
										<i class="fa fa-star" id="<?php echo 'star-'.$i;?>"></i>
									<?php }?>
								</div>
								</a></h3>
								<span class="time"><?=$item->duration?></span>
								<?php if (isset($item->promo_price) && ($item->promo_price == 0)) {?>
									<span class="price">Liên hệ</span>
								<?php } else {?>
									<span class="price line-through"><?=number_format($item->regular_price,0,',','.')?> vnđ</span>
									<span class="promo_price"><?=number_format($item->promo_price,0,',','.')?> vnđ</span>
								<?php } ?>									
								<div class="excerpt">
									<a href="<?=base_url('tour/'.$item->alias)?>">
										<p><?=$item->short_des?></p>
									</a>
								</div>
							</div>
							<div class="right">
								<a rel="nofollow" href="<?=base_url('tour/'.$item->alias)?>" class="btn btn-viewmore">Xem thêm <i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>

				<div class="col-sm-12 center readmore-line">
				<br>
					<a href="<?=base_url('tour-du-lich/')?>" class="btn btn-readmore">Xem tất cả tour của chúng tôi</a>
				</div>
			</div>
		</div>
	</section>
	
	<script src="<?=base_url('assets/js/jquery-1.11.1.min.js')?>"></script>
	<script src="<?=base_url('assets/js/owl.carousel.min.js')?>"></script>
	<section id="booking-room" class="booking-room blocksection hidden-sm hidden-xs">
		<div class="container">
			<div class="row clearfix">
				<div class="col-sm-12 center">
					<h3 class="section-heading"><?=$w_hotels['heading']->value?></h3>
					<div class="section-description"><?=$w_hotels['description']->value?></div>
				</div>
				<div id="owl-hotels" class="owl-carousel">
					<?php foreach ($hotels as $item) {?>
					<div class="item">
						<div class="">
							<div class="thumb">
								<a href="<?=base_url('accommodation/'.$item->alias)?>"><img src="<?=base_url($item->thumb)?>" class="img-holder" alt=""/></a>
							</div>
							<div class="info"><a href="<?=base_url('accommodation/'.$item->alias)?>">
								<h4><?=$item->name?><br>
									<span class="price">Giá từ: <?=number_format($item->regular_price,0,',','.')?> vnđ</span>
								</h4>
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
				<div class="col-sm-12 center readmore-line">
					<a href="<?=base_url('places/')?>" class="btn btn-readmore">Xem thêm</a>
				</div>
			</div>
		</div>
	</section>
	
	<section id="booking-room-2" class="booking-room blocksection hidden-md hidden-lg">
		<div class="container">
			<div class="row clearfix">
				<div class="col-sm-12 center">
					<h3 class="section-heading"><?=$w_hotels['heading']->value?></h3>
					<div class="section-description"><?=$w_hotels['description']->value?></div>
				</div>
				<?php foreach ($hotels as $item) {?>
				<div class="item">
					<div class="">
						<div class="thumb">
							<a href="<?=base_url('accommodation/'.$item->alias)?>"><img src="<?=base_url($item->thumb)?>" class="img-holder" alt=""/></a>
						</div>
						<div class="info"><a href="<?=base_url('accommodation/'.$item->alias)?>">
							<h4><?=$item->name?></h4>
							<div class="detail"><?=$item->short_des?></div>
						</div></a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<script>
		var owl_hotel = $("#owl-hotels");
		owl_hotel.owlCarousel({
			items : <?=$w_hotels['number_display']->value?>,
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
	
	<section id="newest-article" class="newest-article blocksection">
		<div class="container">
			<div class="row clearfix">
				<div class="col-sm-12 center">
					<h3 class="section-heading"><?=$w_blogs['heading']->value?></h3>
					<div class="section-description"><?=$w_blogs['description']->value?></div>
				</div>
				<div id="owl-mc-blog" class="owl-carousel">
					<?php foreach ($blog as $item) {?>
					<div class="item">
						<div class="thumb">
							<a href="<?=base_url('post/'.$item->alias)?>"><img src="<?=base_url($item->thumb)?>" class="img-holder" alt="<?=$item->title?>"/></a>
						</div>
						<div class="info">
							<h4><a href="<?=base_url('post/'.$item->alias)?>"><?=$item->title?></a></h4>
							<div class="detail"><?=$item->short_des?></div>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="boxnp" id="block_direction_blog">
					<a class="prev prevblog"><i class="fa fa-chevron-left"></i></a>
					<a class="next nextblog"><i class="fa fa-chevron-right"></i></a>
				</div>
				<div class="col-sm-12 center readmore-line">
					<a href="<?=base_url('blog')?>" class="btn btn-readmore">Xem thêm</a>
				</div>
			</div>
		</div>
	</section>
	
	<script>
		var owl_blog = $("#owl-mc-blog");
		owl_blog.owlCarousel({
			items : <?=$w_blogs['number_display']->value?>,
			itemsDesktop : [1199,4],
			itemsDesktopSmall : [980,3],
			itemsTablet: [768,2],
			itemsTabletSmall: false,
			itemsMobile : [479,1],
		});
		$("#block_direction_blog").find('.nextblog').click(function(){
			owl_blog.trigger('owl.next');
		})
		$("#block_direction_blog").find('.prevblog').click(function(){
			owl_blog.trigger('owl.prev');
		}) 
	</script>
	
	<section id="userblock" class="userblock blocksection">
		<div class="container">
			<div class="row clearfix">
				<div class="col-sm-12"><!-- Testimonials -->
					<div class="testimonials">
						<h4 class="section-heading center"><?=$w_testimonials['heading']->value?></h4>
						<div id="owl-customers" class="owl-carousel">
							<?php foreach ($testimonials as $item) {?>
							<div class="item">
								<div class="owl-caption">
									<div class="testi-quote">
										<div class="text"><?=$item->quote?></div>
										<div class="name"><a href="<?=base_url('khach-hang/'.$item->alias)?>"><?=$item->name?></a> - <span><?=$item->address?></span><a href="<?=base_url('khach-hang/'.$item->alias)?>"><img src="<?=base_url('assets/img/icon-facebook.png')?>" width="20px" class="img-circle" alt="facebook khách hàng"></a></div>
									</div>
									<div class="arrow-tri right"></div>
									<div class="testi-content flexible">
										<div class="testi-avatar">
											<img src="<?=base_url($item->thumb)?>" class="img-circle img-holder" alt="khách hàng maichau tourist <?=$item->name?>">
										</div>
										<div class="testi-exp">
											<p class="exp-title"><i class="fa fa-thumbs-up"></i> Đã trải nghiệm</p>
											<div class="exp-tour"><strong><?=$item->tour_name?></strong></div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		$("#owl-customers").owlCarousel({
			items: <?=$w_testimonials['number_display']->value?>,
			navigation : false, // Show next and prev buttons
			slideSpeed : 300,
			paginationSpeed : 400,
			itemsDesktop : [1199,2],
			itemsDesktopSmall : [980,2],
			itemsTablet: [768,1],
			itemsTabletSmall: false,
			itemsMobile : [479,1],
			//singleItem:true,
		});
	</script>