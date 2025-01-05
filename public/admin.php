<?php
require_once 'header.php';
// TODO : À compléter avec les D3 etc (les graphiques quoi)
$data = [
    ['sexe' => 'homme'],
    ['sexe' => 'femme'],
    ['sexe' => 'homme'],
    ['sexe' => 'femme'],
    ['sexe' => 'homme'],
    ['sexe' => 'homme'],
];

//fais la somme des sexes
$somme = ['homme' => 0, 'femme' => 0];
foreach ($data as $person) {
    if ($person['sexe'] == 'homme') {
        $somme['homme']++;
    } elseif ($person['sexe'] == 'femme') {
        $somme['femme']++;
    }
}

$statsSexe = json_encode($somme);
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
            { name: 'Homme', value: donneeSexe['homme']},
            { name: 'Femme', value: donneeSexe['femme']}
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
<?php
require_once 'footer.php';
