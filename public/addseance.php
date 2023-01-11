<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <title>Ajouter Seance</title>
</head>

<body class=" bg-slate-400">
    <?php 
    include("navbar.php")
    ?>

    <div class="container mx-auto bg-slate-400 ">
        <h1 class="text-2xl bg-slate-500 font-semibold p-1">+ Ajouter Une Seance</h1>
        <form action="ajouterseance.php" method="post" class="pl-10 flex flex-row">
            <div class="m-6 w-[25%] flex flex-col justify-between">
                <label for="enseigant">Enseigant:</label>
                <select name="enseignant" id="enseigant">
                    <?php 
                    $enseignants = db_select("utilisateur","id_utilisateur,nom,prenom","role = 'enseignant'");
                    foreach($enseignants as $enseignant){
                    ?>
                    <option value=<?php echo $enseignant["id_utilisateur"]?>> <?php echo $enseignant["nom"]." ".$enseignant["prenom"]?></option>
                    <?php }?>
                </select>


                <label for="smodule">Module:</label>
                <select name="module" id="module">
                <?php 
                    $modules = db_select("module","*");
                    foreach($modules as $module){
                    ?>
                    <option value=<?php echo $module["id_module"]?>> <?php echo $module["nom"]?></option>
                    <?php }?>
                </select>

                <label for="salle">Salle:</label>
                <select name="salle" id="salle">
                <?php 
                    $salles = db_select("salle","*");
                    foreach($salles as $salle){
                    ?>
                    <option value=<?php echo $salle["id_salle"]?>> <?php echo $salle["nom"]?></option>
                    <?php }?>
                </select>

                <label for="semestre">Semestre:</label>
                <select name="semestre" id="semestre">
                    <?php 
                    $semestres = db_select("semestre","*");
                    foreach($semestres as $semestre){
                    ?>
                    <option value=<?php echo $semestre["id_semestre"]?>> <?php echo $semestre["numero"]?></option>
                    <?php }?>
                </select>
            </div>
            <div class="m-6 w-[25%] flex flex-col justify-between">
                <label for="debut">Programmé pour le:</label>
                <input type="datetime-local" name="debut" id="debut" required>

                <label for="duree">Durée:</label>
                <input type="number" name="duree" id="duree" max="5" min="1" required>

                <label for="type">type de seance:</label>
                <select name="type" id="type">
                    <option value="TP">Traveaux Pratiques</option>
                    <option value="TD">Traveaux Dirigés</option>
                    <option value="cours">Cours</option>
                </select>

                <input type="submit" value="Ajouter"
                    class="text-white focus:ring-4 mt-8 font-medium rounded-lg text-sm px-5 py-2.5 w-[70%] mx-auto  mb-2 bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">

            </div>

        </form>
    </div>

    <div class="container mx-auto">
        <h1 class="text-2xl bg-slate-500 font-semibold p-1">+ Seances Programmées</h1>
        <div>
            <?php
            $seances = db_select("seance","*");
            ?>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left  bg-black">
                    <thead class="text-xs  uppercase bg-blue-400 text-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Date & Heure
                            </th>
                            <th scope="col" class="px-6 py-3">
                                module
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Semestre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Durée
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Type
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        foreach($seances as $seance) {
                            
                        ?>
                        <tr class=" border-b bg-blue-200 border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-black">
                                <?php echo  $seance["debut"] ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php 
                                $module = db_select("module","*","id_module = '".$seance["id_module"]."'",true);
                                
                                echo  $module["nom"] ;
                                
                                ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php 
                                $semstre = db_select("semestre","filiere_id,numero","id_semestre = '".$seance["id_semestre"]."'",true);
                                $filiere = db_select("filiere","nom","id_filiere = '".$semestre["filiere_id"]."'",true);
                                echo "S".$semestre["numero"]." ".$filiere["nom"]  ;
                                ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo  $seance["duree"] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo  $seance["type"] ?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>