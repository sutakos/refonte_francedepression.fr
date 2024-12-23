<?php

namespace Grp2021\app;
class Messages {

  /**
   * Effectue une redirection et enregistre un message d'alerte en session
   * @param string $message Texte du message d'alerte
   * @param string $type Couleur bootstrap de l'alerte
   * @param string $page Nom du fichier public de destination
   * @return void
   */
  public static function goTo(string $message, string $type, string $page) : void {
    $_SESSION['flash'][$type] = $message;
    header("Location: /$page");
  }

  /**
   * Affiche les messages d'alerte présent dans la session
   * @return void
   */
  public static function messageFlash() : void {
    if(isset($_SESSION['flash'])) {
      foreach($_SESSION['flash'] as $type => $message) {
        echo <<<HTML
          <div class='alert alert-$type alert-dismissible fade show' role='alert'>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          $message</div>
          HTML;
      }
      unset($_SESSION['flash']);
    }
  }
}