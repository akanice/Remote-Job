	<section class="breadcrumbs">
		<div class="container">
			<div class="">
				<nav class="mc-breadcrumbs">
					<a href="<?=site_url()?>"><i class="fa fa-home"></i> Home</a>
					<span><i class="fa fa-angle-right"></i></span>
					<a href="<?=base_url('blog')?>">Blog</a>
					<span><i class="fa fa-angle-right"></i></span>
					<a href="<?=base_url('blog/'.$category->alias)?>"><?=@$category->name?></a>
					<span><i class="fa fa-angle-right"></i></span>
					<?=@$blog->title?>
				</nav>
			</div>
		</div>
	</section>
	
	<section id="blog-listing" class="blog-listing blog-detail">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-9">
					<div class="wrapper">
						<div class="item" id="article-1"><!-- article 1 -->
							<a href="#"><h4 class="heading"><?=$blog->title?></h4></a>
							<div class="blog-info">
								<span class="time"><i class="fa fa-calendar"></i> <?=Date('d-m-Y',@$blog->create_time)?></span> - <span class="tags"><strong>Tags:</strong>
									<?php if (!isset($blog->tag) || $blog->tag == '') { ?>
									<?php } else { $tags = explode(',',$blog->tag); foreach ($tags as $tag) {?>
									<a href="<?=base_url('tags/'.make_alias($tag))?>"><?=$tag?></a>
									<?php } }?>
								</span>
							</div>
							<div class="thumb"><img src="<?=base_url($blog->image)?>" class="img-holder" alt="<?=$blog->title?>"></div>
							<hr class="blog-seperate" />
							<div class="short-description">
								<?=$blog->content?>
							</div>
						</div>
						<hr>
						<div class="related-blog">
							<h5 class="heading">Bài viết khác cùng chuyên mục</h5>
							<ul class="clearfix">
								<?php if ($allblogs == '' or $allblogs == null) { ?>
								<h5>Chưa có nội dung trong mục này</h5>
								<?php } else { foreach ($allblogs as $item) {?>
								<li><a href="<?=base_url('post/'.$item->alias)?>"><i class="fa fa-circle"></i> <?=$item->title?></a></li>
								<?php } } ?>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="tour-shortinfo rightcol">
						<h2 class="">Tìm kiếm</h2>
						<form id="search-blog" method="POST" action="" class="form-blog-search">
							<div class="line-form relative">
								<input type="text" class="mc-input" placeholder="Tìm kiếm...">
								<button type="submit" class="search-button"><i class="fa fa-search"></i></button>
							</div>
						</form>
					</div>
					<!--<div class="blog-menu right-menu">
						<h3 class="">Bài viết liên quan</h3>
						<ul class="">
							<?php if ($allblogs == '' or $allblogs == null) { ?>
							<h5>Chưa có nội dung trong mục này</h5>
							<?php } else { foreach ($allblogs as $item) {?>
							<li><a href="<?=base_url('post/'.$item->alias)?>"><i class="fa fa-circle"></i> <?=$item->title?></a></li>
							<?php } } ?>
						</ul>
					</div>-->
					<div class="tours-menu right-menu">
						<h3 class="">Gợi ý dành cho bạn</h3>
						<ul>
							<?php if ($tours_by_tag == '' or $tours_by_tag == null) { ?>
							<h5>Chưa có nội dung trong mục này</h5>
							<?php } else { foreach ($tours_by_tag as $item) {?>
							<li class="flexible">
								<a href="<?=base_url('tour/'.$item->alias)?>" class="thumb">
									<img src="<?=base_url($item->thumb)?>" alt="">
								</a>
								<a href="<?=base_url('tour/'.$item->alias)?>" class="item-title">
									<?=$item->name?>
									<div class="price"><?=$item->promo_price?> đ</div>
								</a>
							</li>
							<?php } } ?>
						</ul>
					</div>
					<div class="blog-menu right-menu">
						<h3 class="">Chủ đề khác</h3>
						<ul class="">
							<?php if ($list_category == '' or $list_category == null) { ?>
							<h5>Chưa có nội dung trong mục này</h5>
							<?php } else { foreach ($list_category as $item) {?>
							<li><a href="<?=base_url('blog/'.$item->alias)?>"><i class="fa fa-circle"></i> <?=$item->name?></a></li>
							<?php } } ?>
						</ul>
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