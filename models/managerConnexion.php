<?php

    //création de la fonction permettant de contrôler si l'utilisateur est bien dans la BDD
    function controleUser($id,$pw){
        global $pdo;
        
        $sql  = 'SELECT prenomSecretaire
                    FROM centreculturel
                    WHERE identifiant = :id AND motDePasse = :pw';

        //on déclare ici les paramètres équivalent à un bindParam
        $param = [ 'id' => $id,
                   'pw' => $pw ];

        //on
        $request = $pdo->prepare($sql);
        $request->execute($param);
        
        $result = $request->fetchAll(PDO::FETCH_ASSOC);

        return (count($result) == 1); //retourne 0 si vide et 1 si ok
    }