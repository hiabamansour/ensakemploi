<?php
include("./utils.php");
session_start();


if(validLogIn($_POST)){
     
    $user = db_select("utilisateur","*","email = '".$_POST["email"]."'",true);

    if($user){
        if($user["motdepasse"] == $_POST["password"]){
            $_SESSION["LOGGED"] = $user;
            if($user["role"]=="administratif")
                header("Location: administratif.php");
            else
                header("Location: enseignant.php");
            echo "<h1>logged</h1>";
            return;
        }
    }
 
}
    header("Location: ../index.php");
?>

