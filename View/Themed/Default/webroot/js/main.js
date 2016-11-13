$(document).ready(function(){

    $('#main-banner .owl-carousel').owlCarousel({

        singleItem: true,

        navigation: true,

        slideSpeed: 300,
        autoPlay : true,

        rewindSpeed: 1,

        navigationText: ['<i class="fa fa-angle-left fa-2x"></i>', '<i class="fa fa-angle-right fa-2x"></i>'],

        pagination: false

    });

    $('.gallery-wrap').owlCarousel({

        items: 4,

        navigation: true,

        pagination: false,

        navigationText: ['<i class="fa fa-angle-left fa-2x"></i>', '<i class="fa fa-angle-right fa-2x"></i>'],

        autoPlay: false

    });

    $('.testimonial').owlCarousel({

        singleItem: true,

        navigation: true,

        pagination: false,

        navigationText: ['<i class="fa fa-angle-left fa-2x"></i>', '<i class="fa fa-angle-right fa-2x"></i>'],

        autoPlay: false,

        autoHeight: true

    });

});



$(document).scroll(function(){

    var scroll = $(document).scrollTop();

    if(scroll >= 665) {

        $('#top-header').css('background-color', 'rgba(0,0,0,0.6)');

    } else {

        $('#top-header').css('background-color', 'rgba(0,0,0,0.3)');

    }

})