<?php

$lignes = 5;
for ($i = 1; $i <= $lignes; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j." ";        //affiche le numéro de la colonne
    }
    echo "<br>";
}
echo "<br>";

$lignes = 5;
$nombre = 1;

for ($i = 1; $i <= $lignes; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $nombre." ";
        $nombre ++;
    }
    echo "<br>";
}

echo "<br>";
echo "<hr>";

$tableau = [];
$nombreChercher = 0;
for ($i = 1; $i <= 100; $i++) {
    if ($i % 7 == 0 && $i % 3 == 0) {
        $nombreChercher = $i;
        break;
    }

}
echo $nombreChercher;
echo "<hr>";

$utilisateurs = [
        "nom" => "Doe",
        "prenom" => "John",
        "age" => 25,
        "email" => "John@mail.fr",
        "ville" => "Paris",
];
function loop($array)
{
    foreach ($array as $cle => $valeur) {
        echo "$cle : $valeur<br>";
    }
    echo "<hr>";
}
loop($utilisateurs);

$utilisateurs["telephone"] = "01.06.02.03.04";
loop($utilisateurs);


$produit = [
        ["nom" => "Doe", "prenom" => "John"],
        ["nom" => "Alin", "prenom" => "Man"]
];


foreach ($produit as $value) {
    $nom = $value["nom"];
    $prenom = $value["prenom"];
    echo "$nom $prenom <br>";
}

$scores = [
        "Alice" => 50,
        "Bob" => 100,
        "Charlie" => 30
];

// Trie par valeur (croissant)
asort($scores);
foreach ($scores as $nom => $score) {
    echo "$nom a obtenu le score de $score <br>";
}

$topScore = [];
$lowScore = [];

foreach ($scores as $nom => $score) {
    if ($score > 50) {
        // On ajoute au tableau des scores supérieurs
        $top_scores[$nom] = $score;
    } else {
        // On ajoute au tableau des scores inférieurs ou égaux à 50
        $low_scores[$nom] = $score;
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<h1 style="text-align: center">Informations sur X </h1>
<div class="p-5">

</div>
<div class="p-5">

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>