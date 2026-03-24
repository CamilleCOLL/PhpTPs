<?php

use models\Sort;

try {
    $sort1 = new Sort("", "Feu", 40);
    echo $sort1->calculerDegatsReels(45);
}
catch (Exception $e) {
    echo "Impossible de créer le personnage : ". $e->getMessage();
}




