<?php

function calculerAgeEquipement($anneeAchat)
{
    //Utiliser la fonction incluse date qui prend la date locale
    return date("Y") - $anneeAchat;
}

function calculerFinGarantie($dateAchat, $dureeGarantie = 3)
{
    return ($dateAchat + $dureeGarantie) - date("Y");
}

function calculerAgesMoyen($equipements) : float|int
{
    return array_sum($equipements)/count($equipements);
}

function compterParType($machines) {
    $compteurs = [];
    foreach ($machines as $machine) {
        $type = $machine['type'];
        if (!isset($compteurs[$type])) {
            $compteurs[$type] = 0;
        }
        $compteurs[$type]++;
    }
    return $compteurs;
}


?>
