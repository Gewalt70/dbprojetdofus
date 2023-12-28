<?php
 include('pdo.php');
?>
<!doctype html>
<html lang="fr">
  <head>
      <meta charset="utf-8">
      <title>Titre de la page</title>
      <link rel="stylesheet" href="style.css">
      <script src="script.js"></script>
  </head>

  <body>
    <section>
      <h1>Création users</h1>
        <form action="creauser.php" method="POST">
          <label>Adresse mail</label>
          <input type="text" name="email">
          <label>Mot de pase</label>
          <input type="password" name="mdp">
          <input type="submit" value="valider">
      </form>
    </section>
</body> 
</html>
<?php
 session_start();
 session_destroy();
 session_start();

 include('pdo.php');

 //verif formulaire
  if(isset($_POST['email']) && isset($_POST['mdp'])) {

   $hashpassword = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

   $email = $_POST['email'];
   $mdp = $_POST['mdp'];

   $req=$pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = :email");
   $req->execute(array(':email' => $email));

    while($ligne = $req->fetch()) {

      if($ligne[0] == 0) {
    
        $insert=$pdo->prepare("INSERT INTO utilisateurs (email, mdp) VALUES (:email, :mdp)");
        $insert->execute(array(':email' => $email, ':mdp' => $hashpassword));

        echo'Pas de correspondance trouvé alors insert';
       } else {
        echo'Correspondance trouvé alors retour acceuil';
      }
    }
  }

?>