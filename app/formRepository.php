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
        $requete = "INSERT INTO formulaire (user_id,statut,age,sexe,triste,frequence,amelioration)  VALUES (:user_id,:statut,:age,:sexe,:triste,:frequence,:amelioration)";
        $requeteprepare = $this->dbConnexion->prepare($requete);
        $requeteprepare->bindValue(':user_id', $form->getUserId());
        $requeteprepare->bindValue(':statut', $form->getStatut());
        $requeteprepare->bindValue(':age', $form->getAge());
        $requeteprepare->bindValue(':sexe', $form->getSexe());
        $requeteprepare->bindValue(':triste', $form->getTriste());
        $requeteprepare->bindValue(':frequence', $form->getFrequence());
        $requeteprepare->bindValue(':amelioration', $form->getAmelioration());
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
        return new formulaire($data['statut'],$data['age'], $data['sexe'],$data['region'] ,$data['triste'], $data['frequence'], $data['amelioration']);


    }
}
