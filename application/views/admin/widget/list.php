<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tùy chỉnh widget
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Tùy chỉnh widget</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Homepage - Các Section</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <div class="col-md-12" style="padding:0">
							<div class="col-md-3"><!-- Section Tour nổi bật -->
								<div class="box box-success box-solid collapsed-box">
									<div class="box-header with-border">
										<h3 class="box-title">Tour nổi bật</h3>
										<div class="box-tools pull-right">
											<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
											</button>
										</div>
									</div>
									<form role="form" id="featured_tour" method="POST" action="">									
										<div class="box-body">
											<div class="form-group">
												<label for="f_tour_heading">Heading</label>
												<input type="text" class="form-control" id="f_tour_heading" placeholder="tiêu đề section" name="f_tour_heading" value="<?=$w_data_featured_tour['heading']->value;?>">
											</div>
											<div class="form-group">
												<label for="f_tour_description">Description</label>
												<input type="text" class="form-control" id="f_tour_description" placeholder="Mô tả section" name="f_tour_description" value="<?=$w_data_featured_tour['description']->value;?>">
											</div>
											<div class="form-group">
												<label for="f_tour_display">Số tour hiển thị</label>
												<input type="number" class="form-control" id="f_tour_display" placeholder="Số tour hiển thị" name="f_tour_display" value="<?=$w_data_featured_tour['number_display']->value;?>">
											</div>
											<div class="form-group">
												<label for="f_tour_biggest">ID Tour nổi bật nhất</label>
												<select name="f_tour_biggest" class="form-control" id="f_tour_biggest">
													<?php foreach ($featured_tours as $item) {?>
														<option value="<?=urldecode($item->id)?>" <?php if($item->id==$w_data_featured_tour['biggest']->value){echo 'selected="selected" ';}?>><?=$item->name?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="overlay" style="display:none">
											<i class="fa fa-refresh fa-spin"></i>
										</div>
										<div class="box-footer clearfix">
											<span class="result" style="display:none">Ngon rồi</span><button type="submit" class="btn btn-success pull-right">Lưu lại</button>
										</div>
									</form>
								</div>
							</div>
							
							<div class="col-md-3"><!-- Section nhà hàng, khách sạn, bungalow -->
								<div class="box box-info box-solid collapsed-box">
									<div class="box-header with-border">
										<h3 class="box-title">Nhà hàng, khách sạn,...</h3>
										<div class="box-tools pull-right">
											<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
											</button>
										</div>
									</div>
									<form role="form" id="places">									
										<div class="box-body">
											<div class="form-group">
												<label for="places_heading">Heading</label>
												<input type="text" class="form-control" id="places_heading" placeholder="tiêu đề section" name="places_heading" value="<?=$w_places['heading']->value;?>">
											</div>
											<div class="form-group">
												<label for="places_description">Description</label>
												<input type="text" class="form-control" id="places_description" placeholder="Mô tả section" name="places_description" value="<?=$w_places['description']->value;?>">
											</div>
											<div class="form-group">
												<label for="places_display">Số item hiển thị</label>
												<input type="number" class="form-control" id="places_display" placeholder="Số item hiển thị" name="places_display" value="<?=$w_places['number_display']->value;?>">
											</div>
											<div class="form-group">
												<label for="places_available">Số item được load</label>
												<input type="number" class="form-control" id="places_available" placeholder="Số item được load" name="places_available" value="<?=$w_places['number_available']->value;?>">
											</div>
										</div>
										<div class="overlay" style="display:none">
											<i class="fa fa-refresh fa-spin"></i>
										</div>
										<div class="box-footer clearfix">
											<span class="result" style="display:none">Ngon rồi</span><button type="submit" class="btn btn-info pull-right">Lưu lại</button>
										</div>
									</form>
								</div>
							</div>
							
							<div class="col-md-3"><!-- Section tin tức mới nhất -->
								<div class="box box-warning box-solid collapsed-box">
									<div class="box-header with-border">
										<h3 class="box-title">Bài viết mới nhất</h3>
										<div class="box-tools pull-right">
											<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
											</button>
										</div>
									</div>
									<form role="form" id="blogs">									
										<div class="box-body">
											<div class="form-group">
												<label for="blogs_heading">Heading</label>
												<input type="text" class="form-control" id="blogs_heading" placeholder="tiêu đề section" name="blogs_heading" value="<?=$w_blogs['heading']->value;?>">
											</div>
											<div class="form-group">
												<label for="blogs_description">Description</label>
												<input type="text" class="form-control" id="blogs_description" placeholder="Mô tả section" name="blogs_description" value="<?=$w_blogs['description']->value;?>">
											</div>
											<div class="form-group">
												<label for="blogs_display">Số item hiển thị</label>
												<input type="number" class="form-control" id="blogs_display" placeholder="Số item hiển thị" name="blogs_display" value="<?=$w_blogs['number_display']->value;?>">
											</div>
											<div class="form-group">
												<label for="blogs_available">Số item được load</label>
												<input type="number" class="form-control" id="blogs_available" placeholder="Số item được load" name="blogs_available" value="<?=$w_blogs['number_available']->value;?>">
											</div>
										</div>
										<div class="overlay" style="display:none">
											<i class="fa fa-refresh fa-spin"></i>
										</div>
										<div class="box-footer clearfix">
											<span class="result" style="display:none">Ngon rồi</span><button type="submit" class="btn btn-warning pull-right">Lưu lại</button>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-3"><!-- Section phản hồi khách hàng -->
								<div class="box box-primary box-solid collapsed-box">
									<div class="box-header with-border">
										<h3 class="box-title">Phản hồi khách hàng</h3>
										<div class="box-tools pull-right">
											<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
											</button>
										</div>
									</div>
									<form role="form" id="testimonials">									
										<div class="box-body">
											<div class="form-group">
												<label for="testimonials_heading">Heading</label>
												<input type="text" class="form-control" id="testimonials_heading" placeholder="tiêu đề section" name="testimonials_heading" value="<?=$w_testimonials['heading']->value;?>">
											</div>
											<div class="form-group">
												<label for="testimonials_description">Description</label>
												<input type="text" class="form-control" id="testimonials_description" placeholder="Mô tả section" name="testimonials_description" value="<?=$w_testimonials['description']->value;?>">
											</div>
											<div class="form-group">
												<label for="testimonials_display">Số item hiển thị</label>
												<input type="number" class="form-control" id="testimonials_display" placeholder="Số item hiển thị" name="testimonials_display" value="<?=$w_testimonials['number_display']->value;?>">
											</div>
											<div class="form-group">
												<label for="testimonials_available">Số item được load</label>
												<input type="number" class="form-control" id="testimonials_available" placeholder="Số item được load" name="testimonials_available" value="<?=$w_testimonials['number_available']->value;?>">
											</div>
										</div>
										<div class="overlay" style="display:none">
											<i class="fa fa-refresh fa-spin"></i>
										</div>
										<div class="box-footer clearfix">
											<span class="result" style="display:none">Ngon rồi</span><button type="submit" class="btn btn-primary pull-right">Lưu lại</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="box">
					<div class="box-header">
                        <h3 class="box-title">Footer</h3>
                    </div>
                    <div class="box-body table-responsive">							
						<div class="col-md-6"><!-- Section Footer User 1 -->
							<div class="box box-warning box-solid collapsed-box">
								<div class="box-header with-border">
									<h3 class="box-title">Footer User 1</h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
										</button>
									</div>
								</div>
								<form role="form" id="footeruser1">									
									<div class="box-body">
										<div class="form-group">
											<label for="footeruser1_heading">Heading</label>
											<input type="text" class="form-control" id="footeruser1_heading" placeholder="tiêu đề section" name="footeruser1_heading" value="<?=$w_footeruser1['heading']->value;?>">
										</div>
										<div class="form-group">
											<label for="footeruser1_content">Nội dung</label>
											<textarea class="ckeditor form-control" name="footeruser1_content" placeholder="Nội dung" id="footeruser1_content"><?=$w_footeruser1['content']->value;?></textarea>
										</div>
									</div>
									<div class="overlay" style="display:none">
										<i class="fa fa-refresh fa-spin"></i>
									</div>
									<div class="box-footer clearfix">
										<span class="result" style="display:none">Ngon rồi</span><button type="submit" class="btn btn-warning pull-right">Lưu lại</button>
									</div>
								</form>
							</div>
						</div>
						
						<div class="col-md-6"><!-- Section Footer User 2 -->
							<div class="box box-info box-solid collapsed-box">
								<div class="box-header with-border">
									<h3 class="box-title">Footer User 2</h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
										</button>
									</div>
								</div>
								<form role="form" id="footeruser2">									
									<div class="box-body">
										<div class="form-group">
											<label for="footeruser2_heading">Heading</label>
											<input type="text" class="form-control" id="footeruser2_heading" placeholder="tiêu đề section" name="footeruser2_heading" value="<?=$w_footeruser2['heading']->value;?>">
										</div>
										<div class="form-group">
											<label for="footeruser2_content">Nội dung</label>
											<textarea class="ckeditor form-control" name="footeruser2_content" placeholder="Nội dung" id="footeruser2_content"><?=$w_footeruser2['content']->value;?></textarea>
										</div>
									</div>
									<div class="overlay" style="display:none">
										<i class="fa fa-refresh fa-spin"></i>
									</div>
									<div class="box-footer clearfix">
										<span class="result" style="display:none">Ngon rồi</span><button type="submit" class="btn btn-info pull-right">Lưu lại</button>
									</div>
								</form>
							</div>
						</div>
						
                    </div>
                </div>
            </div>
        </div>

    </section>
</aside>
</div>
