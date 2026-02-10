<?php

function validerIpv4(string $ip): bool
{
    //Methode 1
    // Compte le nombre de points
    $nbPoints = substr_count($ip, '.');
    if ($nbPoints !== 3) {
        return false;
    }

    // Vérifie que l'on a bien 4 segments
    $segments = explode('.', $ip);
    if (count($segments) !== 4) {
        return false;
    }

    // Vérifie que chaque segment est numérique
    foreach ($segments as $segment) {
        if (!is_numeric($segment)) {
            return false;
        }
        $num = intval($segment);
        if ($num < 0 || $num > 255) {
            return false;
        }
    }

    return true;

    //Methode 2
    //return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false;
}

function categoriserPort($port) {

    if (!is_numeric($port) || $port < 1 || $port > 65535) {
        return "invalide";
    }else{
        $category = "";
        if ($port < 1024) {
            $category = "system";
        } elseif ($port < 49152) {
            $category = "registered";
        } else {
            $category = "dynamic";
        }

        return $category;
    }
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




?>
