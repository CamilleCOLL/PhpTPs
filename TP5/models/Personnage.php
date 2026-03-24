<?php

class Personnage
{
    public string $nom;
    public string $classe;
    public int $niveau = 1;
    public int $pointDeVie;
    public int $pointDeVieMax;

    public function sePresenter()
    {
        return $this->classe . " - " . $this->nom . " - Niveau : " . $this->niveau . " - PV : " . $this->pointDeVie ."/" . $this->pointDeVieMax;
    }

    public function estEnVie() : bool
    {
        if ($this->pointDeVie > 0)
        {
            return true;
        }
        return false;
    }

    public function seSoigner($points)
    {
        if ($this->pointDeVie + $points <= $this->pointDeVieMax)
        {
            $this->pointDeVie += $points;
            return "Pv gagnés : " . $points . " - Total PV : " . $this->pointDeVie;
        }else
        {
            $this->pointDeVie = $this->pointDeVieMax;
            return "Maximum de PV atteint. Restoration des PV max :  ". $this->pointDeVie."<br>";
        }
    }

    public function monterDeNiveau()
    {
        $this->niveau += 1;
        $this->pointDeVieMax += 20;
        $this->pointDeVie = $this->pointDeVieMax;
        return "Félicitation, vous êtes passé au niveau ". $this->niveau . "! <br>";
    }





}
