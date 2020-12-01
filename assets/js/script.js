	$(document).ready(function () {			
		$(".owl-3-article").owlCarousel({
			loop:true,
				margin:15,
				nav:false,
				autoplay: false,
				responsiveClass:true,
				responsive:{
					0:{
						items:1,
						nav:false,
						dots:false,
						stagePadding: 30,
					},
					600:{
						items:4,
						nav:false
					},
					1000:{
						items:4,
						nav:false,
						loop: true
					}
				}
		});
		$(".owl-2-article").owlCarousel({
			loop:true,
				margin:15,
				nav:false,
				autoplay: false,
				responsiveClass:true,
				responsive:{
					0:{
						items:1,
						nav:false,
						dots:false,
						stagePadding: 30,
					},
					600:{
						items:3,
						nav:false
					},
					1000:{
						items:3,
						nav:false,
						loop: true
					}
				}
		});
	});