const fluxRSS = document.querySelector('#fluxRSS')

fluxRSS.addEventListener('click',()=>{
    alert("Vous êtes maintenant abonné aux actualités ! (Il n'est pas accessible pour l'instant)")
})

/**
 * @param {string} elementType
 * @param {string} contenu
 * @return {HTMLCollection}
 */
function creerMessage(elementType,contenu) {
    const elem = document.createElement(elementType);
    elem.textContent = contenu

    return elem;
}
/**
 * @param {string} elementType
 * @param {string} titre
 * @return {HTMLCollection}
 */
function creerMessageTitre(elementType,titre){
    const elem = document.createElement(elementType)
    elem.textContent = titre
    elem.style.fontWeight = 'bold'

    return elem;
}
fluxRSS.addEventListener('mouseover', () => {
    const elem = document.createElement('div')
    const elemMessageTitre = creerMessageTitre('h4', "Flux RSS\n")
    const elemMessage = creerMessage('p', " Souscrire pour être informé(e) des mises à jour!")
    elem.style.position = 'absolute'
    elem.style.padding = '0.3em'
    elem.style.borderRadius = '3%'
    elem.style.backgroundColor = '#e7e3ec'

    elem.append(elemMessageTitre, elemMessage);

    const rect = fluxRSS.getBoundingClientRect();
    elem.style.left = `${rect.right + 2}px`;  // Position à droite de l'image
    elem.style.top = `${rect.top}px`;          // Aligné en hauteur avec l'image

    // Ajoute le conteneur au document
    document.body.append(elem);

    fluxRSS.addEventListener('mouseout', () => {
        document.body.removeChild(elem);
    }, { once: true });
})

