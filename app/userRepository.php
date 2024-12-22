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
        $stmt = $dbConnexion->prepare($sql);
        $stmt->bindParam(':email', $user->getEmail());
        $stmt->bindParam(':age', $user->getAge());
        $stmt->bindParam(':sexe', $user->getSexe());
        $stmt->bindParam(':triste', $user->getTriste());
        $stmt->execute();
        return true;
    }


    /**
     * Recherche un utilisateur à partir de son email dans la base MariaDB.
     * Retourne l'utilisateur si l'utilisateur est enregistré. Sinon null
     * @param string $email
     * @return User|null
     */
    public function UserExist(string $email): bool
    {
        $requete = "SELECT * FROM users WHERE email = :email";
        $requetepreparer = $this->dbConnexio->prepare($requete);
        $requetepreparer->bindParam(':email', $email);
        $requetepreparer->execute();
        $data = $requetepreparer->fetch(PDO::FETCH_ASSOC);
        if (!$data)
            return false;

        return true;
    }
}
