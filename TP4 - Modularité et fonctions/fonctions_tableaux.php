
<?php


function calculerAgesMoyen(array $equipements): float|int {
    if (empty($equipements)) {
        return 0;
    }
    return array_sum($equipements) / count($equipements);
}

function obtenirPlageAges(array $equipements) : array {
    return [
        'min' => min($equipements),
        'max' => max($equipements)
    ];
}


function compterObsoletes($ages, $seuil = 5) {
    $compteur = 0;
    foreach ($ages as $age) {
        if ($age >= $seuil) {
            $compteur++;
        }
    }
    return $compteur;
}

function analyserParc(array $equipements) {
    return [
        'age_moyen' => calculerAgesMoyen($equipements),
        'plus_ancien' => max($equipements),
        'plus_recent' => min($equipements),
        'obsoletes' => compterObsoletes($equipements)
    ];
}


//////// TESTS //////////

echo "Analyse du parc :<br>";
$equipements = [2, 3, 5, 7, 10];
$resultat = analyserParc($equipements);
echo "Âge moyen : " . $resultat['age_moyen'] . " ans<br>";
echo "Âge du plus ancien : " . $resultat['plus_ancien'] . " ans<br>";
echo "Âge du plus récent : " . $resultat['plus_recent'] . " ans<br>";
echo "Nombre d'équipements obsolètes : " . $resultat['obsoletes'] . "<br>";
