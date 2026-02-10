
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

///////// TESTS ///////////

$ips = ["192.168.1.12", "256.100.50.25", "192.168.1", "abc.def.ghi.jkl"];
foreach ($ips as $ip) {
    echo "L'adresse IP '$ip' est " . (validerIpv4($ip) ? "valide" : "invalide") . "<br>";
}

$ports = [22, 80, 8080, 65536, -1, "abc"];
foreach ($ports as $port) {
    echo "Le port '$port' est de catégorie : " . categoriserPort($port) . "<br>";
}
