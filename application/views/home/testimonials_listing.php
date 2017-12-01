	<section class="breadcrumbs">
		<div class="container">
			<div class="">
				<nav class="mc-breadcrumbs">
					<a href="<?=site_url()?>"><i class="fa fa-home"></i> Home</a>
					<span><i class="fa fa-angle-right"></i></span>
					<a href="<?=base_url('testimonials')?>">Phản hồi khách hàng</a>
				</nav>
			</div>
		</div>
	</section>
	
	<section id="tour-detail" class="tour-detail tags-search blocksection">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12">
					<h1 class="tour-heading"><em>Khách hàng chúng tôi đã có những trải nghiệm tuyệt vời...</em></h1>
				</div>
				<div class="col-md-9">
					<div class="tour-body">
						<div class="tour-content">
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="gioithieu">
									<div class="tab-inner">
										<?php if ($testimonials == '' or $testimonials == null) { ?>
										<h5>Chưa có phản hồi khách hàng cho tour này</h5>
										<?php } else { foreach ($testimonials as $item) {?>
										<div class="item feedback">
											<div class="feedback-header flexible">
												<div class="feedback-avatar">
													<a href="<?=base_url('phan-hoi-khach-hang/'.$item->alias)?>">
														<img src="<?=base_url($item->thumb)?>" class="img-circle img-holder" alt="<?=base_url($item->subject)?>" />
													</a>
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
														<div class="line"><span><i class="fa fa-binoculars"></i> Đã trải nghiệm:</span><?=$item->tour_name?></div>
													</div>
													<div class="col-sm-4">
														<div class="view-detail align-right">
															<a href="<?=base_url('phan-hoi-khach-hang/'.$item->alias)?>" class="btn btn-readmore">Xem chi tiết</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php } } ?>
										<hr>
									</div>
									<div class="tour-pagination">
										<?=$page_links?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="tour-right-col" id="tourRightsidebar">
						<div class="tour-shortinfo rightcol">
							
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