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
        echo $membre->attaquer() . "<br>";
        $degatTot += $membre->calculerDegats();
        if ($membre instanceof Guerrier) $nbGuerrier++;
        else if ($membre instanceof Mage) $nbMage++;
        else if ($membre instanceof Archer) $nbArcher++;
    }
    echo "<br> Dégats totaux de l'équipe : " . $degatTot . "\n";
    echo "<br> Composition de l'équipe : " . $nbGuerrier . " guerriers - " . $nbArcher . " archers - " . $nbMage . " mages";
}


$equipe1 = [
    new Guerrier("Aragorn", 10, 150, 10),
    new Mage("Gandalf", 80, 100, 12, 100),
    new Archer("Noob", 4, 100, 100, 10),
    new Guerrier("Bob", 1, 15, 8),
    new Mage("Pierre", 40, 70, 41, 100),
    new Archer("Richard", 70, 80, 40, 15)
];

simulerCombat($equipe1);








