<?php

$prenom=["Camille", "Ethan", "Gianni", "Julien", "Daniel"];

function loop ($prenom){
    echo "<br>";
    for ($i=0; $i < count($prenom); $i++) {
        if ($i==0){
            echo $i. " : ".$prenom[$i];
        }else {
            echo "; ".$i. " : ".$prenom[$i];
        }
    }
    echo "<br>";
}

loop($prenom);
echo "<br>";
echo "Longueur du tableau : ".count($prenom);
echo "<br>";

//Ajouter une valeur à la fin:

array_push($prenom, "Emma");
loop($prenom);

//Ajouter une valeur en début de tableau :

array_unshift($prenom,"Lucas");
loop($prenom);

array_pop($prenom);
loop($prenom);

//Verfier si une valeur est dans un tableau :

$search="Mathias";
if(in_array($search,$prenom)){
    echo "<br>".$search." is in array<br>";
}else {
    echo "<br>".$search." is not in array<br>";
} ;

//Trier par ordre alphabétique
sort($prenom);
echo "<br>Tableau trié par ordre alphabétique<br>";
loop($prenom);


?>
