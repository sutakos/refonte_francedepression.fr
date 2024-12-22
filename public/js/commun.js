//AFFICHE UNE FOIS EN BAS DE PAGE
window.onscroll = function() {
    afficheBtn(); //VERIFIE A CHAQUE FOIS QUE L'UILISATEUR SCROLL
};

//FONCTION QUI AFFICHE LA FLECHE QUAND ON ARRIVE A 90% DE LA PAGE
function afficheBtn() {
    const btn = document.getElementById('retourHaut');
    const tailleFenetre = window.innerHeight;
    const hauteurPage = document.body.scrollHeight;
    const defilement = window.scrollY + tailleFenetre; //window.scrollY RENVOIE LA DISTANCE EN PX A LAQUELLE L'UTILISATEUR A FAIT DEFILER LA PAGE DEPUIS LE HAUT

    //SI DEFILEMENT >=90% ET LARGEUR DE LA FENETRE >600
    if (defilement >= hauteurPage * 0.73 && window.innerWidth > 600) {
        btn.style.display = "block"; //AFFICHE
    } else {
        btn.style.display = "none"; //CHACHE
    }
}

//FONCTION QUE FAIT REMONTER EN HAUT DE LA PAGE
function retourneHaut() {
    window.scrollTo({ top: 0, behavior: 'smooth' }); 
}

document.querySelector('#retourHaut').addEventListener('click',retourneHaut);

/* RESPONSIVE */

const sidenav = document.getElementById("mySidenav");
const openBtn = document.getElementById("openBtn");
const closeBtn = document.getElementById("closeBtn");

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;

function openNav() {
    sidenav.classList.add("active");
}


function closeNav() {
    sidenav.classList.remove("active");
}



// FONCTION POUR AFFICHER/CACHER LES SOUS-MENUS
function toggleDropdown(dropdownId) {
    const dropdown = document.getElementById(dropdownId);
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
}

// AJOUT DE L'EVENEMENT AU CLIC POUR "L'ASSOCIATION" MENU BURGER
document.getElementById('toggleDropdown').addEventListener('click', function(e) {
    e.preventDefault(); // Empêche le lien de naviguer
    toggleDropdown('dropBurger');
});
