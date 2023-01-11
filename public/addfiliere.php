<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <title>Ajouter Filiere</title>
</head>

<body class=" bg-slate-400">

    <?php include("navbar.php") ?>

    <div class="container mx-auto bg-slate-400 ">
        <h1 class="text-2xl bg-slate-500 font-semibold p-1">+ Ajouter Une Filiere</h1>
        <form action="ajouterfiliere.php" method="post" class="pl-10 flex flex-col w-[33vw]">
            <label for="nom">Nom de la Filiere:</label>
            <input type="text" name="nom" id="nom" required>

            <input type="submit" value="Ajouter"
                class="text-white focus:ring-4 mt-8 font-medium rounded-lg text-sm px-5 py-2.5 w-[70%] mx-auto  mb-2 bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">

    </div>

    </form>
    </div>


    <div class="container mx-auto">
        <h1 class="text-2xl bg-slate-500 font-semibold p-1">+ Liste Des Modules</h1>
        <div>
            <?php 
            $filieres = db_select("filiere","*");
            ?>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left  bg-black">
                    <thead class="text-xs  uppercase bg-blue-400 text-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nom
                            </th>
                            <th scope="col" class="px-6 py-3">
                                identifiant
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($filieres as $filiere){ ?>
                        <tr class=" border-b bg-blue-200 border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-black">
                                <?php echo $filiere["nom"] ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $filiere["id_filiere"] ?>
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