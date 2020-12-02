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
							<span class="bread-current"><?=@$new_data->title?></span>
						</div>
					</div>
				</section>
				
				<section class="main-page category_content blog_grid_list">
					<div class="container">
						<div class="row clearfix">
							<div class="col-md-8 offset-md-2 blog-page blog-detail">
								<div class="inner">
									<h1 class="title"><?=@$new_data->title?></h1>
									<div class="blog-date"><small><i class="fa fa-calendar"></i> Publish date: <?php echo date_format(date_create($new_data->create_time),"d/m/Y"); ?></small></div>
									<?php if ($new_data->thumb != '') {?><div class="blog-thumb" style="background-image:url(<?=base_url($new_data->image);?>)"></div><?php }?>
									
									<div class="">
										<div class="content">
											<?=@$new_data->content?>
										</div>
									</div>
								</div>
								<div class="inner related_articles">
									<div class="block-title-widget">
										<h2><span>Bài viết liên quan</span></h2>
									</div>
									<div class="blog-list-scrollable">
										<div class="com-article-list owl-2-article owl-arrows-bg owl-carousel owl-theme">
											<?php if ($news_sidebar) foreach ($news_sidebar as $item) { ?>
											<div class="article-item">
												<div class="article-item-content">
													<div class="blog-image-w">
														<a href="<?=base_url('bai-viet/'.$item->alias)?>">
															<img src="<?=base_url($item->thumb)?>" alt="img">
														</a>
													</div>
													<div class="blog-title-w">
														<a class="article-title" href="<?=base_url('bai-viet/'.$item->alias)?>"><?=@$item->title;?></a>
														<div class="post-excerpt">
															<?=$item->description?>
														</div>
														<div class="time"><?php echo date_format(date_create($item->create_time),"d/m/Y"); ?></div>
													</div>
												</div>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>