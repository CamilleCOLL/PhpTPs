<?php

for ($i = 1; $i <= 10; $i++){
    echo $i . "<br>";
}
echo "<br>";
echo "<br>";

for ($i = 2; $i <= 20; $i++){
    if ($i % 2 == 0){
        echo $i . "<br>";
    }
}

echo "<br>";
echo "<br>";

for ($i = 10; $i > 0; $i--){
    echo $i . "<br>";
}


echo "<br>";
echo "<br>";
echo "Table de multiplication";
echo "<br>";

$nombre_base = 10;
for ($i = 1; $i <= $nombre_base; $i++){
    echo "$nombre_base * $i = ". ($nombre_base * $i) . "<br>";
}

echo "<br>";

echo "Triangle de chiffres";
echo "<br>";

$lignes = 5;
for ($j = 1; $j <= $lignes; $j++)
{
    for ($k = 1; $k<=$j; $k++){
        echo $j . " ";
    }
    echo "<br>";
}

echo "<br>";
$hauteur=1;
for ($j = 1; $j <= $lignes; $j++)
{
    echo $hauteur . "<br>";
    $hauteur=$hauteur." ".$j+1;
}

?>