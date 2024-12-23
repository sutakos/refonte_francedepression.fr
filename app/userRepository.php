<?php
namespace Grp202_1\php;
class userRepository implements IUserRepository
{

    private PDO $dbConnexion;

    public function __construct(\PDO $dbConnexion)
    {
        $this->dbConnexion = $dbConnexion;
    }

    public function saveUser(User $user): bool
    {
        //requete SQL pour insérer les données
        $sql = "INSERT INTO users (email, age,sexe,triste) VALUES (:email, :age, :sexe, :triste)";
        $stmt = $this->dbConnexion->prepare($sql);
        $email = $user->getEmail();
        $stmt->bindParam(':email', $email);
        $age = $user->getAge();
        $stmt->bindParam(':age', $age);
        $sexe = $user->getSexe();
        $stmt->bindParam(':sexe', $sexe);
        $triste = $user->getTriste();
        $stmt->bindParam(':triste', $triste);
        $stmt->execute();
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
