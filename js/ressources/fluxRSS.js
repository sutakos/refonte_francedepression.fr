const elem = document.querySelector('#fluxRSS')

elem.addEventListener('click',()=>{
    alert("Vous êtes maintenant abonné aux actualités ! (Il n'est pas accessible pour l'instant)")
})

/**
 * @param {string} elementType
 * @param {string} contenu
 * @return {HTMLCollection}
 */
/**function creerMessage(elementType,contenu) {
    const elem = document.createElement(elementType);
    elem.textContent = contenu;
    elem.style.opacity='50%'
    elem.style.backgroundColor='blue'
    elem.style.width='15em'
    elem.style.height='8em'
}
elem.addEventListener('mouseover', () => {
    const elemMessage = creerMessage(div,"Flux RSS\n Souscrire pour être informé(e) des mises à jour!")

    document.body.append(elemMessage);
    return elemMessage;
})*/