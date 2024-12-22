<?php
$title="Questionnaire";
$page="questionnaire";
require_once 'header.php';
?>
<main>
    <div class="Questionnaire">
        <h1>Questionnaire</h1>
        <p>Nous voulons mieux comprendre vos besoins pour vous offrir des ressources utiles.
            Vos réponses sont anonymes et nous aideront à créer un espace sûr et accueillant pour tous.
        </p>
        <h2>Êtes-vous adhérent ?</h2>
        <form id="questionForm" action="form.php" method="POST">
            <label>
                <input type="radio" name="adherent" value="oui" required> Oui
            </label>
            <label>
                <input type="radio" name="adherent" value="non" required> Non
            </label>

            <button type="submit">Envoyer</button>
        </form>
    </div>
</main>

<?php
require_once 'footer.php';
