<?php
include("./utils.php");
session_start();

db_insert("module",["nom"],[$_POST["nom"]]);

header("Location: addmodule.php");
?>