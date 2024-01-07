<?php
 if (session_status() === PHP_SESSION_ACTIVE) header('Location:acceuil.php');
 include('pdo.php');
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>DofayayoyeDB</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">
    </head>

    <body class="bg-white rounded-lg py-5">    
        <div class="container flex flex-col mx-auto bg-white rounded-lg pt-12 my-5">
           <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
      <div class="flex items-center justify-center w-full lg:p-12">
        <div class="flex items-center xl:p-10">
          <form class="flex flex-col w-full h-full pb-6 text-center bg-white rounded-3xl" action="connexion.php" method="POST">
            <h3 class="mb-3 text-4xl font-extrabold text-dark-grey-900">Connectez-vous</h3>
            <label for="email" class="mb-2 text-sm text-start text-grey-900">Email</label>
            <input id="email" type="email" placeholder="mail@dbprojetdofus.com" name="email" class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
            <label for="password" class="mb-2 text-sm text-start text-grey-900">Mot de passe</label>
            <input id="password" type="password" placeholder="Mot de passe" name="mdp" class="flex items-center w-full px-5 py-4 mb-5 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
            <div class="flex flex-row justify-between mb-8">
               <a href="javascript:void(0)" class="mr-4 text-sm font-medium text-purple-blue-500">Mot de passe oublié ?</a>
            </div>
            <button type="submit" class="w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-purple-blue-600 focus:ring-4 focus:ring-purple-blue-100 bg-purple-blue-500" name="submit">Connectez-vous</button>
            <p class="text-sm leading-relaxed text-grey-900">Pas encore inscrit ? <a href="creauser.php" class="font-bold text-grey-700">Créer un compte</a></p>
          </form>
        </div>
      </div>
    </div>
        </div>
    </body>
</html>
