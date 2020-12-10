			<div class="sale-schedule-wapper">
				<div class="container">
					<div class="row mt-20 products-w">
						<?php $i=0;
						if ($mostviewed) foreach ($mostviewed as $item) {
							$cat_array = json_decode($item->categoryid);
							$cat_title = $this->productscategorymodel->read(array('id'=>$cat_array[0]),array(),true)->alias;
						?>
						<div class="col-6 col-lg-3 col-xs-6 item-product">
							<div class="astra-shop-thumbnail-wrap">
								<a href="<?=base_url('product/'.$item->alias)?>" class="woocommerce-loop-product__link text-center">
									<div class="container-image-and-badge">
										<img src="<?=base_url($item->thumb)?>" alt="img" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail loaded">
										<div class="wrapper-yith-wcbm-badge-custom">
											<span class="yith-wcbm-badge-custom up-coming">HOT</span>
										</div>
									</div>
								</a>
								<div class="thumb-summary-wrapper">
									<div class="post-prev-title text-overflow-ellipsis">
										<a class="a-inv artkey-product-title" href="<?=base_url('product/'.$item->alias)?>">
											<div><?=@$item->title?></div>
										</a>
										<div class="thumb-summary-wrapper-product-serial-name">
											<?=@$cat_title?>
										</div>
									</div>
									<div class="shop-price-cont text-left artkey-product-price">
										<strong><?=@number_format($item->price,0,',','.')?> $</strong>
									</div>
								</div>
							</div>
						</div>
						<?php $i++;} ?>
						
					</div><!-- End Recent Products-->
				</div><!-- End Recent Products-->
				
				<div class="all-product">
					<div class="row">
						<div class="col-12">
							<div class="sale-schedule-wapper style2">
								<div class="sale-items-wrapper">
								<div class="sale-item go-to-shop">
									<div class="wrapper-link-go-to-shop">
										<a class="item-gt-shop" href="<?=base_url('shop')?>">
											<span>Our Products</span>
											<span class="arrow-right">
												<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 34.4" style="enable-background:new 0 0 150 34.4;" xml:space="preserve">
													<style type="text/css">
														.st0 {
															fill-rule: evenodd;
															clip-rule: evenodd;
														}
													</style>
													<path class="st0" d="M0,18.5h144.6l-12.9,11.9v3.2L150,17.5L131.7,1.3v3.2l12.9,11.9H0V18.5z"></path>
												</svg>
											</span> <span class="long-arrow-right">
												<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 306.8 34.4" style="enable-background:new 0 0 306.8 34.4;" xml:space="preserve">
													<style type="text/css">
														.st0 {
															fill-rule: evenodd;
															clip-rule: evenodd;
														}
													</style>
													<path class="st0" d="M-0.2,18.5h301.6l-12.9,11.9v3.2l18.3-16.1L288.5,1.3v3.2l12.9,11.9H-0.2V18.5z"></path>
												</svg>
											</span> </a>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="container">					
					<div class="sale-title">
						<span>Upcoming</span>
						<span class="text-special" title="Product">Product</span>
					</div>
					<div class="sale-items-wrapper upcoming-product">
						<div class="ucm-item-home wow fadeIn row">
							<div class="ucm-image-w col-12 col-sm-5 col-lg-6">
								<div class="ucm-prev-img">
									<a href="#">
										<img src="/assets/img/sample_blog_thumb2.jpg" alt="img">
									</a>
								</div>
							</div>
							<div class="ucm-title-w col-12 col-sm-7 col-lg-6">
								<div class="ucm-prev-title">
									<h3><a href="#">Sirius Story - From Zero to One</a></h3>
								</div>
								<div class="ucm-prev-text">
									<div class="sale-right">
										<div class="sale-right-top">
											<div class="item-title">Alien &amp; Predator</div>
											<div>Material: Saphire</div>
											<div>Amount: 20 keycaps</div>
											<div><span class="raffle-date">Schedule: </span>09:00 AM - Ngày 11/11/2020</div>
										</div>
										<div class="sale-right-bottom">
											<button class="btn-notify-me btn-yellow-outline" product-id="1236">Pre-order</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>