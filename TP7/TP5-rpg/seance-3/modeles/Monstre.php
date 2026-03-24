<?php

abstract class Monstre
{
    protected string $nom;
    protected int $pv;
    protected int $xpDonnee;

    public function __construct(string $nom, int $pv, int $xpDonnee)
    {
        $this->nom = $nom;
        $this->pv = $pv;
        $this->xpDonnee = $xpDonnee;
    }

    abstract public function calculerDegats();




}