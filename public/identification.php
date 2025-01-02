<?php
$title="Identification";
$page="identification";
require_once 'header.php';

// Si utilisateur déjà connecté
if (isset($_SESSION['user_id'])) {
    echo '<script>window.location.href = "profil.php"</script>';
    exit;
}

?>

<div class="banniere">
    <img src="images/commun/Bannière.png" alt="Bannière" class="banniere" alt="Bannière">
</div>
<div class="container mt-5">
    <h2>Identification</h2>
    <div class="container">
        <ul class="nav nav-tabs" role="tablist">

                <a class="nav-link active" id="signin-tab" data-bs-toggle="tab" href="#signin" role="tab"
                   aria-controls="signin" aria-selected="true">Connexion</a>


                <a class="nav-link" id="signup-tab" data-bs-toggle="tab" href="#signup" role="tab" aria-controls="signup"
                   aria-selected="false">Inscription</a>

        </ul>


        <div class="tab-content mt-3">
            <!-- Contenu de l'onglet "Authentification" -->
            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                <h3>Connexion</h3>
                <form class="row g-3 needs-validation" action="connexion.php" method="post">
                    <div class="col-md-4 ">
                        <label for="signin-email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="signin-email"
                               placeholder="Votre adresse email..."
                               required>
                    </div>
                    <div class="col-md-4">
                        <label for="signin-pwd" class="form-label">Mot de passe</label>
                        <input type="password" name="mdp" class="form-control" id="signin-pwd"
                               placeholder="Votre mot de passe"
                               required>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <button class="btn btn-primary" type="submit">Se connecter</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Contenu de l'onglet "Enregistrement" -->
            <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                <h3>Inscription</h3>
                <form class="row g-3 needs-validation" action="inscription.php" method="post">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label for="signup-email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="signup-email"
                                   placeholder="Votre adresse email..."
                                   required>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label for="signup-pwd" class="form-label">Mot de passe</label>
                            <input type="password" name="mdp" class="form-control" id="signup-pwd"
                                   placeholder="Votre mot de passe..."
                                   required>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label for="signup-repwd" class="form-label">Saisir à nouveau</label>
                            <input type="password" name="confirm_mdp" class="form-control" id="signup-repwd"
                                   placeholder="Votre mot de passe..."
                                   required>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-3">

                            <button class="btn btn-primary " type="submit">S'inscrire</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';