<?php

use Grp2021\app\bddConnect;
use Grp2021\app\Exceptions\BddConnectException;
use Grp2021\app\Messages;
use Grp2021\app\dataGraphics;
$title = 'Admin';
$page="admin";
require_once 'header.php';
// TODO : À compléter avec les D3 etc (les graphiques quoi)

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

?>

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

    <h2>Répartition des sexes</h2><br>
    <svg id="StatSexe" width="400" height="400"></svg>
    <!--import d3-->
    <script src="https://d3js.org/d3.v7.min.js"></script>

    <script>
        //récupére les stats PHP encodées en JSON
        const donneeSexe = <?php echo $statsSexe; ?>;

        //crée un diagramme circulaire
        const svg = d3.select("#StatSexe");
        const width = +svg.attr("width"); //recupere la largeur du svg et converti en int avec le +
        const height = +svg.attr("height"); //recupere la largeur du svg et converti en int avec le +
        const radius = Math.min(width, height) / 2;

        //couleur des zones
        const color = d3.scaleOrdinal(["#ff866c", "#b0e773"]);

        const pie = d3.pie()
            .value(d => d.value);

        const arc = d3.arc()
            .outerRadius(radius - 10)
            .innerRadius(0);

        const g = svg.append("g")
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
            .text(d => d.data.name);
    </script>
</main>
<?php
require_once 'footer.php';
