<?php
namespace Grp2021\app;
class user
{
    /* INSCRIPTION */
    private string $email;
    private string $mdp;


    public function __construct(string $email, string $mdp)
    {
        $this->mdp = $mdp;
        $this->email = $email;

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