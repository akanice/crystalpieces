		<div class="content-wrapper-template main-page cart_info">
			<div class="page-section product-shop-page mb-shop">
			
				<section class="breadcrumbs">
					<div class="container">
						<div class="bc-content">
							<a href="https://artkeyuniverse.com">Home</a><span class="slash-divider">/</span>
							<span class="bread-current">Shop</span>
						</div>
					</div>
				</section>
				
				<link href="<?=base_url('assets/css/product.css')?>" rel="stylesheet">
		
				<section class="cart-inner">
					<div class="container">
						<div class="row clearfix">
						<?php if($total_items > 0) { ?>
							<div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12 cart-form">
								<div class="cart-total">
								<div class="inner">
										<?php
											$total_amount = 0;
											foreach($carts as $row) {
											$total_amount = $total_amount + $row['subtotal'];
										?>
										<div class="row clearfix">
											<div class="col-sm-2 col-8 col-order1"><img src="<?=@base_url($row['thumb']); ?>" class="img-holder"></div>
											<div class="col-sm-7 col-12 col col-order2">
												<h5 class="name"><b><?=@$row['name'];?></b></h5>
												<div class="extra-des">
													<?=@$row['extra_des'];?>
												</div>
											</div>
											<div class="col-sm-3 col-4 pull-right col-order3"><span class="price">$ <?=number_format($row['price'], 0, '.', ',');?></span></div>
										</div>
										<?php } ?>
										<div class="row clearfix last-row">
											<div class="col-sm-9 col-6 col"><h5 class="name align-right">Total:</h5></div>
											<div class="col-sm-3 col-6 pull-right"><span class="total-price price">$ <?=number_format($total_amount, 0, '.', ',');?></span></div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-md-12">
										<div class="content">
											<h3 class="page-title">Order Information: </h3>
											<form class="form-order form-horizontal" method="POST" action="#">
												<div class="form-row">
													<div class="form-group col-sm-6">
														<input type="text" class="form-control" id="f_name" name="f_name" placeholder="Full name*">
													</div>
													<div class="form-group col-sm-6">
														<input type="text" class="form-control col" id="f_phone" name="f_phone" placeholder="Your Email*">
													</div>
												</div>
												<div class="form-group">
													<textarea class="form-control" id="f_note" name="f_note" placeholder="Note:" rows="5"></textarea>
												</div>
												
												<button type="submit" name="submit" class="btn btn-buy_now btn-full">Hoàn tất đặt hàng</button>
												<small class="form-text text-muted text-center">Nhân viên của chúng tôi sẽ xác nhận lại với bạn qua điện thoại sau khi nhận được thông tin đơn hàng.</small>
											</form>
										</div>
									</div>
									<div class="col-md-6">
									</div>
								</div>
							</div>
							
							<?php } else { ?>
							<div class="col-sm-12">
								<h4 class = "text-success">Không có sản phẩm nào trong giỏ hàng</h4>
							</div>
							<?php } ?>
						</div>
					</div>
				</section>
			</div>
		</div>