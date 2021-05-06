<?php
    // création de plusieurs fonction pour le crud 

    function createPC(){

    }

    /**
     * Fonction qui permet de récupérer toute les attributions existante
     * @return $data array_associatif
     */
    function readOrdi(){
        global $pdo;

        $sql = ' SELECT * 
                    FROM post_info
                    WHERE etatPc = "OK" ';

        $requetes = $pdo->prepare($sql);
        $requetes->execute();

        $data =  $requetes->fetchAll(PDO::FETCH_ASSOC); 
    
        // var_dump($data);
        // exit;

        return $data;
    }

    function updatePC(){

    }


    function deletePC(){

    }