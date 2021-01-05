		<div class="content-wrapper-template">
			<div class="page-section product-shop-page mb-shop">
			
				<section class="breadcrumbs">
					<div class="container">
						<div class="bc-content">
							<a href="<?=base_url()?>">Home</a><span class="slash-divider">/</span>
							<?php if (isset($category)) {$space='';?>
								<span>
									<?php foreach ($category as $n) {?>
										<?=$space;?><a class="crumb" href="<?=base_url('category/'.$n->alias)?>"><?=@$n->title?></a>
									<?php $space='<span class="slash-divider">/</span>';} ?>
									<?php } ?>
								</span>
							<span class="slash-divider">/</span>
							<span class="bread-current"><?=@$product_data->title?></span>
						</div>
					</div>
				</section>
				
				<link href="<?=base_url('assets/css/product.css')?>" rel="stylesheet">
				<link href="<?=base_url('assets/plugins/lightbox/css/lightbox.min.css')?>" rel="stylesheet" />
				<script src="<?=base_url('assets/plugins/lightbox/js/lightbox.min.js');?>"></script>
				
				<section class="product-list product-detail">
					<div class="container">
						<div class="row mt-30">
							<!-- Product Features Image -->
							<div class="col-md-6 col-sm-12">
								<?php if (($product_data->gallery) && ($product_data->gallery) == '') {?>
									<img src="<?=@base_url($product_data->image)?>" class="img-holder p_detail_img">
								<?php } else { ?>
								<div class="product-slick">
									<div class="slick-item"><img src="<?=@base_url($product_data->image)?>" alt="" class="img-fluid"></div>
									<?php foreach (json_decode($product_data->gallery) as $item) {?>
									<div class="slick-item">
										<img src="<?=@$item?>" alt="" class="img-fluid">
									</div>
									<?php } ?>
								</div>
								<div class="row">
									<div class="col-md-12 col-12 col-slick">
										<div class="slider-nav">
											<div class="slick-item">
												<img src="<?=@base_url($product_data->image)?>" alt="" class="img-fluid">
											</div>
											<?php foreach (json_decode($product_data->gallery) as $item) {?>
											<div class="slick-item">
												<img src="<?=@$item?>" alt="" class="img-fluid ">
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
							
							<!-- Product Detail -->
							<div class="col-md-6 col-sm-12">
								<div class="row">
									<div class="col-lg-12 product-des">
										<div>
											<h1 class="mt-0 mb-0 product-title-detail-page">
												<?=@$product_data->title?>
											</h1>
										</div>
										<div class="rating rate-star star-5 mb-3"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
										<!--<div><span itemprop="price" class="price hl">
											<h4><del>10.568.000 ₫</del><span>16 % Giảm</span></h4>
										</span></div>-->
										<h2 class="price" id="prod_price">$ <?=@$product_data->price?></h2>
										<div class="border-product">
											<div>
												<h5 class="product-title d-inline">Category: </h5>
												<span>
												<?php if (isset($category)) {$space='';?>
												<?php foreach ($category as $n) {?>
													<?=$space;?><a class="crumb text-bold" href="<?=base_url('category/'.$n->alias)?>"><b><?=@$n->title?></b></a>
												<?php $space='<span class="slash-divider">/</span>';} ?>
												<?php } ?>
												</span>
											</div>
										</div>

										<div class="border-product">
											<h5 class="product-title">Description:</h5>
											<span><?=@$product_data->short_description?></span>
										</div>
										<?php if (@$variant) {?>
										<div class="border-product">
											<h5 class="product-title">Select Variant:</h5>
											<div class="variant clearfix">
												<div class="variant-col">
													<div data-v_title="<?=@$product_data->sku?>" data-v_price="<?=@$product_data->price?>" data-v_id="<?=@$product_data->id?>" data-v_sku="<?=@$product_data->sku?>" style="background-image:url('<?=@base_url($product_data->thumb)?>')" class="variant-item" title="<?=@$product_data->sku?>"></div>
													<div class="variant-text center"><?=@$product_data->sku?></div>
												</div>
												<?php foreach ($variant as $item) {?>
												<div class="variant-col">
													<div data-v_title="<?=@$item->sku?>" data-v_price="<?=@$item->price?>" data-v_id="<?=@$item->id?>" data-v_sku="<?=@$item->sku?>" style="background-image:url('<?=@base_url($item->image)?>')" class="variant-item" title="<?=@$item->sku?>"></div>
													<div class="variant-text center"><?=@$item->sku?></div>
												</div>
												<?php } ?>
											</div>
										</div>
										<?php } ?>
										<div class="product-buy mb-3">
											<div class="first">
												<button type="button" class="btn-order" id="btn_complete_order" data-product_id="<?=@$product_data->id?>" data-product_name="<?=@$product_data->title.'-'.@$product_data->sku?>" data-product_quantity="1" data-product_extra_des="" data-product_thumb="<?=@$product_data->thumb?>" data-product_price="<?=@$product_data->price?>">
													<span>
														Order now
													</span>
												</button>

											</div>
										</div>
										<div class="border-product">
											<h5 class="product-title">Share</h5>
											<div class="product-icon">
												<ul class="product-social">
													<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
													<li><a href="#"><i class="fab fa-twitter"></i></a></li>
													<li><a href="#"><i class="fab fa-instagram"></i></a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							<!-- End Product Grid -->
						</div>
					</div>
				</section>
				
				<section class="product_tabs">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<ul class="nav nav-tabs" id="infoTab" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Overview</a>
									</li>
									<?php if (($product_data->gallery) && ($product_data->gallery) !== '') {?>
									<li class="nav-item" role="presentation">
										<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Photos</a>
									</li>
									<?php } ?>
									<li class="nav-item" role="presentation">
										<a class="nav-link" id="discuss-tab" data-toggle="tab" href="#discuss" role="tab" aria-controls="contact" aria-selected="false">Dicussion</a>
									</li>
								</ul>
								<div class="tab-content" id="infoTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
										<?=@$product_data->description?>
									</div>
									<?php if (($product_data->gallery) && ($product_data->gallery) !== '') {?>
									<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
										<div class="grid-photos row">
											<?php foreach (json_decode($product_data->gallery) as $item) {?>
											<div class="col-6 col-sm-4 col-lg-3 photo-item">
												<a href="<?=@$item?>" data-lightbox="roadtrip"><div class="image" style="background-image:url('<?=@$item?>')"></div></a>
											</div>
											<?php } ?>
										</div>
									</div>
									<?php } ?>
									<div class="tab-pane fade" id="discuss" role="tabpanel" aria-labelledby="discuss-tab">[Coming soon]</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>


	<script type="text/javascript">
		$(document).ready(function () {
			$('.variant-item').click(function() {
				$('.variant-item').removeClass('active');
				$(this).addClass('active');
				var t_price = $(this).data('v_price');
				var t_id 		= $(this).data('v_id');
				var t_sku	= $(this).data('v_sku');
				$('#prod_price').html('$ '+t_price);
				$('#btn_complete_order').data({
					'product_id':t_id,
					'product_price':t_price,
					'product_name': '<?=@$product_data->title?>'+'-'+t_sku
				});
			});
			$('.product-slick').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				fade: true,
				asNavFor: '.slider-nav'
			});
			$('.slider-nav').slick({
				vertical: false,
				slidesToShow: 4,
				slidesToScroll: 1,
				asNavFor: '.product-slick',
				arrows: false,
				dots: false,
				focusOnSelect: true
			});		
			
			$('#btn_complete_order').click(function(e){
				e.preventDefault();
				$(this).attr("disabled", true);
				var product_id = $(this).data("product_id");
				var product_name = $(this).data("product_name");
				var product_extra_des = $(this).data("product_extra_des");
				var product_price = $(this).data("product_price");
				var product_thumb = $(this).data("product_thumb");
				var quantity = $(this).data("product_quantity");
				//$('#product_quantity').val();
				$.ajax({
					url : "<?php echo site_url('ajax/add_to_cart');?>",
					method : "POST",
					data : {product_id: product_id, product_name: product_name, product_price: product_price, quantity: quantity, product_thumb:product_thumb,product_extra_des:product_extra_des},
					success: function(data){
						$('.detail_cart').html(data);
						$('#notice_add_to_cart').show();
						$('#add_to_cart').removeAttr("disabled");
					}
				});
				
				setTimeout(function(){location.href="<?=base_url('dat-hang');?>"} , 300);
			});
			
			$('#btn_add_cart').click(function(e){
				e.preventDefault();
				$(this).attr("disabled", true);
				var product_id = $(this).data("product_id");
				var product_name = $(this).data("product_name");
				var product_extra_des = $(this).data("product_extra_des");
				var product_price = $(this).data("product_price");
				var product_thumb = $(this).data("product_thumb");
				var quantity = $(this).data("product_quantity");
				//$('#product_quantity').val();
				$.ajax({
					url : "<?php echo site_url('ajax/add_to_cart');?>",
					method : "POST",
					data : {product_id: product_id, product_name: product_name, product_price: product_price, quantity: quantity, product_thumb:product_thumb,product_extra_des:product_extra_des},
					success: function(data){
						$('.detail_cart').html(data);
						$('.alert').addClass('show');
					}
				});
				
			});
			
			$("#related_products").owlCarousel({
				loop:true,
					margin:10,
					nav:false,
					autoplay: false,
					responsiveClass:true,
					responsive:{
						0:{
							items:2,
							nav:false,
							dots:false,
							stagePadding: 30,
						},
						600:{
							items:3,
							nav:false
						},
						1000:{
							items:5,
							nav:false,
							loop: true
						}
					}
			});
			

		});
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>