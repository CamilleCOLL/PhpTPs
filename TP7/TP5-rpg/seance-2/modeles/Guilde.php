<?php

class Guilde
{
    private string $nom;
    private int $reputation = 0; // Valeur initiale par défaut
    private int $membresMax = 10; // Valeur initiale par défaut
    private array $membres = [];

    public function __construct($nom, $membresMax = 5, $reputation = 0) {
        if (empty(trim($nom))) {
            throw new Exception("Le nom de la guilde ne peut pas être vide.");
        }
        if (!is_int($membresMax) || $membresMax < 1) {
            throw new Exception("Le nombre maximum de membres doit être un entier positif.");
        }
        if (!is_numeric($reputation) || $reputation < 0 || $reputation > 100) {
            throw new Exception("La réputation doit être comprise entre 0 et 100.");
        }

        $this->nom        = trim($nom);
        $this->membresMax = $membresMax;
        $this->reputation = (int) $reputation;
    }

    // ─── GETTERS ──────────────────────────────────────────────────────────

    public function getNom()        { return $this->nom;        }
    public function getReputation() { return $this->reputation; }
    public function getMembresMax() { return $this->membresMax; }
    public function getMembers()    { return $this->membres;    }

    // ─── SETTER ───────────────────────────────────────────────────────────

    public function setReputation($reputation) {
        if (!is_numeric($reputation) || $reputation < 0 || $reputation > 100) {
            throw new Exception(
                "La réputation doit être comprise entre 0 et 100. Reçu : " . $reputation
            );
        }
        $this->reputation = (int) $reputation;
    }

    // ─── PROPRIÉTÉS CALCULÉES ─────────────────────────────────────────────

    public function getNombreMembres() {
        return count($this->membres);
    }

    public function estComplete() {
        return $this->getNombreMembres() >= $this->membresMax;
    }

    public function getNiveauMoyen() {
        if (empty($this->membres)) {
            return 0;
        }
        $total = 0;
        foreach ($this->membres as $membre) {
            $total += $membre->getNiveau(); // Utilise le getter de Personnage
        }
        return round($total / $this->getNombreMembres(), 1);
    }

    // ─── MÉTHODES MÉTIER ──────────────────────────────────────────────────

    public function recruter($personnage) {
        if ($this->estComplete()) {
            return "La guilde « " . $this->nom . " » est complète. "
                . $personnage->getNom() . " ne peut pas rejoindre.";
        }
        if (!$personnage->estEligible()) {
            return $personnage->getNom() . " est trop faible (niveau "
                . $personnage->getNiveau() . "). Niveau minimum requis : 5.";
        }
        $this->membres[] = $personnage;
        return $personnage->getNom() . " a rejoint la guilde « " . $this->nom . " » !";
    }

    public function expulser($nomPersonnage) {
        foreach ($this->membres as $cle => $membre) {
            if ($membre->getNom() === $nomPersonnage) {
                array_splice($this->membres, $cle, 1);
                return $nomPersonnage . " a été expulsé de la guilde « " . $this->nom . " ».";
            }
        }
        return "Erreur : " . $nomPersonnage . " n'est pas membre de la guilde.";
    }

    public function afficherMembres() {
        $resultat = "=== Guilde « " . $this->nom . " » — "
            . $this->getNombreMembres() . "/" . $this->membresMax
            . " membres (Réputation : " . $this->reputation . "/100) ===<br>";

        if (empty($this->membres)) {
            return $resultat . "  Aucun membre pour le moment.<br>";
        }

        foreach ($this->membres as $i => $membre) {
            $resultat .= ($i + 1) . ". " . $membre->sePresenter() . "<br>";
        }

        return $resultat;
    }

    public function gagnerReputation($points) {
        if ($points <= 0) {
            return "Erreur : les points de réputation doivent être positifs.";
        }
        // On utilise le setter pour bénéficier du plafonnement via min()
        $nouvelleReputation = min($this->reputation + $points, 100);
        $this->setReputation($nouvelleReputation);
        return "Réputation de « " . $this->nom . " » : " . $this->reputation . "/100";
    }
}