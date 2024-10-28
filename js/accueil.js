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
    const offset = -slideActuelle * 100; //CALCULE LE DECALAGE
    document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
}

document.querySelector('.carousel-control-next').addEventListener('click', nextSlide);
document.querySelector('.carousel-control-prev').addEventListener('click', prevSlide);

function nextSlide() {
    defilement(slideActuelle + 1);
}

function prevSlide() {
    defilement(slideActuelle - 1);
}

//CHANGE TOUTE LES 5SEC
setInterval(nextSlide, 5000);
