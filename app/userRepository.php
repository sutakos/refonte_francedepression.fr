<?php
namespace Grp2021\app;
use PDO;

class userRepository implements IUserRepository
{

    private PDO $dbConnexion;

    public function __construct(\PDO $dbConnexion)
    {
        $this->dbConnexion = $dbConnexion;
    }

    public function getPDO(): PDO
    {
        return $this->dbConnexion;
    }

    public function saveUser(User $user): bool
    {
        //requete SQL pour insérer les données
        $requete = "INSERT INTO users (email, password)  VALUES (:email,:password)";
        $requeteprepare = $this->dbConnexion->prepare($requete);
        $email = $user->getEmail();
        $requeteprepare->bindParam(':email', $email);
        $mdp = $user->getMdp();
        $requeteprepare->bindParam(':password', $mdp);
        $requeteprepare->execute();
        return true;
    }


    /**
     * Recherche un utilisateur à partir de son email dans la base MariaDB.
     * Retourne l'utilisateur si l'utilisateur est enregistré. Sinon null
     * @param string $email
     * @return user|null
     */
    public function findUserByEmail(string $email): ?user
    {
            $requete = "SELECT * FROM users WHERE email = :email";
            $requetepreparer = $this->dbConnexion->prepare($requete);
            $requetepreparer->bindParam(':email', $email);
            $requetepreparer->execute();
            $data = $requetepreparer->fetch(PDO::FETCH_ASSOC);
            if (!$data){
                return null;
            }
            return new user($data['email'], $data['mdp'], 0, null, false);


    }
}
