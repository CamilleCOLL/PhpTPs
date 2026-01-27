<?php

$nombre1 = 20;
$nombre2 = 10;
$operation = "/";

if ($operation == "+") {
    echo "$nombre1 + $nombre2 = " . ($nombre1+$nombre2);
}elseif ($operation == "-") {
    echo "$nombre1 - $nombre2 = " . ($nombre1-$nombre2);
}elseif ($operation == "/") {
    echo "$nombre1 / $nombre2 = " . ($nombre1/$nombre2);
}elseif ($operation == "*") {
    echo "$nombre1 x $nombre2 = " . ($nombre1*$nombre2);
}



echo "<br>";
echo "<br>";

$nb1=10;
$nb2=20;
$operateur = ";";

echo "Gestion des erreurs : <br>";
echo "<br>";


if (($operation == "/" && $nb2==0) || (!(is_numeric($nb1)) || !is_numeric($nb2)))
{
    echo "Division par zéro impossible";
}
else
{
    switch ($operateur)
    {
        case "+":
            echo "$nb1 + $nb2 = " . ($nb1 + $nb2);
            break;
        case "-":
            echo "$nb1 - $nb2 = " . ($nb1 - $nb2);
            break;
        case "*":
            echo "$nb1 * $nb2 = " . ($nb1 * $nb2);
            break;
        case "/":
            echo "$nb1 / $nb2 = " . ($nb1 / $nb2);
            break;
        default:
            echo "opérateur non reconnu";
    }
}




?>
