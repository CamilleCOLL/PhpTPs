<?php

require_once '../models/Personnage.php';

$personnage1 = new Personnage();
$personnage2 = new Personnage();
$personnage3 = new Personnage();

$personnage1->nom = "Gandalf";
$personnage1->classe = "Mage";
$personnage1->niveau = 10;
$personnage1->pointDeVieMax = 20;
$personnage1->pointDeVie = 2;

echo $personnage1->sePresenter();
echo "<br>";
echo $personnage1->estEnVie() ? "Le personnage est en vie. <br>" : "Le personnage n'est pas en vie. <br>";
echo $personnage1->seSoigner(40);

$personnage2->nom = "Berserk";
$personnage2->classe = "Guerrier";
$personnage2->niveau = 11;
$personnage2->pointDeVieMax = 40;
$personnage2->pointDeVie = 4;
echo "<br>";
echo $personnage2->sePresenter();
$personnage2->monterDeNiveau();
echo "<br>";
echo $personnage2->sePresenter();



