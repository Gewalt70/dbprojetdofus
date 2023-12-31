<?php
  include 'navbar.php';
  include('pdo.php');

  $json = file_get_contents('../projetdofus/json/amulet.json');
  $parsedjson = json_decode($json, true);

  //var_dump($parsedjson);

  // foreach ($parsedjson as $key => $value) {
    
    // echo $value['name'];
    // echo $value['level'];
    // echo $value['type'];
  // }
  //$IMGitem = $parsedjson[0]->imgPath;

  // var_dump($nomitem);
  // var_dump($json);
  //echo $IMGitem;
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body>   
      <section class="container mx-auto p-6 font-mono">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
          <div class="w-full overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                  <th class="px-4 py-3">NOMS</th>
                  <th class="px-4 py-3">ÉLÉMENTS</th>
                  <th class="px-4 py-3">ACTION</th>
                  <th class="px-4 py-3">LEVELS</th>
                </tr>
              </thead>
            </table>  
          </div>
        </div>
      </section>
      <?php  
        $req=$pdo->prepare("SELECT * FROM armes");
        $req->execute();
        
        while ($ligne = $req->fetch()) { 
      ?>
      <section class="container mx-auto">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
          <div class="w-full overflow-x-auto">
            <table class="w-full">

              <tbody class="bg-white">
                <tr class="text-gray-700">
                  <td class="px-4 py-3 border">
                    <div class="flex items-center text-sm">
                      <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded-full" src="http://staticns.ankama.com/dofus/www/game/items/200/1230.png" alt="" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>
                      <div>
                        <p class="font-semibold text-black"><?= $ligne['nom'];?></p>
                        <p class="text-xs text-gray-600"><?= $ligne['description'];?></p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-ms font-semibold border">
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Agilité </span>
                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"> Intelligence </span>
                    <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-sm"> Chance </span>
                    <span class="px-2 py-1 font-semibold leading-tight text-amber-700 bg-amber-100 rounded-sm"> Force </span>
                    <span class="px-2 py-1 font-semibold leading-tight text-amber-700 bg-amber-100 rounded-sm"> <?= $ligne['effets'];?> </span>
                  </td>
                  <td class="px-4 py-3 text-xs border">
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> mettre boutons </span>
                  </td>
                  <td class="px-4 py-3 text-xs border">
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> <?= $ligne['lvl'];?></span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </body>
    <?php } ?>
</html>

<img src="http://staticns.ankama.com/dofus/www/game/items/200/1230.png"/><div class="overflow-x-auto">