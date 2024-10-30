import { AntennesData } from './AntennesData.js'; // Assurez-vous que le chemin est correct

const antenneContainer = document.querySelector('.selecRegion');
const paths = document.querySelectorAll('#map .map_clickable path');


function ajoutElemAvecTexte(tagName, content, className) {
    const element = document.createElement(tagName);
    element.textContent = content;
    element.className = className;
    return element;
}

function ajoutElemAvecImage(src,className){
    const element = document.createElement("img");
    element.src = src;
    if (className)
        element.className = className;
    return element
}

paths.forEach(path => {
    path.addEventListener('click', function() {
        const id = this.id;
        console.log(`Path cliqué: ${id}`);
        const antenne = AntennesData.find(a => a.id === id);
        console.log('Antenne trouvée:', antenne);
        if (this.classList.contains('selectedRegion')){
            this.classList.remove('selectedRegion')
            // Vider le contenu actuel en supprimant toutes les balises
            while (antenneContainer.firstChild) {
                antenneContainer.removeChild(antenneContainer.firstChild);
            }
            antenneContainer.appendChild(ajoutElemAvecTexte('p','Sélectionner une région','default'))
        } else{

            // Enlever la selection de tout les paths
            paths.forEach(p => p.classList.remove('selectedRegion'));

            this.classList.add('selectedRegion')

            // Vider le contenu actuel en supprimant toutes les balises
            while (antenneContainer.firstChild) {
                antenneContainer.removeChild(antenneContainer.firstChild);
            }

            console.log('Contenu actuel vidé.');

            // Créer un nouvel élément <h1> pour le titre
            const titreContainer = document.createElement("div")
            titreContainer.classList.add('titreContainer')
            titreContainer.appendChild(ajoutElemAvecImage('./images/Antennes/Antenne.svg','imageTitre'))
            const titreRegion = ajoutElemAvecTexte('h1', antenne.titre, 'titre');
            titreContainer.appendChild(titreRegion)
            antenneContainer.appendChild(titreContainer);

            // Créer un nouveau paragraphe pour chaque attribut de l'antenne sauf 'id' et 'titre'
            for (const key in antenne) {
                if (key !== 'id'&& key!=='titre') {
                    // Création d'un container
                    const contentContainer = document.createElement("div")
                    contentContainer.classList.add('contentContainer')

                    //Ajout des images au container
                    if (key !== 'tel2'){
                        contentContainer.appendChild(ajoutElemAvecImage(`./images/Antennes/${key}.svg`));
                    }else{
                        contentContainer.appendChild(ajoutElemAvecImage(`./images/Antennes/tel1.svg`));
                    }

                    const content = `${antenne[key]}`; // Formater le contenu
                    const infoRegion = ajoutElemAvecTexte('p', content, 'content'); // Créer un nouvel élément <p> avec la classe "content"
                    contentContainer.appendChild(infoRegion)
                    antenneContainer.appendChild(contentContainer); // Ajouter au container
                    console.log(`Ajout de l'élément: ${content}`);
                }
            }
                const VoirPlus = document.createElement('button');
                VoirPlus.textContent = 'Voir plus';
                VoirPlus.addEventListener('click', () => {
                    // Redirect to the specified URL
                    window.location.href = "https://www.francedepression.fr/index.php/antennes/" + antenne.id;
                });
                antenneContainer.appendChild(VoirPlus)

                smoothScroll()
        }


    });
});


function smoothScroll(){
    document.querySelector('.selecRegion').scrollIntoView({
        behavior: 'smooth', block:"center"
    });
}
