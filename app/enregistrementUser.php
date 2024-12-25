<?php
namespace Grp2021\app;
use Grp2021\app\Exceptions\AuthentificationException;
use PDO;

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
            if ($email !== $confirm_mdp) {
                throw new AuthentificationException("Les mots de passe ne correspondent pas.", "warning");
            }
            // Vérifier si l'utilisateur existe déjà
            if ($this->userRepository->findUserByEmail($email) !== null) {
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
    public function connexion(string $email, string $mdp) : ?int {
        try{
            $user = $this->userRepository->findUserByEmail($email);
            if($user === null){
                throw new AuthentificationException("Email inexistant","warning");
            }
            if(!password_verify($mdp, $user->getMdp())){
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

    /**
     * @throws AuthentificationException
     */
    public function checkRole(int $userid) : ?int {
        try{
            $estAdmin = $this->userRepository->findIfAdmin($email);
            if($estAdmin)
                return "admin";
            return "user";

        }
        catch(AuthentificationException $e){
            Messages::goTo($e->getMessage(),$e->getType(),"connexion.php");
        }
        return null;
    }


}