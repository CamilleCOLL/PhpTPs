<?php
require_once "modeles/Monstre.php";
class Gobelin extends Monstre
{

    private string $typeEnnemi;

    public function __construct(string $nom, int $pv, int $xpDonnee, string $typeEnnemi)
    {
        parent::__construct($nom, $pv, $xpDonnee);
        $this->typeEnnemi = $typeEnnemi;
    }

    public function calculerDegats()
    {
        return ($this->pv * 1.5) + ($this->xpDonnee * 2);
    }
}