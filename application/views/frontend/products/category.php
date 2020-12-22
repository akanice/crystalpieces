		<div class="content-wrapper-template">
			<div class="page-section product-shop-page mb-shop">
				<section class="breadcrumbs">
					<div class="container">
						<div class="bc-content">
							<a href="<?=base_url()?>">Home</a><span class="slash-divider">/</span>
							<span class="bread-current"><?=@$category_data->title?></span>
						</div>
					</div>
				</section>
				
				<section class="product-list">
					<div class="container">
						<div class="row mt-30">
							<div class="col-sm-12 col-md-3 artkey-desktop-visible">

								<div>
									<form class="form-search widget-search-form" action="https://artkeyuniverse.com/shop" method="get">
										<input type="text" name="q" value="" class="input-search-widget" placeholder="Search">
										<button class="" type="submit" title="Start Search">
											<span aria-hidden="true" class="icon_search"></span>
										</button>
									</form>
								</div>

								<div class="widget artkey-category-wrapper">
									<h5 class="widget-title" style="color: #ffffff">CATEGORIES</h5>
									<div class="widget-body">
										<div class="product-category-right-menu">
											<ul>
												<?php foreach ($categories as $item) { $current = $this->uri->segment(2);?>
												<li><a href="<?=@base_url('category/'.$item->alias)?>" class="<?php if ($item->alias == $current) {echo 'active';}?>"><?=@$item->title?></a></li>
												<?php } ?>
											</ul>
										</div>
									</div>
								</div>
							</div>
							
							<!-- Product Grid -->
							<div class="col-md-9 col-sm-12">
								<div class="row">
									<div class="col-lg-12">
										<div style="display: flex; justify-content: space-between;">
											<span class="shop-title-page"><?=@$category_data->title?></span>

										</div>
									</div>
								</div>
								<div class="row mt-20 products-w">
									<?php if ($products) { foreach ($products as $item) { ?>
									<div class="col-6 col-lg-4 col-xs-6 item-product"><!-- Product ID 1-->
										<div class="astra-shop-thumbnail-wrap">
											<a href="<?=base_url('product/'.$item->alias)?>" class="woocommerce-loop-product__link text-center">
												<div class="container-image-and-badge">
													<img src="<?=base_url($item->thumb)?>" alt="img" width="300" height="300" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail loaded">
													<div class="wrapper-yith-wcbm-badge-custom">
														<div class="yith-wcbm-badge-custom event-end">HOT</div>
													</div>
												</div>
											</a>
											<div class="thumb-summary-wrapper">
												<div class="post-prev-title text-overflow-ellipsis">
													<a class="a-inv artkey-product-title" href="#">
														<div><?=@$item->title?></div>
													</a>
													<div class="thumb-summary-wrapper-product-serial-name">
														<?=@$category_data->title?>
													</div>
												</div>
												<div class="shop-price-cont artkey-product-price">
													<strong>$ <?=@number_format($item->price,0,'.',',')?></strong>
												</div>
											</div>
										</div>
									</div>
									<?php }} ?>
									
									
									
								</div>
								
								<!-- Pagination 
								<div class="paging-com pagination">
									<?php echo $page_links;?>
									<a class="page-prev" onclick="return false;" style="cursor: default; margin-right: 10px;">
										<i class="fa fa-angle-left"></i>
									</a>
									<a href="https://artkeyuniverse.com/shop?page=1" class="page-page my-selected">
										<span>1</span>
									</a>
									<a href="https://artkeyuniverse.com/shop?page=2" class="page-page ">
										<span>2</span>
									</a>
								</div>
								 End Pagination -->
							</div>
							<!-- End Product Grid -->
						</div>
					</div>
				</section>
			</div>
		</div>