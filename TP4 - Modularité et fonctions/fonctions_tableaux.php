<?php

function calculerAgesMoyen($equipements) : float|int
{
    return array_sum($equipements)/count($equipements);
}


function obtenirPlageAges($equipements) : array
{
    return [
        "min" => min($equipements),
        "max" => max($equipements)
    ];
}

function compterObsoletes($ages, $seuil = 5)
{

    return count($ages) < $seuil;
}

echo calculerAgesMoyen([15,20,4,8])."<br>";
echo obtenirPlageAges([15,20,4,8])."<br>";
echo compterObsoletes([15,20,4,8])."<br>";

?>
