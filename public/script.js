// Animation des sections lors du défilement
window.addEventListener('scroll', function() {
    const elements = document.querySelectorAll('.feature-item, .hero, .testimonials');
    elements.forEach(element => {
        if (element.getBoundingClientRect().top < window.innerHeight - 150) {
            element.classList.add('animate');
        }
    });
});

// Ajouter une classe pour l'animation de défilement
document.querySelectorAll('.feature-item, .hero, .testimonials').forEach(element => {
    element.classList.add('hidden');
});

// Lorsque la page est complètement chargée, retirer la classe 'hidden'
window.onload = () => {
    setTimeout(() => {
        document.querySelectorAll('.feature-item, .hero, .testimonials').forEach(element => {
            element.classList.remove('hidden');
        });
    }, 500);
};

// Animation de défilement (CSS)
