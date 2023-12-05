document.addEventListener('DOMContentLoaded', function() {
    gsap.from(".intro", { opacity: 0, y: 50, duration: 1, delay: 0.5 });

    // Animation de survol pour les compétences
    gsap.from(".skills li", { opacity: 0, x: -50, stagger: 0.2, duration: 0.8, delay: 1 });

    // Animation de survol pour les projets
    gsap.from(".projects", { opacity: 0, y: 30, duration: 1, delay: 1.5 });

    // Animation de survol pour la page de blog
    gsap.from(".blog-post", { opacity: 0, y: 30, stagger: 0.2, duration: 1, delay: 1 });

    gsap.from('.logo', { opacity: 0, duration: 1, delay: 0.5, y: -30, ease: 'power2.out' });
    gsap.from('.nav-list li', { opacity: 0, duration: 1, delay: 0.8, stagger: 0.2, ease: 'power2.out' });


    document.addEventListener("scroll", function() {
        const elements = document.querySelectorAll(".scroll-animation");

        elements.forEach(element => {
            if (isElementInViewport(element)) {
                gsap.to(element, { opacity: 1, y: 0, duration: 0.8, ease: "power2.out" });
            }
        });
    });
});

function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

