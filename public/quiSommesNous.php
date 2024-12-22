<?php
$title='Qui sommes-nous ?';
$page="quiSommesNous";
require 'header.php';
?>
    <!--CCS QUE DE QUI SOMMES NOUS-->
<link rel="stylesheet" type="text/css" href="css/quiSommesNous.css">
</header>
<body>

<div class="banniere">
    <img src="images/commun/Bannière.png" alt="Bannière" class="banniere" alt="Bannière">
</div>
<main>
    <div class="chemin">
        <a href="#">L'association > </a>
        <a href="quiSommesNous.php">Qui sommes-nous</a>
    </div>
    <!--PETITE INTRODUCTION DECRIVANT L'ASSOCIATION-->
    <section class="Intro-Association">
        <p id="phraseIntro">France Dépression, créée en 1992, est une association loi 1901 sans but lucratif et reconnue d’intérêt général</p>
        </br>
        <p id="intro">
            France Dépression a pour mission de <b>prévenir</b>, d’<b>informer</b>,
            de <b>soutenir</b> les <b>personnes souffrant de dépression ou de troubles bipolaires</b>,
            de <b>lutter</b> contre la stigmatisation et de <b>promouvoir</b> leur dignité et le respect de leurs droits au niveau local,
            national et européen.
        </p>
        </br>
        <img src="images/quiSommesNous/Cailloux.PNG" width="500em" alt="Cailloux">
    </section>
    <!--FIN PETITE INTRODUCTION DECRIVANT L'ASSOCIATION-->

    <!--FONCTIONNEMENT DE L'ASSOCIATION-->
    <section class="partie1">
        <div class="blocs">
            <div class="blocImg gauche" id="agir">
                <img src="images/quiSommesNous/Montagnes.png" alt="Montagnes">
                <div class="blocTxt">
                    <p class="paragraphe">
                        L’Association agit au cœur de la cité pour améliorer la prise en charge des personnes touchées
                        par la dépression et les troubles bipolaires, ainsi que pour mieux informer sur leurs causes et conséquences.
                        France Dépression se veut un espace ressources, physique et virtuel, réunissant des informations pertinentes
                        sur les diverses formes de dépression et favorisant les échanges d’expériences entre les personnes.
                    </p>
                </div>
            </div>
            <div class="blocImg droit" id="appel aux pro">
                <img src="images/quiSommesNous/Liberté.png" alt="Liberté">
                <div class="blocTxt">
                    <p class="paragraphe">
                        Nous faisons  appel à des professionnels de la dépression et des troubles bipolaires pour approfondir la connaissance sur ces sujets,
                        leurs mécanismes, ainsi que les approches de soin et d’accompagnement.
                        France Dépression participe également à des programmes de recherche sur les causes, facteurs et traitements des troubles dépressifs,
                        et à la prévention du suicide lié à ces troubles. Depuis 2013, l’Association œuvre à l’information,
                        à la prévention et à la sensibilisation du public et des entreprises sur le burn-out et la gestion des risques psychosociaux.
                    </p>
                </div>
            </div>
            <div class="blocImg gauche" id="représente">
                <img src="images/quiSommesNous/Mer.png" alt="Mer">
                <div class="blocTxt">
                    <p class="paragraphe">
                        En tant qu’association agréée au niveau national,
                        France Dépression représente depuis 2007 les usagers dans différentes instances hospitalières
                        ou de santé publique pour contribuer à l’expression des usagers et à la défense de leurs droits : commissions des usagers (CDU),
                        commissions départementales des soins psychiatriques (CDSP),
                        comités de lutte contre les infections nosocomiales (CLIN), conseils locaux de santé mentale (CLSM).
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--FIN FONCTIONNEMENT DE L'ASSOCIATION-->

    <!--VISION DE L'ASSOCIATION-->
    <section class="partie2">
        <br class="cleared"></br>
        </br>
        <p class="cleared titre"><b>La vision de France Dépression</b></p>
        <p class="titre">> Devenir acteur de votre Dépression: le premier pas vers la guérison</p>
        <div class="blocs">
            <div class="bloc" id="bloc1">
                <img src="images/quiSommesNous/Femme%20forte%20battante.png" alt="Femme forte battante">
                <p class="paragraphe">
                    Nous croyons dans la capacité de la personne souffrant de dépression ou
                    de troubles bipolaires à trouver les ressources et les outils nécessaires pouvant l’aider dans sa guérison.
                </p>
            </div>
        </div>
        <div class="bloc" id="bloc2">
            <p class="paragraphe">
                Nous pensons que devenir acteur de sa maladie, c’est se l’approprier.
                Ainsi, France Dépression rassemble les informations pour mieux comprendre et
                traiter la dépression et les troubles bipolaires.
            </p>
            <img src="images/quiSommesNous/Fille%20réflexion.png" alt="Fille en réflexion">
        </div>
        <div class="bloc" id="bloc3">
            <img src="images/quiSommesNous/Liberté%20oiseau.png" alt="Oiseau libre">
            <p class="paragraphe">
                Le respect des personnes souffrant de ces troubles implique de leur donner le choix
                quant à leur parcours de guérison et d’être à l’écoute de leur besoin sur la base d’une information la plus exhaustive possible.
            </p>
        </div>
        </div>
    </section>
    <!--FIN VISION DE L'ASSOCIATION-->

    <section>
        <img id="retourHaut" src="images/commun/fleche.png" alt="flèche haut">
    </section>
</main>

<?php

require_once 'footer.php';
