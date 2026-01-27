<?php


$jour = "mercredi";
date_default_timezone_set("Europe/Paris");

echo "Planning basique : ";
echo "<br>";

switch ($jour) {
    case "lundi":
        echo "$jour : Paddle";
        break;
    case "mardi":
        echo "$jour : Karting";
        break;
    case "mercredi":
        echo "$jour : Minecraft";
        break;
    case "jeudi":
        echo "$jour : RDV Tinder";
        break;
    case "vendredi":
        echo "$jour : Mariage cousin Blaize";
        break;
    case "samedi":
        echo "$jour : Appeler mamie";
        break;
    case "dimanche":
        echo "$jour : Stalker son ex";
        break;
    default:
        echo "Jour non reconnu";
        break;
}

echo "<br>";
echo "<br>";
echo "Regroupement de cas : ";

switch ($jour) {
    case "lundi":
    case "mardi":
    case "mercredi":
        echo "$jour : Jour de cours. Date d'aujourd'hui : " . date("d/m/Y");
        break;
    case "jeudi":
    case "vendredi":
        echo "$jour : Projet et travaux pratiques";
        break;
    case "samedi":
    case "dimanche":
        echo "$jour : Weekend - Repos";
        break;
    default:
        echo "Jour non reconnu";
        break;
}

//Equivalent avec la méthode match (plus moderne depuis Php 8.0) :

echo "<br>";
echo match ($jour) {
    "lundi", "mardi", "mercredi" => "$jour : Jour de cours",
    "jeudi", "vendredi"          => "$jour : Projets et travaux pratiques",
    "samedi", "dimanche"         => "$jour : Weekend - repos",
    default                      => "Jour non reconnu",
};

?>
