<?php

use Grp202_1\php\AuthentificationException;
use Grp202_1\php\BddConnect;
use Grp202_1\php\BddConnectException;
use Grp202_1\php\enregistrementUser;
use Grp202_1\php\Messages;
use Grp202_1\php\userRepository;

require_once 'header.php';

if(isset($_SESSION['user_id'])){
    Messages::goTo("Vous êtes déjà connecté","warning","index.php");
    exit;
}

$bdd = new bddConnect();
try{
    $pdo = $bdd->connexion();
}
catch (BddConnectException $e){
    Messages::goTo($e->getMessage(), $e->getType(), "index.php");
}

$trousseau = new UserRepository($pdo);
$auth = new enregistrementUser($pdo);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try{
        if (empty($_POST['email']) || empty($_POST['mdp'])) {
            throw new AuthentificationException("Entrez un email et un mot de passe");
        }
        $userid = $auth->connexion($_POST['email'], $_POST['mdp']);
        $_SESSION['user_id'] = $userid;
        $message ="Authentification réussie";
        $type="success";
        $redirection = $_SERVER['HTTP_REFERER'];

    }catch (AuthentificationException $e) {
        $message = $e->getMessage();
        $type = "danger";
        $redirection = "connexion.php";
    }
    Messages::goTo($message, $type, $redirection);
}
?>

<!-- Formulaire HTML pour la connexion -->
<form method="POST" action="">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
</form>

<?php
require_once 'footer.php';