<?php
  include 'front/header.php';
?>
<body class="bg-white rounded-lg py-5">
  <div class="container h-full flex flex-col mx-auto bg-white rounded-lg pt-12 my-5">
    <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
      <div class="flex items-center justify-center w-full lg:p-12">
        <div class="flex items-center xl:p-10">
          <form class="flex flex-col w-full pb-6 text-center bg-white rounded-3xl" action="creauser.php" method="POST">
            <h3 class="mb-3 text-4xl font-extrabold text-dark-grey-900">Créer un compte</h3>
	    <label for="pseudo" class="mb-2 text-sm text-start text-grey-900">Pseudo</label>
            <input required id="pseudo" type="text" name="pseudo" placeholder="Nickname" class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
            <label for="email" class="mb-2 text-sm text-start text-grey-900">Email</label>
            <input required id="email" type="email" placeholder="mail@dbprojetdofus.com" name="email" class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
            <label for="password" class="mb-2 text-sm text-start text-grey-900">Mot de passe</label>
            <input required id="password" type="password" placeholder="Mot de passe" name="mdp" class="flex items-center w-full px-5 py-4 mb-5 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
            <button type="submit" class="w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 rounded-2xl hover:bg-purple-blue-600 focus:ring-4 focus:ring-purple-blue-100 bg-purple-blue-500" name="submit">Créer</button>
          </form>

<?php
  include('pdo.php'); 
  //verif formulaire
  if(isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['pseudo'])) {
    
    $hashpassword = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $pseudo = $_POST['pseudo'];

    $req=$pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = :email");
    $req->execute(array(':email' => $email));

    $ligne = $req->fetch();
    $count = $ligne[0];
 
    if($count == 0) {
      $insert=$pdo->prepare("INSERT INTO utilisateurs (email, mdp, pseudo, admin) VALUES (:email, :mdp, :pseudo, 0)");
      $insert->execute(array(':email' => $email, ':mdp' => $hashpassword, ':pseudo' => $pseudo));
      echo '<script>window.alert("Compte' . $email . 'créé !");</script>';
      header('Location: index.php');
    } else {
      echo '<script>window.alert("Email déjà présente !");</script>';
    }
  }
?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
