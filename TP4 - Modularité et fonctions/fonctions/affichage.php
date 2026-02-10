<?php

function afficherTitre($titre, $niveau = 1)
{
    echo "<h$niveau>$titre</h$niveau>";
}

function afficherTableauInventaire($inventaire, $entetes)
{
    echo "<table>";
    echo "<tr>";
    foreach ($entetes as $entete) {
        echo "<th>$entete</th>";
    }
    echo "</tr>";
    foreach ($inventaire as $machine) {
        echo "<tr>";
        foreach ($machine as $propriete) {
            echo "<td>$propriete</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}



?>
