<?php

use Grp2021\app\Exceptions\AuthentificationException;
use Grp2021\app\Messages;


$title="Connexion";
$page="connexion";
require_once "header.php";
$auth = getAuth();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try{
        if (empty($_POST['email']) || empty($_POST['mdp'])) {
            throw new AuthentificationException("Entrez un email et un mot de passe","warning");
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