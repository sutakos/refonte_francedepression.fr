import { documents } from "./documents.js";

const containerDocs = document.getElementsByClassName("docs")[0];

/**
 * @param {string} title
 * @param {string} content
 * @param {string} image
 * @return {HTMLElement|HTMLAreaElement|HTMLAnchorElement}
 */
function creerDoc(title, content,image) {
    const elem = document.createElement(title);
    elem.textContent = content;
    elem.src=image;
    return elem;
}

/**
 * @typedef {Document} documents
 */
/**
 * @param {documents} docu
 * @return HTMLElement
 */
function ajoutDocument(docu) {
    const elemDocument = document.createElement('div');
    const elemTitle = creerDoc('h2', docu.title);
    const elemContent = creerDoc('p',docu.content);
    const elemImage=creerDoc('img',docu.images)

    elemDocument.append(elemTitle);
    elemDocument.append(elemContent);
    elemDocument.append(elemImage)

    return elemDocument;
}

const section = document.querySelector('.docs');
for (const document of documents) {
    section.append(ajoutDocument(document));
}