<?php
require_once "Personnage.php";
class Archer extends Personnage
{
    private int $precision;
    private int $fleches;
    public function __construct(string $nom , int $niveau = 1, int $pvMax = 120, int $precision, int $fleches)
    {
        parent::__construct($nom, "Archer" , $niveau , $pvMax);
        $this->precision = $precision;
        $this->fleches = $fleches;
    }

    public function getPrecision(): int
    {
        return $this->precision;
    }

    public function getFleches(): int
    {
        return $this->fleches;
    }

    public function tirerFleche()
    {
        $this->fleches = $this->fleches - 1; ;
        if ($this->fleches < 0)
        {
            throw new Exception("Vous n'avez pas de flèches à tirer");
        }
        return "Il vous reste " . $this->fleches . " flèches";


    }

//
//    public function sePresenter()
//    {
//        return parent::sePresenter() . " - Précision : " . $this->precision . " - Nombre de flèches : " . $this->fleches;
//    }
    public function calculerDegats()
    {
        return ($this->precision*3) + ($this->niveau*2);
    }

    public function attaquer()
    {
        return $this->nom . " tire une flèche ! Dégats : " . $this->calculerDegats();
    }

    public function getSpecialite() : string
    {
        return "Archer";
    }

    public function getDetails()
    {
        return "Précision = " . $this->precision . " - Nombre de flèches : " . $this->fleches;
    }
}