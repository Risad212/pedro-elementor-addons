const animatedElement = document.querySelector(".scroll-item");
const section = document.querySelector(".scroll-container"); // Target section

window.addEventListener("scroll", () => {
    let sectionTop = section.offsetTop; // Section start position
    let sectionHeight = section.offsetHeight; // Section height
    let scrollY = window.scrollY;
    
    if (scrollY > sectionTop - window.innerHeight && scrollY < sectionTop + sectionHeight) {
        // Calculate scroll progress (0% to 100%)
        let progress = (scrollY - (sectionTop - window.innerHeight)) / (sectionHeight + window.innerHeight);
        
        // Map progress to movement (200px up to 0px)
        let moveY = -200 + (progress * 200);

        // Apply transformation
        animatedElement.style.transform = `translateY(${moveY}px)`;
    }
});
