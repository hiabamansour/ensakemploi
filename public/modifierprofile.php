<?php
include("./utils.php");
session_start();

if(isset($_POST["password"]) && !empty($_POST["password"])){
    db_update("utilisateur","id_utilisateur  = {$_SESSION["LOGGED"]["id_utilisateur"]}",["motdepasse"],[$_POST["password"]]);
}

if(isset($_POST["email"]) && !empty($_POST["email"])){
    db_update("utilisateur","id_utilisateur  = {$_SESSION["LOGGED"]["id_utilisateur"]}",["email"],[$_POST["email"]]);
}

if (isset($_FILES["pdp"]) and $_FILES["pdp"]['error'] == 0) {
    echo "in files";
    $fileInfo = pathinfo($_FILES['pdp']['name']);
    $extension = $fileInfo['extension'];
    $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];

    $src = "assets/".$_SESSION["LOGGED"]["id_utilisateur"].$_SESSION["LOGGED"]["nom"].".". $extension;

    if (in_array($extension, $allowedExtensions)){

        db_update("utilisateur","id_utilisateur = {$_SESSION["LOGGED"]["id_utilisateur"]}",["photodeprofile"],[$src]);

        if(file_exists($src)) {
            chmod($src,0755); 
            unlink($src); 
        }
        move_uploaded_file($_FILES["pdp"]["tmp_name"],"C:/Users/MK7/Documents/Workspace/Gestion des emplois du temps/".$src );

    }
}

$user = db_select("utilisateur","*","id_utilisateur = '".$_SESSION["LOGGED"]["id_utilisateur"]."'",true);
$_SESSION["LOGGED"] = $user;

print_r($_SESSION["LOGGED"]);
header("Location: profile.php");    

?>