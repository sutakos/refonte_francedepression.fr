import {informations} from "./informations.js";

/**
 * @param {string} elementType
 * @param {string} texte
 * @return {HTMLElement|HTMLAreaElement|HTMLAnchorElement|HTMLImageElement}
 */
function creerTexte(elementType, texte) {
 const elem = document.createElement(elementType)
 elem.classList.add('textIcon')
 elem.textContent = texte;
 elem.style.color = 'black'

 return elem
}

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
 * @param {string} contenu
 * @param {string} lien
 * @return {HTMLCollection}
 */
function creerNumero(elementType,contenu,lien) {
 const elem = document.createElement(elementType);
 elem.style.textAlign = 'center'
 elem.style.backgroundColor = '#ebe9ec'
 elem.style.paddingTop = '1.8em'
 elem.style.paddingBottom = '1.8em'
 elem.style.borderRadius = '50%'
 elem.style.width = '5.5em'

 const link = document.createElement('a')
 link.textContent = contenu;
 link.href = lien;
 link.target = '_blank'

 link.style.color = 'black'


 elem.append(link)
 return elem;
}
/**
 * @param {informations} info
 * @return HTMLElement
 */
function ajoutNumero(info) {
 const elem = document.createElement('div');
 elem.classList.add('icon');

 const elemImage = creerImage('img', info.image, info.lien);
 const elemTexte = creerTexte('h3', info.titre)
 const elemNumero = creerNumero('h1', info.numero, info.lien);

 if (info.image === '') {
  elem.append(elemNumero, elemTexte)
 }
 elem.append(elemImage, elemTexte)
 return elem
}

const contenu = document.querySelector('.contenu')
for(const information of informations) {
 contenu.append(ajoutNumero(information));
}


contenu.style.display = 'flex'
contenu.style.justifyContent = 'center'
contenu.style.gap = '5em'
contenu.style.marginTop = '2em'
contenu.style.textAlign = 'center'
