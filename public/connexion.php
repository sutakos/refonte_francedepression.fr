<?php
use Grp2021\app\bddConnect;
use Grp2021\app\enregistrementUser;
use Grp2021\app\Exceptions\AuthentificationException;
use Grp2021\app\Exceptions\BddConnectException;
use Grp2021\app\Messages;
use Grp2021\app\userRepository;

$title="Connexion";
$page="connexion";
require_once "header.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Si utilisateur déjà connecté
if (isset($_SESSION['user_id'])) {
    Messages::goTo("Vous êtes déjà connecté", "warning", "index.php");
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
    try{
        if (empty($_POST['email']) || empty($_POST['mdp'])) {
            throw new AuthentificationException("Entrez un email et un mot de passe","warning");
        }
        $userid = $auth->connexion($_POST['email'], $_POST['mdp']);
        $_SESSION['user_id'] = $userid;
        $role = $auth->checkRole($_POST['email']);
        $_SESSION['role']=$role;
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
    <input type="password" name="mdp" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
</form>
    <div>
        <p>Vous n'avez pas encore de compte ?</p>
        <a href="inscription.php">
            <button type="button">S'inscrire</button>
        </a>
    </div>

<?php
require_once 'footer.php';