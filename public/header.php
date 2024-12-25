<?php

use Grp2021\app\Messages;

session_start();
require_once __DIR__ . "/../vendor/autoload.php";

?>

<!DOCTYPE HTML>

<html lang="fr">
<head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--CSS COMMUN AUX PAGES-->
    <link rel="stylesheet" type="text/css" href="css/commun.css">
    <link rel="stylesheet" type="text/css" href="css/<?php if(isset($page)){echo $page;}?>.css">
    <!--FONT-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!--FONT Josefin-->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <!--SCRIPT JS-->
    <script src="js/commun.js" type="module"></script>
    <script src="js/<?php if(isset($page)){echo $page;}?>.js" type="module"></script>
    <header>
        <nav>
            <!-- NAV BURGER -->
            <div id="mySidenav" class="sidenav">
                <a id="closeBtn" href="#" class="close">×</a>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="#" id="toggleDropdown">L'association ⌵</a>
                        <ul id="dropBurger" class="dropD">
                            <li><a href="quiSommesNous.php">Qui sommes-nous</a>
                            <li><a href="https://francedepression.fr/index.php/l-association/edito">Edito</a>
                            <li><a href="https://francedepression.fr/index.php/l-association/statuts">Statuts</a>
                            <li><a href="https://francedepression.fr/index.php/l-association/faire-un-don">Faire un don</a></li>
                            <li><a href="https://francedepression.fr/index.php/l-association/creer-une-antenne">Créer une antenne</a></li>
                        </ul>

                    </li>
                    <li><a href="antennes.php">Antennes</a></li>
                    <li><a href="ressources.php">Ressources</a></li>
                </ul>
                <a href="index.php"><img id="logoBurger" src="images/commun/logoSF.png" width="90px" alt="Logo"></a>
            </div>

            <a href="#" id="openBtn" class="openBtn">
				  	<span class="burger-icon">
						<span></span>
						<span></span>
						<span></span>
				  	</span>
            </a>
            <!-- FIN NAV BURGER -->
            <!--BARRE DE NAVIGATION-->
            <div class="divLogo">
                <a href="index.php"><img src="images/commun/logoSF.png" width="90px" alt="Logo"></a>
                <a href="index.php"><span>France Dépression</span></a>
            </div>

            <div class="navbar">
                <ul>
                    <li class="section"><a href="index.php">Accueil</a></li>
                    <li class="section" id="drop"><a href="quiSommesNous.php">L'association  ⌵</a>
                        <ul id="dropDown">
                            <li><a href="quiSommesNous.php">Qui sommes-nous</a></li>
                            <li><a href="https://francedepression.fr/index.php/l-association/edito">Edito</a></li>
                            <li><a href="https://francedepression.fr/index.php/l-association/statuts">Statuts</a></li>
                            <li><a href="https://francedepression.fr/index.php/l-association/faire-un-don">Faire un don</a></li>
                            <li><a href="https://francedepression.fr/index.php/l-association/creer-une-antenne">Créer une antenne</a></li>
                        </ul>
                    </li>
                    <li class="section"><a href="antennes.php">Antennes</a></li>
                    <li class="section"><a href="ressources.php">Ressources</a></li>
                </ul>
            </div>

            <div id="login">
                <a href="connexion.php"><img src="images/commun/connexion.PNG" width="60px" alt="Connexion"></a>
            </div>
        </nav>
        <!--FIN DE LA BARRE DE NAVIGATION-->
    </header>
</head>


<?php
Messages::messageFlash();
