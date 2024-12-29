let slideActuelle = 0;

function defilement(index) {
    const slides = document.querySelectorAll('.carousel-item'); //Prend tous les elements .carousel-item
    if (index >= slides.length) { //Supérieur au nombre d'items
        slideActuelle = 0; //Remet sur la première slide
    }
    else if (index < 0) { //Inferieur au premier item
        slideActuelle = slides.length - 1; //Met sur la denière slide
    }
    else {
        slideActuelle = index;
    }
    const offset = -slideActuelle * 100; //Calcule le decalage de 100%
    document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
}

//ASSOCIE LES EVENEMENTS AUX BOUTONS DU CARROUSEL
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

//FERME LA POPUP APRES NON
function closePopup() {
    const popup = document.getElementById('popup');
    popup.classList.add('hidden'); //Masque la pop-up
}

//ASSOCIE LES EVENEMENTS AUX BOUTONS DU POPUP
document.querySelector('.no-btn').addEventListener('click', closePopup);
