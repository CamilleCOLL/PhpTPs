<?php

require_once 'Produit.php';

$produit1 = new Produit();
$produit1->nom = "Clavier";
$produit1->prix = 120;
$produit1->stock = 6;

//echo "Nom du produit : ".$produit1->nom."<br>";
//echo "Prix du produit : ".$produit1->prix."<br>";
//echo "Stock du produit : ".$produit1->stock."<br>";

$produit2 = new Produit();
$produit2->nom = "Souris";
$produit2->prix = 50;
$produit2->stock = 0;

echo $produit1->afficher();
$produit1->estDisponible() ? "Le produit est disponible. <br>" : "Le produit n'est pas disponible. <br>";
echo $produit2->afficher();
$produit2->estDisponible() ? "Le produit est disponible. <br>" : "Le produit n'est pas disponible. <br>";


