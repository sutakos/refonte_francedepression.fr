//AFFICHE UNE FOIS EN BAS DE PAGE
window.onscroll = function() {
    afficheBtn(); //VERIFIE A CHAQUE FOIS QUE L'UILISATEUR SCROLL
};

//FONCTION QUI AFFICHE LA FLECHE QUAND ON ARRIVE A 90% DE LA PAGE
function afficheBtn() {
    const btn = document.getElementById("retourHaut");
    const tailleFenetre = window.innerHeight;
    const hauteurPage = document.body.scrollHeight;
    const defilement = window.scrollY + tailleFenetre; //window.scrollY RENVOIE LA DISTANCE EN PX A LAQUELLE L'UTILISATEUR A FAIT DEFILER LA PAGE DEPUIS LE HAUT

    //SI DEFILEMENT >=90%
    if (defilement >= hauteurPage * 0.9) {
        btn.style.display = "block"; //AFFICHE
    } else {
        btn.style.display = "none"; //CHACHE
    }
}

//FONCTION QUE FAIT REMONTER EN HAUT DE LA PAGE
function retourneHaut() {
    window.scrollTo({ top: 0, behavior: 'smooth' }); 
}
