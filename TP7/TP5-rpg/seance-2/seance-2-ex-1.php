<?php
require_once 'modeles/Sort.php';
// ─────────────────────────────────────────────
// TESTS
// ─────────────────────────────────────────────

echo "=== Création des sorts ===<br>";

// Sorts valides
try {
    $s1 = new Sort("Boule de Feu", "Feu", 50, 25);
    $s2 = new Sort("Tempête de Glace", "Glace", 35);   // coutMana = 10 par défaut
    $s3 = new Sort("Éclair", "Foudre", 40, 0);         // Sort gratuit
    echo "3 sorts créés avec succès.<br><br>";
} catch (Exception $e) {
    echo "Erreur inattendue : " . $e->getMessage() . "<br>";
}

echo "=== Description des sorts ===<br>";
echo $s1->decrire() . "<br>";
echo $s2->decrire() . "<br>";
echo $s3->decrire() . "<br><br>";

echo "=== Tests estAbordable ===<br>";
$mana = 20;
echo "Mana disponible : " . $mana . "<br>";
echo $s1->nom . " : " . ($s1->estAbordable($mana) ? "Lançable ✅" : "Mana insuffisant ❌") . "<br>";
echo $s2->nom . " : " . ($s2->estAbordable($mana) ? "Lançable ✅" : "Mana insuffisant ❌") . "<br>";
echo $s3->nom . " : " . ($s3->estAbordable($mana) ? "Lançable ✅" : "Mana insuffisant ❌") . "<br><br>";

echo "=== Dégâts réels (niveau 8) ===<br>";
echo $s1->nom . " : " . $s1->calculerDegatsRels(8) . " dégâts<br>";
echo $s2->nom . " : " . $s2->calculerDegatsRels(8) . " dégâts<br><br>";

echo "=== Sorts invalides (doivent lever des exceptions) ===<br>";
try {
    $invalide1 = new Sort("", "Feu", 40);     // Nom vide
} catch (Exception $e) {
    echo "✅ Exception : " . $e->getMessage() . "<br>";
}

try {
    $invalide2 = new Sort("Malédiction", "Ombre", -20); // Dégâts négatifs
} catch (Exception $e) {
    echo "✅ Exception : " . $e->getMessage() . "<br>";
}

echo "<br>=== BONUS — Amélioration ===<br>";
echo $s1->ameliorerSort(15) . "<br>";
echo $s1->decrire() . "<br>";
