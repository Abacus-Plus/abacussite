jQuery(document).ready(function ($) {
    // Initialize the slick slider
    $('.testimonials__slider').slick({
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3,
        infinite: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                centerPadding: '20px'
            }
        },
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                centerPadding: '30px'
            }
        }
        ]
    });

    // Add click event for the custom left arrow
    $('.testimonials__arrow--left').on('click', function () {
        $('.testimonials__slider').slick('slickPrev'); // Go to the previous slide
    });

    // Add click event for the custom right arrow
    $('.testimonials__arrow--right').on('click', function () {
        $('.testimonials__slider').slick('slickNext'); // Go to the next slide
    });
});