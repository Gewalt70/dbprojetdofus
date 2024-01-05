<?php
    include('pdo.php');
    include('navbar.php');

    $json = file_get_contents('../projetdofus/json/amulet.json');
    $parsedjson = json_decode($json, true); //decode le fichier JSON en array PHP 
  
    foreach ($parsedjson as $key => $value) { //prend chaque valeurs de l'array

        $exist = $pdo->prepare("SELECT id_item FROM amulette WHERE id_item = :id"); //select chaque id_item dans la table amulette
        $exist->execute(array(':id' => $value['id']));

        if ($exist->rowCount() == 0) { //si l'id_item n'existe pas dans la table amulette alor insert dans la table amulette

            if(isset($value['set']['setName']) && $value['condition'] == NULL) { //si la panoplie existe pour un item et que la condition(prerequis) n'est pas définie

                foreach ($value['stats'] as $key ) {} //prend chaque valeur de l'array stats
        
                $req=$pdo->prepare("INSERT INTO amulette (id_item,nom,panoplie,level,prerequis,stats,description) VALUES (:id,:nom,:panoplie,:level,'pas de prerequis',:stats,:description)");
                $req->execute(array(':id' => $value['id'],':nom' => $value['name'],':panoplie' => $value['set']['setName'],':level' => $value['level'],':stats' => $key,':description' => $value['description']));
                            
            } else {
                    
                foreach ($value['condition'] as $key ) {} //prend chaque valeur de l'array condition(prerequis)
                foreach ($value['stats'] as $keys ) {} //prend chaque valeur de l'array stats
        
                $req=$pdo->prepare("INSERT INTO amulette (id_item,nom,panoplie,level,prerequis,stats,description) VALUES (:id,:nom,'pas de bonus panoplie',:level,:prerequis,:stats,:description)");
                $req->execute(array(':id' => $value['id'],   ':nom' => $value['name'],':level' => $value['level'],':prerequis' => $key,':stats' => $keys,':description' => $value['description']));
            }
        } else { //si l'id_item existe dans la table amulette

            echo '<pre> L\'item '. $value['name'].' est déjà présent dans la table amulette </pre>';
        }
    }
?>