<?php
    // création de plusieurs fonction pour le crud 

    /**
     * Requête permettant la création d'un utilisateur dans la database
     * @return estOk (bool) si non vide return true sinon return false
     * @param $nomUser 
     */
    function createUser($nomUser, $prenomUser, $adressUser, $cpUser, $citieUser, $mailUser, $passUser){
        global $pdo;
        
        //defini la timezone
        date_default_timezone_set('Asia/Muscat');
        //génère la date de création du jour
        $today = date("Y-m-d H:i:s");
        $delete = 0;
        $newVersion = 0;
        $id_auto = 0; 
        $estOk = "";

        //condition de vérification lors de la réception des données si non vide alors on insert dans la bdd
        if(!empty($nomUser) && !empty($prenomUser) && !empty($adressUser) && !empty($cpUser) && !empty($citieUser) && !empty($mailUser) && !empty($passUser)){
            $newVersion ++;
            
            // //partie test des données
            // echo'<pre>';
            //     print_r($nomUser.'<br/>'. $prenomUser.'<br/>'.$adressUser.'<br/>'.$cpUser.'<br/>'.$citieUser.'<br/>'. $today .'<br/>'.$mailUser.'<br/>'.$passUser .'<br/>'.$delete.'<br/>'.$newVersion.'<br/>');
            // echo'</pre>';
            // exit;
            
            $sql = 'INSERT INTO utilisateur VALUES
                    (:id, :nom, :prenom, :adresse, :cp, :ville, :dateCrea, :mail, :pass, :suppr, :vers)';
            // INSERT INTO `utilisateur`(`nomUtil`, `prenomUtil`, `adresse`, `codeP`, `ville`, `date_crea`, `email`, `passW`, `supprimer`, `version`) VALUES ("TRUST","Mate","1 rue labas","97404","laville","2020-11-25 00:00:00","mate@mail","azerty",0,1)
            
            $request = $pdo->prepare($sql);

            $request->bindParam(':id' , $id_auto);
            $request->bindParam(':nom' , $nomUser);
            $request->bindParam(':prenom' , $prenomUser);
            $request->bindParam(':adresse' , $adressUser);
            $request->bindParam(':cp' , $cpUser);
            $request->bindParam(':ville' , $citieUser);
            $request->bindParam(':dateCrea' , $today);
            $request->bindParam(':mail' , $mailUser);
            $request->bindParam(':pass' , $passUser);
            $request->bindParam(':suppr' , $delete);
            $request->bindParam(':vers' , $newVersion);
            
            
            $request->execute();
            
            // // //partie test des données
            // echo'<pre>';
            //     var_dump($request);
            // echo'</pre>';
            // exit;
            $estOk = true;
            
        }else{

            $estOk = false;
        }

        return $estOk;
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

