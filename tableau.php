<?php
  include ('front/navbar.php');
?>
<!-------- BARRE DE RECHERCHE-------->
<form action="" method="POST">
  <div class="font-sans text-black bg-white flex items-left justify-left">
    <div class="border rounded overflow-hidden flex">
      <input type="text" name="rechercher" class="px-4 py-2" placeholder="Numéro de ticket, Raison Sociale..." style="width: 400px;">
      <button class="flex items-center justify-center px-4 border-l">
        <svg class="h-4 w-4 text-grey-dark" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"/><input type="submit"></svg>
      </button>
    </div>
  </div>
</form>

<form>
  <button type ="submit" name="amulette" class="ml-2 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Amulettes</button>
  <button type ="submit" name=""        class="ml-2 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Ceintures</button>
  <button type ="submit" name=""   class="ml-2 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Bottes</button>
  <button type ="submit" name=""        class="ml-2 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"></button>
  <button type ="submit" name=""     class="ml-2 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"></button>
  <button type ="submit" name=""       class="ml-2 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"></button>
  <button type ="submit" name=""        class="ml-2 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"></button>
  <button type ="submit" name=""        class="ml-2 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"></button>
  <button type ="submit" name=""          class="ml-2 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"></button>
  <button type ="submit" name=""          class="ml-2 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"></button>
</form>

<!-------- TABLEAUX -------->
<div class="flex flex-col">
<!-- <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">-->
  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"> 
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">nom</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">zone</th>
            
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">LEVEL</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">AJOUT CRAFT</th>
          </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">
          <!-------- RECHERCHE BDD BARRE DE RECHECHE + AFFICHAGE -------->
          <?php
            if(!empty($_POST['rechercher']))  {
              
              $rechercher = $_POST["rechercher"];
              $requete=$pdo->prepare("SELECT * FROM `amulette` WHERE `nom` LIKE '%$rechercher%' OR `level` LIKE '%$rechercher%' ORDER BY 'level' DESC");
              $requete->execute();
          
              while ($ligne = $requete->fetch()) {
                echo'
                <td class="whitespace-nowrap"><a class="text-indigo-600 hover:text-indigo-900" href="iteminfo?id='.$ligne['id'].'"target="_blank">
                  <div class="flex items-center">
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">'.$ligne['nom'].'</div>
                    </div>
                  </div>
                </td>
                  <td class="whitespace-nowrap">
                    <div class="text-sm text-gray-900">ZONE BETHEL</div>
                  </td>
                    <td class="px-6 py-4 whitespace-nowrap">'.$ligne['level'].'</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">CRAFT + STUFF</td>
                        </tr>';
              }
            }
          ?>
            <!-------- BOUTON ASSIGNÉ + AFFICHAGE --------><div id="refresh">
          <?php
            if(isset($_GET["amulette"])) {   

              $req=$pdo->prepare('SELECT * FROM amulette order by `level` DESC');
              $req->execute();
              
              while($ligne = $req->fetch()) {
                echo'
                <td class="whitespace-nowrap"><a class="text-indigo-600 hover:text-indigo-900" href="iteminfo?id='.$ligne['id'].'"target="_blank">
                  <div class="flex items-center">
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">'.$ligne['nom'].'</div>
                    </div>
                  </div>
                </td>
                  <td class="whitespace-nowrap">
                    <div class="text-sm text-gray-900">ZONE BETHEL</div>
                  </td>
                    <td class="px-6 py-4 whitespace-nowrap">'.$ligne['level'].'</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">CRAFT + STUFF</td>
                        </tr>';
                        echo '<script type="text/javascript">location.reload(true);</script>';
              }
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
  setTimeout(function(){
    window.location.reload();
  },30000);
</script>
</body>
</html>
