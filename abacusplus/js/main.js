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
const backToTopButton2 = document.getElementById('backToTopmobile');

backToTopButton2.addEventListener('click', function () {
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
    const cards = document.querySelectorAll('.solutions__card');
    const firstCard = cards[0];

    firstCard.classList.add('hover');

    cards.forEach(card => {
        card.addEventListener('mouseenter', function () {
            firstCard.classList.remove('hover');
        });

        card.addEventListener('mouseleave', function () {
            if (!document.querySelector('.solutions__card:hover')) {
                firstCard.classList.add('hover');
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    // Handle tab clicks to filter projects based on related services
    document.querySelectorAll('#projectTabs .nav-link').forEach(tab => {
        tab.addEventListener('click', function (event) {
            event.preventDefault();

            // Get the selected category from the tab's href attribute (e.g., 'all', 'wordpress-websites')
            const selectedCategory = this.getAttribute('href').substring(1);

            // Show/hide project wrappers based on the selected category
            document.querySelectorAll('.project__image__wrapper').forEach(wrapper => {
                if (selectedCategory === 'all' || wrapper.querySelector('.projects__image-item').classList.contains(selectedCategory)) {
                    wrapper.style.display = 'flex'; // Show the wrapper
                } else {
                    wrapper.style.display = 'none'; // Hide the wrapper
                }
            });

            // Set the active class on the selected tab
            document.querySelectorAll('#projectTabs .nav-link').forEach(link => link.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll(".counter");

    // Function to animate counter
    const animateCounter = (counter) => {
        const targetStr = counter.getAttribute("data-target");
        const target = parseInt(targetStr.replace(/[^0-9]/g, '')); // Extract numeric part
        const increment = Math.ceil(target / 100); // Increment for animation speed
        let current = 0;

        const updateCounter = () => {
            current += increment;

            if (current >= target) {
                counter.innerText = targetStr; // Use original text as is (with or without %)
            } else {
                counter.innerText = current + (targetStr.includes('%') ? '%' : ''); // Add '%' only if present in targetStr
                requestAnimationFrame(updateCounter);
            }
        };

        updateCounter();
    };

    // Set up Intersection Observer to trigger counting when in view
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                animateCounter(counter);
                observer.unobserve(counter); // Stop observing once animated
            }
        });
    }, {
        threshold: 0.5 // Trigger when 50% of the element is visible
    });

    // Attach observer to each counter
    counters.forEach(counter => observer.observe(counter));
});

const increment = Math.ceil(target / 500); // Increase for slower animation, decrease for faster
