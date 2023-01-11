<?php
include("./utils.php");
session_start();

db_insert("filiere",["nom"],[$_POST["nom"]]);

header("Location: addfiliere.php");
?>