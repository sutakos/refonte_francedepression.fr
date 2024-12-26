<?php

use Grp2021\app\Messages;

$title='Profil';
$page='profil';
require_once 'header.php';

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    Messages::goTo("Déconnexion avec succès","success","index.php");
    exit();
}

?>
<body>
<div class="container">
    <h1>Profil Utilisateur</h1>
    <p><strong>Email :</strong> <?php echo $_SESSION['email']; ?></p>
    <p><strong>Rôle :</strong> <?php echo $_SESSION['role']; ?></p>

    <!-- Bouton visible uniquement pour les administrateurs -->
    <div class="buttons">
        <?php if ($_SESSION['role'] === 'admin') : ?>
            <button onclick="window.location.href='admin.php';">Voir graphique</button>
        <?php endif; ?>
    </div>
</div>

<!-- Bouton de déconnexion -->
<form method="POST">
    <button name="logout" type="submit">Se déconnecter</button>
</form>

</body>
</html>

<?php
require_once 'footer.php';
