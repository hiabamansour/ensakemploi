<?php
include("./utils.php");
session_start();

db_insert("utilisateur",["nom","prenom","email","motdepasse","role"],[$_POST["nom"],$_POST["prenom"],$_POST["email"],"azerty",$_POST["role"]]);

header("Location: addenseignant.php");
?>