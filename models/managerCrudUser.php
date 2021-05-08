<?php
    /**************************************************************
     * 
     *           Parti lecture de donnée dans la BDD
     * 
     **************************************************************/
    
    /**
     * Fonction qui permet de récupérer toutes les utilisateurs existants
     * @return $data array_associatif
     */
    function getAllUser(){
        global $pdo;

        $sql = ' SELECT * 
                    FROM utilisateur
                    WHERE supprimer = 0';

        $requetes = $pdo->prepare($sql);
        $requetes->execute();

        $data =  $requetes->fetchAll(PDO::FETCH_ASSOC); 
        
        return $data;
    }
    
     /**
     * Fonction qui permet de récupérer les informations d'un utilisateur cible
     * @return $data array_associatif
     */
    function getAllInfoWithUserID($id){
        global $pdo;

        $sql = ' SELECT * 
                    FROM utilisateur
                    WHERE supprimer = 0 AND numUtil = :idUser';

        $requetes = $pdo->prepare($sql);
        $requetes->bindParam(':idUser' , $id, PDO::PARAM_INT);
        $requetes->execute();

        $data =  $requetes->fetchAll(PDO::FETCH_ASSOC); 
        
        return $data;
    }


    /**************************************************************
     * 
     *           Parti insertion de donnée dans la BDD
     * 
     **************************************************************/
    
    /**
     * Requête permettant la création d'un utilisateur dans la database
     * @return estOk (bool) si non vide return true sinon return false
     * @param $nomUser 
     */
    function createUser($nomUser, $prenomUser, $adressUser, $cpUser, $citieUser, $mailUser, $passUser){
        global $pdo;
        
        //défini la timezone
        date_default_timezone_set('Asia/Muscat');
        //génère la date de création du jour et initialisation des variables
        $today = date("Y-m-d H:i:s");
        $supprimer = 0;
        $newVersion = 0;
        $estOk = false;

        //condition de vérification lors de la réception des données si c'est pas vide alors on insert dans la bdd
        try{
            $newVersion ++;
            
            $sql = "INSERT INTO utilisateur (nomUtil, prenomUtil, adresse, codeP, ville, date_crea, email, passW, supprimer, versionUtil) VALUES (:nom ,:prenom ,:adresse ,:cp ,:ville ,:dateCrea ,:mail, :pass,:suppr ,:vers)";
            
            $request = $pdo->prepare($sql);

            $request->bindParam(':nom' , $nomUser, PDO::PARAM_STR);
            $request->bindParam(':prenom' , $prenomUser, PDO::PARAM_STR);
            $request->bindParam(':adresse' , $adressUser, PDO::PARAM_STR);
            $request->bindParam(':cp' , $cpUser, PDO::PARAM_STR);
            $request->bindParam(':ville' , $citieUser,PDO::PARAM_STR);
            $request->bindParam(':dateCrea' , $today,PDO::PARAM_STR);
            $request->bindParam(':mail' , $mailUser,PDO::PARAM_STR);
            $request->bindParam(':pass' , $passUser,PDO::PARAM_STR);
            $request->bindParam(':suppr' , $supprimer,PDO::PARAM_INT);
            $request->bindParam(':vers' , $newVersion,PDO::PARAM_INT);
            
            $request->execute();
            // var_dump($request);
            // exit;
            $estOk = true;
     
        }catch(PDOException $e) {
	    	echo 'Échec de la requête '. $e->getMessage();
	    }

        return $estOk;
    }

    /**
     * Permet la modification des informations d'un utilisateur
     * 
     */
    function updateUserFiche1($id, $nomUser, $prenomUser, $adressUser, $cpUser, $citieUser){
        global $pdo;

        $recupVersion = "";
        $userTarget = getAllInfoWithUserID($id);
        foreach($userTarget as $value){
            
            $recupVersion = $value['versionUtil'];
        }

        $estOk = false;

        //condition de vérification lors de la réception des données si c'est pas vide alors on insert dans la bdd
        try{
            $recupVersion ++;

            $sql = "UPDATE utilisateur 
                        SET nomUtil = :nom , prenomUtil = :prenom, adresse = :adres, codeP = :cp, ville = :citie, versionUtil = :vers
                        WHERE numUtil = :idUser";
            
            $request = $pdo->prepare($sql);

            $request->bindParam(':nom' , $nomUser, PDO::PARAM_STR);
            $request->bindParam(':prenom' , $prenomUser, PDO::PARAM_STR);
            $request->bindParam(':adres' , $adressUser, PDO::PARAM_STR);
            $request->bindParam(':cp' , $cpUser, PDO::PARAM_STR);
            $request->bindParam(':citie' , $citieUser,PDO::PARAM_STR);
            $request->bindParam(':vers' , $recupVersion,PDO::PARAM_INT);
            $request->bindParam(':idUser',$id, PDO::PARAM_INT);
            
            $request->execute();

            $estOk = true;
     
        }catch(PDOException $e) {
	    	echo 'Échec de la requête '. $e->getMessage();
	    }

        return $estOk;
    }


    /**
     * Permet la modification de l'email et le mot de pass d'un utilisateur 
     * 
     */
    function updateUserFiche2($id = null,$mailUser, $passUser){
        global $pdo;

        $estOk = false;

        //condition de vérification lors de la réception des données si c'est pas vide alors on insert dans la bdd
        try{

            $sql = "UPDATE utilisateur 
                        SET email = :mail, passW = :pass,
                        WHERE numUtil = :idUser";
            
            $request = $pdo->prepare($sql);

            $request->bindParam(':mail' , $mailUser,PDO::PARAM_STR);
            $request->bindParam(':pass' , $passUser,PDO::PARAM_STR);
            $request->bindParam(':idUser',$id, PDO::PARAM_INT);
            
            $request->execute();

            $estOk = true;
     
        }catch(PDOException $e) {
	    	echo 'Échec de la requête '. $e->getMessage();
	    }

        return $estOk;
        
    }


    /**
     * M: Requête permettant la suppression (non définitif) d'un utilisateur 
     * O: @return NULL
     * I: @param id => défini le numero de l'utilisateur à supprimer
     * 
     */
    function deleteUser($id){
        global $pdo;
        //init variable
        $supprimer = 1;
        $msg = false;

        try{
            $deleteUser = 'UPDATE utilisateur 
                                SET supprimer = :suppr 
                                WHERE numUtil = :idUser ';

            $requete = $pdo->prepare($deleteUser);

            //préparation avec méthode bindParam la liaison entre le marqueur et la variable
            $requete->bindParam(':suppr',$supprimer, PDO::PARAM_INT );
            $requete->bindParam(':idUser',$id, PDO::PARAM_INT);

            $requete->execute();
            $msg = true;

        }catch(Exception $e){
            echo 'Échec de la requête '.$e->getMessage();
        }
        return $msg ;
    } 


