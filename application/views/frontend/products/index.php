			<section class="breadcrumb-section prod_cat_page section-b-space section-t-space" style="background-image: url('/assets/uploads/images/categories/bg_home_slider_2.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat; display: block;">>
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="page-title">
								<h2>Showroom</h2>
							</div>
						</div>
						<div class="col-12">
							<nav aria-label="breadcrumb" class="theme-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Trang chủ</a></li>
									<li class="breadcrumb-item active" aria-current="page">Tất cả sản phẩm</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</section>	
			
			<section id="featured_categories" class="block-section it_category_feature product_page"><!-- section feature categories -->
				<div class="container">
					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="itCategoryFeature owl-carousel owl-theme" id="featured_categories_slide">
								<?php if ($categories) foreach ($categories as $item) {?>
								<div class="item-inner first_item">
									<a href="<?=@base_url('danh-muc/'.$item->alias)?>">
										<div class="item">
											<img src="<?=@base_url($item->thumb)?>" class="img-holder">
											<h5 class="center"><?=@$item->title?></h5>
										</div>
									</a>
								</div>
								<?php } ?>
							</div>
							<div class="btn-owl-group">
								<div class="btn-navleft navbtn"><i class="fa fa-angle-left"></i></div>
								<div class="btn-navright navbtn"><i class="fa fa-angle-right"></i></div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<section class="section-b-space ratio_square">
				<div class="collection-wrapper">
					<div class="container">
						<div class="row">
							<div class="collection-content col">
								<div class="page-main-content">
									<div class="row">
										<div class="col-sm-12">
											<div class="collection-product-wrapper">
												<div class="product-top-filter">
													<div class="container-fluid p-0">
														<div class="row">
															<div class="col-12">
																<div class="product-filter-content">
																	<div class="search-count">
																		<h5>Danh sách sản phẩm tại ESINC</h5>
																	</div>
																	<div class="product-page-per-view">
																		
																	</div>
																	<div class="product-page-filter">
																		
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="product-wrapper-grid">
													<div class="row">
														<?php if ($products) { foreach ($products as $item) { ?>
														<div class="col-xl-3 col-6 col-grid-box">
															<div class="product-box">
																<div class="img-block">
																	<a href="<?=base_url('san-pham/'.$item->alias)?>" class="bg-size" style="background-image: url('<?=base_url($item->thumb)?>'); background-size: contain; background-position: center center; background-repeat: no-repeat; display: block;"></a>
																</div>
																<div class="product-info product-content">
																	<a href="<?=base_url('san-pham/'.$item->alias)?>">
																		<h6><?=@$item->title?></h6>
																	</a>
																	<div class="item-price">
																		<span itemprop="price" class="price amount">
																		<?php if ($item->sale_price && (($item->sale_price != null) or ($item->sale_price != 0))) {
																				echo '<h5>'.number_format($item->sale_price,0,',','.').' đ</h5>';
																					} else {
																						if ($item->price != 0) {
																							echo '<h5>'.number_format($item->price,0,',','.').'</h5>';
																						} else {
																							echo 'Liên hệ';
																						}
																				} ?>
																	</span>
																	<?php if ($item->sale_price && (($item->sale_price != null) or ($item->sale_price != 0))) {?><span class="old-price regular-price"><?=@number_format($item->price,0,',','.')?> đ</span><?php } ?>
																	</div>
																</div>
															</div>
														</div>
														<?php }} else {echo 'Chưa có sản phẩm nào trong mục này';}?>
													</div>
												</div>
												
												<div class="product-pagination mb-0">
													<div class="theme-paggination-block">
														<div class="container-fluid p-0">
															<div class="row">
																<div class="col-sm-12 d-flex justify-content-end">
																	<nav class="kabu-navigation Page navigation">
																		<ul class="pagination">
																			<?php echo $page_links;?>
																		</ul>
																	</nav>
																</div>
															</div>
														</div>
													</div>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>										
				</div>
			</section>