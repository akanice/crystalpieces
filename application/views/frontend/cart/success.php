		<div class="innovatoryBreadcrumb">
			<div class="container">
				<nav data-depth="3" class="breadcrumb hidden-sm-down">
					<ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
						<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
							<a itemprop="item" href="#">
								<span itemprop="name"><i class="fa fa-home"></i></span>
							</a>
							<meta itemprop="position" content="1">
						<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
								<span itemprop="name">Paypal Payment</span>
							<meta itemprop="position" content="3">
						</li>
					</ol>
				</nav>
			</div>
		</div>
		
		<div id="contents" class="main-page category_content cart_info ">
			<div class="container">
				<div class="row clearfix">
					<div class="col-sm-6 col-12 cart-form">
						<div class="jumbotron">
							<h3>Payment success</h3>
							<p>Your payment was successful, thank you for purchase at <b><?=site_url()?></b></p>
							<?php if (isset($paymentID) && ($paymentID !== '')) {?><p>Payment ID: <?=@$paymentID?></p><?php } ?>
							<p><a href="<?=base_url()?>"><i class="fa fa-home"></i> Back to homepage</p>
						</div>
					</div>
			</div>
		</div>