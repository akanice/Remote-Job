	<section class="breadcrumbs">
		<div class="container">
			<div class="">
				<nav class="mc-breadcrumbs">
					<a href="<?=site_url()?>"><i class="fa fa-home"></i> Home</a>
					<span><i class="fa fa-angle-right"></i></span>
					<a href="<?=base_url('tags')?>">Tags</a>
					<span><i class="fa fa-angle-right"></i></span>
					<?=@$current->name?>
				</nav>
			</div>
		</div>
	</section>
	
	<section id="tour-listing" class="tour-listing tags-search tour-detail blocksection">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12">
					<h1 class="tour-heading">Kết quả liên quan đến tag: <strong><?=$current_tag->name?></strong></h1>
				</div>
				<div class="clearfix">
					<?php if ($tours_by_tag == '' or $tours_by_tag == null) { ?>
					<h5>Chưa có nội dung trong mục này</h5>
					<?php } else { foreach ($tours_by_tag as $item) {?>
					<div class="col-md-6">
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
									<!--<span class="rating">
										<?php $n = $item->rating; for ($i = 1; $i <= $n; $i++) {?>
											<i class="fa fa-star" id="<?php echo 'star-'.$i;?>"></i>
										<?php }?>
									</span>-->
								</div>
								<div class="second-line row clearfix">
									<div class="col-sm-12 center">
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
					</div>
					<?php } }?>
				</div>
			</div>
		</div>
	</section>
	
	<section id="newest-article" class="newest-article tags-search blocksection">
		<div class="container">
			<div class="row clearfix">
				<div class="col-sm-12 center">
					<h3 class="section-heading">Các bài viết liên quan</h3>
				</div>
				<?php foreach ($blogs_by_tag as $item) {?>
				<div class="col-md-3">
					<div class="item">
						<div class="thumb">
							<a href="<?=base_url('post/'.$item->alias)?>"><img src="<?=base_url($item->thumb)?>" class="img-holder" alt="<?=$item->title?>"/></a>
						</div>
						<div class="info">
							<h4><a href="<?=base_url('post/'.$item->alias)?>"><?=$item->title?></a></h4>
							<div class="detail"><?=$item->short_des?></div>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
	</section>