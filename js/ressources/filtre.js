import {documents} from "./documents.js";

const section = document.querySelector('.documentations')
const dropdownMenu = document.querySelector('#dropdownMenuButton')
const options = document.querySelectorAll('.dropdown-menu')
const checkboxes = document.querySelectorAll('.options input')

/* bouton filtre */
options.forEach(option => {
    option.style.visibility = 'hidden';
});

dropdownMenu.addEventListener('click',afficherFiltre)

function afficherFiltre(){
   if(dropdownMenu.value === "desactive"){
       dropdownMenu.value = "active"
       options.forEach(option => {
           option.style.visibility = 'hidden';
       })
   } else {
       dropdownMenu.value = "desactive"
       options.forEach(option => {
           option.style.visibility = 'visible';
       })
   }
}

/* checkboxes options */
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('click',afficherDoc)
})

function afficherDoc() {
    /* récupération des valeurs des options */
    const selectedValues = [];
    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            selectedValues.push(checkbox.value);
        }
    });

    /* visibilité des documents */
    const selections = document.querySelectorAll('.document');

    if (selectedValues.length === 0) { // si rien sélectionné -> tous les docs affichés
        selections.forEach(selection => {
            selection.style.visibility = 'visible';
        });
        return;
    }

    selections.forEach(selection => { // tout cacher
        selection.style.visibility = 'hidden';

        documents.forEach(docu => {
            let trouver = false;

            docu.etiquettes.forEach(etiquette => {
                if (selectedValues.includes(etiquette)) {
                    trouver = true;
                }
            });

            if (trouver) { // affichage du document
                const documentElements = []
                selections.forEach(selection=> {
                if(selection.textContent.includes(docu.title))
                    documentElements.push(selection);
                });
                documentElements.forEach(element => {
                    element.style.visibility = 'visible';

                    section.prepend(element); // mettre en premier l'élément sélectionné
                });
            }
        });
    })
}