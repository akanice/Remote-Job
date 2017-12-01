<aside class="right-side">
    <section class="content-header">
        <h1>
            Quản lý sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/products')?>">Quản lý sản phẩm</a></li>
            <li class="active">Thêm mới sản phẩm</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <!-- left column -->
            <div class="col-md-8 col-sm-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Thêm mới sản phẩm</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Tên</label>
                                <div class="col-md-4"><input type="text" class="form-control" name="name" required=""/></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Danh mục sản phẩm</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="cat_id">
										<?php foreach ($devicecategory as $item) {?>
                                        <option value="<?=$item->id?>"><?=$item->name?></option>
										<?php } ?>
									</select>
                                </div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Ảnh đại diện</label>
                                <div class="col-md-4">
                                    <input type="file" accept="image" class="" name="image"/>
                                </div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-3">Thông số kỹ thuật</label>
                                <div class="col-md-9"><textarea class="ckeditor form-control" name="specifications"></textarea></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Mã sản phẩm</label>
                                <div class="col-md-4"><input type="text" class="form-control" name="sku"/></div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-3">Sản phẩm nổi bật</label>
                                <div class="col-md-4">
									<select class="form-control" name="featured">
                                        <option value="0">Không</option>
                                        <option value="1">Có</option>
                                    </select>
								</div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-3">Xuất xứ</label>
                                <div class="col-md-4"><input type="text" class="form-control" name="made_in" /></div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-3">Giá sản phẩm</label>
                                <div class="col-md-4"><input type="text" class="form-control" name="price" /></div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-3">Giá bán (nếu có KM)</label>
                                <div class="col-md-4"><input type="text" class="form-control" name="sell_price" /></div>
                            </div>
                            
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Mô tả ngắn</label>
                                <div class="col-md-9"><textarea class="form-control" name="short_description"></textarea></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Mô tả đầy đủ</label>
                                <div class="col-md-9"><textarea class="ckeditor form-control" name="description"></textarea></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Media</label>
                                <div class="col-md-4">
                                    <input type="file" accept="image" class="" name="media[]" multiple/>
                                </div>
                            </div>
							<div class="form-group row-fluid">
                                <label class="col-md-3">Tag sản phẩm</label>
                                <div class="col-md-4">
                                    <select data-placeholder="Chọn tag sản phẩm..." class="chosen-select" multiple style="width:450px;" tabindex="4" name="device_tag[]">
                                        <?php foreach($device_tag as $a){?>
                                            <option value="<?=$a->id?>"><?=$a->name?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            
							<div class="form-group row-fluid">
                                <label class="col-md-3">Thẻ meta title</label>
                                <div class="col-md-4"><textarea class="form-control" name="meta_title"></textarea></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Thẻ meta description</label>
                                <div class="col-md-4"><textarea class="form-control" name="meta_description"></textarea></div>
                            </div>
                            <div class="form-group row-fluid">
                                <label class="col-md-3">Thẻ meta keywords</label>
                                <div class="col-md-4"><textarea class="form-control" name="meta_keywords"></textarea></div>
                            </div>
                            
                            <!-- /.box-body -->
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
<script type="text/javascript">
    $(document).ready(function () {
        $(".chosen-select").chosen();
    });
</script>