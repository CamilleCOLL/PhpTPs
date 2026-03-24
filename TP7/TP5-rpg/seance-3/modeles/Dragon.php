<?php

class Dragon extends Monstre
{

    private string $typeEnnemi;

    public function __construct(string $nom, int $pv, int $xpDonnee, string $typeEnnemi)
    {
        parent::__construct($nom, $pv, $xpDonnee);
        $this->typeEnnemi = $typeEnnemi;
    }

    public function calculerDegats()
    {
        return ($this->pv * 3) + ($this->xpDonnee * 4);
    }
}