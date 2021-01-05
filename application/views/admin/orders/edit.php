<div class="content">
	<div class="container-fluid">
		<div class="row">
            <div class="col-md-12">
				<div class="card">
					<div class="content">
						<h3 class="page-title">
							Quản lý đơn hàng
						</h3>
						<ul class="breadcrumb">
							<li>
								<a href="<?=base_url('admin')?>">Trang chủ</a>
							</li>
							<li>
								<a href="<?=base_url('admin/orders')?>">Quản lý đơn hàng</a>
							</li>
							<li class="active">
								Cập nhật đơn hàng
							</li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
            </div>
        </div>

		<div class="row">
			<div class="col-md-12 col-lg-8">
				<form class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="card">
						<div class="header">
							<h4 class="title">Cập nhật đơn hàng</h4>
						</div>
						<div class="content">
							<div class="form-group">
								<label class="col-sm-2 control-label">Mã đơn hàng</label>
								<div class="col-sm-10">
									<input type="text" value="<?=@$order->code?>" class="form-control" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Mã giao dịch</label>
								<div class="col-sm-10">
									<input type="text" value="<?=@$transaction->txn_id?>" class="form-control" readonly>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10 col-md-offset-2">
									<table class="table table-striped table-bordered">
										<tr>
											<td>Họ tên</td>
											<td><?=@$order->name?></td>
										</tr>
										<tr>
											<td>Số điện thoại</td>
											<td><a href="tel:<?=@$order->phone?>" class="color_blue"><?=@$order->phone?></a></td>
										</tr>
										<tr>
											<td>Email</td>
											<td><?=@$order->email?></td>
										</tr>
										<tr>
											<td>Địa chỉ</td>
											<td><?=@$order->address?></td>
										</tr>
										<tr>
											<td>Ghi chú</td>
											<td><?=@$order->note?></td>
										</tr>
										<tr>
											<td>Hình thức thanh toán</td>
											<td><?=@$order->payment?></td>
										</tr>
										<tr>
											<td>Ngày đặt hàng</td>
											<td><?=@date('d/m/Y <b>H:i</b>', @$order->create_time)?></td>
										</tr>
										<tr>
											<td>Tổng đơn hàng</td>
											<td class="color_red"><?=number_format(@$order->total_price,0,',','.');?> $</td>
										</tr>
										<tr>
											<td>Chi tiết</td>
											<td>
												<?php if($order_detail) { foreach ($order_detail as $item) {?>
												<p><img src="<?=base_url(@$item->thumb)?>" height="30"> <?=@$item->title?> - <span class="color_blue"><?php if ($item->sale_price && (($item->sale_price != null) or ($item->sale_price != 0))) {
														echo number_format($item->sale_price,0,',','.').' $';
															} else {
																if ($item->price != 0) {
																	echo number_format($item->price,0,',','.').' $';
																} else {
																	echo '0';
																}
														} ?></span> x <?=$item->quantity?> cái</p>
												<?php } } ?>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Trạng thái đơn hàng</label>
								<div class="col-sm-10">
									<select name="status" class="form-control">
										<option value="pending" <?php if($order->status=='pending'){echo 'selected="selected" ';}?>>Mới</option>
										<option value="process" <?php if($order->status=='process'){echo 'selected="selected" ';}?>>Đang xử lý</option>
										<option value="confirmed" <?php if($order->status=='confirmed'){echo 'selected="selected" ';}?>>Đã thanh toán</option>
										<option value="closed" <?php if($order->status=='closed'){echo 'selected="selected" ';}?>>Đóng</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label"></label>
								<div class="col-sm-6">
									<input type="submit" class="btn btn-primary btn-fill btn-wd" name="submit" value="Lưu lại">
									<a href="javascript:window.history.go(-1);" class="btn btn-default btn-fill">Hủy</a>
								</div>
							</div>
						<!-- END FORM-->
						</div>
					</div>
					<!-- END VALIDATION STATES-->
				</form>
			</div>
			
			<div class="col-md-12 col-lg-4">
				 <form method="post" class="form-horizontal" role="form" action="<?= base_url() ?>paypal/refund_payment">
					<div class="card">
						<div class="header">
							<h4 class="title">Cập nhật đơn hàng</h4>
						</div>
						<div class="content">
							<div class="form-group">
								<label class="col-sm-2 control-label">Mã giao dịch</label>
								<div class="col-sm-10">
									<input type="text" value="<?=@$transaction->txn_id?>" class="form-control" name="sale_id" readonly>
									<input type="hidden" value="<?=@base_url('admin/orders/edit/'.$order->id)?>" name="redirect_url">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Số tiền</label>
								<div class="col-sm-3">
									<input type="text" value="<?=@$order->total_price?>" name="refund_amount" class="form-control">
								</div>
								<div class="col-sm-1"><label class="control-label">$</label></div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label"></label>
								<div class="col-sm-6">
									<input type="submit" class="btn btn-primary btn-fill btn-wd" name="refund_form" value="Refund" onclick="return confirm('Bạn có chắc chắn muốn hoàn tiền cho giao dịch này không?')">
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
            <!-- END PAGE CONTAINER-->
        </div>
        <!-- END PAGE -->
    </div>
</div>