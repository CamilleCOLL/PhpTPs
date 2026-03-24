<?php

abstract class Monstre
{
    private string $nom;
    private int $pv;
    private int $xpDonnee;

    public function __construct(string $nom, int $pv, int $xpDonnee)
    {
        $this->nom = $nom;
        $this->pv = $pv;
        $this->xpDonnee = $xpDonnee;
    }

    abstract public function calculerDegats();


}