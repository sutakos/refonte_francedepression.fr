
    // Récupérer tous les graphiques
    const allGraphics = document.querySelectorAll('.graphique');

    // Fonction pour afficher un graphique et activer le bouton
    function showGraphic(graphicId, buttonId) {
    // Cacher tous les graphiques
    allGraphics.forEach(graphic => graphic.style.display = 'none');

    // Afficher le graphique correspondant
    document.getElementById(graphicId).style.display = 'block';

    // Retirer la classe 'active' de tous les boutons
    document.querySelectorAll('.nav-link').forEach(button => button.classList.remove('active'));

    // Ajouter la classe 'active' au bouton sélectionné
    document.getElementById(buttonId).classList.add('active');
}

    // Ajouter les événements aux boutons
    document.getElementById('showSexe').addEventListener('click', function() {
    showGraphic('StatSexe', 'showSexe');
});

    document.getElementById('showRegion').addEventListener('click', function() {
    showGraphic('StatRegion', 'showRegion');
});

    document.getElementById('showAge').addEventListener('click', function() {
    showGraphic('StatAge', 'showAge');
});

    // Initialisation au chargement de la page
    window.addEventListener('DOMContentLoaded', () => {
    // Vérifie quel bouton est actif par défaut et affiche le graphique correspondant
    const activeButton = document.querySelector('.nav-link.active');
    if (activeButton) {
    const buttonId = activeButton.id; // ID du bouton actif
    if (buttonId === 'showSexe') {
    showGraphic('StatSexe', 'showSexe');
} else if (buttonId === 'showRegion') {
    showGraphic('StatRegion', 'showRegion');
} else if (buttonId === 'showAge') {
    showGraphic('StatAge', 'showAge');
}
}
});
