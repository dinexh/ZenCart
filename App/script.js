let currentSlide = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.slider-img');
    if (index >= slides.length) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = slides.length - 1;
    } else {
        currentSlide = index;
    }
    const offset = -currentSlide * 100;
    document.querySelector('.slider-wrapper').style.transform = `translateX(${offset}%)`;
}

function plusDivs(n) {
    showSlide(currentSlide + n);
}

// Initialize the slider
showSlide(currentSlide);
