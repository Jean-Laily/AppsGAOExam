<?php
    
    //création de la fonction permettant de contrôler si l'utilisateur est bien dans la BDD
    function controleUser($id,$pw){
        
        global $pdo;
        //Appel de la fonction controle password (voir description de la fonction)
        $passControler = controlePass($pw);

        $sql  = 'SELECT prenomSecretaire
                    FROM centre_cult
                    WHERE identifiant = :id AND pass = :pw';

        //on déclare ici les paramètres équivalent à un bindParam
        $param = [ 'id' => $id,
                   'pw' => $passControler ];

        $request = $pdo->prepare($sql);
        $request->execute($param);
        
        $result = $request->fetchAll(PDO::FETCH_ASSOC);

        // var_dump($result);
        // exit;

        return (count($result) == 1); //retourne 0 si vide et 1 si ok
    }

    /**
     * M: Cette fonction permet de comparer un mdp donné avec un mdp hashé
     * O: @return $passCtrl  selon le resultat il retournera soit une valeur vide soit le mot de passe hashé 
     * I: @param $pw 
     */
    function controlePass($pw){
        global $pdo;
        
        $passCtrl = '';

        $sql = 'SELECT pass FROM centre_cult';
         
        $requete = $pdo->prepare($sql);
        $requete->execute();

        $data = $requete->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $values){
            $passHash = $values['pass'] ;
        }
        //comparaison entre les deux mot de passe
        if(password_verify( $pw, $passHash )){
            $passCtrl = $passHash;
        };

        return $passCtrl;
    }