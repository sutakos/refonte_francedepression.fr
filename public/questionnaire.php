<?php

use Grp2021\app\bddConnect;
use Grp2021\app\enregistrementForm;
use Grp2021\app\Exceptions\BddConnectException;
use Grp2021\app\Exceptions\FormulaireException;
use Grp2021\app\formRepository;
use Grp2021\app\Messages;

$title="Questionnaire";
$page="questionnaire";
require_once 'header.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION['user_id'])) {
    Messages::goTo("Veuillez vous connectez pour répondre au formulaire","info","connexion.php");
    exit;
}
if(isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
    echo <<<HTML
          <div class='alert alert-info alert-dismissible fade show' role='alert'>
          Si vous voulez voir les graphiques, merci de cliquer sur votre profil.
          <button class="alert-close" onclick="this.parentElement.style.display='none';">&times;</button>
          </div>
          HTML;
}
// Connexion à la base de données
$bdd = new bddConnect();
try {
    $pdo = $bdd->connexion();
} catch (BddConnectException $e) {
    Messages::goTo($e->getMessage(), $e->getType(), "index.php");
    exit;
}

$trousseau = new formRepository($pdo);
$repForm = new enregistrementForm($trousseau);

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try{
        // Vérification des réponses obligatoires
        if(empty($_POST['statut']) || empty($_POST['age']) || empty($_POST['sexe']) || empty($_POST['region']) || empty($_POST['triste'])) {
            throw new FormulaireException("Les questions avec des * devant sont obligatoires.","warning");
        }
        if(isset($_POST['frequency']))
            $frequence = (int)$_POST['frequency'];
        else $frequence = -1;
        $triste = $_POST['triste'] === "oui" ? 1 : 0;
        //Enregistrement des réponses
        if($repForm->enregistrement($_SESSION['user_id'],$_POST['statut'],$_POST['age'], $_POST['sexe'],$_POST['region'] ,$triste, $frequence, $_POST['amelioration'])){
            $message = "Enregistrement du questionnaire réussie. Merci de votre temps.";
            $message ="VOUS AVEZ SELECTIONNE: ".$_POST['frequency'];
            $type ="success";
            $redirection="index.php";
        }

    } catch (FormulaireException $e){
        $message = $e->getMessage();
        $type = $e->getType();
        $redirection = "questionnaire.php";
    }
    Messages::goTo($message, $type, $redirection);
}


?>
<main>
        <!--CHEMIN-->
        <section>
            <div class="chemin">
                <a href="questionnaire.php">Formulaire</a>
            </div>
        </section>

        <div class="questionnaire">
            <p>Nous voulons mieux comprendre vos besoins pour vous offrir des ressources utiles.<br>
                Vos réponses sont anonymes et nous aideront à créer un espace sûr et accueillant pour tous.<br><br>
                Les données collectées sont utilisées exclusivement à des fins statistiques.<br>
                Ces traitements permettent d'analyser des tendances générales, d'améliorer les services et de mieux comprendre les besoins des utilisateurs.<br><br>

                Toutes questions précédés du signe <span>*</span> sont obligatoires
            </p>
            <br>

            <form id="questionForm" action="" method="POST">
                <h2><span>*</span>Quel est votre activité scolaire ou professionnel ?</h2>
                <p>Si vous ne souhaitez pas répondre, mettez la réponse "Ne souhaite pas répondre"</p>
                <label for="activitechoisi"></label>
                <select name="statut" id="activitechoisi">
                    <option value="nspr">Ne souhaite pas répondre</option>
                    <option value="semo">Scolarité en milieu ordinaire</option>
                    <option value="sdsen">Scolarité en dispositif spécialisé de l'Éducation Nationale</option>
                    <option value="ef">Instruction en Famille</option>
                    <option value="sems">Scolarité dans un établissement médico-social (IME,IMPRO...)</option>
                    <option value="fp">Formation professionnelle</option>
                    <option value="es">Études supérieures</option>
                    <option value="apmo">Activités professionnelle en milieu ordinaire</option>
                    <option value="apmp">Activités professionnelle en milieu protégé (ESAT,Entreprises adaptée...)</option>
                    <option value="saasop">Sans aucune activité scolaire ou professionnelle</option>
                    <option value="a">Autres</option>
                </select>
                <br><br>

                <h2><span>*</span>Quel âge avez-vous ?</h2>
                <label>
                    <input type="number" name="age" min="0" name="age">
                </label>
                <br><br>

                <h2><span>*</span>Votre sexe</h2>
                <label>
                    <input type="radio" name="sexe" value="M" required> M
                </label>
                <label>
                    <input type="radio" name="sexe" value="F" required> F
                </label>
                <br><br>

                <h2><span>*</span>Où habitez vous ?</h2>
                <p>Si vous ne souhaitez pas répondre, mettez la réponse "Ne souhaite pas répondre"</p>
                <label for="regionchoisi"></label>
                <select name="region" id="regionchoisi">
                    <option value="nspr">Ne souhaite pas répondre</option>
                    <option value="idf" >Île-de-France</option>
                    <option value="hm" >Haute-Normandie</option>
                    <option value="l" >Lorraine</option>
                    <option value="pt" >Poitou-Charentes</option>
                    <option value="ra" >Rhône-Alpes</option>
                    <option value="paca" >Provence-Alpes-Côte d'Azur</option>
                    <option value="als" >Alsace</option>
                    <option value="aqui" >Aquitaine</option>
                    <option value="auv" >Auvergne</option>
                    <option value="bourg" >Bourgogne</option>
                    <option value="bret" >Bretagne</option>
                    <option value="cen" >Centre</option>
                    <option value="ca" >Champagne-Ardenne</option>
                    <option value="cor" >Corse</option>
                    <option value="fc" >Franche-Comté</option>
                    <option value="lr" >Languedoc-Roussillon</option>
                    <option value="mp" >Midi-Pyrénées</option>
                    <option value="lim" >Limousin</option>
                    <option value="npdc" >Nord-Pas-de-Calais</option>
                    <option value="bn" >Basse-Normandie</option>
                    <option value="pl" >Pays de la Loire</option>
                    <option value="p" >Picardie</option>
                </select>
                <br><br>

                <h2><span>*</span>Vous êtes vous sentie seul(e) ces dernières semaines?</h2>
                <label>
                    <input type="radio" name="triste" value="oui" required> Oui
                </label>
                <label>
                    <input type="radio" name="triste" value="non" required> Non
                </label>
                <br><br>

                <h2>À quelle fréquence utilisez-vous le site</h2>
                <div class="container">
                    <input type="radio" name="frequency" id="not-often" value="1">
                    <label for="not-often">Pas beaucoup</label>
                    <input type="radio" name="frequency" id="sometimes" value="2">
                    <label for="sometimes"></label>
                    <input type="radio" name="frequency" id="often" value="3">
                    <label for="often"></label>
                    <input type="radio" name="frequency" id="very-often" value="4">
                    <label for="very-often"></label>
                    <input type="radio" name="frequency" id="always" value="5">
                    <label for="always">Beaucoup</label>
                </div>
                <br><br>

                <h2>Si vous pouviez améliorer notre site, que serait-ce ?</h2>
                <label>
                    <input type="text" name="amelioration">
                </label>
                <br><br>

            <button type="submit">Envoyer</button>
        </form>
    </div>
</main>

<?php
require_once 'footer.php';
