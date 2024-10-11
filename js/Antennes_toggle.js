
// tous les paths clickable
const paths = document.querySelectorAll('#map .map_clickable path');

// tous les overlays
const overlays = document.querySelectorAll('.Overlay > div');

// Ajouter un événement de clic sur chaque paths
paths.forEach((path) => {
    path.addEventListener('click', (e) => {
        console.log('Clic sur le path', path.id);
        e.stopPropagation();

        // Fermer tous les overlays avant d'ouvrir un
        overlays.forEach((overlay) => {

            if(!overlay.classList.contains(path.id)) {
                overlay.classList.remove('show');

                overlay.classList.add('hide');
            }
        });
        // Enlever couleur de tout les paths
        paths.forEach((region) => {
            region.classList.remove('clicked')
        });

        // ID du path cliqué
        const pathId = path.id;

        // Récupérer overlay correspondant
        const overlay = document.querySelector(`.Overlay > div.${pathId}`);
        console.log('Overlay trouvé', overlay);

        // Vérifier si overlay est déjà ouvert
        console.log(overlay.classList)
        overlay.style.transition = 'opacity 0.5s ease-out'; // ajouter un effet de transition
        if (overlay.classList.contains('show')) {
            // Si oui fermer
            overlay.classList.remove('show');
            overlay.style.opacity = 0; // D'abord opacité à 0 avant de display:none;
            setTimeout(function() {
                overlay.classList.add('hide') // cacher overlay une fois opacité à 0
            }, 500);
            path.classList.remove('clicked')
            console.log(overlay, 'est caché')
            console.log(overlay.classList)
        } else {
            // Sinon ouvrir
            overlay.classList.remove('hide');
            overlay.classList.add('show')
            overlay.style.opacity = 0; // opacité à 0 pour pas qu'il apparaîsse d'un coup
            setTimeout(function() {
                overlay.style.opacity = 1; // définir l'opacité à 1 après transition .5s
            }, 0);
            path.classList.add('clicked')
            console.log(overlay, 'est visible')
            console.log(overlay.classList)

        }
    });
});

// événement pour cacher overlay lorsque cliqué à l'extérieur de l'overlay
document.addEventListener('click', (e) => {
    if (!e.target.closest('.Overlay') && !e.target.classList.contains('map_clickable')) {
        console.log('Clic à l\'extérieur de l\'overlay');
        overlays.forEach((overlay) => {
            overlay.classList.remove('show');
            overlay.classList.add('hide');
        });
    }
});