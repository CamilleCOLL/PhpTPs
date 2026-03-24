<?php

$bouteilles = [
    ["nom" => "Chateau-Marquis 2015", "region" => "Bourgogne", "type" => "rouge", "prix" => 180, "annee" => 2015, "stock" => 12],
    ["nom" => "Chablis", "region" => "Bourgogne", "type" => "blanc", "prix" => 85, "annee" => 2019, "stock" => 8]
];

$annee_actuelle = 2024;

function calculerAge($annee_bouteille, $anneeActuelle)
{
    return $anneeActuelle - $annee_bouteille;
}


function categoriserPrix ($prix){
    $message = "";
    if ($prix >= 100){
        $message = "premium";
    }else if ($prix >= 50 && $prix <= 99){
        $message = "Intermédiaire";
    }else {
        $message = "Accessible";
    }
    return $message;
}
 //echo categoriserPrix(12);


function evaluerStock ($stock)
{
    $message = "";
    if ($stock >= 20){
        $message = "Stock élevé";
    }else if ($stock >= 10 && $stock <= 19){
        $message = "Stock correct";
    }else {
        $message = "Stock faible";
    }
    return $message;
}

// PARTIE 2 : TRAITEMENT

foreach ($bouteilles as $cle => $valeur)
{
    //Calculs :
    $age = calculerAge($valeur["annee"], $annee_actuelle);
    $categoriePrix = categoriserPrix($valeur["prix"]);
    $etat_stocks = evaluerStock($valeur["stock"]);
    $valeur_stock = $valeur["prix"]*$valeur["stock"];

//Ajout des clés
    $bouteilles[$cle]["age"] = $age;
    $bouteilles[$cle]["categorie_prix"] = $categoriePrix;
    $bouteilles[$cle]["etat_stocks"] = $etat_stocks;
    $bouteilles[$cle]["valeur_stock"] = $valeur_stock;

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

    <table>
        <tr>
            <th>Nom</th>
            <th>Region</th>
            <th>Type</th>
            <th>Age</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Etat Stock</th>
            <th>Valeur du stock</th>
            <th>Catégorie de prix</th>
        </tr>
        <?php
        for ($i = 0; $i < count($bouteilles); $i++) {
            $moyenne = floatval($bouteilles[$i]["moyenne"]);
            if ($moyenne < 10)
            {
                $bgColor = "background-color : red";
            }else
            {
                $bgColor = "background-color : green";
            }


            ?>

            <tr>
                <td><?php echo $bouteilles[$i]["nom"]; ?></td>
                <td><?php echo $bouteilles[$i]["region"]; ?></td>
                <td><?php echo $bouteilles[$i]["type"]; ?></td>
                <td><?php echo $bouteilles[$i]["age"]; ?></td>
                <td><?php echo $bouteilles[$i]["prix"]; ?></td>
                <td><?php echo $bouteilles[$i]["stock"]; ?></td>
                <td><?php echo $bouteilles[$i]["etat_stocks"]; ?></td>
                <td><?php echo $bouteilles[$i]["valeur_stock"]; ?></td>
                <td><?php echo $bouteilles[$i]["categorie_prix"]; ?></td>


            </tr>

        <?php } ?>
    </table>


</body>
</html>