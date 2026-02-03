<?php

$notes = [0, 15, 7, 14, 20, 5, 16, 18];
$choix = 3;
$nbNotes = 0;

switch ($choix) {
    case 0:
        echo max($notes);
        break;
    case 1:
        echo min($notes);
        break;
    case 2:
        echo(array_sum($notes) / count($notes));
        break;
    case 3:
//        foreach ($notes as $note) {
//            if ($note >= 10) {
//                $nbNotes++;
//            }
//        }
//        echo "Nombre de notes au-dessus de la moyenne : " . $nbNotes . "<br>";

//        Plus simple
        $nbMoyenne = count(array_filter($notes, function ($note) {
            return $note >= 10;
        }));
        echo "Nombre de notes au dessus de la moyenne : " . $nbMoyenne;

        break;
    default:
        echo "Not found";
        break;
}

echo "<br>";

foreach ($notes as $note) {
    echo $note . "<br>";
}

echo "<br>";

$notes_bonus = [];
$bonus = 2;

foreach ($notes as $note) {
    $newNote = $note + $bonus;
    if ($note > 20) {
        $note = 20;
    }
    $notes_bonus[] = $newNote;
    echo $note . "<br>";
};


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tableau de notes</title>
</head>
<body>

<table border="1">
    <thead>
    <tr>
        <th>Note originale</th>
        <th>Note avec bonus</th>
    </tr>
    </thead>
    <tbody>
        <?php
            for($i = 0; $i < count($notes_bonus); $i++) {
                echo "<tr><td>$notes[$i]</td><td>$notes_bonus[$i]</td></tr>";
            }
        ?>
    </tbody>

</table>

</body>
</html>