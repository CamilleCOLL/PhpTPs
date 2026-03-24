<?php

namespace modeles;
class Personnage
{
    public string $nom;
    public string $classe;
    public int $niveau = 1;
    public int $ptsDeVie;
    public int $ptsDeVieMax;

    public function sePresenter(): string
    {
        return "[$this->classe] $this->nom, niveau $this->niveau - PV: $this->ptsDeVie/$this->ptsDeVieMax";
    }

    public function estEnVie(): bool
    {
        return $this->ptsDeVie > 0;
    }

    public function seSoigner(int $pts): string
    {
        $this->ptsDeVie += $pts;
        if ($this->ptsDeVie > $this->ptsDeVieMax) {
            $this->ptsDeVie = $this->ptsDeVieMax;
        }

        return "$this->nom a été soigné de $pts points de vie. Points de vie actuels : $this->ptsDeVie/$this->ptsDeVieMax.";
    }

    public function recevoirDegats(int $pts): string
    {
        $this->ptsDeVie -= $pts;
        if ($this->ptsDeVie < 0) {
            $this->ptsDeVie = 0;
            return "$this->nom a reçu $pts points de dégâts et est tombé au combat.";
        }

        return "$this->nom a reçu $pts points de dégâts. Points de vie actuels : $this->ptsDeVie/$this->ptsDeVieMax.";
    }

    public function monterDeNiveau(): string
    {
        $this->niveau++;
        $this->ptsDeVieMax += 20; // Augmente les points de vie max à chaque niveau
        $this->ptsDeVie = $this->ptsDeVieMax; // Restaure les points de vie à chaque montée de niveau

        return "Félicitations ! $this->nom a atteint le niveau $this->niveau.";
    }

    // Eligible à rejoindre une guilde si niveau >= 5
    public function estEligible()
    {
        return $this->niveau >= 5;
    }
}