<?php
// Inclure tous les modules
require_once 'fonctions/machines.php';
require_once 'fonctions/validation.php';
require_once 'fonctions/affichage.php';

// Utiliser les fonctions
afficherTitre("Gestion du parc informatique");

// Test calculs
echo "<h2>Calculs</h2>";
echo "Âge d'un équipement de 2020 : " . calculerAgeEquipement(2020) . " ans<br>";
echo "Fin garantie (01/01/2024) : " . calculerFinGarantie("2024-01-01") . "<br>";

// Test validation
echo "<h2>Validation réseau</h2>";
$ip = "192.168.1.1";
echo "$ip : " . (validerIPv4($ip) ? "valide" : "invalide") . "<br>";
echo "Port 443 : " . categoriserPort(443) . "<br>";

// Test avec tableau
echo "<h2>Statistiques</h2>";
$ages = [2, 5, 1, 7, 3];
echo "Âge moyen du parc : " . round(calculerAgesMoyen($ages), 1) . " ans<br>";
?>
