
<?php

function filtrerParType(array $machines, string $typeRecherche): array {

    //Méthode 1
//    $resultat = [];
//    foreach ($machines as $machine) {
//        if ($machine['type'] === $typeRecherche) {
//            $resultat[] = $machine;
//        }
//    }
//    return $resultat;

    //Méthode 2
    return array_filter($machines, function($machine) use ($typeRecherche) {
        return $machine['type'] === $typeRecherche;
    });
}

function trouverParIP(array $machines, string $ip): ?array {
    foreach ($machines as $machine) {
        if ($machine['ip'] === $ip) {
            return $machine;
        }
    }
    return null;
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

//////// TESTS //////////

$machines = [
    ["hostname" => "srv-web-01", "type" => "serveur", "ip" => "192.168.1.10"],
    ["hostname" => "wks-dev-05", "type" => "workstation", "ip" => "192.168.1.50"],
    ["hostname" => "sw-core-01", "type" => "network", "ip" => "192.168.1.1"]
];

echo "Filtrer par type 'serveur' :<br>";
$resultat = filtrerParType($machines, 'serveur');
foreach ($resultat as $machine) {
    echo "- " . $machine['hostname'] . " (" . $machine['ip'] . ")<br>";
}

echo "Trouver par IP :<br>";
$ipRecherche = "192.168.1.1";
$resultat = trouverParIP($machines, $ipRecherche);
if ($resultat) {
    echo "Machine trouvée : " . $resultat['hostname'] . " (" . $resultat['type'] . ")<br>";
} else {
    echo "Aucune machine trouvée avec l'IP $ipRecherche<br>";
}

echo "Compter par type :<br>";
$resultat = compterParType($machines);
foreach ($resultat as $type => $compteur) {
    echo "- $type : $compteur<br>";
}
