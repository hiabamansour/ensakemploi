<?php
include("./utils.php");
session_start();

print_r($_POST);
//Array ( [enseignant] => 7 [module] => 4 [salle] => 1 [semestre] => 2 [debut] => 2023-01-27T03:54 [duree] => 2 [type] => cours )
db_insert("seance",["id_enseignant","id_module","id_salle","id_semestre","debut","duree","type"],
                [$_POST["enseignant"],$_POST["module"],$_POST["salle"],$_POST["semestre"],$_POST["debut"],$_POST["duree"],$_POST["type"]]);

header("Location: addseance.php");
?>