<?php
  include 'front/header.php';
?>
  <body>
    <section>
      <h1>Création users</h1>
        <form action="creauser.php" method="POST">
          <label>Adresse mail</label>
          <input type="text" name="email">
          <label>Pseudo</label>
          <input type="text" name="pseudo">
	  <label>Mot de passe</label>
          <input type="password" name="mdp">
          <input type="submit" value="valider">
      </form>
    </section>
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
      echo'<p>Pas de correspondance trouvé alors insert</p>';
    } else {
      header('Location: index.php');
    }
  }
?>
</body>
</html>
