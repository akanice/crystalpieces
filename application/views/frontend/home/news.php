		<section class="blog-wrapper-bg">
			<div class="blog-wrapper">
				<div class="blog-title">
					<span>Blog</span>
					<span class="text-special" title=" CrystalPieces"> &amp; CrystalPieces</span>
				</div>
				<div class="blog-items-wrapper">
					<!-- Feature Article -->
					<div class="blog-item-home wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
						<div class="blog-image-w">
							<div class="post-prev-img">
								<a href="#/blog/voidwalkers-the-untold-story.html">
									<img src="/assets/img/sample_blog_thumb2.jpg" alt="img">
								</a>
							</div>
						</div>
						<div class="blog-title-w">
							<div class="post-prev-title">
								<h3><a href="#">Sirius Story - From Zero to One</a></h3>
							</div>
							<div class="post-prev-text">
								Tại Việt Nam có hàng trăm thương hiệu bàn phím cơ khác nhau từ giá rẻ đến đắt tiền, từ không đèn nền đến LED RGB, từ sản phẩm bình dân đến thủ công mĩ nghệ. Thị trường có quá nhiều sự lựa chọn vậy mình nên chọn bàn phím cơ nào? Nhu cầu của mình như thế nào? OK, vào vấn đề nhé!
							</div>
							<div class="tag-in-item">
								<a href="#/blog?tag=VOIDWALKER&amp;page=1" class="tag-item">
									#SWITCH LOW-PROFILE
								</a>
								<a href="#/blog?tag=ASTRONAUT&amp;page=1" class="tag-item">
									#SWITCH TOPRE
								</a>
								<a href="#/blog?tag=Artkey&amp;page=1" class="tag-item">
									#Fullsize
								</a>
							</div>
						</div>
					</div>
					<div class="blog-item-home wow fadeIn blog-item-odd" style="visibility: visible; animation-name: fadeIn;">
						<div class="blog-image-w">
							<div class="post-prev-img">
								<a href="#">
									<img src="/assets/img/sample_blog_thumb2.jpg" alt="img">
								</a>
							</div>
						</div>
						<div class="blog-title-w">
							<div class="post-prev-title">
								<h3><a href="#">How to become a pro DF’s collector?</a></h3>
							</div>
							<div class="post-prev-text">
								Tại Việt Nam có hàng trăm thương hiệu bàn phím cơ khác nhau từ giá rẻ đến đắt tiền, từ không đèn nền đến LED RGB, từ sản phẩm bình dân đến thủ công mĩ nghệ. Thị trường có quá nhiều sự lựa chọn vậy mình nên chọn bàn phím cơ nào? Nhu cầu của mình như thế nào? OK, vào vấn đề nhé!
							</div>
							<div class="tag-in-item">
							</div>
						</div>
					</div>
					<!-- End Feature Article -->
					
					<div class="blog-list-scrollable">
						<div class="com-article-list owl-3-article owl-arrows-bg owl-carousel owl-theme">
							<?php if ($home_news) foreach ($home_news as $item) { ?>
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
										<div class="tag-in-item">
											<a href="<?=base_url('bai-viet/'.$item->alias)?>" class="tag-item">
												#crystalpieces
											</a>
											<a href="<?=base_url('bai-viet/'.$item->alias)?>" class="tag-item">
												#chipu
											</a>
											<a href="<?=base_url('bai-viet/'.$item->alias)?>" class="tag-item">
												#quynhanhshin
											</a>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>