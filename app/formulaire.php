<?php

namespace Grp2021\app;

class formulaire
{
    /* FORMULAIRE */
    private int $user_id;
    private string $statut;
    private int $age;
    private string $sexe;
    private string $region;
    private int $triste;
    private int $frequence;
    private string $amelioration;
    public function __construct(int $user_id,string $statut,int $age,string $sexe,string $region,int $triste,string $frequence,string $amelioration){
        $this->user_id = $user_id;
        $this->statut = $statut;
        $this->age = $age;
        $this->sexe = $sexe;
        $this->region = $region;
        $this->triste = $triste;
        $this->frequence = $frequence;
        $this->amelioration = $amelioration;

    }
    public function getUserId(): int{
        return $this->user_id;
    }
    public function getStatut(): string{
        return $this->statut;
    }
    public function getAge(): int{
        return $this->age;
    }
    public function getSexe(): string{
        return $this->sexe;
    }
    public function getRegion(): string{
        return $this->region;
    }
    public function getTriste(): int{
        return $this->triste;
    }
    public function getFrequence(): int{
        return $this->frequence;
    }
    public function getAmelioration(): string{
        return $this->amelioration;
    }

}