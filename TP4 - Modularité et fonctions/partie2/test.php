<?php
require_once 'fonctions/affichage.php';
afficherTitre("Test d'affichage d'inventaire");
// Données d'exemple
$inventaire = [
    ["srv-web-01", "192.168.1.10", "2", "Serveur"],
    ["srv-db-01", "192.168.1.11", "6", "Serveur"],
    ["wks-dev-05", "192.168.1.50", "3", "Workstation"],
    ["sw-core-01", "192.168.1.1", "8", "Network"]
];
$entetes = ["Hostname", "IP", "Âge (ans)", "Type"];
afficherTableauInventaire($inventaire, $entetes);
?>
