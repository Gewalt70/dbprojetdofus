<?php
  //header('Location:connexion.php');

  include 'navbar.php';
  include 'pdoexterne.php';

  //Fonction pour connaitre le nbr de semaines
  function nbrSemaines()  {
    $today = date("Y-m-d"); 
    $nbrSemaines = date('W',strtotime($today));

    return $nbrSemaines;
  }
?>

<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script> 
</head>
<body>

<section class="text-gray-700 body-font">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Gestion de Tickets SYSCAB</h1><?php
      while($ligne = $req->fetch()) {//affichages des heures durant la semaines
        echo '<p class="title-font sm:text-3xl text-2xl mb-4 font-medium text-gray-900">Cette semaine vous avez signalé ' . $ligne['heuresemaine'] . 'H</p>';
      }?>
      <p class="mb-8 leading-relaxed">Plateforme de Gestion de Tickets. Pour toutes remarques, veuillez contacter Lucas.</p>
        <!-- <div class="flex justify-center">
          <a href='http://syscab.fr/home/support/' <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Création de tickets</button></a>
          <?php     
          // if ($_SESSION['admin'] == 1)  {
          //   echo '<a href="creauser.php" <button class="ml-4 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Ajouter un utilisateur</button></a>';
          // }
          // else{}
          ?>
          <a href='aide.php' <button class="ml-4 inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">Aide</button></a>
        </div> -->
    </div>
    <!-- <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
       <img class="object-cover object-center rounded" alt="hero" src="img/portail.png"> 
    </div> -->
  </div>
</section>

<footer class="text-gray-700 body-font">    
  <div class="bg-gray-200">
    <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
      <p class="text-gray-500 text-sm text-center sm:text-left">© 2023 SYSCAB - All Rights Reserved </p>
      <span class="sm:ml-auto sm:mt-0 mt-2 sm:w-auto w-full sm:text-left text-center text-gray-500 text-sm">« Ensembles, développons le bâtiment intelligent »</span>
    </div>
  </div>
</footer>
</body>
</html>