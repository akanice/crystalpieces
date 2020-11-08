		<!--<section id="slider" class="block-section sw-category-slider">
			<div class="clearfix">
				<div id="home_slider" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php $n = $number_slider; for ($i = 0; $i < $n; $i++) { ?>
							<li data-target="#home_slider" data-slide-to="<?php echo $i;?>" class="<?php if ($i == '0') {echo 'active';}?>"></li>
						<?php } ?>
					</ol>
					<div class="carousel-inner">
						<?php 
							if (!empty($slider)) {
							foreach ($slider as $item) { 
								$item_id[] = $item->id;
							}
							$min_value = min($item_id);
						?>
						<?php foreach ($slider as $item) { ?>
						<div class="carousel-item <?php if ($item->id == $min_value) {echo 'active';}?>">
							<a href="<?=$item->link?>"><img src="<?=base_url($item->image)?>" alt="<?=$item->name?>" class="img-holder d-block w-100"></a>
						</div>
						<?php } } ?>
					</div>
					<a class="carousel-control-prev" href="#home_slider" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#home_slider" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</section>-->
		
		<section id="slider" class="block-section sw-category-slider sc-nopd">
			<div class="container">
				<aside class="homebanner">
					<div id="home_slider" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<?php 
								if (!empty($slider)) {
								foreach ($slider as $item) { 
									$item_id[] = $item->id;
								}
								$min_value = min($item_id);
							?>
							<?php foreach ($slider as $item) { ?>
							<div class="carousel-item item <?php if ($item->id == $min_value) {echo 'active';}?>">
								<a href="<?=$item->link?>"><img src="<?=base_url($item->image)?>" alt="<?=$item->name?>" class="img-holder d-block w-100"  width="800" height="300"></a>
							</div>
							<?php } } ?>
						</div>
						<a class="carousel-control-prev" href="#home_slider" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#home_slider" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</aside>
				
				<aside class="homenews d-none d-sm-block">
					<div class="twobanner">
						<div class="hotnews-block">
							<a href="<?=base_url('chuyen-muc/kien-thuc-nha-bep')?>" class="title"><h3>Bài viết nổi bật</h3></a>
							<ul>
								<?php if ($hot_news) foreach ($hot_news as $item) { ?>
									<li>
										<a href="<?=base_url('bai-viet/'.$item->alias)?>" class="title">
											<i class="fa fa-angle-right"></i> <?=$item->title?>
										</a>
									</li>
								<?php } ?>
							</ul>
						</div>
						<a href="<?=@$group_banners[1]->link?>"><img style="cursor:pointer" src="<?=@$group_banners[1]->image?>" alt="Bep Thanh Vinh Banner" width="398" height="110"></a>
						<a href="<?=@$group_banners[2]->link?>"><img style="cursor:pointer" src="<?=@$group_banners[2]->image?>" alt="Bep Thanh Vinh Banner" width="398" height="110"></a>
				</aside>
				<div class="clr"></div>
			</div>
		</section>
		
		<section class="sc-nopd home-horizontal-banner">
			<div class="container">
				<div class="cat-banners">
					<a href="<?=@$group_banners[3]->link?>"><img style="cursor:pointer" src="<?=@$group_banners[3]->image?>" alt="Bep Thanh Vinh Banner" class="img-holder"></a>
				</div>
			</div>
		</section>