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
function estObsolete($age, $seuilObsolescence = 5)
{
//    $obsolete="est obsolete";
//    if ($age > $seuilObsolescence) {
//        return $obsolete;
//    }else{
//        return $obsolete="n'est pas obsolète";
//    }

    return $age > $seuilObsolescence;
}
function genererCodeInventaire($type, $numero)
{
    switch ($type) {
        case "Serveur":
            return "SRV-$numero";
            break;
        case "Worksation":
            return "WKS-$numero";
            break;
        case "Network":
            return "NET-$numero";
            break;
        default:
            return "UNK-$numero";
    }
}

echo ("L'âge de vôtre équipement : ".calculerAgeEquipement(2024)."<br>");
echo ("Fin de la garantie du produit : ".calculerFinGarantie(2024)."<br>");
echo ("Votre produit ".(estObsolete(3))."<br>");
echo ("Code de votre inventaire : ".(genererCodeInventaire("Serveur", 10))."<br>");
echo ("Code de votre inventaire : ".(genererCodeInventaire("Inconnu", 107))."<br>");

?>
