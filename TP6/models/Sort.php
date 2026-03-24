<?php

namespace models;

class Sort
{

    public string $nom;
    public string $element;
    public int $degatsBase;
    public int $coutMana;

    public function __construct($nom, $element, $degatsBase, $coutMana = 10)
    {
        if (empty($nom))
        {
            throw new \Exception("Le nom est obligatoire");
        }
        if ($degatsBase <= 0)
        {
            throw new \Exception("Les dégats doivent être strictement positifs");
        }
        if ($coutMana < 0)
        {
            throw new \Exception("Le cout en mana doit être supérieur ou égal à zéro");
        }
            $this->nom = $nom;
            $this->element = $element;
            $this->degatsBase = $degatsBase;
            $this->coutMana = $coutMana;
    }

    public function decrire()
    {
        return $this->element + " - " + $this->nom + " - " + $this->degatsBase + " dégats - Cout : " + $this->coutMana + " mana";
    }

    public function estAbordable($manaDisponible)
    {
        if ($manaDisponible >= $this->coutMana)
        {
            return True;
        }
        return False;
    }

    public function calculerDegatsReels($niveau)
    {
        return $this->degatsBase + ($niveau*5);
    }

}