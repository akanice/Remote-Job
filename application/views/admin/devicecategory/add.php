<aside class="right-side">
    <section class="content-header">
        <h1>
            Quản lý danh mục sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/tourscategory')?>">Quản lý danh mục sản phẩm</a></li>
            <li class="active">Thêm mới danh mục sản phẩm</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <!-- left column -->
            <div class="col-md-8 col-sm-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Thêm mới danh mục sản phẩm</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Tên danh mục sản phẩm</label>
                                <div class="col-md-9"><input type="text" class="form-control" name="name" required=""/></div>
                            </div>
							<!--<div class="form-group row-fluid">
								<label class="col-md-3">chủ đề cha</label>
								<div class="col-md-9">
									<select class="form-control" name="parent">
                                        <option value="0">-- Mặc định --</option>
                                        <?php if (!empty($parents)) foreach($parents as $parent){?>
										<?php
											$indent = "";
											for ($i = 1; $i < $parent['level']; $i++) {
												$indent .= "--- ";
											}
										?>
                                            <option value="<?=@$parent['id']?>"><?=@$indent.$parent['name']?></option>
                                        <?php } ?>
                                    </select>
								</div>
							</div>-->
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Ảnh đại diện</label>
                                <div class="col-md-9">
                                    <input type="file" accept="image" class="" name="image"/>
                                </div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-3">Mô tả</label>
                                <div class="col-md-9"><textarea class="form-control" name="description"></textarea></div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-3">Thẻ meta title</label>
                                <div class="col-md-9"><textarea class="form-control" name="meta_title"></textarea></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Thẻ meta description</label>
                                <div class="col-md-9"><textarea class="form-control" name="meta_description"></textarea></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Thẻ meta keywords</label>
                                <div class="col-md-9"><textarea class="form-control" name="meta_keywords"></textarea></div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" name="submit" value="Lưu lại">
                            <a href="javascript:window.history.go(-1);" class="btn btn-default">Hủy</a>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->