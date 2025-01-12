<?php

use Grp2021\app\bddConnect;
use Grp2021\app\enregistrementUser;
use Grp2021\app\Exceptions\AuthentificationException;
use Grp2021\app\Exceptions\BddConnectException;
use Grp2021\app\Messages;
use Grp2021\app\userRepository;

require_once "header.php";

// Connexion à la base de données
$bdd = new bddConnect();
try {
    $pdo = $bdd->connexion();
} catch (BddConnectException $e) {
    Messages::goTo($e->getMessage(), $e->getType(), "index.php");
    exit;
}

$trousseau = new UserRepository($pdo);
$auth= new enregistrementUser($trousseau);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Vérification si les données ne sont pas vide
        if (empty($_POST['email']) || empty($_POST['mdp']) || empty($_POST['confirm_mdp'])) {
            throw new AuthentificationException("Tous les champs doivent être remplis.", "warning");
        }
        // Enregistrer le nouvel utilisateur
        if($auth->inscription($_POST['email'], $_POST['mdp'], $_POST['confirm_mdp'])){
            $message = "Inscription réussie. Vous pouvez maintenant vous connecter.";
            $type = "success";
            $redirection = "identification.php";
        }

    } catch (AuthentificationException $e) {
        $message = $e->getMessage();
        $type = $e->getType();
        $redirection = "identification.php";
    }

    Messages::goTo($message, $type, $redirection);
}