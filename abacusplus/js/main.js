jQuery(document).ready(function ($) {
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

    $('.testimonials__arrow--left').on('click', function () {
        $('.testimonials__slider').slick('slickPrev'); // Go to the previous slide
    });

    $('.testimonials__arrow--right').on('click', function () {
        $('.testimonials__slider').slick('slickNext'); // Go to the next slide
    });
});

const backToTopButton = document.getElementById('backToTop');

backToTopButton.addEventListener('click', function () {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const questionWrappers = document.querySelectorAll('.faq__question-wrapper');

    questionWrappers[0].classList.add('active');

    questionWrappers.forEach(wrapper => {
        const question = wrapper.querySelector('.faq__question');

        question.addEventListener('click', function () {
            if (wrapper.classList.contains('active')) {
                wrapper.classList.remove('active');
            } else {
                questionWrappers.forEach(w => w.classList.remove('active'));

                wrapper.classList.add('active');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const mobileFaqWrapper = document.querySelector('.faq__wrapper_mobile');

    if (mobileFaqWrapper) {
        const mobileQuestionWrappers = mobileFaqWrapper.querySelectorAll('.faq__question-wrapper');

        if (mobileQuestionWrappers.length > 0) {
            const firstWrapper = mobileQuestionWrappers[0];
            firstWrapper.classList.add('active');
        }

        mobileQuestionWrappers.forEach(wrapper => {
            const question = wrapper.querySelector('.faq__question');
            const collapseElement = document.querySelector(question.getAttribute('data-bs-target'));

            collapseElement.addEventListener('shown.bs.collapse', function () {
                wrapper.classList.add('active');
            });

            collapseElement.addEventListener('hidden.bs.collapse', function () {
                wrapper.classList.remove('active');
            });

            question.addEventListener('click', function () {
            });
        });
    }
});






document.addEventListener('DOMContentLoaded', function () {
    const projectItems = document.querySelectorAll('.projects__image-item');

    projectItems.forEach(function (item) {
        const hoverImage = item.getAttribute('data-hover-image');
        const originalImage = item.style.backgroundImage;


        if (hoverImage && originalImage) {

            item.addEventListener('mouseover', function () {
                item.style.backgroundImage = `url(${hoverImage})`;
            });

            item.addEventListener('mouseout', function () {
                item.style.backgroundImage = originalImage;
            });
        }
    });
});

