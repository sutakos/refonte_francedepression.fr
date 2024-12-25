<?php

namespace Grp2021\app;

use Grp2021\app\Exceptions\BddConnectException;

class bddConnect
{
    public \PDO $pdo;
    protected string $host;
    protected string $login;
    protected string $password;
    protected string $dbname;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->login = 'root';
        $this->password = 'root';
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