(function($) {
    "use strict";
  

	$(window).on("load", function() { // makes sure the whole site is loaded

			//isotope setting(portfolio)
			$('.portfolio-body').isotope();
			
			// filter items when filter link is clicked
			$('.port-filter a').on('click', function() {
				var selector = $(this).attr('data-filter');
				$('.portfolio-body').isotope({
					itemSelector: '.port-item',
					filter: selector,
				});
				$(".port-filter a").removeClass("active");
				$(this).addClass("active");
				return false;
			});
    });




})(jQuery);