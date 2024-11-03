import {informations} from "./informations.js";

/**
 * @param {string} image
 * @return {HTMLImageElement}
 */
function creerImage(image) {
 const elem = document.createElement('img');
 elem.src = image;
 elem.style.width='4em'
 return elem;
}

/**
 * @param {string} elementType
 * @param {string} contenu
 * @return {HTMLCollection}
 */
function creerContenu(elementType,contenu) {
 const elem = document.createElement(elementType);
 elem.textContent = contenu;
 return elem;
}
/**
 * @param {informations} info
 * @return HTMLElement
 */
function ajoutNumero(info){
 const elemDocument = document.createElement('div');
 const elemContenu = creerImage(info.image);

 elemDocument.append(elemContenu);
 return elemDocument;
}

const carrousel = document.querySelector('.contenu')
for(const information of informations){
 carrousel.append(ajoutNumero(information))
}

