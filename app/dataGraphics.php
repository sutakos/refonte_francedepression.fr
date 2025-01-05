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
        // Requête SQL pour compter le nombre d'hommes et de femmes
        $requete = "SELECT region, COUNT(user_id) as nb FROM formulaire WHERE triste = true GROUP BY region";
        // Préparer et exécuter la requête
        $stmt = $this->dbConnexion->prepare($requete);
        $stmt->execute();

        // Initialiser le tableau des résultats
        $dataR = [
            'nspr'=>0,
            'idf'=>0,
            'hm'=>0,

l" >L
pt" >
ra" >
    paca"
als"
aqui"
auv"
bourg
bret"
cen"
ca" >
cor"
fc" >
lr" >
    mp" >
lim"
npdc"
bn" >
    pl" >
p" >P
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
