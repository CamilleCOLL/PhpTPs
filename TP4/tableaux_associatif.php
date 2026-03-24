<?php

$utilisateur=[
    "Nom" => "Doe",
    "Prenom" => "John",
    "Age" => 25,
    "Email" => "Jouhn@mail.com",
    "Ville" => "Paris"
];

foreach ($utilisateur as $cle => $valeur) {
    echo "$cle : $valeur<br>";
}

echo "<br>";

$utilisateur["Telephone"]="06.12.15.14.13";

foreach ($utilisateur as $cle => $valeur) {
    echo "$cle : $valeur<br>";
}

echo "<br>";

$utilisateur["Age"]=24;

foreach ($utilisateur as $cle => $valeur) {
    echo "$cle : $valeur<br>";
}
echo "<br>";

//Supprimer une clé :

unset($utilisateur["Telephone"]);

foreach ($utilisateur as $cle => $valeur) {
    echo "$cle : $valeur<br>";
}
echo "<br>";



?>