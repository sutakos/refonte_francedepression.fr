import { documents } from "./documents"; // Assure-toi que "documents" contient des objets avec un "title"

// Sélection des éléments du DOM
const bouton = document.querySelector("#boutonRecherche"); // Bouton de recherche
const recherche = document.querySelector("#barrederecherche"); // Barre de recherche
const selections = document.querySelectorAll('.document'); // Les éléments HTML à filtrer

// Ajout de l'événement au bouton
bouton.addEventListener('click', () => {
    let saisie = recherche.value.trim().toLowerCase(); // Récupère la saisie et la met en minuscules
    if (saisie.length >= 3) {
        // Filtrer les données en fonction de la requête
        const filteredData = documents.filter(item =>
            item.title.toLowerCase().includes(saisie)
        )
    }
    const filteredData = documents.filter(item =>
        item.title.toLowerCase().includes(saisie)
    );

// Afficher les résultats
    if (filteredData.length > 0) {
        filteredData.forEach(item => {
            const row = document.createElement('tr');
            const nomCell = document.createElement('td');
            nomCell.textContent = item.nom;
            row.appendChild(nomCell);

            const descCell = document.createElement('td');
            descCell.textContent = item.description;
            row.appendChild(descCell);

            resultsTableBody.appendChild(row);
        });
    } else {
        const row = document.createElement('tr');
        const cell = document.createElement('td');
        cell.colSpan = 2;
        cell.textContent = 'Aucun résultat trouvé.';
        row.appendChild(cell);
        resultsTableBody.appendChild(row);
    }
});