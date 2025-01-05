<?php
namespace Grp2021\app;
use PDO;

class dataGraphics
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
        public function dataHF(): array
        {
        // Requête SQL pour compter le nombre d'hommes et de femmes
        $requete = "SELECT sexe, COUNT(user_id) as nb FROM formulaire WHERE triste = true GROUP BY sexe";

        // Préparer et exécuter la requête
        $stmt = $this->dbConnexion->prepare($requete);
        $stmt->execute();

        // Initialiser le tableau des résultats
        $dataHF = [
            'hommes' => 0,
            'femmes' => 0
        ];

        // Parcourir les résultats
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($row['sexe'] === 'H') {
                $dataHF['hommes'] = (int) $row['nb'];
            } elseif ($row['sexe'] === 'F') {
                $dataHF['femmes'] = (int) $row['nb'];
            }
        }
        return $dataHF;
    }


}
