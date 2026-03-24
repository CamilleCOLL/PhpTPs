<?php

$classe = [
    [
        "nom" => "Martin",
        "prenom" => "Charles",
        "notes" => [1,18,20,19]
    ],
    [
        "nom" => "Dupont",
        "prenom" => "Alice",
        "notes" => [15, 12, 18, 14]
    ],
    [
        "nom" => "Pont",
        "prenom" => "Mars",
        "notes" => [18,4,12,3]
    ]
];

//Ajouter les moyennes dans chaque tableau étudiant
foreach ($classe as $cle => $valeur) {
    $moyenne = array_sum($valeur["notes"]) / count($valeur["notes"]);
    $classe[$cle]["moyenne"] = $moyenne;
}

$moy = array_column($classe, "moyenne"); //Afficher toutes les moyennes des étudiants
echo implode(", ", $moy);
echo "<br>";
echo array_sum($moy); //Somme des moyennes

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion de classe</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin: 20px 0; }
        th, td { border: 1px solid #333; padding: 10px; text-align: center; }
        th { background-color: #4CAF50; color: white; }
        .reussi { color: green; font-weight: bold; }
        .echec { color: red; font-weight: bold; }
    </style>
</head>
<body>
<h1>Bulletin de classe</h1>
<table>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Notes</th>
        <th>Moyenne</th>
    </tr>
<?php
for ($i = 0; $i < count($classe); $i++) {
    $moyenne = floatval($classe[$i]["moyenne"]);
    if ($moyenne < 10)
    {
        $bgColor = "background-color : red";
    }else
    {
        $bgColor = "background-color : green";
    }


?>

    <tr>
        <td><?php echo $classe[$i]["nom"]; ?></td>
        <td><?php echo $classe[$i]["prenom"]; ?></td>
        <td><?php echo implode(', ',$classe[$i]["notes"]); ?></td>
        <td><?php echo $classe[$i]["moyenne"]; ?></td>
    </tr>

<?php } ?>
</table>

<h2>Statistiques</h2>
<p>Meilleur élève : ...</p>
<p>Moyenne de classe : ...</p>
<p>Nombre de réussites : ...</p>
</body>
</html>