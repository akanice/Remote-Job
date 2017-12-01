	<section id="slideshow" class="slideshow">
		<div id="slider1" class="carousel slide carousel-fade" data-ride="carousel">
			<!-- Indicators -->
			<div class="act-indicators">
				<ol class="carousel-indicators">
					<?php $n = $number_slider; for ($i = 0; $i < $n; $i++) { ?>
						<li data-target="#slider1" data-slide-to="<?php echo $i;?>" class="<?php if ($i == '0') {echo 'active';}?>"></li>
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
					<a href="<?=@base_url($item->link)?>"><img src="<?=base_url($item->image)?>" alt="<?=$item->name?>" class=""></a>
				</div>
					<?php } } ?>
			</div>
			
			<a class="left carousel-control" href="#slider1" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#slider1" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<div class="searchtrip">
			<link href="<?=base_url('assets/css/datepicker/datepicker3.css')?>" rel="stylesheet" />
			<div class="container">
				<div class="row clearfix">
					<div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
						<div class="wrapbox">
							<h3 class="heading center">Tìm kiếm tour</h3>
							<form class="act-form row" method="GET" action="<?=base_url('search')?>" id="myform">
								<div class="col-sm-3">
									<select type="text" name="search_tourtype"class="act-input" form="myform">
										<option selected="selected" value="">Loại tour</option>
										<?php if (!empty($search_tourtype)) {
											foreach ($search_tourtype as $item) {
										?>
											<option value="<?=@$item->alias?>"><?=@$item->name?></option>
										<?php } } ?>
									</select>
								</div>
								<div class="col-sm-3">
									<select type="text" name="search_destination" class="act-input" form="myform">
										<option selected="selected" value="">Điểm đến</option>
										<?php if (!empty($search_destination)) {
											foreach ($search_destination as $item) {
										?>
											<option value="<?=@$item->alias?>"><?=@$item->name?></option>
										<?php } } ?>
									</select>
								</div>
								<div class="col-sm-3">
									<input type="text" name="search_date" class="act-input" id="start_date" placeholder="01/01/2016">
									<input type="hidden" name="search_themes" class="act-input" value="">
								</div>
								<div class="col-sm-3">
									<button type="submit" class="btn btn-act" style="width: 100%;">Tìm kiếm</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		
	<section id="introduction" class="introduction block-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div>
						<?=@$home_themes_info?>
					</div>
					<div class="child">
						<h3 class="center">Chủ đề nổi bật</h3>
						<ul class="clearfix">
							<?php foreach ($search_themes as $s) {
								# code...
							?>
							<li>
								<a href="<?=base_url('tim-kiem?search_themes='.@$s->alias)?>">
									<img src="<?=base_url(@$s->thumb)?>" class="img-holder">
									<div class="content-collection-info">
										<h2><?=@$s->name?></h2>
									</div>
								</a>
							</li>
							<?php } ?>
						</ul>
					</div>
					<div class="viewmore center">
						<a href="#" class="btn btn-act btn-more">Xem thêm chủ đề</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="topdeals block-section">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12 center">
					<h1 class="heading textuppercase">Tour đang chạy</h1>
				</div>
				<div class="col-md-12"><div class="tb-topdeals">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="number hidden-xs hidden-sm">
								</th>
								<th class="map-thumb hidden-xs">Bản đồ</th>
								<th class="departure-date">Thời gian khởi hành</th>
								<th class="start-finish hidden-xs">Tên tour</th>
								<th class="days">Số ngày</th>
								<th class="price">Giá từ</th>
								<th class="trip-link"></th>
							</tr>
						</thead>
						<tbody>
							<?php $i=0; if($on_tours )foreach ($on_tours as $t) {
								$i++
							?>
							<tr>
								<td class="number hidden-xs hidden-sm"><span class="blocked-bullet"><?=$i?></span></td>
								<td class="map-thumb hidden-xs">
									<img src="assets/img/map_thumb.gif" class="thumb" alt="hà nội - đà nẵng">
								</td>
								<td class="departure-date text-column"><?=Date('d-m-Y',@$t->start_date)?></td>
								<td class="start-finish text-column hidden-xs">
									<a href="<?=base_url('tours/chi-tiet/'.$t->alias)?>"><?=@$t->name?></a><br><?=@$t->short_des?>
								</td>
								<td class="days text-column"><?php $period = $t->end_date - $t->start_date; echo $period /86400 +1;?></td>
								<td class="price text-column"><span class="price-currency-code">VNĐ</span> <?=@number_format($t->sell_price,0,',','.')?></div>
								</td>
								<td class="trip-link text-column aright">
									<a href="<?=base_url('tours/chi-tiet/'.$t->alias)?>"><span class="hidden-xs">Chi tiết tour</span> <i class="fa fa-chevron-right"></i></a>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div></div>
			</div>
		</div>
	</section>
	
	<section class="populartour">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12 center">
					<h1 class="heading textuppercase">Tour phổ biến</h1>
				</div>
				<?php if($popular_tours )foreach ($popular_tours as $t) {
								# code...
							?>
				<div class="col-sm-3 product">
					<div class="product-inner">
						<div class="product-image-block">
							<div class="product-image relativeblock">
								<a href="<?=base_url('tours/chi-tiet/'.$t->alias)?>"><img src="<?=base_url($t->image)?>" alt="" title="" class="img-holder"></a>
								<div class="product-info-block absoluteblock">
									<div class="product-info">
										<h4><a href="<?=base_url('tours/chi-tiet/'.$t->alias)?>"><?=$t->name?></a></h4>
									</div>
									<div class="liked absoluteblock">
										<a onclick="" value="" id="nhatrang1" class="">
											<span class="shortlist-on-text">
												<i class="fa fa-heart-o"></i>
											</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="product-info">
							<div>
								<div class="product-info-days center">
									<h5>DAYS</h5>
									<div class="duration">
										<h5><?php $period = $t->end_date - $t->start_date; echo $period /86400 +1;?></h5>
									</div>
								</div>
								<div class="product-info-price">
									<h5>&nbsp;</h5>
									<h5>&nbsp;</h5>
								</div>
							</div>
							<div class="product-info-description">
								<?=@$t->short_des?></div>
							<div class="product-info-link">
								<a class="btn btn-default" href="<?=base_url('tours/chi-tiet/'.$t->alias)?>">Chi tiết</a>
								<div class="action">
									<i title="View trip map" class="fa fa-map-marker map-pin"></i>
								</div>
							</div>
						</div>
					</div>
				</div>	
				<?php }?>		
			</div>
		</div>
	</section>
	
	<section class="testimonials">
		<div class="backdrop"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12">
					<h3 class="heading">Khách hàng của chúng tôi đã nói ...</h3>
					<div id="owl-example" class="owl-carousel">
						<?php if($testimonials) foreach ($testimonials as $item) {?>
						<div class="owl-caption">
							<div class="testi-image hidden-xs hidden-sm">
								<img src="<?=base_url($item->image)?>" class="img-circle" width="64" height="64">
							</div>
							<div class="testi-content">
								<span class="content"><?=$item->content?></span>
								<div class="testi-name"><strong><?=$item->name?></strong> - <span class="testi-company"><?=$item->address?></span></div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="stories block-section">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12 center">
					<h1 class="heading textuppercase">Câu chuyện cộng đồng</h1>
				</div>
				<?php if($travelstyles)foreach ($travelstyles as $b) {
				
				?>
				<div class="col-md-4">
					<div class="item">
						<a href="<?=base_url('blog/chi-tiet/'.$b->alias)?>">
							<img src="<?=base_url($b->image)?>" class="img-holder" style="height: 254px">
							<div class="post-inner">
								<h3><?=$b->title?></h3>
								<div class="time">Đăng ngày: <?=Date('d-m-Y',@$b->create_time)?></div>
								<div class="des" style="height:115px;overflow:hidden"><?=@$b->description?></div>
								<div class="aright">
									<a href="<?=base_url('blog/chi-tiet/'.$b->alias)?>" class="btn btn-default">Đọc thêm</a>
								</div>
							</div>						
						</a>
					</div>
				</div>
				<?php } ?>
				<div class="viewmore center">
					<a href="<?=base_url('blog/')?>" class="btn btn-act btn-more">Xem thêm bài viết</a>
				</div>
			</div>
		</div>
	</section>
	<section class="stories block-section">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12 center">
					<h1 class="heading textuppercase">Phong Cách Du Lịch Của Chúng Tôi</h1>
				</div>
				<?php if($stories)foreach ($stories as $b) {
				
				?>
				<div class="col-sm-4">
					<div class="item">
						<a href="<?=base_url('blog/chi-tiet/'.$b->alias)?>">
							<img src="<?=base_url($b->image)?>" class="img-holder" style="height: 254px">
							<div class="post-inner">
								<h3><?=$b->title?></h3>
								<div class="time">Đăng ngày: <?=Date('d-m-Y',@$b->create_time)?></div>
								<div class="des" style="height:115px;overflow:hidden"><?=@$b->description?></div>
								<div class="aright">
									<a href="<?=base_url('blog/chi-tiet/'.$b->alias)?>" class="btn btn-default">Đọc thêm</a>
								</div>
							</div>						
						</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<script src="<?=base_url('assets/js/jquery-1.11.1.min.js')?>"></script>
	<script src="<?=base_url('assets/js/plugins/datepicker/bootstrap-datepicker.js')?>"></script>
	<script src="<?=base_url('assets/js/plugins/datepicker/locales/bootstrap-datepicker.vi.js')?>"></script>
	<script type="text/javascript">
		$('#start_date').datepicker({
			language: 'vi',
			format: 'dd/mm/yyyy',
		});
		$('#end_date').datepicker({
			language: 'vi',
			format: 'dd/mm/yyyy',
		});
	</script>