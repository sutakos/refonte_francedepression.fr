import { documents } from "./documents.js";

/**
 * @param {string} elementType
 * @param {string} content
 * @return {HTMLElement|HTMLAreaElement|HTMLAnchorElement}
 */
function creerDoc(elementType, content) {
    const elem = document.createElement(elementType)
    elem.textContent = content;
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
        link.style.color = '#2f558f';
    })
    link.addEventListener('mouseout',()=>{
        link.style.color = 'black';
    })

    elem.append(link)
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
    elem.style.width = '40em';
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
        li.textContent = etiquette;
        elem.append(li)
    })

    return elem;
}

/**
 * @param {documents} doc
 * @return HTMLElement
 */
function ajoutDocument(doc) {
    const elemDocument = document.createElement('div');
    const elemImage= creerDocImage('img', doc.image);
    const elemTitle = creerDocLien('h2', doc.title, doc.lien);
    const elemContent = creerDoc('p', doc.content);
    const elemEtiquettes = creerEtiquettes('section', doc.etiquettes);
    elemEtiquettes.classList.add('etiquettes');

    elemDocument.append(elemTitle, elemContent,elemImage,elemEtiquettes);

    return elemDocument;
}

const section = document.querySelector('.documentations');
for (const document of documents) {
    section.append(ajoutDocument(document));
}