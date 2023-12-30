<?php
    session_start();
    include('pdo.php');

    if (isset($_POST['submit'])) {
        
        $login = FALSE; // login status false = pas authentifié true = authentifié. 

        $email = $_POST['email']; 
        $mdp = $_POST['mdp'];
     
        $req=$pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $req->execute(array(':email' => $email));
        
        while ($ligne = $req->fetch()) {
            
            if ($ligne != NULL) {
                if (password_verify($mdp, $ligne['mdp'])) {

                    $login = TRUE;
                    $_SESSION['pseudo'] = $ligne['pseudo'];
                    $_SESSION['email'] = $ligne['email'];
                    $_SESSION['admin'] = $ligne['admin'];

                    header('Location:acceuil.php');
                } else {
                    echo "Mot de passe incorrect";
                }
            }
    }  
}
?>