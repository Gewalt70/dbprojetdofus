<?php
include __DIR__ . '/../pdo.php';
include 'header.php';
if(!isset($_SESSION['email'])) header('Location: '. $__DIR__ . 'index.php');
?>

<body>
<header class="text-gray-700 body-font border-b border-gray-200">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="index.php">
      <img src="syscab.jpg" class="w-15 h-10 rounded-full" viewBox="0 0 24 24"></img>
    </a>

    <span class="ml-3 text-xl">Bonjour <?=$_SESSION['email'];?></span>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <button id="dropdownDefault" class="inline-flex items-center mr-5 hover:text-gray-900 " data-dropdown-toggle="dropdown" type="button">Tableau<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
      <!-- Dropdown menu -->
      <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-600">
          <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
              <li><a href="amulettes.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Amulettes</a></li>
              <li><a href="anneaux.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Anneaux </a></li>
              <li><a href="bottes.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bottes</a></li>
              <li><a href="ceintures.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ceintures</a></li>
          </ul>
      </div>
    <nav>
      <a href="mestickets.php" class="mr-5 hover:text-gray-900">Mes Builds</a>
      <a href="meschantiers.php" class="mr-5 hover:text-gray-900">Mes Crafts</a>
      <a href="assignes.php" class="mr-5 hover:text-gray-900">Ma Team</a>
      <a href="autrestickets.php" class="mr-5 hover:text-gray-900">Boss</a>
      <a href="compte.php" class="mr-5 hover:text-gray-900">Mon compte</a>

    </nav>
 
    <button onclick="window.location.href='logout.php'" class="inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0">Se déconnecter
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>
    </button>
  </div>
</header>
