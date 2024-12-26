<?php
namespace Grp2021\app;
use PDO;

class formRepository implements IFormRepository
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

    public function saveForm(formulaire $form): bool
    {
        //requete SQL pour insérer les données
        $requete = "INSERT INTO formulaire (user_id,statut,age,sexe,region,triste,frequence,amelioration)  VALUES (:user_id,:statut,:age,:sexe,:region,:triste,:frequence,:amelioration)";
        $requeteprepare = $this->dbConnexion->prepare($requete);
        $userId = $form->getUserId();
        $requeteprepare->bindParam(':user_id', $userId);
        $statut = $form->getStatut();
        $requeteprepare->bindParam(':statut', $statut);
        $age = $form->getAge();
        $requeteprepare->bindParam(':age', $age);
        $sexe = $form->getSexe();
        $requeteprepare->bindParam(':sexe', $sexe);
        $region = $form->getRegion();
        $requeteprepare->bindParam(':region', $region);
        $triste = $form->getTriste();
        var_dump($triste);
        $requeteprepare->bindParam(':triste',$triste);
        $frequence = $form->getFrequence();
        $requeteprepare->bindParam(':frequence', $frequence);
        $amelioration = $form->getAmelioration();
        $requeteprepare->bindParam(':amelioration', $amelioration);
        $requeteprepare->execute();
        return true;
    }


    /**
     * Recherche un utilisateur à partir de son email dans la base MariaDB.
     * Retourne l'utilisateur si l'utilisateur est enregistré. Sinon null
     * @param int $id
     * @return formulaire|null
     */
    public function findFormByID(int $id): ?formulaire
    {
        $requete = "SELECT * FROM formulaire WHERE user_id = :user_id";
        $requetepreparer = $this->dbConnexion->prepare($requete);
        $requetepreparer->bindParam(':user_id', $id);
        $requetepreparer->execute();
        $data = $requetepreparer->fetch(PDO::FETCH_ASSOC);
        if (!$data){
            return null;
        }
        return new formulaire($id,$data['statut'],$data['age'], $data['sexe'],$data['region'] ,$data['triste'], $data['frequence'], $data['amelioration']);


    }
}
