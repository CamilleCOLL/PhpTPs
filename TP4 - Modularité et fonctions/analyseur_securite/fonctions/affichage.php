<?php
/**
 * Fonctions d'affichage pour le rapport de sécurité
 */

/**
 * Affiche le rapport de sécurité complet
 * @param array $machines Tableau de machines avec scores
 */
function afficherRapportSecurite($machines) {
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr style='background-color: #2c3e50; color: white;'>";
    echo "<th style='padding: 10px;'>Hostname</th>";
    echo "<th style='padding: 10px;'>IP</th>";
    echo "<th style='padding: 10px;'>OS</th>";
    echo "<th style='padding: 10px;'>Âge</th>";
    echo "<th style='padding: 10px;'>Ports</th>";
    echo "<th style='padding: 10px;'>Score</th>";
    echo "<th style='padding: 10px;'>Statut</th>";
    echo "</tr>";

    foreach ($machines as $m) {
        // Déterminer la couleur selon le score
        if ($m['score_securite'] >= 70) {
            $couleur = '#d4edda';
            $statut = '✅ Sécurisé';
        } elseif ($m['score_securite'] >= 50) {
            $couleur = '#fff3cd';
            $statut = '⚠️ Attention';
        } else {
            $couleur = '#f8d7da';
            $statut = '❌ Critique';
        }

        echo "<tr style='background-color: $couleur;'>";
        echo "<td style='padding: 8px;'>{$m['hostname']}</td>";
        echo "<td style='padding: 8px;'>{$m['ip']}</td>";
        echo "<td style='padding: 8px;'>{$m['os']}</td>";
        echo "<td style='padding: 8px;'>{$m['age']} ans</td>";
        echo "<td style='padding: 8px;'>" . implode(", ", $m['ports_ouverts']) . "</td>";
        echo "<td style='padding: 8px; font-weight: bold;'>{$m['score_securite']}/100</td>";
        echo "<td style='padding: 8px; font-weight: bold;'>$statut</td>";
        echo "</tr>";
    }

    echo "</table>";
}

/**
 * Affiche les alertes critiques
 * @param array $machines Tableau de machines avec scores
 */
function afficherAlertes($machines) {
    echo "<div style='background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; margin: 20px 0; border-radius: 5px;'>";
    echo "<h3 style='color: #721c24; margin-top: 0;'>🚨 Alertes de sécurité</h3>";

    $alertes = false;
    foreach ($machines as $m) {
        if ($m['score_securite'] < 50) {
            echo "<p><strong>{$m['hostname']}</strong> - Score critique : {$m['score_securite']}/100</p>";
            $alertes = true;
        }
    }

    if (!$alertes) {
        echo "<p style='color: #155724;'>✅ Aucune alerte critique</p>";
    }

    echo "</div>";
}
?>