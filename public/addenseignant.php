<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <title>Ajouter Enseigant</title>
</head>

<body class=" bg-slate-400">
    <?php include("navbar.php") ?>

    <div class="container mx-auto bg-slate-400 ">
        <h1 class="text-2xl bg-slate-500 font-semibold p-1">+ Ajouter Un Enseigant</h1>
        <form action="ajouterenseignant.php" method="post" class="pl-10 flex flex-row">
            <div class="m-6 w-[25%] flex flex-col justify-between">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" id="nom" required>

                <label for="prenom">Prenom:</label>
                <input type="text" name="prenom" id="prenom" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                </select>
            </div>
            <div class="m-6 w-[25%] flex flex-col justify-between">

                <label for="role">role:</label>
                <select name="role" id="role" required>
                    <option value="administratif">Administratif</option>
                    <option value="enseignant">Enseignant</option>
                </select>

                <input type="submit" value="Ajouter"
                    class="text-white focus:ring-4 mt-8 font-medium rounded-lg text-sm px-5 py-2.5 w-[70%] mx-auto  mb-2 bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">

            </div>

        </form>
    </div>

    <div class="container mx-auto">
        <h1 class="text-2xl bg-slate-500 font-semibold p-1">+ Listes Des Enseignants</h1>
        <div>
            <?php
            $enseignants = db_select("utilisateur","*","role = 'enseignant'");
            
            ?>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left  bg-black">
                    <thead class="text-xs  uppercase bg-blue-400 text-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Photo de profile
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nom & Prenom
                            </th>
                            <th scope="col" class="px-6 py-3">
                                email
                            </th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        
                        foreach($enseignants as $enseignant) { ?>
                        <tr class=" border-b bg-blue-200 border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-black">
                                <img src= <?php echo '"../../'.$enseignant["photodeprofile"].'"'?> class="h-6 mr-3 sm:h-9" alt="" />
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $enseignant["nom"]." ".$enseignant["prenom"] ?>
                            </td>
                            <td class="px-6 py-4">
                            <?php echo $enseignant["email"] ?>
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