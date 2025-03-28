document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.slide');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    let currentSlide = 0;
    
    // Mostrar slide inicial
    slides[currentSlide].classList.add('active');
    
    // Función para cambiar de slide
    function changeSlide(n) {
        slides[currentSlide].classList.remove('active');
        currentSlide = (n + slides.length) % slides.length;
        slides[currentSlide].classList.add('active');
    }
    
    // Event listeners para los botones
    prevBtn.addEventListener('click', () => changeSlide(currentSlide - 1));
    nextBtn.addEventListener('click', () => changeSlide(currentSlide + 1));
    
    // Cambio automático cada 5 segundos
    setInterval(() => changeSlide(currentSlide + 1), 5000);
});