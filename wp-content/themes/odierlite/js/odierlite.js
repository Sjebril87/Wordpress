jQuery(document).ready(function($) {

	"use strict";
	
	$("#owl-demo").owlCarousel({
		navigation : false,
		items : 3,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [980,2],
		itemsTablet: [768,2],
		itemsTabletSmall: [568,1],
		itemsMobile : [479,1],
	});

	// Search
	
	$('#top-search a').on('click', function ( e ) {
		e.preventDefault();
    	$('.show-search').slideToggle('fast');
    });

});