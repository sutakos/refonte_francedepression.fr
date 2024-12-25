<?php
$title="Ressources";
$page="ressources";
require_once 'header.php';
?>
<script src="js/ressources/documentations.js" type="module"></script>
<script src="js/ressources/filtre.js" type="module"></script>
<script src="js/ressources/fluxRSS.js" type="module"></script>
<script src="js/ressources/carrousel.js" type="module"></script>
<script src="js/ressources/changementDocu.js" type="module"></script>
<body>
<div class="banniere">
    <img src="images/commun/Bannière.png" alt="Bannière" class="banniere">
    <a href="ressources.php">Ressources</a>
</div>
<br>
<main>
    <menu class="menu">
        <li>Documentations</li>
        <li>Vidéothèque</li>
        <li>Audiothèque</li>
        <li>Témoignages</li>
        <li>Théâtre</li>
    </menu>
    <br>

    <div class="navigation">
        <!-- Barre de recherche -->
        <div class="recherche">
            <input type="Search" placeholder="Rechercher">
            <button><img src="images/ressources/loupeRecherche.png"></button>
        </div>
        <!-- Fin Barre de recherche -->
        <!-- Filtre -->
        <div class="dropdown">
            <button type="button" id="dropdownMenuButton" value="active">
                Filtre<img src="images/ressources/flecheBas.png">
            </button>
            <div class="dropdown-menu">
                <div class="options">
                    <input type="checkbox" id="histoires" value="histoires"/>
                    <label for="histoires">Histoires</label>
                </div>
                <div class="options">
                    <input type="checkbox" id="depression" value="depression"/>
                    <label for="depression">Dépression</label>
                </div>
                <div class="options">
                    <input type="checkbox" id="diabete" value="diabete"/>
                    <label for="diabete">Diabète</label>
                </div>
                <div class="options">
                    <input type="checkbox" id="troubles" value="troubles"/>
                    <label for="troubles">Troubles</label>
                </div>
                <div class="options">
                    <input type="checkbox" id="angoisse" value="angoisse"/>
                    <label for="angoisse">Angoisse</label>
                </div>
                <div class="options">
                    <input type="checkbox" id="bienveillance" value="bienveillance"/>
                    <label for="bienveillance">Bienveillance</label>
                </div>
                <div class="options">
                    <input type="checkbox" id="meditation" value="meditation"/>
                    <label for="meditation">Méditation</label>
                </div>
                <div class="options">
                    <input type="checkbox" id="cancer" value="cancer"/>
                    <label for="cancer">Cancer</label>
                </div>
                <div class="options">
                    <input type="checkbox" id="nouvelles" value="nouvelles"/>
                    <label for="nouvelles">Nouvelles</label>
                </div>
            </div>
        </div>
        <!-- Fin Filtre -->
        <img id="fluxRSS" src="images/ressources/fluxRSS.png">
    </div>
    <br>
    <div class="carrousel">
        <div class="container">
            <!--<button class="boutonCarrousel" id="btndroit"></button>
            <button class="boutonCarrousel" id="btngauche"></button>-->
            <div class="contenu">

            </div>
        </div>
    </div>
    <br>
    <!-- Affichage des documents -->
    <div class="documentations">

    </div>
    <!-- Fin Affichage des documents -->

    <!-- Boutons de page -->
    <div id="buttonPage">
        <button id="doubleFlecheG"><<</button>
        <button id="flecheG"><</button>
        <p></p>
        <button id="flecheD">></button>
        <button id="doubleFlecheD">>></button>
    </div>
    <!-- Fin Boutons de page -->

    <!--BOUTON RETOUR VERS LE HAUT-->
    <section>
        <img id="retourHaut" src="public/images/commun/fleche.png" alt="fleche retour">
    </section>
    <!--FIN BOUTON RETOUR VERS LE HAUT-->
</main>
