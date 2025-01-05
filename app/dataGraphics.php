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

    public function dataR(): array
    {
        // Requête SQL pour compter le nombre d'utilisateurs par région où triste = true
        $requete = "SELECT region, COUNT(user_id) as nb FROM formulaire WHERE triste = true GROUP BY region";
        // Préparer et exécuter la requête
        $stmt = $this->dbConnexion->prepare($requete);
        $stmt->execute();

        // Initialiser le tableau des résultats
        $dataR = [
            'nspr'=>0,
            'idf'=>0,
            'hm'=>0,
            'l'=>0,
            'pt'=>0,
            'ra'=>0,
            'paca'=>0,
            'als'=>0,
            'aqui'=>0,
            'auv'=>0,
            'bourg'=>0,
            'bret'=>0,
            'cen'=>0,
            'ca'=>0,
            'cor'=>0,
            'fc'=>0,
            'lr'=>0,
            'mp'=>0,
            'lim'=>0,
            'npdc'=>0,
            'bn'=>0,
            'pl'=>0,
            'p'=>0
        ];

        // Parcourir les résultats et remplir le tableau avec les comptes de chaque région
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Vérifier si la région existe dans le tableau
            if (array_key_exists($row['region'], $dataR)) {
                // Assigner le nombre d'utilisateurs à la région correspondante
                $dataR[$row['region']] = (int) $row['nb'];
            }
        }

        return $dataR;
    }
    public function dataA(): array
    {
        // Requête SQL pour compter le nombre d'hommes et de femmes
        $requete = "SELECT age, COUNT(user_id) as nb FROM formulaire WHERE triste = true GROUP BY age";

        // Préparer et exécuter la requête
        $stmt = $this->dbConnexion->prepare($requete);
        $stmt->execute();

        // Initialiser le tableau des résultats
        $dataAge = [
            '0-9' => 0,
            '10-19' => 0,
            '20-29' => 0,
            '30-39' => 0,
            '40-49' => 0,
            '50-59' => 0,
            '60-69' => 0,
            '70+' => 0
        ];

        // Parcourir les résultats
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $age = (int) $row['age'];
            $count = (int) $row['nb'];

            // Déterminer la tranche d'âge
            if ($age >= 0 && $age <= 9) {
                $dataAge['0-9'] += $count;
            } elseif ($age >= 10 && $age <= 19) {
                $dataAge['10-19'] += $count;
            } elseif ($age >= 20 && $age <= 29) {
                $dataAge['20-29'] += $count;
            } elseif ($age >= 30 && $age <= 39) {
                $dataAge['30-39'] += $count;
            } elseif ($age >= 40 && $age <= 49) {
                $dataAge['40-49'] += $count;
            } elseif ($age >= 50 && $age <= 59) {
                $dataAge['50-59'] += $count;
            } elseif ($age >= 60 && $age <= 69) {
                $dataAge['60-69'] += $count;
            } else {
                // Pour les âges >= 70
                $dataAge['70+'] += $count;
            }
        }

        return $dataAge;
    }



}
