<?php

require_once "modeles/Personnage.php";
require_once "modeles/Guerrier.php";
require_once "modeles/Mage.php";
require_once "modeles/Archer.php";

function simulerCombat( array $equipe)
{
    $degatTot = 0;
    $nbGuerrier = 0;
    $nbMage = 0;
    $nbArcher = 0;
    echo "=== Combat d'équipe ===";
    echo "<br>";
    foreach ($equipe as $membre)
    {
        echo $membre->attaquer();
        echo "<br>";
        $degatTot += $membre->calculerDegats();
        if ($membre instanceof Guerrier)
        {
            $nbGuerrier++;
        }
        if ($membre instanceof Mage)
        {
            $nbMage++;
        }
        if ($membre instanceof Archer)
        {
            $nbArcher++;
        }
    }
    echo "<br>";
    echo "Dégats totaux de l'équipe : " . $degatTot . "\n";
    echo "<br>";
    echo "Composition de l'équipe : " . $nbGuerrier . " guerriers - " . $nbArcher . " archers - " . $nbMage . " mages";
}


$equipe1 = [
    $guerrier = new Guerrier("Aragorn", 10, 150, 10),
    $mage = new Mage("Gandalf", 80, 100, 12, 100),
    $archer = new Archer("Noob", 4, 100, 100, 10),
    $guerrier2 = new Guerrier("Bob", 1, 15, 8),
    $mage2 = new Mage("Pierre", 40, 70, 41, 100),
    $archer2 = new Archer("Richard", 70, 80, 40, 15)
];

simulerCombat($equipe1);








