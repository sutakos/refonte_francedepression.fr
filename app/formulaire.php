<?php
namespace Grp2021\app;
class formulaire
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

}