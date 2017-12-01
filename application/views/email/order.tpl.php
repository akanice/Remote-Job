<html>
<body>
	<h4>Thông tin khách hàng đặt tour</h4>
	<table cellpadding="0" width="600">
		<tr style="background: #bdc3c7">
			<td style="padding: 10px">Tên</td>
			<td style="padding: 10px"><?php echo $gender.' <strong>'.$name.'</strong>'?></td>
		</tr>
		<tr style="background: #fff">
			<td style="padding: 10px">Email</td>
			<td style="padding: 10px"><?php echo $email ?></td>
		</tr>
		<tr style="background: #bdc3c7">
			<td style="padding: 10px">Số điện thoại</td>
			<td style="padding: 10px"><?php echo $phone ?></td>
		</tr>
		<tr style="background: #fff">
			<td style="padding: 10px">Ghi chú</td>
			<td style="padding: 10px"><?php echo $note ?></td>
		</tr>
		<tr style="background: #bdc3c7">
			<td style="padding: 10px">Tên tour</td>
			<td style="padding: 10px"><?php echo $tour_listing_name ?></td>
		</tr>
		<tr style="background: #fff">
			<td style="padding: 10px">Ngày khởi hành</td>
			<td style="padding: 10px"><?php echo $tour_start_date ?></td>
		</tr>
	</table>

	<p><a href="<?php echo $site_url.'admin/ordertour/ordersDetail/'.$order_id ?>" style="background: #e67e22;padding: 10px 20px;font-size:14px;color:#fff;text-decoration:none; border-bottom:2px solid #d35400;border-radius:3px">Xem chi tiết order</a></p>
</body>
</html>