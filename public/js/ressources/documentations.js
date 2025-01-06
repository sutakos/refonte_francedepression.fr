import { documents } from "./documents.js";

/* Création des documents */

/**
 * @param {string} elementType
 * @param {string} content
 * @return {HTMLElement|HTMLAreaElement|HTMLAnchorElement}
 */
function creerDoc(elementType, content) {
    const elem = document.createElement(elementType)
    elem.textContent = content;
    elem.style.backgroundColor = '#ebe9ec'
    if(elem.textContent !== ""){
        elem.style.padding = '1.5%'
        elem.style.margin = '1%'
        elem.style.marginTop = '2%'
        elem.style.marginBottom = '2%'
    }
    return elem;
}

/**
 * @param {string} elementType
 * @param {string} titre
 * @param {string} lien
 * @return {HTMLElement|HTMLAreaElement|HTMLAnchorElement}
 */
function creerDocLien(elementType, titre,lien) {
    const elem = document.createElement(elementType)
    const link = document.createElement('a')
    link.textContent = titre;
    link.href = lien;
    link.target = '_blank';

    link.style.color = 'black';
    link.style.textDecoration = 'none';

    link.addEventListener('mouseover',()=>{
        link.style.color = '#1f478f';
    })
    link.addEventListener('mouseout',()=>{
        link.style.color = 'black';
    })

    elem.style.textAlign = 'center';
    elem.style.backgroundColor = '#e8effa';
    elem.style.margin = '1%'

    elem.append(link);
    return elem;
}

/**
* @param {string} elementType
* @param {string} image
* @return {HTMLElement|HTMLAreaElement|HTMLAnchorElement|HTMLImageElement}
*/
function creerDocImage(elementType, image) {
    const elem = document.createElement(elementType);
    elem.src = image;
    elem.style.width = '100%';
    elem.style.height = '20em';
    return elem;
}

/**
 * @param {string} elementType
 * @param {Array} etiquettes
 * @return {HTMLElement|HTMLAreaElement|HTMLAnchorElement|HTMLImageElement}
 */
function creerEtiquettes(elementType, etiquettes) {
    const elem = document.createElement(elementType)
    etiquettes.forEach(etiquette => {
        const li = document.createElement('li')
        li.textContent = "#" + etiquette;
        li.style.listStyle = 'none';
        li.style.textDecoration = 'none';
        li.style.margin = '1%'
        li.style.color = 'white'
        li.style.backgroundColor = '#5b78ab'
        li.style.paddingLeft='0.5em'
        li.style.paddingRight='0.5em'
        li.style.borderRadius = '5%'
        li.style.display = 'inline-block';
        elem.append(li)
    })
    return elem;
}

/**
 * @param {documents} doc
 * @return HTMLElement
 */
export function ajoutDocument(doc) {
    const elemDocument = document.createElement('div');
    elemDocument.classList.add('document');
    const elemImage= creerDocImage('img', doc.image);
    const elemTitle = creerDocLien('h2', doc.title, doc.lien);
    const elemContent = creerDoc('p', doc.content);
    const elemEtiquettes = creerEtiquettes('section', doc.etiquettes);
    elemEtiquettes.classList.add('etiquettes');

    if(doc.image !== ""){
        elemDocument.append(elemTitle, elemImage, elemContent,elemEtiquettes);
    } else {
        elemDocument.append(elemTitle, elemContent,elemEtiquettes);
    }

    //elemDocument.style.width = '38em'
    elemDocument.style.border = 'solid 1px grey'
    elemDocument.style.borderRadius = '2%'
    elemDocument.style.paddingLeft = '0.5%'
    elemDocument.style.paddingRight = '0.5%'

    return elemDocument;
}

/* Permet de charger des documents */

let nbrDoc = 0 // nombre total de documents
let groupDoc = 0 // équivalent à une page
const boutonD = document.querySelector('#flecheD')
const boutonG = document.querySelector('#flecheG')
const boutonDoubleG = document.querySelector('#doubleFlecheG')
const boutonDoubleD = document.querySelector('#doubleFlecheD')
const section = document.querySelector('.documentations');

/**
 * Afficher les documents selon le positionnement des pages
 * @param debut : int nombre total de documents au début
 * @param fin : int le nombre du dernier document
 */
function afficherDocuments(debut, fin) {
    for(let i = debut; i < fin && i <= documents.length; i++) {
        section.append(ajoutDocument(documents[i]))
        nbrDoc++;
    }
}
function supprimerDocuments(){
    const documentsP = document.querySelectorAll('.document');

    documentsP.forEach(select =>{
        select.remove();
    })
}

afficherDocuments(0, 6);

boutonD.addEventListener('click',suiteDocuments)
function suiteDocuments() {
    supprimerDocuments()
    groupDoc ++;
    const debut = groupDoc * 6;
    const fin = debut + 6;
    afficherDocuments(debut,fin)


    if (nbrDoc >= documents.length) {
        boutonD.disabled = true;
    }
    boutonG.disabled = false;
}

boutonG.addEventListener('click', retourDocuments)
function retourDocuments(){
    if (groupDoc > 0) {
        supprimerDocuments()
        groupDoc--;
        const debut = groupDoc * 6;
        const fin = debut + 6;
        afficherDocuments(debut, fin);
    }

    if (groupDoc === 0) {
        boutonG.disabled = true;
    }
    boutonD.disabled = false;
}
boutonDoubleG.addEventListener('click',() => {
    supprimerDocuments()
    groupDoc = 0;
    nbrDoc = 0;
    afficherDocuments(0,6);
    boutonG.disabled = false;
    boutonD.disabled = false;
})
boutonDoubleD.addEventListener('click',() => {
    supprimerDocuments()
    groupDoc = documents.length/6;
    if (documents.length % 6 !== 0) { // S'il y a des documents restants
        groupDoc++;
    }
    nbrDoc = groupDoc * 6; // Réinitialiser le nombre de documents affichés
    const debut = groupDoc * 6;
    const fin = debut + 6;
    afficherDocuments(debut,fin);
    boutonG.disabled = false;
    boutonD.disabled = false;
})

boutonG.disabled = true;

/* Barre de recherche */

const barreRecherche = document.getElementById("barrederecherche");
const documentations = document.querySelector(".documentations");
barreRecherche.addEventListener('input', function () {
    const saisie = barreRecherche.value.toLowerCase();
    // Filtrer les données (documents) selon ce qu'on a saisie dans la barre de recherche
    const documentsFiltre = documents.filter(doc => doc.title.toLowerCase().includes(saisie));
    // Ajoute
    resultatDocuments(documentsFiltre);
});

// Fonction d'affichage des résultats
function resultatDocuments(documentsFiltres) {

    documentations.innerHTML = ""; // Réinitialise les résultats

    // Si aucun éléments dans la liste de filtre
    if (documentsFiltres.length === 0) {
        documentations.innerHTML = "<p>Aucun document trouvé</p>";
        return;
    }
    // Afficher pour tous les documents dans la liste du filtre
    documentsFiltres.forEach(doc => {
        documentations.append(ajoutDocument(doc));
    });

    if(barreRecherche.value.length === 0){
        supprimerDocuments()
        const debut = groupDoc * 6;
        const fin = Math.min(debut + 6, documents.length)
        afficherDocuments(debut, fin)

    }

}