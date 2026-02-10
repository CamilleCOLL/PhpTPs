
<?php

function calculerAgeEquipement(int $anneeAchat): int
{
    //Méthode 1
    //return 2025 - $anneeAchat;

    //Méthode 2
    //return date("Y") - $anneeAchat;

    //Methode 3
    return (new DateTime("now"))->diff(new DateTime("{$anneeAchat}-01-01"))->y;
}


function calculerFinGarantie(int $anneeAchat, int $dureeGarantie = 3): int
{
    //Méthode 1
    //return ($anneeAchat + $dureeGarantie) - date("Y");

    //Méthode 2
    $date = new DateTime("{$anneeAchat}-01-01");
    $date->modify("+$dureeGarantie years");
    return $date->format('Y');

}

function estObsolete(int $age, int $seuilObsolescence = 5): bool
{
    return $age > $seuilObsolescence;
}

function genererCodeInventaire(string $type, int $numero): string
{
    //Méthode 1
//    $code = "";
//    switch ($type) {
//        case 'serveur':
//            $code = "SRV-{$numero}";
//        case 'workstation':
//            $code = "WKS-{$numero}";
//        case 'network':
//            $code = "NET-{$numero}";
//        default:
//            $code = "UNK-{$numero}";
//    }
//    return $code;

    //Méthode 2
    $prefixes = [
        'serveur' => 'SRV',
        'workstation' => 'WKS',
        'network' => 'NET'
    ];

    $prefix = $prefixes[$type] ?? 'UNK';
    return "{$prefix}-{$numero}";
}


/////////// TESTS ///////////

echo "Age de l'équipement acheté en 2018 : " . calculerAgeEquipement(2018) . " ans<br>";
echo "Fin de garantie pour un équipement acheté en 2018 : " . calculerFinGarantie(2018) . "<br>";
echo "Fin de garantie pour un équipement acheté en 2018 avec 5 ans de garantie: " . calculerFinGarantie(2018,5) . "<br>";
echo "L'équipement de 2018 est-il obsolète ? " . (estObsolete(calculerAgeEquipement(2018)) ? "Oui" : "Non") . "<br>";
echo "L'équipement de 2018 est-il obsolète avec un seuil à 3 ans ? " . (estObsolete(calculerAgeEquipement(2018),3) ? "Oui" : "Non") . "<br>";
echo "Code d'inventaire pour un serveur numéro 123 : " . genererCodeInventaire('serveur', 123) . "\n";
echo "Code d'inventaire pour une workstation numéro 456 : " . genererCodeInventaire('workstation', 456) . "<br>";
echo "Code d'inventaire pour un équipement réseau numéro 789 : " . genererCodeInventaire('network', 789) . "<br>";
echo "Code d'inventaire pour un équipement inconnu numéro 999 : " . genererCodeInventaire('inconnu', 999) . "<br>";
