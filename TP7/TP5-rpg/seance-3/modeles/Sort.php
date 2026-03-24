<?php

class Sort {
    public string $nom;
    public string $element;
    public int $degatsBase;

    public int $coutMana; // Coût de mana par défaut pour lancer le sort

    /**
     * @param string $nom
     * @param string $element
     * @param int $degatsBase
     * @param int $coutMana
     */
    public function __construct($nom, $element, $degatsBase, $coutMana = 10) {
        // Validation
        if (empty(trim($nom))) {
            throw new Exception("Le nom du sort ne peut pas être vide.");
        }
        if (!is_numeric($degatsBase) || $degatsBase <= 0) {
            throw new Exception("Les dégâts de base doivent être un nombre positif. Reçu : " . $degatsBase);
        }
        if (!is_numeric($coutMana) || $coutMana < 0) {
            throw new Exception("Le coût en mana ne peut pas être négatif. Reçu : " . $coutMana);
        }

        $this->nom        = trim($nom);
        $this->element    = $element;
        $this->degatsBase = (int) $degatsBase;
        $this->coutMana   = (int) $coutMana;
    }

    // Présentation complète du sort
    public function decrire(): string {
        return " [$this->element] $this->nom - $this->degatsBase Dégâts - Coût Mana : $this->coutMana";
    }

    // Vérifie si le mana disponible suffit pour lancer le sort
    public function estAbordable($manaDisponible) {
        return $manaDisponible >= $this->coutMana;
    }

    // Dégâts réels selon le niveau du lanceur
    public function calculerDegatsRels($niveau) {
        return $this->degatsBase + ($niveau * 5);
    }

    // BONUS — Améliore le sort en augmentant ses dégâts de base
    public function ameliorerSort($points) {
        if ($points <= 0) {
            throw new Exception("Le nombre de points d'amélioration doit être positif.");
        }
        $this->degatsBase += $points;
        return $this->nom . " amélioré ! Nouveaux dégâts : " . $this->degatsBase;
    }




}
