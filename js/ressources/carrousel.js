import {informations} from "./informations.js";

/**
 * @param {string} elementType
 * @param {string} image
 * @param {string} lien
 * @return {HTMLElement|HTMLAreaElement|HTMLAnchorElement|HTMLImageElement}
 */
function creerImage(elementType,image, lien) {
 const elem = document.createElement(elementType);
 elem.src = image;
 elem.style.width = '10em'

 const link = document.createElement('a')
 link.href = lien;
 link.target = '_blank'

 if (informations.image === "") {
  return null
 } else {
  link.append(elem);
  return link
 }
}
/**
 * @param {string} elementType
 * @param {string} image
 * @param {string} lien
 * @return {HTMLElement|HTMLAreaElement|HTMLAnchorElement|HTMLImageElement}
 */

/**
 * @param {string} elementType
 * @param {string} contenu
 * @return {HTMLCollection}
 */
function creerContenu(elementType,contenu) {
 const elem = document.createElement(elementType);
 elem.textContent = contenu;
 const link = document.createElement('a')
 link.href = lien;
 link.target = '_blank'

 link.append(elem)
 return elem;
}
/**
 * @param {informations} info
 * @return HTMLElement
 */
function ajoutNumero(info){
 const elem = document.createElement('div')
 const elemImage = creerImage('img',info.image,info.lien);

 // si déjà a une image alors ne pas afficher numéro sinon afficher num

 elem.append(elemImage)
 return elem
}

const container = document.querySelector('.contenu')
for(const information of informations) {
 container.append(ajoutNumero(information));
}

container.style.display = 'flex'
container.style.gap = '5em'
