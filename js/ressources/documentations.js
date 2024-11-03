import { documents } from "./documents.js";

/**
 * @param {string} elementType
 * @param {string} content
 * @return {HTMLElement|HTMLAreaElement|HTMLAnchorElement}
 */
function creerDoc(elementType, content) {
    const elem = document.createElement(elementType)
    elem.textContent = content;
    elem.style.backgroundColor = '#ebe9ec'
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
    elem.style.width = '38.5em';
    elem.style.height = '18em';
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
    elemDocument.classList.add('document');
    const elemImage= creerDocImage('img', doc.image);
    const elemTitle = creerDocLien('h2', doc.title, doc.lien);
    const elemContent = creerDoc('p', doc.content);
    const elemEtiquettes = creerEtiquettes('section', doc.etiquettes);
    elemEtiquettes.classList.add('etiquettes');

    if(doc.image !== ""){
        elemDocument.append(elemTitle, elemContent, elemImage ,elemEtiquettes);
    } else {
        elemDocument.append(elemTitle, elemContent,elemEtiquettes);
    }

    elemDocument.style.width = '38.5em'
    elemDocument.style.border = 'solid 1px grey'
    elemDocument.style.borderRadius = '2%'
    elemDocument.style.paddingLeft = '0.5%'
    elemDocument.style.paddingRight = '0.5%'
    return elemDocument;
}

const section = document.querySelector('.documentations');
for (const document of documents) {
    section.append(ajoutDocument(document));
}