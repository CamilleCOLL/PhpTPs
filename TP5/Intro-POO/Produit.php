<?php

class Produit {
    public string $nom;
    public int $prix;
    public int $stock;


    public function afficher() : string
    {
        return "Nom produit : ".$this->nom."<br>".
            "Prix du produit : ".$this->prix."<br>".
            "Stock du produit : ".$this->stock."<br>";
    }

    public function calculerTTC(float $taux) : int
    {
        return number_format($taux * $this->prix, 2);
    }

    public function estDisponible () : bool
    {
        return $this->stock > 0;
    }

    public function ajouterAuStock(int $quantite) : void
    {
        $this->stock += $quantite;
    }

    public function retirerStock(int $quantite) : void
    {
        if($quantite <= $this->stock)
        {
            $this->stock -= $quantite;
        }else
        {
            echo "Quantité insuffisante en stock";
        }
    }
}
