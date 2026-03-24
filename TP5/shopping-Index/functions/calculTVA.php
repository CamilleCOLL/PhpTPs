<?php

function calulPrixTVA(float $prix, float $TVA)
{
    return $prix * $TVA/100;
}

function calculerPrixPromotion(float $prixTVA, float $promotion)
{
    return $prixTVA * $promotion/100 ;
}