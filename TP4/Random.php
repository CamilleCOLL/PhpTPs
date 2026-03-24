<?php

//$eleves=["Camille", "Ethan", "Yoram", "Gianni"];
//echo $eleves[array_rand($eleves,1)];

//Tableau à clé avec chacun un tableau (permet de trier)

$classe="SIO1A";
$students=[
    "SIO1B" => ["Camille", "Ethan", "Yoram", "Gianni"],
    "SIO1A" => ["Julien", "Marie", "Daniel"],
];

//On fait array_rand sur la section du tableau d'où $students[$classe]
//if (in_array($classe, array_keys($students))) {
//    echo $students[$classe][array_rand($students[$classe],1)];
//}else {
//    echo "Section not found";
//}


//Chercher si la classe est dans le tableau
if (array_key_exists($classe, $students)) {
    echo $students[$classe][array_rand($students[$classe],1)];
}else {
    echo "Section not found";
}

?>