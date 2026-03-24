<?php
require_once "Personnage.php";
class Guerrier extends Personnage
{
    private int $force;

    public function __construct( string $nom , int $niveau = 1, int $pvMax = 120, int $force = 10)
    {
        parent::__construct($nom, "Guerrier", $niveau, $pvMax);
        if ($force < 1)
        {
            throw new Exception("La force du guerrier doit être supérieure à 1");
        }
        $this->force = $force;
    }

    public function getForce() : int {return $this->force;}

//    public function sePresenter()
//    {
//        return parent::sePresenter() . " - Force : " . $this->force;
//    }

    public function calculerDegats()
    {
        return ($this->force*2) + ($this->niveau*3);
    }

    public function attaquer()
    {
        return $this->nom . " frappe avec son épée ! Dégats : " . $this->calculerDegats();
    }

    public function getSpecialite() : string
    {
        return "Guerrier";
    }

    public function getDetails()
    {
        return "Force = " . $this->force;
    }

}