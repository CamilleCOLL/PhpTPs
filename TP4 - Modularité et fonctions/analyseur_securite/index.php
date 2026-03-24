<?php
global $machines;
require_once 'donnees.php';
require_once 'fonctions/analyse.php';
require_once 'fonctions/affichage.php';

// Calculer les scores
$machines = ajouterScores($machines);

// Style CSS
echo "<style>
body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f5f5f5;
}
h1, h2 {
    color: #2c3e50;
}
</style>";

// Affichage
echo "<h1>🔒 Rapport de sécurité du parc informatique</h1>";

// Alertes critiques
afficherAlertes($machines);

// Tableau détaillé
echo "<h2>📊 État détaillé des machines</h2>";
afficherRapportSecurite($machines);

// Statistiques globales
echo "<h2>📈 Statistiques globales</h2>";
echo "<div style='background-color: #e7f3ff; padding: 15px; border-radius: 5px;'>";
echo "<p><strong>Score moyen du parc :</strong> " . round(obtenirScoreMoyen($machines), 1) . "/100</p>";

$vulnerable = trouverPlusVulnerable($machines);
echo "<p><strong>Machine la plus vulnérable :</strong> {$vulnerable['hostname']} (Score : {$vulnerable['score_securite']}/100)</p>";

echo "<p><strong>Machines critiques :</strong> " . compterCritiques($machines) . "/" . count($machines) . "</p>";

// Analyse des ports
echo "<h3>Ports les plus exposés</h3>";
$ports = analyserPorts($machines);
arsort($ports);
echo "<ul>";
foreach ($ports as $port => $count) {
    echo "<li>Port $port : utilisé par $count machine(s)</li>";
}
echo "</ul>";
echo "</div>";
?>