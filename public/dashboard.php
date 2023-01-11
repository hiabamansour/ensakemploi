<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <title>Dashboard</title>
</head>

<body class=" bg-slate-400">
    <?php 
        include("navbar.php");

        if(isset($_POST)){
            $condition = "";

            if(isset($_POST["enseignant"]) and $_POST["enseignant"] !="All"){
                if(strlen($condition)>0)
                    $condition = $condition." and ";

                $condition = $condition." id_enseignant = '".$_POST["enseignant"]."'";
            }

            if(isset($_POST["module"]) and $_POST["module"] !="All"){
                if(strlen($condition)>0)
                    $condition = $condition." and ";

                $condition = $condition." id_module = '".$_POST["module"]."'";
            }

            if(isset($_POST["salle"]) and $_POST["salle"] !="All"){
                if(strlen($condition)>0)
                    $condition = $condition." and ";

                $condition = $condition." id_salle = '".$_POST["salle"]."'";
            }

            if(isset($_POST["semestre"]) and $_POST["semestre"] !="All"){
                if(strlen($condition)>0)
                    $condition = $condition." and ";

                $condition = $condition." id_semestre = '".$_POST["semestre"]."'";
            }

            if(isset($_POST["type"]) and $_POST["type"] !="All"){
                if(strlen($condition)>0)
                    $condition = $condition." and ";

                $condition = $condition." type = '".$_POST["type"]."'";
            }
            if(strlen($condition)==0)
                $condition = null;
            $seances = db_select("seance","duree",$condition);
            $counting = 0;
            foreach($seances as $seance){
                $counting +=$seance["duree"];
            }
            $_SESSION["result"] = $counting;
        }
    ?>
    <div class="container mx-auto bg-slate-400 ">
        <h1 class="text-2xl bg-slate-500 font-semibold p-1">+ Calculer La Charge Horaire</h1>
        <form action="dashboard.php" method="post" class="pl-10 flex flex-row">
            <div class="m-6 w-[25%] flex flex-col justify-between">
            <label for="enseigant">Enseigant:</label>
                <select name="enseignant" id="enseigant">
                <option value="All" selected>All</option>
                    <?php 
                    $enseignants = db_select("utilisateur","id_utilisateur,nom,prenom","role = 'enseignant'");
                    foreach($enseignants as $enseignant){
                    ?>
                    <option value=<?php echo $enseignant["id_utilisateur"]?>> <?php echo $enseignant["nom"]." ".$enseignant["prenom"]?></option>
                    <?php }?>
                </select>

                <label for="smodule">Module:</label>
                <select name="module" id="module">
                <option value="All" selected>All</option>
                <?php 
                    $modules = db_select("module","*");
                    foreach($modules as $module){
                    ?>
                    <option value=<?php echo $module["id_module"]?>> <?php echo $module["nom"]?></option>
                    <?php }?>
                </select>

                <label for="salle">Salle:</label>
                <select name="salle" id="salle">
                <option value="All" selected>All</option>
                <?php 
                    $salles = db_select("salle","*");
                    foreach($salles as $salle){
                    ?>
                    <option value=<?php echo $salle["id_salle"]?>> <?php echo $salle["nom"]?></option>
                    <?php }?>
                </select>

                <label for="semestre">Semestre:</label>
                <select name="semestre" id="semestre">
                    <option value="All" selected>All</option>
                    <?php 
                    $semestres = db_select("semestre","*");
                    foreach($semestres as $semestre){
                    ?>
                    <option value=<?php echo $semestre["id_semestre"]?>> <?php echo $semestre["numero"]?></option>
                    <?php }?>
                </select>

                <label for="type">type de seance:</label>
                <select name="type" id="type">
                    <option value="All">All</option>
                    <option value="TP">Traveaux Pratiques</option>
                    <option value="TD">Traveaux Dirigés</option>
                    <option value="cours">Cours</option>
                </select>

                <input type="submit" value="Calculer"
                    class="text-white focus:ring-4 mt-8 font-medium rounded-lg text-sm px-5 py-2.5 w-[70%] mx-auto  mb-2 bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">
            </div>
            

        </form>
    </div>

    <div class="container mx-auto">
        
        <h1 class="text-2xl bg-slate-500 font-semibold p-1">-Charge Horaire: <?php if(isset($_SESSION["result"])) echo $_SESSION["result"]; else echo 0?></h1>
    </div>
</body>

</html>