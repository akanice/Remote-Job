$(window).scroll(function() {
    if ($(".nano-navbar").offset().top > 50) {
        $(".nano-navbar").addClass("top-nav-collapse");
    } else {
        $(".nano-navbar").removeClass("top-nav-collapse");
    }
});

$(document).ready(function() {
	//smooth scroll to anchor
	$(".scroll").click(function(event){
		event.preventDefault();
		//calculate destination place
		var dest=0;
		if($(this.hash).offset().top > $(document).height()-$(window).height()){
			dest=$(document).height()-$(window).height()-100;
		}else{
			dest=$(this.hash).offset().top-100;
		}
	//go to destination
	$('html,body').animate({scrollTop:dest}, 1000,'swing');
	});

	$("#maichauNav").affix({
		offset: { 
			//top: ($("#slideshow").outerHeight() + 30)
			top: ($('#header-top').height() + $('#logo-wrapper').height() + 150)
		}
	});
	
	var tab_content_tour_height_top = $('#header-top').height() + $('#logo-wrapper').height() + $('.breadcrumbs').height() + 30 + $('h1.tour-heading').height() + 20 + $('.tour-cover').height() + 25;
	var tab_content_tour_height_bottom = $('#related-tour').outerHeight() + $('.promo-banner').outerHeight() + $('footer').outerHeight() + 200;

	$("#tab-content-tour").affix({
		offset: { 
			//top: ($("#slideshow").outerHeight() + 30)
			top: tab_content_tour_height_top,
			bottom: tab_content_tour_height_bottom,
		}
	})
	
	//Owl Carousel
	
	$("li.dropdown").hover(function() {
			$(this).toggleClass('open');
	});
	$(".owl-next").click(function(){
		owl.trigger('owl.next');
	})
	$(".owl-prev").click(function(){
		owl.trigger('owl.prev');
	})	
	
	$('#tab-content-tour li').click(function() {
		$('#tab-content-tour li').removeClass('active');
		$(this).addClass('active');
	})

	
	$('.dropdown').on('show.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
  });

  // ADD SLIDEUP ANIMATION TO DROPDOWN //
  $('.dropdown').on('hide.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
  });
}); 

	
	