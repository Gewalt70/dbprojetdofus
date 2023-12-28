<?php
 include('pdo.php');

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
                        echo "vous etes connectez";
                    }

                }
            } else {
                echo"mauvaise addresse 
                mail";
            }
        }
    }
?>