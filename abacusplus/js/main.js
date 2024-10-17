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

// Get the button element by its ID
const backToTopButton = document.getElementById('backToTop');

// Add an event listener for the click event
backToTopButton.addEventListener('click', function () {
    // Smooth scroll back to the top of the page
    window.scrollTo({
        top: 0,
        behavior: 'smooth'  // This makes the scrolling smooth
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const questionWrappers = document.querySelectorAll('.faq__question-wrapper');

    // Initialize the first question as active
    questionWrappers[0].classList.add('active');

    questionWrappers.forEach(wrapper => {
        const question = wrapper.querySelector('.faq__question');
        const answerId = question.getAttribute('data-bs-target');

        question.addEventListener('click', function () {
            // Remove active class from all wrappers
            questionWrappers.forEach(w => w.classList.remove('active'));

            // Add active class to the clicked wrapper
            wrapper.classList.add('active');
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const projectItems = document.querySelectorAll('.projects__image-item');

    projectItems.forEach(function (item) {
        const hoverImage = item.getAttribute('data-hover-image');  // Get hover image URL
        const originalImage = item.style.backgroundImage; // Store the original background image

        // Ensure both images are set correctly
        if (hoverImage && originalImage) {
            // Change to hover image on mouseover
            item.addEventListener('mouseover', function () {
                item.style.backgroundImage = `url(${hoverImage})`;
            });

            // Revert back to original image on mouseout
            item.addEventListener('mouseout', function () {
                item.style.backgroundImage = originalImage;
            });
        }
    });
});

