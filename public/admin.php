<?php

use Grp2021\app\bddConnect;
use Grp2021\app\Exceptions\BddConnectException;
use Grp2021\app\Messages;
use Grp2021\app\dataGraphics;
$title = 'Admin';
$page="admin";
require_once 'header.php';

// Connexion à la base de données
$bdd = new bddConnect();
try {
    $pdo = $bdd->connexion();
} catch (BddConnectException $e) {
    Messages::goTo($e->getMessage(), $e->getType(), "index.php");
    exit;
}

$data = new dataGraphics($pdo);


$statsSexe = json_encode($data->dataHF());
$statsRegion= json_encode($data->dataR());
$statsAge= json_encode($data->dataA());

?>
<script src="./js/identification.js" type="module"></script>
 <div class="banniere">
        <img src="images/commun/Bannière.png" class="banniere" alt="Bannière">
    </div>
<main>

    <!--CHEMIN-->
    <section>
        <div class="chemin">
            <a href="admin.php">Statistiques</a>
        </div>
    </section>

    <div class="button-container">
        <button id="showSexe" class="nav-link active">Afficher Répartition des sexes</button>
        <button id="showRegion" class="nav-link">Afficher Répartition des régions</button>
        <button id="showAge" class="nav-link">Afficher Répartition des âges</button>
    </div>




    <svg id="StatSexe" class="graphique" style="display: block;" width="400" height="400"></svg>

    <!--import d3-->
    <script src="https://d3js.org/d3.v7.min.js"></script>

    <script>
        //récupére les stats PHP encodées en JSON
        const donneeSexe = <?php echo $statsSexe; ?>;

        //crée un diagramme circulaire
        const svgSexe = d3.select("#StatSexe");
        const width = +svgSexe.attr("width"); //recupere la largeur du svg et converti en int avec le +
        const height = +svgSexe.attr("height"); //recupere la largeur du svg et converti en int avec le +
        const radius = Math.min(width, height) / 2;

        //couleur des zones
        const color = d3.scaleOrdinal(["#ff866c", "#b0e773"]);

        const pie = d3.pie()
            .value(d => d.value);

        const arc = d3.arc()
            .outerRadius(radius - 10)
            .innerRadius(0);

        const g = svgSexe.append("g")
            .attr("transform", `translate(${width / 2},${height / 2})`);

        //nom des zones et la valeur
        const dataDiagramme = [
            { name: 'Homme', value: donneeSexe['hommes']},
            { name: 'Femme', value: donneeSexe['femmes']}
        ];

        const arcs = g.selectAll(".arc")
            .data(pie(dataDiagramme))
            .enter().append("g")
            .attr("class", "arc");

        //affichage diagramme circulaire
        arcs.append("path")
            .attr("d", arc)
            .attr("fill", d => color(d.data.name));

        //ajout des noms sur les zones
        arcs.append("text")
            .attr("transform", d => "translate(" + arc.centroid(d) + ")")
            .attr("dy", "0.35em")
            .attr("text-anchor", "middle")
            .text(d => `${d.data.name} (${d.data.value})`);
    </script>
        <br><br>
        <svg id="StatRegion" class="graphique" width="700" height="400"></svg>

        <script>
            //récupére les stats PHP encodées en JSON
            const donneeRegion = <?php echo $statsRegion; ?>;

            // Filtrer les régions dont le comptage est égal à 0
            const donneeRegionFiltered = Object.entries(donneeRegion)
                .filter(([region, count]) => count > 0) // Garder uniquement celles avec un comptage > 0
            // Vérifier dans la console les données filtrées
            console.log(donneeRegionFiltered);

            // Dimensions de l'histogramme
            const svgRegion = d3.select("#StatRegion");
            const widthRegion = +svgRegion.attr("width");
            const heightRegion = +svgRegion.attr("height");

            // Définition des marges de l'histogramme
            const marginActivite = { top: 20, right: 25, bottom: 50, left: 150 };

            // Taille des barres
            const barWidthActivite = widthRegion - marginActivite.left - marginActivite.right;
            const barHeightActivite = heightRegion - marginActivite.top - marginActivite.bottom;

            // Ajout d'un groupe g pour contenir les barres
            const gActivite = svgRegion.append("g")
                .attr("transform", `translate(${marginActivite.left},${marginActivite.top})`);

            // Définition de l'échelle
            const xActivite = d3.scaleLinear()
                .domain([0, d3.max(donneeRegionFiltered, d => d[1])]) // Utiliser les valeurs (comptages)
                .range([0, barWidthActivite]);

            const yActivite = d3.scaleBand()
                .domain(donneeRegionFiltered.map(d => d[0]))  // Utiliser les clés (régions) pour l'axe Y
                .range([0, barHeightActivite])
                .padding(0.1);

            // Créer les barres de l'histogramme
            gActivite.selectAll(".bar")
                .data(donneeRegionFiltered)  // Utiliser les données filtrées
                .enter().append("rect")
                .attr("class", "bar")
                .attr("y", d => yActivite(d[0]))  // Position verticale en fonction du nom de la région
                .attr("height", yActivite.bandwidth())  // Hauteur des barres
                .attr("x", 0)  // Position horizontale
                .attr("width", d => xActivite(d[1]))  // Largeur des barres en fonction de la valeur
                .attr("fill", "#f9f18f");

            // Ajouter les axes
            gActivite.append("g")
                .call(d3.axisLeft(yActivite));

            gActivite.append("g")
                .attr("transform", `translate(0,${barHeightActivite})`)
                .call(d3.axisBottom(xActivite).ticks(5));

            // Ajouter les labels sur les barres
            gActivite.selectAll(".label")
                .data(donneeRegionFiltered)
                .enter().append("text")
                .attr("class", "label")
                .attr("x", d => xActivite(d[1]) + 5)  // Position horizontale des labels
                .attr("y", d => yActivite(d[0]) + yActivite.bandwidth() / 2)  // Position verticale des labels
                .attr("dy", "0.35em")  // Ajuste le texte au centre
                .text(d => d[1]);  // Affiche la valeur (arrondie)


        </script>

        <svg id="StatAge" class="graphique" width="700" height="400"></svg>
            <script>
                // Récupère les stats PHP encodées en JSON
                const donneeAge = <?php echo $statsAge; ?>;

                // Prépare les données des tranches d'âge pour D3.js
                const donneesTranchees = Object.keys(donneeAge).map(tranche => ({
                name: tranche,
                value: donneeAge[tranche]
            }));

                // Dimensions de l'histogramme
                const svgAge = d3.select("#StatAge");
                const widthAge = +svgAge.attr("width");
                const heightAge = +svgAge.attr("height");

                // Marges
                const marginAge = { top: 20, right: 20, bottom: 50, left: 50 };
                const barWidthAge = widthAge - marginAge.left - marginAge.right;
                const barHeightAge = heightAge - marginAge.top - marginAge.bottom;

                // Groupe avec marges
                const gAge = svgAge.append("g")
                .attr("transform", `translate(${marginAge.left},${marginAge.top})`);

                // Echelle des axes
                const xAge = d3.scaleBand()
                .domain(donneesTranchees.map(d => d.name)) // Catégories (tranches d'âge)
                .range([0, barWidthAge]) // Largeur du graphique
                .padding(0.1); // Espacement entre les barres

                const yAge = d3.scaleLinear()
                .domain([0, d3.max(donneesTranchees, d => d.value)]) // Valeurs des barres
                .range([barHeightAge, 0]);

                // Créer les barres de l'histogramme
                gAge.selectAll(".bar")
                .data(donneesTranchees)
                .enter().append("rect")
                .attr("class", "bar")
                .attr("x", d => xAge(d.name)) // Position horizontale de la barre
                .attr("y", d => yAge(d.value)) // Position verticale de la barre
                .attr("width", xAge.bandwidth()) // Largeur des barres
                .attr("height", d => barHeightAge - yAge(d.value)) // Hauteur des barres
                .attr("fill", "#bc8ff9");

                // Axe X (noms des catégories, les tranches d'âge)
                gAge.append("g")
                .attr("transform", `translate(0,${barHeightAge})`) // Position en bas
                .call(d3.axisBottom(xAge));

                // Axe Y (valeurs des barres)
                gAge.append("g")
                .call(d3.axisLeft(yAge));

                // Ajouter les valeurs sur les barres
                gAge.selectAll(".label")
                .data(donneesTranchees)
                .enter().append("text")
                .attr("class", "label")
                .attr("x", d => xAge(d.name) + xAge.bandwidth() / 2) // Positionnement horizontal (au centre de la barre)
                .attr("y", d => yAge(d.value) - 5) // Positionnement vertical (au-dessus de la barre)
                .attr("text-anchor", "middle")
                .text(d => d.value); // Affiche la valeur sur la barre
    </script>

        <!--BOUTON RETOUR VERS LE HAUT-->
        <section>
            <img id="retourHaut" src="images/commun/fleche.png" alt="fleche retour">
        </section>
        <!--FIN BOUTON RETOUR VERS LE HAUT-->

</main>
<?php
require_once 'footer.php';
