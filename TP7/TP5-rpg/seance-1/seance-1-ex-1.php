<?php

use modeles\Personnage;

require_once 'modeles/Personnage.php';

$perso1 = new Personnage();
$perso1->nom = "Arthas";
$perso1->classe = "Paladin";
$perso1->niveau = 10;
$perso1->ptsDeVie = 100;
$perso1->ptsDeVieMax = 100;

$perso2 = new Personnage();
$perso2->nom = "Sylvanas";
$perso2->classe = "Chasseuse de démons";
$perso2->niveau = 10;
$perso2->ptsDeVie = 20;
$perso2->ptsDeVieMax = 100;

$perso3 = new Personnage();
$perso3->nom = "Thrall";
$perso3->classe = "Chaman";
$perso3->niveau = 10;
$perso3->ptsDeVie = 80;
$perso3->ptsDeVieMax = 100;

echo $perso1->seSoigner(200) . "<br>";

echo $perso2->recevoirDegats(30) . "<br>";

echo $perso3->monterDeNiveau() . "<br>";

$personnages = [$perso1, $perso2, $perso3];

foreach ($personnages as $personnage) {
    echo $personnage->sePresenter() . "<br>";
}
