<?php

namespace modeles;

class Guilde
{
    public string $nom;
    public int $reputation = 0; // Valeur initiale par défaut
    public int $membresMax = 10; // Valeur initiale par défaut
    public array $membres = [];

    // Recrute un personnage si la guilde n'est pas pleine et le personnage éligible
    public function recruter(Personnage $personnage): string
    {
        if (count($this->membres) >= $this->membresMax) {
            return "La guilde « " . $this->nom . " » est complète. "
                . $personnage->nom . " ne peut pas rejoindre.";
        }

        if (!$personnage->estEligible()) {
            return $personnage->nom . " est trop faible (niveau "
                . $personnage->niveau . "). Niveau minimum requis : 5.";
        }

        $this->membres[] = $personnage;
        return $personnage->nom . " a rejoint la guilde « " . $this->nom . " » !";
    }

    // Expulse un membre par son nom
    public function expulser(string $nomPersonnage): string
    {
        foreach ($this->membres as $cle => $membre) {
            if ($membre->nom === $nomPersonnage) {
                array_splice($this->membres, $cle, 1);
                return $nomPersonnage . " a été expulsé de la guilde « " . $this->nom . " ».";
            }
        }

        return "Erreur : " . $nomPersonnage . " n'est pas membre de la guilde.";
    }

    // Affiche la liste des membres avec leur présentation
    public function afficherMembres(): string
    {
        $nb = count($this->membres);
        $resultat = "=== Guilde « " . $this->nom . " » — "
            . $nb . "/" . $this->membresMax . " membres ===<br>";

        if (empty($this->membres)) {
            return $resultat . "  Aucun membre pour le moment.<br>";
        }

        foreach ($this->membres as $i => $membre) {
            $resultat .= ($i + 1) . ". " . $membre->sePresenter() . "<br>";
        }

        return $resultat;
    }

    // Calcule le niveau moyen des membres
    public function calculerNiveauMoyen(): float
    {
        if (empty($this->membres)) {
            return 0;
        }

        $total = 0;
        foreach ($this->membres as $membre) {
            $total += $membre->niveau;
        }

        return round($total / count($this->membres), 1);
    }

    // Augmente la réputation sans dépasser 100
    public function gagnerReputation(int $points): string
    {
        if ($points <= 0) {
            return "Erreur : les points de réputation doivent être positifs.";
        }

        $this->reputation = min($this->reputation + $points, 100);
        return "Réputation de « " . $this->nom . " » : " . $this->reputation . "/100";
    }
}