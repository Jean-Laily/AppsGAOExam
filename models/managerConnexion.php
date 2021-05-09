<?php
    /**
     * Fonction permettant de contrôler Si l'id et mdp fourni est correspondant à celui de la database
     * @return count 0 ou 1 selon le résultat
     * @param id => identifiant user
     * @param pw => password user
     */
    function controleUser($id,$pw){
        global $pdo;

        $sql  = 'SELECT prenomSecretaire
                    FROM centre_cult
                    WHERE identifiant = :id AND pass = :pw';

        //on déclare ici les paramètres équivalent à un bindParam
        $param = [ 'id' => $id,
                   'pw' => $pw ];

        $request = $pdo->prepare($sql);
        $request->execute($param);
        
        $result = $request->fetchAll(PDO::FETCH_ASSOC);

        return (count($result) == 1); //retourne 0 si false et 1 si ok
    }

    /**
     * M: Cette fonction permet de comparer un mdp donné avec un mdp hashé
     * O: @return $passCtrl  selon le résultat il retournera soit une valeur vide soit le mot de passe hashé 
     * I: @param $pw 
     */
    function controlePass($pw){
        global $pdo;
        
        $passCtrl = '';

        $sql = 'SELECT pass FROM centre_cult';
         
        $requete = $pdo->prepare($sql);
        $requete->execute();

        $data = $requete->fetchAll(PDO::FETCH_ASSOC);

        //Lecture du tableau et stockage du resultat
        foreach($data as $values){
            $passHash = $values['pass'] ;
        }

        //comparaison des mot de passe
        if(password_verify( $pw, $passHash )){
            $passCtrl = $passHash;
        };

        return $passCtrl;
    }