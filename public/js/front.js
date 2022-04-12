$(function () {

    /* ======================================
        DESTINATIONS SLIDER
    ======================================= */
    $('.destinations-slider').owlCarousel({
        items: 1,
        center: true,
        loop: true,
        nav: true,
        dots: false,
        mouseDrag: false,
        margin: 10,
        stagePadding: 50,
        navText: ['<svg class="svg-icon align-middle"><use xlink:href="#arrow-left-1"> </use></svg> <span class="align-middle">Prev</span', '<span class="align-middle">Next</span ><svg class="svg-icon align-middle"><use xlink:href="#arrow-right-1"> </use></svg>'],
        responsive: {
            551: {
                items: 2
            },
            991: {
                items: 3
            },
            1200: {
                items: 4,
                stagePadding: 80,
            },
            1700: {
                items: 5,
                stagePadding: 80,
            }
        }
    });

    /* ======================================
        SPONSORS SLIDER
    ======================================= */
    $('.sponsors-slider').owlCarousel({
        items: 3,
        loop: true,
        nav: false,
        dots: false,
        margin: 10,
        autoplay: true,
        responsive: {
            551: {
                items: 4
            },
            991: {
                items: 5
            },
            1200: {
                items: 8
            }
        }
    });


});
