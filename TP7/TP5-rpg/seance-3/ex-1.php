<?php

require_once "modeles/Guerrier.php";
require_once "modeles/Mage.php";
require_once "modeles/Archer.php";


try{
    $guerrier = new Guerrier("Aragorn", 10, 150, 10);
    echo $guerrier->sePresenter();
    echo $guerrier->estEnVie() ? " En vie" : " Mort";
}
catch (Exception $e){
    echo "Création du guerrier impossible  : " . $e->getMessage();
}

echo "<br>";

try{
    $mage = new Mage("Gandalf", 80, 100, 12, 100);
    echo $mage->sePresenter();
    echo $mage->estEnVie() ? " En vie" : " Mort";
}
catch (Exception $e){
    echo "Création du mage impossible  : " . $e->getMessage();
}


echo "<br>";


try{
    $archer = new Archer("Noob", 4, 100, 100, 1);
    echo $archer->sePresenter();
    echo $archer->estEnVie() ? " En vie " : " Mort";
    echo $archer->tirerFleche();
}
catch (Exception $e){
    echo "Création de l'archer impossible  : " . $e->getMessage();
}




