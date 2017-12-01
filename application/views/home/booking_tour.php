	<section class="booking_tour">
		<div class="container">
			<div class="row clearfix">
				<div class="col-sm-12" style="display: none" id="notification">
					<div class="progress">
						<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
							100%
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="box_inner">
						<h3 class="heading">Đặt tour</h3>
						<div class="row">
							<div class="col-sm-6">
								<img src="<?=@base_url($tour->thumb)?>" class="img-holder">
							</div>
							<div class="col-sm-6">
								<h4><?=@$tour->name?></h4>
								<p><i class="fa fa-calendar-check-o"></i> Khởi hành: <?=$tour->depature?> - <?=$tour->destination?></p>
								<p><i class="fa fa-calendar"></i> Số ngày: <?=$tour->duration?></p>
								<p class="sell_price"><i class="fa fa-bed"></i> Giá tour <span><?=@number_format($tour->regular_price,0,',','.')?></span> vnđ</p>
								<p class=""><i class="fa fa-bed"></i> Trạng thái tour: <span style="color:#40d47e">Còn chỗ </span>
								</p>
								<p style="color:#2980b9;font-size:13px;margin-top: 20px;font-family: Roboto" class="aright">Nếu có thắc mắc hãy gọi cho chúng tôi theo số điện thoại: <?=$home_hotline?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="box_inner" id="personal_info">
						<h3 class="heading">Thông tin người đặt*</h3>
						<form class="form_booking clearfix row" role="form" method="POST">
							<div class="form-group col-md-3">
								<label for="">Họ tên</label>
								<select class="act-input" name="gender" id="gender">
									<option value="Anh">Anh</option>
									<option value="Chị">Chị</option>
								</select>
							</div>
							<div class="form-group col-md-9">
								<label for="name">&nbsp;</label>
								<input type="text" class="act-input" id="name" placeholder="họ tên" name="name" required="">
							</div>
							<div class="form-group col-md-6">
								<label for="email">Email</label>
								<input type="email" class="act-input" id="email" placeholder="email" name="email" required=""/>
							</div>
							<div class="form-group col-md-6">
								<label for="phone">Điện thoại</label>
								<input type="text" class="act-input" id="phone" placeholder="điện thoại" name="phone" required="">
							</div>
							<div class="form-group col-md-12">
								<label for="note">Lời nhắn</label>
								<textarea name="note" id="note" class="act-input" rows="5" placeholder="Số người / Ngày khởi hành / ..."></textarea>
							</div>
							<div class="form-group col-md-12">
								<i>*Thông tin của bạn sẽ được giữ bí mật</i>
							</div>
							<input type="hidden" name="tour_listing_id" id="tour_id" value="<?=@$tour->id?>">
							<input type="hidden" name="tour_listing_name" id="tour_name" value="<?=@$tour->name?>">
							<div class="form-group col-md-12 aright">
								<button type="submit" class="btn btn-readmore" style="color: #fff" id="bookingTour">Đặt tour</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="success_order" tabindex="-1" role="dialog" aria-labelledby="success_order">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Đặt tour thành công</h4>
				</div>
				<div class="modal-body">
					<p>Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal">Đóng lại</button>
				</div>
			</div>
		</div>
	</div>