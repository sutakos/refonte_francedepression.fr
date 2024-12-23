<?php
namespace Grp202_1\php;
class user
{
    private string $email;
    private string $mdp;
    private int $age;
    private string $sexe;
    private bool $triste;

    public function __construct(string $email, string $mdp,int $age, string $sexe, bool $triste )
    {
        $this->mdp = $mdp;
        $this->triste = $triste;
        $this->sexe = $sexe;
        $this->age = $age;
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