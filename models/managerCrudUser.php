<?php
    // création de plusieurs fonction pour le crud 

    function createUser(){
        global $pdo;
    }

    /**
     * Fonction qui permet de récupérer toutes les utilisateurs existants
     * @return $data array_associatif
     */
    function readUser(){
        global $pdo;

        $sql = ' SELECT * 
                    FROM utilisateur
                    WHERE supprimer = 0';

        $requetes = $pdo->prepare($sql);
        $requetes->execute();

        $data =  $requetes->fetchAll(PDO::FETCH_ASSOC); 
        
        // var_dump($data);
        // exit;

        return $data;
    }

    function updateUser(){

    }


    function deleteUser(){

    }

