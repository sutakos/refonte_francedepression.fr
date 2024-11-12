import {informations} from "./informations.js";

/**
 * @param {string} image
 * @return {HTMLImageElement}
 */
function creerImage(image) {
 const elem = document.createElement('img');
 elem.src = image;

 if(informations.image !== ""){
  return elem;
 } else {
  return null;
 }
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
 const elem = document.createElement('div')
 const elemImage = creerImage(info.image);

 // si déjà a une image alors ne pas afficher numéro sinon afficher num

 elemImage.style.width = '10em'
 elem.append(elemImage)
 return elem
}

const container = document.querySelector('.contenu')
for(const information of informations) {
 container.append(ajoutNumero(information));
}

container.style.display = 'flex'
container.style.gap = '5em'
container.style.paddingTop = '0.5em'
