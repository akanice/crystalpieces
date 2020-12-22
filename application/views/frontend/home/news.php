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
								<a href="<?=@base_url('post/'.$home_news[0]->alias)?>">
									<img src="<?=@base_url($home_news[0]->image)?>" alt="img">
								</a>
							</div>
						</div>
						<div class="blog-title-w">
							<div class="post-prev-title">
								<h3><a href="<?=@base_url('post/'.$home_news[0]->alias)?>"><?=@$home_news[0]->title?></a></h3>
							</div>
							<div class="post-prev-text">
								<?php $des = strip_tags(@$home_news[0]->content); 
											$des = substr($des, 0, 250); 
											echo $des;?>
							</div>
							<!--<div class="tag-in-item">
								<a href="#/" class="tag-item">
									#SWITCH LOW-PROFILE
								</a>
								<a href="#" class="tag-item">
									#SWITCH TOPRE
								</a>
								<a href="#" class="tag-item">
									#Fullsize
								</a>-->
							</div>
						</div>
					</div>
					<!--<div class="blog-item-home wow fadeIn blog-item-odd" style="visibility: visible; animation-name: fadeIn;">
						<div class="blog-image-w">

						</div>
					</div>-->
					<!-- End Feature Article -->
					
					<div class="blog-list-scrollable">
						<div class="com-article-list owl-3-article owl-arrows-bg owl-carousel owl-theme">
							<?php $i=0;$len = count($home_news);
								if ($home_news) foreach ($home_news as $item) { 
								if (($i !== 0) && ($i !== $len - 1)) {
								?>
							<div class="article-item">
								<div class="article-item-content">
									<div class="blog-image-w">
										<a href="<?=base_url('post/'.$item->alias)?>">
											<img src="<?=base_url($item->thumb)?>" alt="img">
										</a>
									</div>
									<div class="blog-title-w">
										<a class="article-title" href="<?=base_url('post/'.$item->alias)?>"><?=@$item->title;?></a>
										<div class="post-excerpt">
											<?php $des = strip_tags(@$item->description); 
												$des = substr($des, 0, 120); 
												echo $des;?>...
										</div>
										<div class="time"><?php echo date_format(date_create($item->create_time),"d/m/Y"); ?></div>
									</div>
								</div>
							</div>
							<?php }$i++;  } ?>
						</div>
					</div>
				</div>
			</div>
		</section>