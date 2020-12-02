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
				
				<section class="breadcrumbs">
					<div class="container">
						<div class="com-article-list mode-list list-article-blog row">
							<?php if($news) {foreach ($news as $item) {?>
							<div class="col-sm-3 article-item">
								<div class="article-item-content">
									<div class="blog-image-w">
										<a href="<?=@base_url('post/'.$item->alias)?>">
											<img src="<?=@base_url($item->thumb)?>" alt="img">
										</a>
									</div>
									<div class="blog-title-w">
										<a class="article-title" href="<?=@base_url('post/'.$item->alias)?>"><?=@$item->title?></a>
										<div class="post-excerpt">
											<?=@$item->description?>
										</div>
										<div class="tag-in-item">
										</div>
									</div>
								</div>
							</div>
							<?php }} else {echo 'Chưa có bài viết nào trong mục này';}?>
						</div>
					</section>
				</div>
			</div>
		</div>