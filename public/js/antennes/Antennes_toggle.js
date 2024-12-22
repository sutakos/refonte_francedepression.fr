import { AntennesData } from './AntennesData.js'; // Récupération des data sur les atennes

// Création des variables qui contient les régions séléectionnables
const antenneContainer = document.querySelector('.selecRegion');
const paths = document.querySelectorAll('#map .map_clickable path');

// Fonction ajoutant les informations des Antennes
function ajoutElemAvecTexte(tagName, content, className) {
    const element = document.createElement(tagName);
    element.textContent = content;
    element.className = className;
    return element;
}

// Fonction ajoutant les images dans les informations des Antennes
function ajoutElemAvecImage(src,className){
    const element = document.createElement("img");
    element.src = src;
    if (className)
        element.className = className;
    return element
}

// Pour tout les paths : Mettre un event click permettant d'afficher les info de l'antennes ET de colorer le path de la couleur hover
paths.forEach(path => {
    path.addEventListener('click', function() {
        const id = this.id;
        console.log(`Path cliqué: ${id}`);
        const antenne = AntennesData.find(a => a.id === id);
        console.log('Antenne trouvée:', antenne);
        // Si la région sélectionnée a déjà été sélectionnée alors enlever la sélection
        if (this.classList.contains('selectedRegion')){
            this.classList.remove('selectedRegion')
            // Vider les informations actuellement affichée
            while (antenneContainer.firstChild) {
                antenneContainer.removeChild(antenneContainer.firstChild);
            }
            antenneContainer.appendChild(ajoutElemAvecTexte('p','Sélectionner une région','default'))
            
        } 
        // Sinon la sélectionner
        else{

            // Enlever la selection de tout les paths
            paths.forEach(p => p.classList.remove('selectedRegion'));

            this.classList.add('selectedRegion')

            // Vider les informations actuellement affichée
            while (antenneContainer.firstChild) {
                antenneContainer.removeChild(antenneContainer.firstChild);
            }

            console.log('Contenu actuel vidé.');

            // Créer un nouvel élément <h1> pour le titre
            const titreContainer = document.createElement("div")
            titreContainer.classList.add('titreContainer')
            titreContainer.appendChild(ajoutElemAvecImage('../images/Antennes/Antenne.svg','imageTitre'))
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
                        contentContainer.appendChild(ajoutElemAvecImage(`../images/Antennes/${key}.svg`));
                    }else{
                        contentContainer.appendChild(ajoutElemAvecImage(`../images/Antennes/tel1.svg`));
                    }

                    const content = `${antenne[key]}`; // Attribut de l'antenne dans "content"
                    const infoRegion = ajoutElemAvecTexte('p', content, 'content'); // Créer un nouvel élément <p> avec la classe "content"
                    contentContainer.appendChild(infoRegion)
                    antenneContainer.appendChild(contentContainer); // Ajouter au container
                    console.log(`Ajout de l'élément: ${content}`);
                }
            }
                // Création du bouton VoirPlus ramenant a la page de l'antenne
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

// Fonction permettant de rediriger la page vers les informations de la région sélectionnée doucement 
function smoothScroll(){
    document.querySelector('.selecRegion').scrollIntoView({
        behavior: 'smooth', block:"center"
    });
}
