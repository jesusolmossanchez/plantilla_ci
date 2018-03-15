(function() {

    html_structure_events ();

}());


function html_structure_events () {
    calcule_sizes();
    $( window ).resize(function() {
      calcule_sizes();
    });
}

function calcule_sizes() {

}


$(document).ready(function() {
    global_events();
    menu_events();

    if ($('body').hasClass('home')) {
        home_events();
    }

});

function global_events() {

}

function menu_events() {

}

function home_events() {

    /* SWIPEBOX
    $('.swipebox').swipebox({
        useCSS : true, // false will force the use of jQuery for animations
        useSVG : false, // false to force the use of png for buttons
        initialIndexOnArray : 0, // which image index to init when a array is passed
        hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
        removeBarsOnMobile : false, // false will show top bar on mobile devices
        hideBarsDelay : 0, // delay before hiding bars on desktop
        videoMaxWidth : 1140, // videos max width
        beforeOpen: function() {}, // called before opening
        afterOpen: null, // called after opening
        afterClose: function() {}, // called after closing
        loopAtEnd: false // true will return to the first image after the last image is reached
    });
    */

    /* ISOTOPE

    onAnimationFinished = function(){
        var elems = $grid.isotope('getFilteredItemElements');
        $(".grid-item").attr("rel","");
        for (var i = 0; i < elems.length; i++) {
            $(elems[i]).attr("rel","trololo");
        }

    };

    var $grid = $('.grid').imagesLoaded( function() {
      // init Isotope after all images have loaded
        $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-sizer'
            }
        });
        $grid.isotope( 'on', 'layoutComplete', onAnimationFinished ); 
    });

    */


    /* SLICK
    $('#slide_resultados').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<span id="izq_slide_resultados" class="nav_slide izq_slide"></span>',
        nextArrow: '<span id="der_slide_resultados" class="nav_slide der_slide"></span>',
        responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            }
        ]
    });
    */
    
}


