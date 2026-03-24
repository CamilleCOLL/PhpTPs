<?php

use modeles\Guilde;
use modeles\Personnage;

require_once 'modeles/Personnage.php';
require_once 'modeles/Guilde.php';

// ─── Création des personnages ───────────────────────────────────────────────

$p1 = new Personnage();
$p1->nom = "Aragorn";
$p1->classe = "Guerrier";
$p1->niveau = 10;

$p2 = new Personnage();
$p2->nom = "Legolas";
$p2->classe = "Archer";
$p2->niveau = 8;

$p3 = new Personnage();
$p3->nom = "Frodon";
$p3->classe = "Hobbit";
$p3->niveau = 3; // Sous le niveau 5

$p4 = new Personnage();
$p4->nom = "Gimli";
$p4->classe = "Nain";
$p4->niveau = 7;

$p5 = new Personnage();
$p5->nom = "Merry";
$p5->classe = "Hobbit";
$p5->niveau = 2; // Sous le niveau 5

// ─── Création de la guilde ──────────────────────────────────────────────────

$guilde = new Guilde();
$guilde->nom = "La Communauté";
$guilde->reputation = 40;
$guilde->membresMax = 3;

// ─── Recrutement ────────────────────────────────────────────────────────────

echo "=== Tentatives de recrutement ===<br>";
echo $guilde->recruter($p1) . "<br>"; // ✅ OK
echo $guilde->recruter($p2) . "<br>"; // ✅ OK
echo $guilde->recruter($p3) . "<br>"; // ❌ Niveau insuffisant
echo $guilde->recruter($p4) . "<br>"; // ✅ OK — guilde maintenant pleine
echo $guilde->recruter($p5) . "<br>"; // ❌ Niveau insuffisant ET guilde pleine
echo "<br>";

// ─── Affichage des membres ──────────────────────────────────────────────────

echo $guilde->afficherMembres();
echo "Niveau moyen : " . $guilde->calculerNiveauMoyen() . "<br><br>";

// ─── Expulsion ──────────────────────────────────────────────────────────────

echo "=== Expulsions ===<br>";
echo $guilde->expulser("Legolas") . "<br>";       // ✅ Succès
echo $guilde->expulser("Gandalf") . "<br>";       // ❌ Pas membre
echo "<br>";

echo $guilde->afficherMembres();
echo "Niveau moyen : " . $guilde->calculerNiveauMoyen() . "<br><br>";

// ─── Réputation ─────────────────────────────────────────────────────────────

echo "=== Réputation ===<br>";
echo $guilde->gagnerReputation(30) . "<br>"; // 40 + 30 = 70
echo $guilde->gagnerReputation(50) . "<br>"; // 70 + 50 → plafonné à 100



