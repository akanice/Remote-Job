<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('admin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?=site_url('admin/orders')?>">Quản lý đơn hàng</a></li>
            <li class="active">Danh sách đơn hàng</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-left: -15px">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-th"></i> Danh sách đơn hàng</h3>
						<div class="pull-right header order_tabs">
							<?php $suffix_uri = $this->uri->segment(2); $suffix_uri3 = $this->uri->segment(3) ?>
							<a href="<?=base_url('admin/orders/show')?>" <?php if ($suffix_uri3 == '') echo 'class="active"'?>>Tất cả</a><span class="divider">/</span>
							<a href="<?=base_url('admin/orders/show/yesterday')?>" <?php if ($suffix_uri3 == 'list_yesterday') echo 'class="active"'?>>Hôm qua</a><span class="divider">/</span>
							<a href="<?=base_url('admin/orders/show/today')?>" <?php if ($suffix_uri3 == 'list_today') echo 'class="active"'?>>Hôm nay</a><span class="divider">/</span>
							<a href="<?=base_url('admin/orders/show/tomorrow')?>" <?php if ($suffix_uri3 == 'list_tomorrow') echo 'class="active"'?>>Ngày mai</a>
						</div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Khách hàng</th>
                                    <th>Ngày tạo</th>
                                    <th>Hẹn khách</th>
                                    <th>Tổng giá trị</th>
                                    <th>Trạng thái đơn</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <form method="GET" action="<?=@$base?>">
                                <tr>
                                    <td></td>
                                    <td><input type="text" class="form-control" placeholder="Tên khách hàng" name="customer" value="<?=@$customer?>"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: center"><button type="submit" class="btn btn-default">Tìm kiếm</button></td>
                                </tr>
                            </form>
                            <tbody>
                            <?php if($list) foreach ($list as $item){ ?>
                                <tr class="odd gradeX">
									<td><?=@$item->id?></td>
									<td><?=@$item->customer_last_name .' '. $item->customer_first_name?></td>
                                    <td><?=@date('d/m/Y <b>H:i</b>', $item->create_date)?></td>
                                    <td><?=@date('d/m/Y <b>H:i</b>', $item->implement_date)?></td>
                                    <td><?=number_format($item->total_price,0,',','.')?> VNĐ</td>
                                    <td><?php 
										switch ($item->status) {
											case 'new':
												echo 'Mới';
												break;
											case 'pending':
												echo 'Đang chờ';
												break;
											case 'confirm':
												echo 'Đã chốt';
												break;
											case 'closed':
												echo 'Đã đóng';
												break;
											default:
												echo 'Mới';
										}
									?></td>
                                    <td style="text-align: center">
                                        <div class="btn-group">
											<button type="button" class="btn btn-primary btn-sm">Action</button>
											<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li><a href="<?=@base_url('admin/orders/view/'.$item->id)?>"><i class="fa fa-print"></i> Xem và in</a>
												<?php if ($item->status != 'closed') { ?>
													<a href="<?=@base_url('admin/orders/updatesale/'.$item->id)?>"><i class="fa fa-print"></i> Thêm giảm giá</a>
												<?php } ?></li>
												<li><?php if (($item->status != 'confirm') && ($item->status != 'closed')) { ?>											
													<a href="<?=@base_url('admin/orders/edit/'.$item->id)?>"><i class="fa fa-pencil"></i> Cập nhật</a>
												<?php } ?></li>
												<li><a href="<?=@base_url('admin/orders/delete/'.$item->id)?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" ><i class="fa fa-trash"></i> Xóa</a></li>
												<li><a href="<?=@base_url('admin/orders/add/'.$item->id)?>"><i class="fa fa-plus"></i> Tạo đơn hàng</a></li>
												<li><?php if (($this->session->userdata('admingroup') == 2) || ($this->session->userdata('admingroup') == 1)) {?>
												<?php	$id_order = $item->id;
														//$user_history = $this->usershistorymodel->getUserHistoryFromOrder($id_order,'assign');
														$user_history = $this->usersmodel->read(array('id'=>$item->staff_care_id),array(),true);
												if (!isset($user_history)||($user_history == '')||($user_history == null)) {?>
													<span id="order_change_<?=$item->id?>">&nbsp;&nbsp;<a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="editOrder(<?=@$item->id?>,'<?=@$item->note?>')"><i class="fa fa-user"></i> Gán đơn hàng</a></span>
												<?php } else {?>
													<span id="order_change_<?=$item->id?>">&nbsp;&nbsp;<a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="editOrder(<?=@$item->id?>,'<?=@$item->note?>')">
														<?=@$user_history->lastname?> <?=@$user_history->firstname?>
													</a></span>
												<?php } } ?></li>
												<li><a href="<?=@base_url('admin/orders/confirm/'.$item->id)?>" onclick="return confirm('Bạn chắc chắn đóng đơn hàng này ?\nĐơn hàng sẽ được chuyển vào danh sách đơn hàng đã hoàn thành.')"><i class="fa fa-print"></i> Hoàn thành</a></li>
											</ul>
										</div>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_bootstrap">
                            <ul class="pagination"><?php echo $page_links?></ul>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
<script type="text/javascript">
    function editOrder(itemId,itemNote){
        $('#orderId').val(itemId);
		$('#order-note').html(itemNote);
        $('#editOrderPopup').modal('show');
        return false;
    }
	
	function delayedOrder(itemId,itemNote) {
		$('#orderId2').val(itemId);
		$('#order-note2').html(itemNote);
        $('#delayedOrderPopup').modal('show');
	}
	var site_url = '<?=site_url();?>';
    function assignOrder(event){
        event.preventDefault();
        var staff_care_id = $('#staff_technique').val();
        var note =  $('#order-note').val();
        var order_id = $('#orderId').val();
        $.ajax({
            type: "POST",
            url: 'ajax/assignOrder',
            data: { staff_care_id : staff_care_id, note : note, order_id: order_id },
            dataType: 'JSON',
            cache: false,
            success: function(result){
                if (result.ok){
                    alert("Bạn đã gán đơn hàng thành công!");
                    $('#editOrderPopup').modal('hide');
					$('#order_change_'+result.item_id).html("<a href=\"javascript:void(0);\" class=\"btn btn-info btn-sm\" onclick=\"editOrder("+result.item_id+",'"+result.item_note+"')\">"+result.staff_lastname + "&nbsp;" + result.staff_firstname+"</a>");
					$('#extra_buttons_'+result.item_id).html("<a href=\""+site_url+"admin/orders/confirm/"+result.item_id+"\" class=\"btn btn-sm bg-maroon\" onclick=\"return confirm('Bạn chắc chắn kết thúc đơn hàng này?')\"><i class=\"fa fa-print\"></i> Chốt đơn</a>&nbsp;" +
						"<a href=\"javascript:void(0);\" class=\"btn btn-sm bg-primary\" onclick=\"delayedOrder("+result.item_id+",'"+result.item_note+"')\"> Báo hoãn</a>");
                }else{
                    alert(result.msg);
                }
            }
        });
    };
	
	function backOrder(event){
        event.preventDefault();
        var note =  $('#order-note2').val();
        var order_id = $('#orderId2').val();
        $.ajax({
            type: "POST",
            url: 'ajax/backOrder',
            data: {note : note, order_id: order_id },
            dataType: 'JSON',
            cache: false,
            success: function(result){
                if (result.ok){
                    alert("Bạn đã báo hoãn đơn hàng thành công!");
                    $('#delayedOrderPopup').modal('hide');
					$('#order_change_'+result.item_id).html('<a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="editOrder(' + result.item_id + ',"' + result.item_note + '")"><i class="fa fa-user"></i> Gán đơn hàng</a>');
					$('#extra_buttons_'+result.item_id).html('');
                }else{
                    alert(result.msg);
                }
            }
        });
    };
</script>
	<div class="modal fade" id="editOrderPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Gán đơn hàng</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="POST" onsubmit="assignOrder(event)">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="staff_technique">Nhân viên kĩ thuật</label>
							<div class="col-sm-9">
								<select class="form-control" id="staff_technique" name="staff_technique" required="">
									<?php foreach ($staff_techniques as $value) {?>
										<option value="<?=$value->id?>"><?=$value->lastname?> <?=$value->firstname?> - <?=$value->phone?></option>
									<?php } ?>
								</select>
								<input type="hidden" name="id" id="orderId2"/>
							</div>
						</div>
						<div class="form-group">
							<label for="reason" class="col-sm-3 control-label">Ghi chú</label>
							<div class="col-sm-9">
								<textarea name="note" class="form-control" rows="5" id="order-note"></textarea>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Lưu lại</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="delayedOrderPopup" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true" style="display: none">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel2">Gán đơn hàng</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="POST" onsubmit="backOrder(event)">
						<div class="form-group">
							<label for="reason" class="col-sm-3 control-label">Ghi chú</label>
							<div class="col-sm-9">
								<textarea name="note" class="form-control" rows="5" id="order-note2"></textarea>
								<input type="hidden" name="id" id="orderId"/>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Lưu lại</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div><!-- ./wrapper -->
<style>
.box .box-header .order_tabs {padding: 7px;}
.box .box-header .order_tabs a {padding: 3px 15px;color: #517282;display:inline-block}
.box .box-header .order_tabs a:hover,.box .box-header .order_tabs a:focus,.box .box-header .order_tabs a.active {color: #0088cc}
.box .box-header .order_tabs a:last-child {border-right:0;}
.divider {color: #ccc;}
</style>