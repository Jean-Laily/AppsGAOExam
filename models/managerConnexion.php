<?php

    $userIDArray = array("admin","toto");
    $passIDArray = array("admin123", "toto123");

    //création de la fonction permettant de contrôler si l'utilisateur est bien dans la BDD
    function controleUser($id,$pw){

        $userValide = false;
        $idValide = false;
        $pwValide = false;

        //on regarde dans la BDD si l'user existe en comparant toute les occurrences de la table user 
        //on parcourt le tableau d'id et vérifie s'il correspond avec l'id entré par l'utilisateur (version temporaire ici)
        foreach($userIDArray as $value){
            if($id == $value){
              $idValide = true;  
            }
        }

        foreach($passIDArray as $value){
            if($pw == $value){
                $pwValide = true;
            }
        }

        if(isset($idValide) && isset($pwValide)){
            $userValide = true;
        }
        
        return $userValide;
    }