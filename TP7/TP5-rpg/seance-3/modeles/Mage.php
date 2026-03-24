<?php
require_once "Personnage.php";
class Mage extends Personnage
{
    private int $mana;
    private int $manaMax;

    /**
     * @param int $mana
     * @param int $manaMax
     */
    public function __construct(string $nom , int $niveau = 1, int $pvMax = 120 , int $mana, int $manaMax)
    {
        parent::__construct($nom, "Mage" , $niveau , $pvMax);
        $this->mana = $manaMax;
        $this->manaMax = $manaMax;
    }

    public function getMana(): int
    {
        return $this->mana;
    }

    public function getManaMax(): int
    {
        return $this->manaMax;
    }

    public function sePresenter()
    {
        return parent::sePresenter() . " - Mana : " . $this->mana . "/" . $this->manaMax;
    }

    public function calculerDegats()
    {
        return ($this->mana*1.5) + ($this->niveau*2);
    }

    public function attaquer()
    {
        return $this->nom . " lance un sort ! Dégats : " . $this->calculerDegats();
    }

}