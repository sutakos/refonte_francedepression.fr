let slideActuelle = 0;

function defilement(index) {
    const slides = document.querySelectorAll('.carousel-item');
    if (index >= slides.length) {
        slideActuelle = 0;
    } else if (index < 0) {
        slideActuelle = slides.length - 1;
    } else {
        slideActuelle = index;
    }
    const offset = -slideActuelle * 100; //calcule le décalage
    document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
    defilement(slideActuelle + 1);
}

function prevSlide() {
    defilement(slideActuelle - 1);
}

//pour changer d'image toutes les 5 secondes
setInterval(nextSlide, 5000);
