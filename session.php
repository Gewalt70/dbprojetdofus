<?php   
    include 'pdo.php';

    session_start();
    $session = $_SESSION['email'] = $email; 
    var_dump($session); 

    $req=$pdo->prepare("SELECT * FROM utilisateurs WHERE saemailsa = :email");
    $req->execute(array(':email' => $email));
    while($ligne = $req->fetch()) {
        echo $email;
    }

?>