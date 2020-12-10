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
		
		// Increase / Decrease Number
		$('.btn-number').click(function(e){
			e.preventDefault();
			fieldName = $(this).attr('data-field');
			type      = $(this).attr('data-type');
			var input = $("input[name='"+fieldName+"']");
			var currentVal = parseInt(input.val());
			if (!isNaN(currentVal)) {
				if(type == 'minus') {
					if(currentVal > input.attr('min')) {
						input.val(currentVal - 1).change();
						console.log(currentVal);
					} 
					if(parseInt(input.val()) == input.attr('min')) {
						$(this).attr('disabled', true);
					}

				} else if(type == 'plus') {

					if(currentVal < input.attr('max')) {
						input.val(currentVal + 1).change();
						// console.log(currentVal);
					}
					if(parseInt(input.val()) == input.attr('max')) {
						$(this).attr('disabled', true);
					}

				}
			} else {
				input.val(0);
			}
		});
		$('.input-number').focusin(function(){
		   $(this).data('oldValue', $(this).val());
		});
		$('.input-number').change(function() {
			
			minValue =  parseInt($(this).attr('min'));
			maxValue =  parseInt($(this).attr('max'));
			valueCurrent = parseInt($(this).val());
			
			name = $(this).attr('name');
			if(valueCurrent >= minValue) {
				$(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
			} else {
				alert('Sorry, the minimum value was reached');
				$(this).val($(this).data('oldValue'));
			}
			if(valueCurrent <= maxValue) {
				$(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
			} else {
				alert('Sorry, the maximum value was reached');
				$(this).val($(this).data('oldValue'));
			}
		});
		
	});
	
	
	