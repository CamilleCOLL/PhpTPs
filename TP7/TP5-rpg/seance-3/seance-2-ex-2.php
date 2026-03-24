<?php

require_once 'modeles/Personnage.php';
require_once 'modeles/Inventaire.php';

// ─────────────────────────────────────────────
// TESTS
// ─────────────────────────────────────────────

echo "=== Création avec constructeur ===<br>";

try {
    $p1 = new Personnage("Gandalf", "Mage", 12, 80);
    $p2 = new Personnage("Aragorn", "Guerrier", 8, 150);
    $p3 = new Personnage("Frodon", "Hobbit"); // niveau=1, pvMax=100 par défaut
    echo "3 personnages créés.<br><br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}

echo $p1->sePresenter() . "<br>";
echo $p2->sePresenter() . "<br>";
echo $p3->sePresenter() . "<br><br>";

echo "=== Méthodes séance 1 toujours fonctionnelles ===<br>";
echo $p1->seSoigner(50) . "<br>";
echo $p2->recevoirDegats(200) . "<br>";
echo $p3->monterDeNiveau() . "<br><br>";

echo "=== Cas invalides ===<br>";
try {
    $inv1 = new Personnage("", "Mage", 5, 80);
} catch (Exception $e) {
    echo "✅ Exception : " . $e->getMessage() . "<br>";
}

try {
    $inv2 = new Personnage("Sauron", "Méchant", 0, 200);
} catch (Exception $e) {
    echo "✅ Exception : " . $e->getMessage() . "<br>";
}

echo "<br>=== BONUS — Inventaire avec constructeur ===<br>";
try {
    $inv = new Inventaire("Gandalf", 3);
    echo $inv->ajouterObjet("Bâton") . "<br>";
    echo $inv->ajouterObjet("Grimoire") . "<br>";
    echo $inv->afficherContenu();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}
