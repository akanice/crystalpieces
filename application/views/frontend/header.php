		<div class="grey-bg">
			<div class="header-transporent-bg-black">
				<header id="nav" class="header header-1  black-header no-transparent mobile-no-transparent header-com affix-top">
					<div class="bg-header-opacity"></div>
					<div class="header-wrapper">
						<div class="container-m-30 clearfix">
							<div class="logo-row">
								<div class="logo-container-2 header-logo-container">
									<div class="logo-2">
										<a href="<?=base_url()?>" class="clearfix">
											<img src="/assets/img/logo_main.png" class="logo-img" alt="Logo">
										</a>
									</div>
								</div>
								<div class="menu-btn-respons-container menu-btn-container">
									<button type="button" class="navbar-toggle btn-navbar collapsed" data-toggle="collapse" data-target="#main-menu .navbar-collapse">
										<span aria-hidden="true" class="icon_menu hamb-mob-icon"></span>
									</button>
								</div>
							</div>
							<div class="logo-row-mobile">
								<div>
									<button type="button" class="hamburger-button" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false">
										<span class="line-1"></span>
										<span class="line-2"></span>
										<span class="line-3"></span>
									</button>
								</div>
								<div class="wrapper-logo">
									<a href="<?=base_url()?>" class="header-logo-link-mobile">
										<img src="/assets/img/logo_main.png" alt="Logo">
									</a>
								</div>
								<span></span>
							</div>
						</div>
						<div class="main-menu-container">
							<div class="container-m-30 clearfix">
								<div id="main-menu" class="header-menu-container">
									<div class="dp-navbar navbar navbar-expand-lg" role="navigation">
										<nav id="mynavbar" class="collapse collapsing navbar-collapse right-1024">
											<ul class="nav navbar-nav header-menu-container-nav">
												<li class="">
													<a href="<?=base_url('#')?>">
														<div class="main-menu-title">ABOUT US</div>
													</a>
												</li>
												<li class="parent parent-shop" >
													<a href="#">
														<div class="main-menu-title">PRODUCT <span class="arrow-down-small more-link-icon"></span></div>
														<span class="open-sub"></span>
													</a>
													<ul class="sub">
														<li class="">
															<a href="<?=base_url('shop')?>">
																<div class="main-menu-title">SHOP</div>
															</a>
														</li>
														<li class="">
															<a href="#">
																<div class="main-menu-title">
																	COMMISSION
																</div>
															</a>
														</li>
													</ul>
												</li>
												<!--<li class="">
													<a href="#">
														<div class="main-menu-title">CATALOGUE</div>
													</a>
												</li>-->
												<li class="">
													<a href="<?=base_url('blog')?>">
														<div class="main-menu-title">BLOG</div>
													</a>
												</li>
												<li class="parent">
													<a href="#">
														<div class="main-menu-title">SUPPORT <span class="arrow-down-small more-link-icon"></span></div>
														<span class="open-sub"></span>
													</a>
													<ul class="sub">
														<li class=""><a href="#">FAQ</a></li>
														<li class=""><a href="#">CONTACT</a></li>
													</ul>
												</li>
												
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>

						<div class="shoping-buttons shopping-buttons-container">
							<div class="dropdown">
								<div class="shopping-buttons-container-right">
									<button class="btn-cart dropdown-toggle btn-cart-artkey" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<div class="main-menu-title wrapper-cart-number">
											<img src="https://artkeyuniverse.com/images/icon/shopping-cart.svg" class="svg-small mr-4">
											<span>
												<span class="text-cart-number">Cart (</span>
												<span id="mini-cart-total" class="number-item-in-cart"><?php echo $this->cart->total_items();?></span>
												<span class="text-cart-number">)</span>
											</span>
										</div>
									</button>
									<div class="dropdown-menu dropdown-menu-right widget_shopping_cart menu-background" aria-labelledby="dropdownMenuButton">
										<img src="/assets/img/close.png" class="close-icon-shopping-cart">
										<ul class="cart_product_list_widget">
											<li class="mini_cart_item">
												<table class="table table-striped" id="tblCart">
													<tbody>
													</tbody>
												</table>
											</li>
										</ul>
										<p class="product-total text-right"><strong>Subtotal: </strong><span id="spTotal">$<?=number_format($this->cart->total(),0,',','.')?></span></p>
										<p class="text-right">
											<a href="<?=base_url('cart')?>" class="w-100-767 mb-10 btn-yellow">CHECKOUT</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</header>
			</div>
        </div>
		<!-- End Header -->