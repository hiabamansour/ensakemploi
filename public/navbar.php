
<?php 
session_start();
include("utils.php");

?>

<nav class=" border-gray-200 px-2 sm:px-4 py-2.5  bg-gray-900 mb-10">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <a href=<?php
    if($_SESSION["LOGGED"]["role"] == "administratif")
      echo '"administratif.php"';
    else
      echo '"enseignant.php"';
    ?> class="flex items-center">
        <img src= <?php echo '"../../'.$_SESSION["LOGGED"]["photodeprofile"].'"'?> class="h-6 mr-3 sm:h-9" alt="" />
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"> <?php echo $_SESSION["LOGGED"]["nom"]." ".$_SESSION["LOGGED"]["prenom"] ?></span>
    </a>
    
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="profile.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profile</a>
        </li>
        <li>
          <a href="../index.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
