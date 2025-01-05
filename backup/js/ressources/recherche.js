import {documents} from "./documents";

const recherche = document.getElementById("barrederecherche"); // Barre de recherche
const selections = document.querySelectorAll('.documentations'); // Les éléments à filtrer
console.log(recherche);
console.log(selections);
recherche.addEventListener('input', function (e) {
    const saisie = e.target.value.trim().toLowerCase();
    console.log('Saisie:', saisie); // Affiche ce que l'utilisateur a saisi

    selections.forEach(selection => {
        const titre = selection.textContent.trim().toLowerCase(); // Texte du document
        console.log('Titre:', titre); // Affiche le titre de chaque élément

        if (saisie.length > 0 && titre.includes(saisie)) {
            selection.style.display = 'block';
        } else if (saisie.length > 0) {
            selection.style.display = 'none';
        } else {
            selection.style.display = 'block';
        }
    });
})