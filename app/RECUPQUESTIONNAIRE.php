<?php
namespace Grp2021\app\php;

use Grp2021\app\userRepository;

$bdd = new bddConnect();

try {
    $pdo = $bdd->connexion();
}
catch(BddConnectException $e) {
    Messages::goTo(
        $e->getMessage(),
        $e->getType(),
        "index.php");
    die();
}

$trousseau = new userRepository($pdo);
$auth = new enregistrementUser($trousseau);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if(empty($_POST['email']) || empty($_POST['sexe']) || empty($_POST['age'] || empty($_POST['triste']))) {
            throw new enregistrementException("Veuillez renseignez toutes les informations", "warning");
        }
        $retour = $auth->enregistrer($_POST['email'], $_POST['age'], $_POST['sexe'], $_POST['triste']);
        $message = "Vous êtes enregistré. Vous pouvez vous authentifier";
        $type = "success";
    }
    catch(enregistrementException $e) {
        $message = $e->getMessage();
        $type = $e->getType();
    }
}
else {
    $message = "Accès interdit";
    $type = "danger";
}

Messages::goTo($message, $type, "index.php");

require_once 'footer.php';