<?php

namespace models;

class Inventaire
{
    public $proprietaire;
    public $emplacementsMax;
    public $objets = [];

    // Retourne true si tous les emplacements sont occupés
    public function estPlein() {
        return count($this->objets) >= $this->emplacementsMax;
    }

    // Retourne le nombre d'objets actuellement dans l'inventaire
    public function compterObjets() {
        return count($this->objets);
    }

    // BONUS — Vérifie si un objet est déjà présent
    public function contient($nomObjet) {
        return in_array($nomObjet, $this->objets);
    }

    // Ajoute un objet si l'inventaire n'est pas plein (et sans doublon avec le bonus)
    public function ajouterObjet($nomObjet) {
        if ($this->estPlein()) {
            return "Inventaire plein ! Impossible d'ajouter « " . $nomObjet . " ».";
        }

        // BONUS : empêcher les doublons
        if ($this->contient($nomObjet)) {
            return "« " . $nomObjet . " » est déjà dans l'inventaire.";
        }

        $this->objets[] = $nomObjet;
        return "« " . $nomObjet . " » ajouté à l'inventaire de " . $this->proprietaire . ".";
    }

    // Retire un objet par son nom
    public function retirerObjet($nomObjet) {
        $cle = array_search($nomObjet, $this->objets);

        if ($cle === false) {
            return "Objet introuvable : « " . $nomObjet . " » n'est pas dans l'inventaire.";
        }

        array_splice($this->objets, $cle, 1);
        return "« " . $nomObjet . " » retiré de l'inventaire.";
    }

    // Affiche le contenu formaté de l'inventaire
    public function afficherContenu() {
        $nbObjets = $this->compterObjets();
        $resultat = "Inventaire de " . $this->proprietaire
            . " (" . $nbObjets . "/" . $this->emplacementsMax . " emplacements)<br>";
        $resultat .= str_repeat("─", 40) . "<br>";

        if (empty($this->objets)) {
            $resultat .= "  (vide)<br>";
        } else {
            foreach ($this->objets as $index => $objet) {
                $resultat .= ($index + 1) . ". " . $objet . "<br>";
            }
        }

        $resultat .= str_repeat("─", 40);
        return $resultat;
    }


}