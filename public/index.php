<?php
$title ="Accueil";
$page="accueil";
require_once 'header.php';
?>
<body>
<!--BANNIERE-->
<section class="ecoute">
    <img src="images/accueil/ecoute.JPG" class="banniereEcoute" alt="Bannière d'écoute">
    <div class="appel">
        <p>Une écoute, un sourire, une force <br><br>
            L’association propose une écoute du lundi au samedi entre 10h et 20h et le dimanche de 14h à 20h <br>
            <span class="contact-info">
							<img src="images/accueil/telephone.PNG" class="logoTel" width="50px">
					   		<span class="numtel"> 07 84 96 88 28</span>
					   	</span>
        </p>

        <div class="btn">
            <a href="quiSommesNous.php"><button>Association ➜</button></a>

            <a href="#"><button>Ressources ➜</button></a>
        </div>
    </div>
</section>
<!--FIN BANNIERE-->
<main>
    <!--BOUTON FORMULAIRE-->
    <section class="form">
        <div class="btnForm">
            <a href="questionnaire.php"><button>Remplissez moi !</button></a>
        </div>
    </section>
    <!--FIN BOUTON FORMULAIRE-->

    <!--CHEMIN-->
    <section>
        <div class="chemin">
            <a href="index.php">Accueil</a>
        </div>
    </section>
    <!--FIN CHEMIN-->
    <!--CARROUSEL-->
    <section class="InfoCarrousel">
        <div class="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <a href="https://www.psychodon.org/" target="_blank"><img src="images/accueil/partenariat.PNG" alt="Partenariat avec PsychoDon"></a>
                </div>

                <div class="carousel-item">
                    <a href="https://www.helloasso.com/associations/association-france-depression/formulaires/2" target="_blank"><img src="images/accueil/affichedon.PNG" alt="Affiche Don"></a>
                </div>

                <div class="carousel-item">
                    <a href="https://www.francebleu.fr/emissions/l-invite-du-8-9/veronique-balme-metteur-en-scene-et-comedienne-4664568" target="_blank"><img src="images/accueil/affichetheatre.PNG" alt="Affiche Theatre"></a>
                </div>

                <div class="carousel-item">
                    <a href="https://www.youtube.com/watch?v=n3uA2UPknfE" target="_blank"><img src="images/accueil/maletre.PNG" alt="Reportage"></a>
                </div>
            </div>

            <button class="carousel-control-prev">❮</button>
            <button class="carousel-control-next">❯</button>
        </div>
        <!--PARTENARIAT-->
        <div class="partenariat">
            <p>Psychodon et France Dépression en partenariat pour les marches nationales de la santé mental 2024 !</p>
            <!--target="_blank" ouvre dans un autre onglet-->
            <a href="https://www.psychodon.org/" target="_blank"><img src="images/accueil/psychodon.PNG" width="200px" alt="Logo Psychodon"></a>
        </div>
        <!--FIN PARTENARIAT-->
    </section>
    <!--FIN CARROUSEL-->
    <!--EDITO-->
    <section class="Edito">
        <div class="Info">
            <div class="backColor">
                <span class="InfoStyle">Edito</span><br><br>
                <p>Présentation de nos co-présidentes !<br><br>
                    Claudie TONDON-BERNARD,<br>
                    présidente de France Dépression Lorraine depuis 2002<br><br>

                    Christine VILLELONGUE,<br>
                    co-présidente de France Dépression<br><br>
                </p>

                <div class="btn">
                    <a href="https://francedepression.fr/index.php/l-association/edito"><button>Lire ➜</button></a>
                </div>
            </div>
        </div>
    </section>
    <!--FIN EDITO-->
    <!--INFOLETTRE ET ACTUALITE-->
    <section class="InfoActu">
        <div class="Info">
            <div class="Contenu">
                <div class="InfoContenu">
                    <span class="InfoStyle">Infolettre</span><br><br>
                    <p>Retrouvez nos bulletins d'information <br>
                        et abonnez vous à notre infolettre !
                    </p>
                    <div class="btn">
                        <a href="https://francedepression.fr/index.php/content-page/item/49-bulletin-d-information"><button>S'abonner ➜</button></a>
                    </div>
                </div>

                <div class="ActuContenu">
                    <span class="InfoStyle">Actualités</span><br><br>
                    <p>Suivez les actualités !</p>
                    <br>
                    <div class="btn">
                        <a href="https://francedepression.fr/index.php/content-page/25-actualite"><button>Voir ➜</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--FIN INFOLETTRE ET ACTUALITE-->
    <!--THEATRE-->
    <section class="Theatre">
        <div class="Info">
            <div class="backColor">
                <div class="ContenuT">
                    <div class="imageTheatre">
                        <a href="https://www.francebleu.fr/emissions/l-invite-du-8-9/veronique-balme-metteur-en-scene-et-comedienne-4664568"target="_blank"><img src="images/accueil/theatre.PNG" alt="On n’est pas sérieux quand on a 17 ans !"></a>
                    </div>

                    <div class="TheatreContenu">
                        <span class="InfoStyle">Pièce de théâtre</span><br><br>

                        <p class="titre">On n’est pas sérieux quand on a 17 ans !<br>
                            <span class="auteur">De Nathalie BECKER</span>
                        </p>

                        <p class="resume">
                            <br>
                            Se construire, grandir. L’insouciance.<br>
                            Les Premières fois. Mais quand construction rime avec destruction, comment dissocier la crise d’ado du mal-être profond ?<br>
                            Sorti de l’obscurité, Tristan nous livre son vécu, ses angoisses existentielles.<br>
                            Une maladie, quatre parcours. Quand tout s’embrouille, il faut semer des mots pour trouver son chemin.<br><br>
                        </p>

                        <div class="btn">
                            <a href="https://francedepression.fr/index.php/content-page/item/321-on-nest-pas-serieux-quand-on-a-17-ans"><button>Découvrir ➜</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--FIN THEATRE-->
    <!--ACTION-->
    <section class="action">
        <div class="Info">
            <div class="contenuA">
                <span class="InfoStyle">Vous souhaitez créer une antenne ? <br>Vous souhaitez nous soutenir ?<br><br></span>

                <div class="btnAction">
                    <a href="https://francedepression.fr/index.php/l-association/creer-une-antenne" class="button-container">
                        <span>Créer une antenne</span>
                        <img src="images/commun/antenne.PNG" alt="Créer une antenne" class="button-image">
                    </a>

                    <a href="https://francedepression.fr/index.php/l-association/devenir-adherent" class="button-container">
                        <span>Devenir adhérent</span>
                        <img src="images/commun/adherent.PNG" alt="Devenir adhérent" class="button-image">
                    </a>

                    <a href="https://francedepression.fr/index.php/l-association/faire-un-don" class="button-container">
                        <span>Faire un don<br><br></span>
                        <img src="images/commun/don.PNG" alt="Faire un don" class="button-image">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--FIN ACTION-->
    <!--BOUTON RETOUR VERS LE HAUT-->
    <section>
        <img id="retourHaut" src="images/commun/fleche.png" alt="fleche retour">
    </section>
    <!--FIN BOUTON RETOUR VERS LE HAUT-->
</main>

<?php

require_once 'footer.php';