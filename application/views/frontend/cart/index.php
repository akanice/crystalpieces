		<div class="content-wrapper-template main-page cart_info">
			<div class="page-section product-shop-page mb-shop">
			
				<section class="breadcrumbs">
					<div class="container">
						<div class="bc-content">
							<a href="https://artkeyuniverse.com">Home</a><span class="slash-divider">/</span>
							<span class="bread-current">Cart</span>
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
											<div class="col-sm-3 col-8 col-order1"><img src="<?=@base_url($row['thumb']); ?>" class="img-holder"></div>
											<div class="col-sm-6 col-12 col col-order2">
												<h4 class="name"><b><?=@$row['name'];?></b></h4>
												<div class="extra-des">
													<?=@$row['extra_des'];?>
												</div>
											</div>
											<div class="col-sm-3 col-4 pull-right col-order3"><span class="price">$ <?=number_format($row['price'], 0, '.', ',');?></span></div>
										</div>
										<?php } ?>
										<div class="row clearfix last-row">
											<div class="col-sm-9 col-6 col"><h5 class="total name align-right">Total:</h5></div>
											<div class="col-sm-3 col-6 pull-right"><span class="total-price price">$ <?=number_format($total_amount, 0, '.', ',');?></span></div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-md-12">
										<div class="content">
											<h3 class="page-title">Order Information: </h3>
											<form class="form-order form-horizontal" method="POST" action="<?= base_url('paypal/create_payment_with_paypal') ?>">
												<div class="form-row">
													<div class="form-group col-sm-6">
														<input type="text" class="form-control" id="f_name" name="f_name" placeholder="Full name*">
													</div>
													<div class="form-group col-sm-6">
														<input type="text" class="form-control col" id="f_email" name="f_email" placeholder="Your Email*">
													</div>
													<div class="form-group col-sm-12">
														<input type="text" class="form-control col" id="f_phone" name="f_phone" placeholder="Phone*">
													</div>
													<div class="form-group col-sm-12">
														<input type="text" class="form-control col" id="item_address" name="item_address" placeholder="Shipping Address*">
													</div>
												</div>
												<div class="form-group">
													<textarea class="form-control" id="f_note" name="f_note" placeholder="Note:" rows="5"></textarea>
												</div>
												<?php
													$total_amount = 0;
													foreach($carts as $row) {
													$n=1;$total_amount = $total_amount + $row['subtotal'];
												?>
												<input title="payment_type" name="payment_type" type="hidden" value="paypal">
												<input title="item_name" name="item_name" type="hidden" value="<?=@$row['name'];?>">
												<input title="item_number" name="item_number" type="hidden" value="<?=@$row['id'];?>">
												<input title="item_description" name="item_description" type="hidden" value="<?=@$row['extra_des'];?>">
												<input title="item_tax" name="item_tax" type="hidden" value="0">
												<input title="item_price" name="item_price" type="hidden" value="<?=@$row['price'];?>">
												<input title="details_tax" name="details_tax" type="hidden" value="0">
												<input title="details_subtotal" name="details_subtotal" type="hidden" value="<?=@$total_amount;?>">
												<?php } ?>
												<button type="submit" name="submit" class="btn btn-buy_now btn-full"><i class="fab fa-paypal"></i> Paynow with Paypal</button>
												<small class="form-text text-muted text-center"></small>
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