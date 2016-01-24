/* Fix iOS 7 bug for -unit support */
var iOS = navigator.userAgent.match(/(iPod|iPhone|iPad)/);
if(iOS){

    function iosVhHeightBug() {
        var height = $(window).height();
        $("#close-box").css('height', height*1.3);
        $(".top-row").css('min-height', height*0.28); // 28vh
        $(".home .middle-row").css('height', height*0.62); // 62vh
        $(".home .middle-row").css('min-height', height*0.62); // 62vh
		$(".bottom-row").css('min-height', height*0.28); // 28vh
		$("#oht-map").css('min-height', height*0.80); // 80vh
    }

    iosVhHeightBug();
    $(window).bind('resize', iosVhHeightBug);
} 

// Check if placeholder
if (!(Modernizr.input.placeholder) ) {
  $('body').addClass('no-placeholder');
}

//__________________ Document ready ___________________
$(document).ready(function(){
	$('body').addClass('loaded');

	 /* Replace svg with png version if not supported */
	if(!Modernizr.svg) {
	    $('img[src*="svg"]').attr('src', function() {
	        return $(this).attr('src').replace('.svg', '.png');
	    });
	}
});