<?php
echo "Validation de l'âge : ";
$age = 18;

echo "$age <br>";
if ($age < 18) {
    echo "Accès refusé";
}else{
    echo "Accès autorisé";
}

echo "<br>";
echo "<br>";

echo "Validation avec catégorie : ";
if ($age < 13) {
    echo "Accès enfant - Surveillance parentale requise";
}elseif ($age >= 13 && $age < 18) {
    echo "Accès mineur - Autorisation parentale nécessaire";
}else {
    echo "Accès autorisé - Bienvenue";
}

echo "<br>";
echo "<br>";

echo "Gestion des cas particuliers : ";

if ($age < 0 || $age > 120) {
    echo "Erreur - veuillez entrer un âge crédible";
}else{
    if ($age < 13) {
        echo "Accès enfant - Surveillance parentale requise";
    }elseif ($age >= 13 && $age < 18) {
        echo "Accès mineur - Autorisation parentale nécessaire";
    }else {
        if ($age==18){
            echo "Félicitation pour la majorité ! ";
        }
        echo "Accès autorisé - Bienvenue";
    }
}


echo "<br>";
echo "<br>";

?>
