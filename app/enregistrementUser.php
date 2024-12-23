<?php
namespace Grp202_1\php;
use PDO;
use PDOException;

class enregistrementUser {

    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws enregistrementException
     */
    public function enregistrer(string $email, string $age, string $sexe, bool $triste) : bool {
        if(findUserByEmail($email))
            throw new enregistrementException("Vous avez déjà répondu au formulaire","warning");
        $user = new User($email, $age, $sexe, $triste);
        return $this->userRepository->saveUser($user);
    }

    /**
     * @throws enregistrementException
     */
    public function connexion(string $email, string $password) : int {
        try{
            $user = $this->userRepository->getUserByEmail($email);
            if($user === null){
                throw new AuthentificationException("Email inexistant","warning");
            }
            if(!password_verify($password, $user->password)){
                throw new AuthentificationException("Mot de passe incorrect","warning");
            }
            // Requête pour récupérer l'ID de l'utilisateur
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user_id = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user_id["id"];

        }
        catch(AuthentificationException $e){
            Messages::goTo($e->getMessage(),$e->getType(),"connexion.php");
        }
    }

}