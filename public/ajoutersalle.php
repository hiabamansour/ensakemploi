<?php
include("./utils.php");
session_start();

db_insert("salle",["nom","type","capacite"],[$_POST["nom"],$_POST["type"],$_POST["capacite"]]);

header("Location: addsalle.php");
?>