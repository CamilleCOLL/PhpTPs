<?php

function calculerAgesMoyen ($equipement)
{
    $somme = 0;
    foreach ($equipement as $value) {
        $somme = $somme + $value;
        $moyenne = $somme / count($equipement);
    }
    return $moyenne;
}

echo (calculerAgesMoyen([15,7,14,2,1]));
echo "<br>";
echo "<hr>";
function obtenirPlageAges ($equipement)
{
    $min = min($equipement);
    $max = max($equipement);
    return [
        "min" => $min,
        "max" => $max,
    ];
}

$stats = obtenirPlageAges([15,14,2,13]);
foreach ($stats as $cle => $valeur) {
    echo $cle . " " . $valeur . "<br>";
}

function compterObsoletes($tableauAges, $seuil = 5)
{
    $totalObsolete = 0;
    foreach ($tableauAges as $age) {
        if ($age > $seuil) {
            $totalObsolete ++;
        }
    }
    return $totalObsolete;
}

echo (compterObsoletes([15,14,2,13]));
echo "<br>";
echo "<hr>";

function analyserParc ($equipement)
{
    return [
        "age_moyen" => calculerAgesMoyen($equipement),
        "plus_recent" => min($equipement),
        "plus_ancien" => max($equipement),
        "obsoletes" => compterObsoletes($equipement),
    ];
}

$recap = analyserParc([15,14,2,13]);
foreach ($recap as $cle => $valeur) {
    echo $cle . " : " . $valeur . "<br>";
}

$equipement = [15,1,2,45];
echo implode(",", $equipement); //Afficher toutes les valeurs

?>
