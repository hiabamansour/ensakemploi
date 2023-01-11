<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <title>Profile</title>
</head>
<body class="bg-slate-400 flex flex-col">

    <?php include("navbar.php") 
    ?>
    
    <div class="w-[33vw] mx-auto rounded-md bg-blue-400 mt-[20vh] p-6">
        <div class="flex flex-col ">
            <img class="w-32 mx-auto" src= <?php echo '"../../'.$_SESSION["LOGGED"]["photodeprofile"].'"'?> alt="">
            <h1 class="text-2xl font-semibold text-gray-800 text-center p-1"> <?php echo $_SESSION["LOGGED"]["nom"]." ".$_SESSION["LOGGED"]["prenom"] ?></h1>
            <p class="text-2xl font-semibold text-gray-800 text-center p-1"> <?php echo $_SESSION["LOGGED"]["email"] ?></p>
            <p class="text-2xl font-semibold text-blue-800 text-center p-1"> <?php echo $_SESSION["LOGGED"]["motdepasse"]  ?></p>
            <p class="text-2xl font-semibold text-gray-800 text-center p-1">role : <?php echo $_SESSION["LOGGED"]["role"] ?></p>
        </div>
            
    </div>

    <div class="w-[33vw] mx-auto rounded-md bg-gray-400 mt-10 p-6">
        <form action="modifierprofile.php" enctype="multipart/form-data" method="post" class="flex flex-col">
        
            <label for="pdp" class="text-xl font-semibold text-gray-800 text-center p-1">Phote de profile:</label>
            <input type="file" name="pdp" id="pdp" >

            <label for="email" class="text-xl font-semibold text-gray-800 text-center p-1">email:</label>
            <input type="email" name="email" id="email">

            <label for="password" class="text-xl font-semibold text-gray-800 text-center p-1">password:</label>
            <input type="password" name="password" id="password">

            <input type="submit" value="Modifier" class="text-white focus:ring-4 mt-8 font-medium rounded-lg text-sm px-5 py-2.5 w-[70%] mx-auto  mb-2 bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">

        </form>
            
    </div>
</body>
</html>