<?php

use modeles\Inventaire;

require_once 'modeles/Inventaire.php';

// Inventaire de Gandalf : 3 emplacements
$inv1 = new Inventaire();
$inv1->proprietaire   = "Gandalf";
$inv1->emplacementsMax = 3;

// Inventaire d'Aragorn : 5 emplacements
$inv2 = new Inventaire();
$inv2->proprietaire   = "Aragorn";
$inv2->emplacementsMax = 5;

echo "=== Ajout d'objets ===<br>";
echo $inv1->ajouterObjet("Bâton de mage") . "<br>";
echo $inv1->ajouterObjet("Grimoire ancien") . "<br>";
echo $inv1->ajouterObjet("Potion de mana") . "<br>";
echo $inv1->ajouterObjet("Chapeau pointu") . "<br>"; // Inventaire plein → refus
echo $inv1->ajouterObjet("Bâton de mage") . "<br>";  // Doublon → refus (bonus)
echo "<br>";

echo $inv1->afficherContenu() . "<br><br>";

echo "=== Retrait d'objets ===<br>";
echo $inv1->retirerObjet("Grimoire ancien") . "<br>"; // Succès
echo $inv1->retirerObjet("Épée rouillée") . "<br>";   // Objet absent → erreur
echo "<br>";

echo $inv1->afficherContenu() . "<br><br>";

echo "=== Inventaire d'Aragorn ===<br>";
echo $inv2->ajouterObjet("Épée Andúril") . "<br>";
echo $inv2->ajouterObjet("Bouclier elfique") . "<br>";
echo $inv2->afficherContenu() . "<br>";