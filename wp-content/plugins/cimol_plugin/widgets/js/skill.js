(function($) {
    "use strict";


    $(window).on("load", function() { // makes sure the whole site is loaded

		//skill progress bar
		$('.progress .progress-bar').waypoint(function(direction) {
			$('.progress .progress-bar').each(function() {
				$('.progress .progress-bar').css("width",
					function() {
						return $(this).attr("aria-valuenow") + "%";
					}
				)
			});
		}, {
			offset: 'bottom-in-view',
			triggerOnce: true
		});

		
    });


})(jQuery);