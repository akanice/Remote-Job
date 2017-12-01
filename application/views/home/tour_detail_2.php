	<section class="breadcrumbs">
		<div class="container">
			<div class="">
				<nav class="mc-breadcrumbs">
					<a href="<?=site_url()?>"><i class="fa fa-home"></i> Home</a>
					<span><i class="fa fa-angle-right"></i></span>
					<a href="<?=base_url('tour-du-lich/'.$tourcategory->alias)?>"><?=@$tourcategory->name?></a>
					<span><i class="fa fa-angle-right"></i></span>
					Tour di lịch Bà Nà Hill - Đà Nẵng - Hội An
				</nav>
			</div>
		</div>
	</section>
	
	<section id="tour-detail" class="tour-detail blocksection">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12">
					<h1 class="tour-heading"><?=@$tour->name?></h1>
				</div>
				<div class="col-md-9">
					<div class="tour-body">
						<div class="tour-cover">
							<img src="<?=@base_url($tour->cover_image)?>" class="img-holder" alt="<?=@$tour->name?>">
						</div>
						<div class="tour-content">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs affix-top" role="tablist" id="tab-content-tour">
								<li role="presentation" class="active"><a href="#gioithieu" aria-controls="gioithieu" role="tab" data-toggle="tab">Giới thiệu</a></li>
								<li role="presentation"><a href="#lichtrinh" aria-controls="lichtrinh" role="tab" data-toggle="tab">Lịch trình</a></li>
								<li role="presentation"><a href="#danhgia" aria-controls="danhgia" role="tab" data-toggle="tab">Đánh giá</a></li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="gioithieu">
									<div class="tab-inner">
										<?=@$tour->full_des?>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="lichtrinh">
									<div class="tab-inner">
										<?=@$tour->itinerary?>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="danhgia">
									<div class="tab-inner">
										<?php if ($testimonials == '' or $testimonials == null) { ?>
										<h5>Chưa có phản hồi khách hàng cho tour này</h5>
										<?php } else { foreach ($testimonials as $item) {?>
										<div class="item feedback">
											<div class="feedback-header flexible">
												<div class="feedback-avatar">
													<img src="<?=base_url($item->thumb)?>" class="img-circle img-holder" alt="<?=base_url($item->subject)?>" />
												</div>
												<div class="feedback-quote">
													<h4><?=$item->subject?></h4>
													<p><em><?=$item->quote?></em></p>
													<span class="feedback-icon quote-left"><i class="fa fa-quote-left"></i></span>
													<span class="feedback-icon quote-right"><i class="fa fa-quote-right"></i></span>
												</div>
											</div>
											<div class="feedback-info">
												<div class="row clearfix">
													<div class="col-sm-8">
														<div class="line"><span><i class="fa fa-user"></i> Khách hàng:</span><?=$item->name?></div>
														<div class="line"><span><i class="fa fa-map-marker"></i> Địa chỉ:</span><?=$item->address?></div>
														<div class="line"><span><i class="fa fa-binoculars"></i> Đã trải nghiệm:</span><?=$tour->name?></div>
													</div>
													<div class="col-sm-4">
														<div class="view-detail align-right">
															<a href="<?=base_url('#')?>" class="btn btn-readmore">Xem chi tiết</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php } } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="tour-right-col" id="tourRightsidebar">
						<div class="tour-shortinfo rightcol">
							<h2 class="center">Thông tin tour</h2>
							<div class="inner">
								<div class="item clearfix">
									<div class="label">Điểm đến</div>
									<span class="rs"><?=$tour->depature?> - <?=$tour->destination?></span>
								</div>
								<div class="item clearfix">
									<div class="label">Thời gian</div>
									<span class="rs"><?=$tour->duration?></span>
								</div>
								<div class="item clearfix">
									<div class="label">Khởi hành</div>
									<span class="rs">hàng ngày</span>
								</div>
								<div class="item clearfix">
									<div class="label">Số sao:</div>
									<span class="rs">
										<div class="star">
											<?php $n = $tour->rating; for ($i = 1; $i <= $n; $i++) {?>
												<i class="fa fa-star" id="<?php echo 'star-'.$i;?>"></i>
											<?php }?>
										</div>
									</span>
								</div>
								<?php if (isset($tour->promo_price) && ($tour->promo_price == 0)) {?>
									<div class="price"><?=number_format($tour->regular_price,0,',','.')?> vnđ</div>
								<?php } else {?>
									<div class="price line-through"><?=number_format($tour->regular_price,0,',','.')?> vnđ</div>
									<div class="promo_price"><?=number_format($tour->promo_price,0,',','.')?> vnđ</div>
								<?php } ?>
								<div class="btn-order-tour center" id="button_order_tour">
									<a href="#" class="btn btn-readmore">Đặt tour ngay<i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
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
		</div>
	</section>
	
	<section id="related-tour" class="related-tour newest-article blocksection">
		<div class="container">
			<div class="row clearfix">
				<div class="col-sm-12 center">
					<h3 class="section-heading">Các tour liên quan</h3>
					<div class="section-description">&nbsp;</div>
				</div>
				<?php if ($tour_related == '' or $tour_related == null) { ?>
				<h5>Không có tour liên quan</h5>
				<?php } else { foreach ($tour_related as $item) {?>
				<div class="col-md-3">
					<div class="item">
						<div class="thumb">
							<img src="<?=@base_url($item->thumb)?>" class="img-holder" alt="<?=@$item->name?>"/>
						</div>
						<div class="info">
							<h4><?=@$item->name?></h4>
							<div class="time"><?=@$item->duration?></div>
							<div class="price"><?=number_format($tour->regular_price,0,',','.')?> vnđ</div>
							<a rel="nofollow" href="<?=@base_url('tour/'.$item->alias)?>" class="btn btn-viewmore">Xem thêm <i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
				<?php } }?>
			</div>
		</div>
	</section>
	
	<section class="blocksection promo-banner">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div style="padding: 20px 0">[Cho cái banner quảng cáo, logo đối tác hoặc blog liên quan ... vào đây]</div>
				</div>
			</div>
		</div>
	</section>