<?php
namespace Grp2021\app;
use Grp2021\app\Exceptions\AuthentificationException;
use Grp2021\app\Exceptions\formulaireException;
use MongoDB\Driver\Exception\AuthenticationException;
use PDO;
use PDOException;

class enregistrementUser {

    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws AuthentificationException
     */
    public function inscription(string $email, string $mdp, string $confirm_mdp) : bool {
        try {
            if ($_POST['mdp'] !== $_POST['confirm_mdp']) {
                throw new AuthentificationException("Les mots de passe ne correspondent pas.", "warning");
            }
            // Vérifier si l'utilisateur existe déjà
            if ($this->userRepository->findUserByEmail($_POST['email']) !== null) {
                throw new AuthentificationException("L'email est déjà utilisée.", "warning");
            }
            $this->userRepository->saveUser(new user($email, $mdp));
            return true;
        }
        catch (AuthentificationException $e) {
            Messages::goTo($e->getMessage(),$e->getType(),"inscription.php");
        }
        return false;

    }

    /**
     * @throws AuthentificationException
     */
    public function connexion(string $email, string $password) : ?int {
        try{
            $user = $this->userRepository->findUserByEmail($email);
            if($user === null){
                throw new AuthentificationException("Email inexistant","warning");
            }
            if(!password_verify($password, $user->getMdp())){
                throw new AuthentificationException("Mot de passe incorrect","warning");
            }
            // Requête pour récupérer l'ID de l'utilisateur
            $stmt = $this->userRepository->getPDO()->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user_id = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user_id["id"];

        }
        catch(AuthentificationException $e){
            Messages::goTo($e->getMessage(),$e->getType(),"connexion.php");
        }
        return null;
    }


}