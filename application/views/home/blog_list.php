	<section class="breadcrumbs">
		<div class="container">
			<div class="">
				<nav class="mc-breadcrumbs">
					<a href="<?=site_url()?>"><i class="fa fa-home"></i> Home</a>
					<?php if (!isset($blog_category) || ($blog_category=='')) {
						echo '<span><i class="fa fa-angle-right"></i></span>Blog';
						} else {?>
					<span><i class="fa fa-angle-right"></i></span>
					<a href="<?=base_url('blog')?>">Blog</a>
					<span><i class="fa fa-angle-right"></i></span>
					<?=@$blog_category->name?>
					<?php } ?>
				</nav>
			</div>
		</div>
	</section>
	
	<section id="blog-listing" class="blog-listing">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12">
					<h1 class="blog-heading">
						<?php if (!isset($blog_category->name) || ($blog_category->name=='')) {?>
						Blog
						<?php } else { echo $blog_category->name;}?>
					</h1>
				</div>
				<div class="col-md-9">
					<div class="wrapper">
						<?php if ($blogs == '' or $blogs == null) { ?>
						<h5>Chưa có nội dung trong mục này</h5>
						<?php } else { foreach ($blogs as $item) {?>
						<div class="item" id="article-1"><!-- article 1 -->
							<a href="<?=base_url('post/'.$item->alias)?>"><h4 class="heading"><?=$item->title?></h4></a>
							<div class="blog-info">
								<span class="time"><i class="fa fa-calendar"></i> <?=Date('d-m-Y',@$item->create_time)?></span> - <span class="tags"><strong>Tags:</strong> 
									<?php if (!isset($item->tag) || $item->tag == '') { ?>
									<?php } else { $tags = explode(',',$item->tag); foreach ($tags as $tag) {?>
									<a href="<?=base_url('tags/'.make_alias($tag))?>"><?=$tag?></a>
									<?php } }?>
								</span>
							</div>
							<div class="thumb"><a href="<?=base_url('post/'.$item->alias)?>"><img src="<?=base_url($item->image)?>" class="img-holder" alt="<?=$item->title?>"  title="<?=$item->title?>"></a></div>
							<div class="short-description">
								<?=$item->description?>
							</div>
							<div class="readmore align-right">
								<a href="<?=base_url('post/'.$item->alias)?>" class="btn btn-readmore">Xem thêm</a>
							</div>
						</div>
						<?php } } ?>
						<nav class="clearfix">
							<?=$page_links?>
						</nav>
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
					<div class="blog-menu right-menu">
						<h3 class="">Bài viết liên quan</h3>
						<ul class="">
							<?php if ($allblogs == '' or $allblogs == null) { ?>
							<h5>Chưa có nội dung trong mục này</h5>
							<?php } else { foreach ($allblogs as $item) {?>
							<li><a href="<?=base_url('post/'.$item->alias)?>"><i class="fa fa-circle"></i> <?=$item->title?></a></li>
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