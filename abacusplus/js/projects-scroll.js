document.addEventListener('DOMContentLoaded', () => {
    const projectWrappers = document.querySelectorAll('.projects__wrapper');
    let currentSectionIndex = 0;
    const totalSections = projectWrappers.length;

    // Initialize GSAP ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);

    // Function to handle scroll and jump to sections
    const handleScroll = (event) => {
        if (event.deltaY > 0) {
            // Scroll down
            currentSectionIndex = Math.min(currentSectionIndex + 1, totalSections - 1);
        } else {
            // Scroll up
            currentSectionIndex = Math.max(currentSectionIndex - 1, 0);
        }

        // Scroll to the current section instantly
        gsap.to(window, {
            scrollTo: { y: projectWrappers[currentSectionIndex], autoKill: false },
            duration: 0.5
        });

        event.preventDefault(); // Prevent default scrolling behavior
    };

    // Add scroll event listener
    window.addEventListener('wheel', handleScroll);

    projectWrappers.forEach((wrapper, index) => {
        // Select the images inside the current wrapper
        const images = wrapper.querySelectorAll('.projects__image-item');

        // Create a timeline for the current wrapper
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: wrapper,
                start: 'top top',  // Pin when the top of the wrapper hits the top of the viewport
                end: '+=100%',      // Adjust this to control the pin length
                pin: true,          // Pin the section
                scrub: false,       // Disable scrub for instant jump
            }
        });


    });
});


