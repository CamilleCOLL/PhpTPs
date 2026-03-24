<?php

class Inventaire {

    public string $proprietaire;
    public int $emplacementsMax;
    public array $objets = [];

    function estPlein()
    {
        return count($this->objets) >= $this->emplacementsMax;
    }
    function ajouterObjet($nomObjet)
    {
        if(count($this->objets) <= $this->emplacementsMax)
        {
            $this->objets[] = $nomObjet;
            return $nomObjet." a été ajouté à l'inventaire";
        }
        else
        {
            return "Inventaire plein, objet non ajouté.";
        }
    }

    function retirerObjet($nomObjet)
    {
        if(in_array($nomObjet, $this->objets))
        {
            unset($this->objets[$nomObjet]);
            return "Objet retiré de l'inventaire.";
        }
        else
        {
            return "Objet introuvable dans l'inventaire.";
        }

    }

    function afficherContenu($tableau)
    {

    }

}