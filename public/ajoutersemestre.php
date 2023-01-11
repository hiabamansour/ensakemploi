<?php
include("./utils.php");
session_start();

db_insert("semestre",["numero","annee","filiere_id"],[$_POST["numero"],$_POST["annee"],$_POST["filiere"]]);

header("Location: addsemestre.php");
?>