<?php
 include('pdo.php');

 if (isset($_POST['submit'])) {
    /* Login status: false = not authenticated, true = authenticated. */
    $login = FALSE;

    /* Username from the login form. */
    $email = $_POST['email'];

    /* Password from the login form. */
    $password = $_POST['mdp'];
    /* Execute the query */
    try {
    /* Look for the username in the database. */
    $req=$pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $req->execute(array(':email' => $email));
    
    } catch (PDOException $e) {
      /* Query error. */
      echo 'Query error.';
      die();
    }

    $row = $req->fetch(PDO::FETCH_ASSOC);

    /* If there is a result, check if the password matches using password_verify(). */
    if (is_array($row))
    {
      if (password_verify($password, $row['mdp']))
      {
        /* The password is correct. */
        $login = TRUE;
        //$_SESSION['id'] = $row['id'];
        //$_SESSION['pseudo'] = $row['pseudo'];
        $_SESSION['email'] = $row['email'];
        //$_SESSION['admin'] = $row['admin'];

        header('Location:session.php');
      }
    }
  }


    if(isset($_POST['email']) && isset($_POST['mdp'])) {

        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        $req=$pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email= :email");
        $req->execute(array(':email' => $email));

        while($ligne = $req->fetch()) {

            if($ligne[0] == 1) {

                $reqverif=$pdo->prepare("SELECT mdp FROM utilisateurs WHERE email= :email");
                $reqverif->execute(array(':email' => $email));

                while($ligneverif = $reqverif->fetch()) {

                    $passwordhash = $ligneverif['mdp'];
                    $ispasswordcorrect = password_verify($mdp, $passwordhash);

                    if($ligneverif['mdp'] != $ispasswordcorrect)    {
                        echo "mauvais mdp";
                    }else{
                        //header('Location:acceuil.php');
                    }

                }
            } else {
                echo"mauvaise addresse mail";
            }
        }
    }
?>