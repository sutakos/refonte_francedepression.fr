<?php

use Grp2021\app\bddConnect;
use Grp2021\app\enregistrementUser;
use Grp2021\app\Exceptions\AuthentificationException;
use Grp2021\app\Exceptions\BddConnectException;
use Grp2021\app\Messages;
use Grp2021\app\userRepository;


$title = "Inscription";
$page = "inscription";
require_once 'header.php';

// Si utilisateur déjà connecté
if (isset($_SESSION['user_id'])) {
    Messages::goTo("Vous êtes déjà connecté", "success", "index.php");
    exit;
}

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
            $redirection = "connexion.php";
        }

    } catch (AuthentificationException $e) {
        $message = $e->getMessage();
        $type = $e->getType();
        $redirection = "inscription.php";
    }

    Messages::goTo($message, $type, $redirection);
}

?>

    <!-- Formulaire HTML pour l'inscription -->
    <form method="POST" action="">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="mdp" placeholder="Mot de passe" required>
        <input type="password" name="confirm_mdp" placeholder="Confirmez le mot de passe" required>
        <button type="submit">S'inscrire</button>
    </form>

<?php
require_once 'footer.php';
