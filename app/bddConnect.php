<?php

namespace Grp202_1\php;

class BddConnect
{
    public \PDO $pdo;
    protected ?string $host = null;
    protected ?string $login = null;
    protected ?string $password = null;
    protected ?string $dbname = null;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->login = 'lucas.lablanche';
        $this->password = '58d50fba';
        $this->dbname = 'grp202_1';
    }

    /**
     * @throws BddConnectException
     */
    public function connexion(): \PDO
    {
        try {

            $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8";
            $this->pdo = new \PDO($dsn, $this->login, $this->password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new BddConnectException("Erreur de connexion BDD : il faut configurer la classe BDDConnect avec les bonnes valeurs");
        }

        return $this->pdo;
    }
}