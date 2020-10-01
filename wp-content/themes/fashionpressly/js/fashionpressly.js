jQuery(document).ready(function($) {
	
	$(window).scroll(function() {
		var distanceFromTop = $(this).scrollTop();
		if (distanceFromTop >= $('.main-navigation').height()) {
			$('.main-navigation').addClass('nav-fixed');
		} else {
			$('.main-navigation').removeClass('nav-fixed');
		}
	});

})