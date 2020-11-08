		<header id="header" class="header header-1 header-style1 fixed-top" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
			<div class="wrap-main container">
				<a class="logo " title="Về trang chủ <?=@base_url()?>" href="/" aria-label="logo">
					<i class="icontgdd-logo"></i>
				</a>
				<form id="search-site" method="GET" action="<?=base_url('/tim-kiem/')?>">
					<input class="topinput" id="search-keyword" name="name" type="text" aria-label="Bạn tìm gì..." placeholder="Bạn tìm gì..." autocomplete="off" value="<?=@$name?>" maxlength="50">
					<button class="btntop form-button" type="submit" aria-label="tìm kiếm"><i class="icontgdd-topsearch"></i></button>
				</form>
				<!--<div class="d-block d-sm-none pull-left">
					<button class="navbar-toggle bt_menusb" type="button" data-target="#ResMenuSB">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>-->
				<nav class="btv-nav">
					<a href="<?=base_url('danh-muc/khoa-van-tay')?>" class="mobile" title="Khóa vân tay">
						<i class="icontgdd-mobile"></i>Khóa vân tay
					</a>
					<a href="<?=base_url('danh-muc/khoa-ma-so')?>" class="tablet" title="Khóa mã số">
						<i class="icontgdd-tablet"></i>Khóa mã số
					</a>
					<a href="<?=base_url('danh-muc/khoa-khach-san')?>" class="gameapp" title="Khóa khách sạn">
						<i class="icontgdd-gameapp"></i>Khóa khách sạn
					</a>
					<a href="<?=base_url('danh-muc/khoa-cua-kinh')?>" class="laptop" title="Khóa cửa kính">
						<i class="icontgdd-laptop"></i>Khóa cửa kính
					</a>
					<a href="<?=base_url('danh-muc/khoa-cua-nhom')?>" class="phukien" title="Khóa cửa nhôm">
						<i class="icontgdd-phukien"></i>Khóa cửa nhôm
					</a>
					<a href="<?=base_url('danh-muc/khoa-cua-truot')?>" class="smartwatch" title="Khóa cửa trượt">
						<i class="icontgdd-watch"></i>Khóa cửa trượt
					</a>
					<a href="<?=base_url('danh-muc/kiem-soat-ra-vao')?>" class="maydoitra" title="Kiểm soát ra vào">
						<i class="icontgdd-maydoitra"></i><span>Kiểm soát ra vào
					</a>
					<a href="<?=base_url('danh-muc/chuong-hinh')?>" class="news" title="Chuông hình">
						<i class="icontgdd-news"></i>Chuông hình
					</a>
					<a href="<?=base_url('danh-muc/khoa-cong-sat')?>" class="ask" title="Khóa cổng sắt">
						<i class="icontgdd-ask"></i>Khóa cổng sắt
					</a>
				</nav>
			</div>
			<div class="clr"></div>
			
			<div class="bg-class">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<nav id="main-nav" class="">
								<div class="toggle-nav">
									<i class="ti-menu-alt"></i>
								</div>
								<ul id="main-menu" class="sm pixelstrap sm-horizontal">
									<li>
										<div class="mobile-back text-right">
											Quay lại<i class="fa fa-angle-right pl-2" aria-hidden="true"></i>
										</div>
									</li>
									<?php foreach($nav_menu as $item) { //print_r($item['id']);die();?>
										<?php if ($item['id'] == 1) {continue;} else {?>
										<li>
											<a href="<?=@base_url($item['slug'])?>" class="has-submenu"><?=@$item['display_name'] ?></a>
											<?php if (isset($item['child']) && ($item['child'] !== array())) {?>
											<ul>
												<?php foreach ($item['child'] as $child) {?>
												<li><a href="<?=@base_url($child['slug'])?>"><?=@$child['display_name'] ?></a></li>
												<?php } ?>
											</ul>
										</li>
									<?php }} } ?>
									
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
			
			<?php 
			// $this->menusmodel->setup_navmenu();
			// $this->multi_menu->set_items($navmenu);
			// echo $this->multi_menu->render(); ?>

			<div class="header-bottom" id="header-bottom">
				<div class="container">
					<div class="clearfix">
						<div class="col-hotline">
							<a href="tel:<?=@$home_hotline?>" class="btn btn-header-hotline"><i class="fa fa-phone"></i> Hotline: <b><?=@$home_hotline?></b> <span class=""><small><i class="fa fa-clock"></i> (24/7)</small></span></a>
						</div>
						<div class="col-features container-fluid">
							<div class="row">
								<div class="d-block d-sm-none col-lg-3 col-md-3 col-sm-2 col-2 vertical_megamenu vertical_megamenu-header pull-left">
									<div class="mega-left-title"><strong></strong></div>
									<div class="vc_wp_custommenu wpb_content_element">
										<div class="wrapper_vertical_menu vertical_megamenu" data-number="9" data-moretext="See More" data-lesstext="See Less">
											<div class="resmenu-container">
												<button class="navbar-toggle bt_menusb" type="button" data-target="#ResMenuSB">
													<span class="sr-only">Toggle navigation</span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3 col-6">
									<div class="d-flex flex-row icon-features">
										<div class="p-2"><img src="/assets/img/icon-sticker.png"></div>
										<div class="p-2">Cam kết<br><b>Chính hãng</b></div>
									</div>
								</div>
								<div class="col-sm-3 col-6">
									<div class="d-flex flex-row icon-features">
										<div class="p-2"><img src="/assets/img/icon-free-shipping.png"></div>
										<div class="p-2">Miễn phí<br><b>Vận chuyển</b></div>
									</div>
								</div>
								<div class="col-sm-3 col-6">
									<div class="d-flex flex-row icon-features">
										<div class="p-2"><img src="/assets/img/icon-repair.png"></div>
										<div class="p-2">Miễn phí<br><b>Lắp đặt</b></div>
									</div>
								</div>
								<div class="col-sm-3 col-6">
									<div class="d-flex flex-row icon-features">
										<div class="p-2"><img src="/assets/img/icon-guarantee.png"></div>
										<div class="p-2">Bảo hành<br><b>Tại nhà</b></div>
									</div>
								</div>
								
							</div>
						</div>
						<!-- Desktop Menu -->
						<div class="d-menu">
							<nav id="d-main-nav" class="desktop-menu ">
								<div class="toggle-nav">
									<i class="ti-menu-alt"></i>
								</div>
								<ul id="d-main-menu" class="sm pixelstrap-2 sm-horizontal">
									<li>
										<div class="mobile-back text-right">
											Quay lại<i class="fa fa-angle-right pl-2" aria-hidden="true"></i>
										</div>
									</li>
									<?php foreach($nav_menu as $item) { //print_r($item['id']);die();?>
										<?php if ($item['id'] == 1) {continue;} else {?>
										<li>
											<a href="<?=@base_url($item['slug'])?>" class="has-submenu"><?=@$item['display_name'] ?></a>
											<?php if (isset($item['child']) && ($item['child'] !== array())) {?>
											<ul>
												<?php foreach ($item['child'] as $child) {?>
												<li><a href="<?=@base_url($child['slug'])?>"><?=@$child['display_name'] ?></a></li>
												<?php } ?>
											</ul>
										</li>
									<?php }} } ?>
									
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>