import {documents} from "./documents";

const recherche = document.getElementById("barrederecherche"); // Barre de recherche
const selections = document.querySelectorAll('.documentations'); // Les éléments à filtrer
recherche.addEventListener('input', function (e) {
    const saisie = e.target.value.trim().toLowerCase();

    selections.forEach(selection => {
        const titre = selection.textContent.trim().toLowerCase(); // Texte du document

        if (saisie.length > 0 && titre.includes(saisie)) {
            selection.style.display = 'block';
        } else if (saisie.length > 0) {
            selection.style.display = 'none';
        } else {
            selection.style.display = 'block';
        }
    });
})