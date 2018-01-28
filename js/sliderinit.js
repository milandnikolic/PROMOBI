(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';



	    $('.slider').on('init', function(e, slick) {
	        var $firstAnimatingElements = $('div.hero-slide:first-child').find('[data-animation]');
	        doAnimations($firstAnimatingElements);    
	    });
	    $('.slider').on('beforeChange', function(e, slick, currentSlide, nextSlide) {
	              var $animatingElements = $('div.slide-item[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
	              doAnimations($animatingElements);    
	    });
	    $('.slider').slick({
	       autoplay: true,
	       autoplaySpeed: 4000,
	       dots: false,
	       cssEase: 'ease-out',
	       fade: true,
	       prevArrow: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
		   nextArrow: '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
	    });
	    //$('.slick-dots li button').html('<i class="fa fa-circle-o" aria-hidden="true"></i>');
	    function doAnimations(elements) {
	        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
	        elements.each(function() {
	            var $this = $(this);
	            var $animationDelay = $this.data('delay');
	            var $animationType = 'animated ' + $this.data('animation');
	            $this.css({
	                'animation-delay': $animationDelay,
	                '-webkit-animation-delay': $animationDelay
	            });
	            $this.addClass($animationType).one(animationEndEvents, function() {
	                $this.removeClass($animationType);
	            });
	        });
	    }








	    //slider-tutors
		function initSliderYoutube(){
				$('.youtube-slider').slick({
			
				  infinite: true,
				  speed: 300,
				  slidesToShow: 1,
				  adaptiveHeight: true,
				  autoplay: true,
				  autoplaySpeed: 3000,
				  cssEase: 'ease-out',
				  fade: true,
				  prevArrow: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
				  nextArrow: '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
				})
		}
		initSliderYoutube();	

	});
	
})(jQuery, this);
