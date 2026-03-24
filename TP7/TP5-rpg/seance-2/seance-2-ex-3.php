<?php

require_once 'modeles/Personnage.php';
require_once 'modeles/Guilde.php';

// ─── Création avec constructeur ────────────────────────────────────────────

echo "=== Création de la guilde ===<br>";
try {
    $guilde = new Guilde("La Communauté", 3, 40);
    echo "Guilde créée : " . $guilde->getNom()
        . " (réputation : " . $guilde->getReputation() . ")<br><br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

// ─── Création des personnages ───────────────────────────────────────────────

$p1 = new Personnage("Aragorn", "Guerrier", 10, 150);
$p2 = new Personnage("Legolas", "Archer", 8, 100);
$p3 = new Personnage("Frodon", "Hobbit", 3, 60);    // Niveau < 5
$p4 = new Personnage("Gimli", "Nain", 7, 130);
$p5 = new Personnage("Merry", "Hobbit", 2, 60);     // Niveau < 5

// ─── Recrutement ────────────────────────────────────────────────────────────

echo "=== Recrutement ===<br>";
echo $guilde->recruter($p1) . "<br>"; // ✅
echo $guilde->recruter($p2) . "<br>"; // ✅
echo $guilde->recruter($p3) . "<br>"; // ❌ Niveau insuffisant
echo $guilde->recruter($p4) . "<br>"; // ✅ Guilde pleine
echo $guilde->recruter($p5) . "<br>"; // ❌ Niveau insuffisant ET guilde pleine
echo "<br>";

echo $guilde->afficherMembres();
echo "Niveau moyen : " . $guilde->getNiveauMoyen() . "<br><br>";

// ─── Propriétés calculées ────────────────────────────────────────────────────

echo "=== Propriétés calculées ===<br>";
echo "Nombre de membres : " . $guilde->getNombreMembres() . "<br>";
echo "Guilde complète ? " . ($guilde->estComplete() ? "Oui" : "Non") . "<br><br>";

// ─── Expulsion ──────────────────────────────────────────────────────────────

echo "=== Expulsion ===<br>";
echo $guilde->expulser("Legolas") . "<br>"; // ✅
echo $guilde->expulser("Gandalf") . "<br>"; // ❌
echo "Guilde complète après expulsion ? " . ($guilde->estComplete() ? "Oui" : "Non") . "<br><br>";

// ─── Réputation ─────────────────────────────────────────────────────────────

echo "=== Réputation ===<br>";
echo $guilde->gagnerReputation(30) . "<br>"; // 40 + 30 = 70
echo $guilde->gagnerReputation(50) . "<br>"; // Plafonné à 100

// ─── Test setter invalide ────────────────────────────────────────────────────

echo "<br>=== Setter invalide ===<br>";
try {
    $guilde->setReputation(150); // ❌ Hors bornes
} catch (Exception $e) {
    echo "✅ Exception : " . $e->getMessage() . "<br>";
}

// ─── Vérification accès direct bloqué ───────────────────────────────────────

echo "<br>=== Accès direct aux propriétés privées ===<br>";
// La ligne suivante génèrerait une Fatal error — la décommenter pour démontrer
// echo $guilde->nom;
echo "Accès via getter : " . $guilde->getNom() . "<br>";
echo "(Accès direct à \$guilde->nom → Fatal error : Cannot access private property)<br>";
