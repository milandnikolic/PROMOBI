(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		//animations for menu
		$('.menu-item-has-children').hover(function() {
			  $(this).find('.sub-menu').stop(true, true).addClass('animated fadeInDownBig');
			}, function() {
			  $(this).find('.sub-menu').stop(true, true).removeClass('animated fadeInDownBig');
		});


		//bottom to top
		$(window).scroll(function() {
			if ($(this).scrollTop() >= 50) {        
				$('#return-to-top').fadeIn(200);    
			} else {
				$('#return-to-top').fadeOut(200);   
			}
		});
		$('#return-to-top').click(function() {      
			$('body,html').animate({
				scrollTop : 0                      
			}, 500);
		});


		//create sticky nav
		$(window).scroll(function() {
				 
			if ($(this).scrollTop() > 0){  
				$('.header').addClass("sticky");
			}
			else{
				$('.header').removeClass("sticky");
			}
		});


		// header search
		$('.header .fa-search').click(function(){
			$('#header-search').addClass("show");			
		});
		
		$('#header-search .fa-times').click(function(){
			$('#header-search').removeClass("show");	
		});


		//smooth scroll on same page
		$(".btn.query-banner a.bg-yellow").click(function(e) {
			 e.preventDefault();
   			
	      $('html, body').animate({
	        scrollTop: $(".manufacturer-query-service").offset().top - 165
	      }, 2000);
	    });

		$(".tosamsung").click(function(e) {
			 e.preventDefault();
   			
	      $('html, body').animate({
	        scrollTop: $("#wrapper-yellow-samsung").offset().top - 15
	      }, 2000);
	    });
//counter on scroll
/*var a = 0;
$(window).scroll(function() {

  var oTop = $('#home-banner1').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.numberStat').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 4000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
           
          }

        });
    });
    a = 1;
  }

});*/

		$('.numberStat').each(function () {

				var timeStart = 0;
				$(this).prop('Counter',timeStart).animate({
					Counter: $(this).text()
				}, {
					duration: 4000,
					easing: 'swing',
					step: function (now) {
						$(this).text(Math.ceil(now));
					}
				});
		});
	

		// mobile menu
		$(".fa-bars").click(function(){
		    $(".header nav").toggleClass('open');
		    $(".nav > ul").toggleClass('open');
		    $(".header .h-phones").toggleClass('open');
		    $(".header .h-btns").toggleClass('open');
		    $(".header").toggleClass('scrolable');
		});
		$(".menu-item-has-children").click(function(){
		   $(this).find(".sub-menu").toggleClass('sub-open');
		});



		//copy title name in input field
		$(".default-custom input").val($(".cover-img h1").text());
		$(".default-custom input").prop('readonly', 'readonly');

/**
 * TinyMCE buttons for custom shortcodes
 */
/*( function() {
	tinymce.create( 'tinymce.plugins.PilauSample', {
		init: function( ed, url ) {
			ed.addButton( 'pilau-sample', {
				title: 'Insert Sample',
				image: url + '/img/tinymce-sample.png',
				onclick: function() {
					text = prompt( "Enter text", "" );
					ed.execCommand( 'mceInsertContent', false, '[pilau-sample text="' + text + '"]' );
				}
			});
		},
		createControl: function( n, cm ) { return null; },
	});
	tinymce.PluginManager.add( 'pilau-sample', tinymce.plugins.PilauSample );
})();*/



// Filter and query samsung displays
var usedNames = {};
$("select#model > option").each(function () {
    if(usedNames[this.text]) {
        $(this).remove();
    } else {
        usedNames[this.text] = this.value;
    }
});




$("select#model").on('change', function () {
    $('.selected-value').html($(this).find('option:selected').text());

 

    var firstValue = $(this).find('option:selected').val();

 $("#oznaka option").removeClass("filterit");
 //var filteredValues = $("#oznaka option:contains('" + firstValue + "')").addClass("filterit");

 $( '#oznaka [class="' + firstValue + '"]').addClass( "filterit" );



});


$("select#oznaka").on('change', function () {

	  $('.selected-value-oznaka').html($(this).find('option:selected').text());
	  	
});


$("select#oznaka").on('change',function(){
   if(($(this).find('option:selected').text()!="Izaberite boju") && ($("select#model").find('option:selected').text()!="Izaberite vaš telefon")){
   			$("#find-price").on('click', function () {
		
	
			var textOne =  $('.selected-value').text();
			var textTwo =  $('.selected-value-oznaka').text();
			
			var mergedValue =  textOne + textTwo;
			mergedValue = mergedValue.replace(/  +/g, ' ');

			$("#prikazicenu li").removeClass("prikazise");

			var provera = $("#prikazicenu li:contains('" + mergedValue + "')").addClass("prikazise");

			
		});
   }
 
});
		/*	
		$("#find-price").on('click', function () {
		
	
			var textOne =  $('.selected-value').text();
			var textTwo =  $('.selected-value-oznaka').text();
			
			var mergedValue =  textOne + textTwo;
			mergedValue = mergedValue.replace(/  +/g, ' ');

			$("#prikazicenu li").removeClass("prikazise");

			var provera = $("#prikazicenu li:contains('" + mergedValue + "')").addClass("prikazise");

			
		});*/

		$("#find-price").on('click', function () {
			if ($('.prikazise')[0]) {
			    $('.info-out').hide();
			} else {
			  $('.info-out').show();
			}
		});
	  

	});
	
})(jQuery, this);
