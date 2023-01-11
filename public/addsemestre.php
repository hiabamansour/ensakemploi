<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <title>Ajouter Semestre</title>
</head>

<body class="bg-slate-400">

    <?php include("navbar.php") ?>

    <div class="container mx-auto bg-slate-400 ">
        <h1 class="text-2xl bg-slate-500 font-semibold p-1">+ Ajouter Un Semestre</h1>
        <form action="ajoutersemestre.php" method="post" class="pl-10 flex flex-col w-[33vw]">
            <label for="numero">Numero:</label>
            <input type="number" name="numero" id="numero" required>

            <label for="annee">Année universitaire:</label>
            <input type="number" name="annee" id="annee" min="2022"required>

            <label for="filiere">Filiere:</label>
            <select name="filiere" id="filiere" required>
                <?php 
                $filieres = db_select("filiere","*");
                foreach($filieres as $filiere){
                ?>
                <option value=<?php echo $filiere["id_filiere"] ?>  > <?php echo $filiere["nom"] ?></option>
                <?php }?>
            </select>

            <input type="submit" value="Ajouter"
                class="text-white focus:ring-4 mt-8 font-medium rounded-lg text-sm px-5 py-2.5 w-[70%] mx-auto  mb-2 bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">

    </div>

    </form>
    </div>

    <div class="container mx-auto">
        <h1 class="text-2xl bg-slate-500 font-semibold p-1">+ Liste Des Semestres</h1>
        <div>
           <?php $semestres = db_select("semestre","*") ?>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left  bg-black">
                    <thead class="text-xs  uppercase bg-blue-400 text-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Numero
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Année
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Filiere
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($semestres as $semestre) {?>
                        <tr class=" border-b bg-blue-200 border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-black">
                                <?php echo "S".$semestre["numero"]?>
                            </th>
                            <td class="px-6 py-4">
                            <?php echo $semestre["annee"]?>
                            </td>
                            <td class="px-6 py-4">
                            <?php echo $filieres[$semestre["filiere_id"]-1]["nom"]?>
                            </td>

                        </tr>
                        <?php } ?>
                        

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>