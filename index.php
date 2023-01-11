<?php
session_start();

if (isset($_SESSION["LOGGED"])) {
    session_destroy();
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/output.css">
    <title>Gestion Des Emplois De Temps</title>
</head>

<body class="container flex m-10 mx-auto">
    <div class="w-[50%] text-center pt-[23vh]">
        <img class="mx-auto" src="../../assets/emploi-du-temps-en-ligne.jpg" alt="">
        <p class="text-3xl font-semibold text-amber-500">Application De Gestion Des Emplois De Temps</p>
    </div>
    <div class="mx-[10%] mt-[23vh] w-[27%] rounded-md shadow-md font-semibold bg-slate-300 p-8 pt-14 ">
        <h1 class="text-center font-semibold text-blue-400 text-2xl">Sign In</h1>
        <form action="\public\auth.php" method="post" class=" flex flex-col ">
            <label class="my-2" for="email">Email:</label>
            <input class="my-1" type="email" name="email" id="email">
            <label class="my-2" for="password">Password:</label>
            <input class="my-1" type="password" name="password" id="password">
            <input type="submit" value="Login"
                class="text-white focus:ring-4 mt-8 font-medium rounded-lg text-sm px-5 py-2.5 w-[70%] mx-auto  mb-2 bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">
        </form>
    </div>
</body>

</html>