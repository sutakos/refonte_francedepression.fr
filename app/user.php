<?php
namespace Grp2021\app;
class user
{
    /* INSCRIPTION */
    private string $email;
    private string $mdp;
    /* FORMULAIRE */
    private string $statut;
    private int $age;
    private string $sexe;
    private bool $triste;

    public function __construct(string $email, string $mdp)
    {
        $this->mdp = $mdp;
        $this->email = $email;

    }
    public function setFormulaire(string $statut,int $age,string $sexe,string $region,bool $triste,string $frequence){

    }
    public function getEmail(): string{
        return $this->email;
    }
    public function getMdp(): string{
        return $this->mdp;
    }
    public function getAge(): int{
        return $this->age;
    }
    public function getSexe(): string{
        return $this->sexe;
    }
    public function getTriste(): bool{
        return $this->triste;
    }
    
}