		<div class="telus d-block">
			<div class="block">
				<a onclick="" href="tel:<?=@$home_hotline;?>"><i class="fa fa-phone"></i></a>
			</div>
		</div>
		
		<?php if (@$home_popup->content && @$home_popup->display == 1) {?>
		<div id="info_popup">
			<?=@$home_popup->content;?>
		</div>
		<style>
		#info_popup {display: none;}
		img.cboxPhoto { width:100% !importatnt; }
		</style>
		<?php } ?>
		
		<footer class="block-section" id="footer">
			<div class="container">
				<div id="footer_menu" class="footer_menu  row clearfix">
					<div class="col-sm-6">
						<div class="link-wrap wrapper">
							<?=@$footer_block_1;?>
						</div>
					</div>
					<div class="col-sm-3 col-12">
						<div class="link-wrap wrapper">
							<?=@$footer_block_2;?>
						</div>
					</div>
					<div class="col-sm-3 col-12">
						<div class="link-wrap wrapper">
							<?=@$footer_block_3;?>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-sm-12">						
						<div class="copyright center">
							<h5>© Copyright by sieuthikhoadientu.com 2015</h5>
						</div>
					</div>
				</div>
			</div>
		</footer>
		
	</div>

	<script src="<?=base_url('assets/plugins/owl-carousel/js/owl.carousel.min.js')?>"></script>
	<script src="<?=base_url('assets/plugins/jquery-lazy/jquery.lazy.min.js')?>"></script>
	<script src="<?=base_url('assets/plugins/jquery-lazy/jquery.lazy.plugins.min.js')?>"></script>
	<?php if (@$home_popup->content && @$home_popup->display == 1) {?>
	<script src="<?=base_url('assets/plugins/colorbox/jquery.colorbox.js')?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.3/js.cookie.min.js"></script>
	<script>
		var lastFocus;
		var popupShown = Cookies.get('colorboxShown');

		if (popupShown) {
			console.log("No action necessary");
		} else {
			console.log("No cookie found. Opening popup in 3 seconds");
			$(".clear-cookie").hide();
			setTimeout(function() {
				lastFocus = document.activeElement;
				displayPopup();
				//resizePopup();
			}, <?=@$home_popup->delay_time*1000?>);
		}
		
		$(".close_infopopup").on("click", function() {
			$.colorbox.close();
		});

		function onPopupOpen() {
			$("#info_popup").show();
		}

		function onPopupClose() {
			$("#info_popup").hide();
			Cookies.set('colorboxShown', 'yes', {
				expires: <?=@$home_popup->cookies?>
			});
			$(".clear-cookie").fadeIn();
			lastFocus.focus();
		}

		function displayPopup() {
			// $('#info_popup').colorbox({
				// scalePhotos: true,
				// width: '100%',
				// height: '95%',
				// maxWidth: '600px',
				// onComplete: onPopupOpen,
				// onClosed: onPopupClose
			// });
			$.colorbox({
				inline: true,
				href: "#info_popup",
				// className: "cta",
				scrolling: false,
				width: '100%',
				height: '95%',
				maxWidth: '800px',
				maxHeight: '600px',
				scalePhotos: true,
				onComplete: onPopupOpen,
				onClosed: onPopupClose
			});
		}
	</script>
	<?php } ?>
	<script src="<?=base_url('assets/js/slick.js')?>" type="text/javascript"></script>
	<script src="<?=base_url('assets/js/menu.js')?>" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			var owl_featured_cat = $("#featured_categories_slide");
			owl_featured_cat.owlCarousel({
				loop:true,
				margin:15,
				autoplay: false,
				responsiveClass:true,
				responsive:{
					0:{
						items: 4,
						margin:5,
						stagePadding: 20,
						nav:false,
						dots:false,
					},
					600:{
						items:6,
						nav:true
					},
					1000:{
						items:8,
						nav:false,
						loop: true,
					}
				}
			});
			$('.btn-navright').click(function() {
				owl_featured_cat.trigger('next.owl.carousel', [300]);
			})
			$('.btn-navleft').click(function() {
				owl_featured_cat.trigger('prev.owl.carousel', [300]);
			})
			
			var owl_blog_sliders = $("#home_blog_sliders");
			owl_blog_sliders.owlCarousel({
				loop:true,
				margin:15,
				autoplay: true,
				responsiveClass:true,
				responsive:{
					0:{
						items:1,
						margin:15,
						stagePadding: 45,
						nav:false,
						dots:false,
					},
					600:{
						items:2,
						nav:true
					},
					1000:{
						items:4,
						nav:false,
						loop: true,
					}
				}
			});
			$('.btn-navright').click(function() {
				owl_blog_sliders.trigger('next.owl.carousel', [300]);
			})
			$('.btn-navleft').click(function() {
				owl_blog_sliders.trigger('prev.owl.carousel', [300]);
			})
			
			$("#home_partners_slide").owlCarousel({
				loop:true,
				margin:10,
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
						items:5,
						nav:true
					},
					1000:{
						items:5,
						nav:false,
						loop: true,
						
					}
				}
			});

		});
	</script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<script type="text/javascript" src="<?=base_url('assets/js/script.js')?>"></script>
	<script type="text/javascript">
		site_url = '<?=site_url()?>';
		$(function() {
			$('.vu_lazy-load').Lazy();
		});
		$(document).ready(function () {

			// setTimeout(function() {
				// (function(d, s, id){
					// return;
					// var js, fjs = d.getElementsByTagName(s)[0];
					// if (d.getElementById(id)) {return;}
					// js = d.createElement(s); js.id = id;
					// js.src = "//connect.facebook.net/vi_VN/sdk.js";
					// fjs.parentNode.insertBefore(js, fjs);
				// }(document, 'script', 'facebook-jssdk'));
			// }, 3000);
		});
	</script>
	<?=@$global_footer_code;?>