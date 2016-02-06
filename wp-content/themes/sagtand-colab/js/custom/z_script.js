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


    // init Isotope
    $( function() {
    // quick search regex
    var qsRegex;
    var buttonFilter;

    // init Isotope
    var $container = $('.isotope').isotope({
        itemSelector: '.element-item',
        layoutMode: 'masonry',
        filter: function() {
            var $this = $(this);
            var searchResult = qsRegex ? $this.text().match( qsRegex ) : true;
            var buttonResult = buttonFilter ? $this.is( buttonFilter ) : true;
            return searchResult && buttonResult;
        }
    });

    // $('#filters').on( 'click', 'button', function() {
    //     buttonFilter = $( this ).attr('data-filter');
    //     $container.isotope();
    //     if ($( this ).attr('data-filter') == '*') {
    //         $('#quicksearch').val('');
    //         $container.isotope();
    //     }
    // });

    // use value of search field to filter
    var $quicksearch = $('#quicksearch').keyup( debounce( function() {
        qsRegex = new RegExp( $quicksearch.val(), 'gi' );
        $container.isotope();
    }) );


    // change is-checked class on buttons
    $('.button-group').each( function( i, buttonGroup ) {
        var $buttonGroup = $( buttonGroup );
        $buttonGroup.on( 'click', 'button', function() {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $( this ).addClass('is-checked');
        });
    });


    });

    // debounce so filtering doesn't happen every millisecond
    function debounce( fn, threshold ) {
        var timeout;
        return function debounced() {
            if ( timeout ) {
                clearTimeout( timeout );
            }
            function delayed() {
                fn();
                timeout = null;
            }
            setTimeout( delayed, threshold || 100 );
        };
    }



});