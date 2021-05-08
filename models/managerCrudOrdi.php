<?php

    /**************************************************************
     * 
     *           Parti lecture de donnée dans la BDD
     * 
     **************************************************************/

    /**
     * Fonction qui permet de récupérer tous les postes existante dont l'etat est OK
     * @return $data array_associatif
     */
    function getAllOrdiWithOk(){
        global $pdo;

        $sql = ' SELECT * 
                    FROM post_info
                    WHERE etatPc = "Opérationnel" ';

        $requetes = $pdo->prepare($sql);
        $requetes->execute();

        $data =  $requetes->fetchAll(PDO::FETCH_ASSOC); 

        return $data;
    }

     /**
     * Permet de récupérer les informations d'un poste cible statut OK
     * @return $data array_associatif
     */
    function getAllInfoWithOrdiIdOk($id){
        global $pdo;

        $sql = ' SELECT * 
                    FROM post_info
                    WHERE etatPc = "Opérationnel" AND numPoste = :idOrdi';

        $requetes = $pdo->prepare($sql);
        $requetes->bindParam(':idOrdi' , $id, PDO::PARAM_INT);
        $requetes->execute();

        $data =  $requetes->fetchAll(PDO::FETCH_ASSOC); 
        
        return $data;
    }

     /**
     * Permet de récupérer tous les postes existante dont l'etat est KO
     * @return $data array_associatif
     */
    function getAllOrdiWithKo(){
        global $pdo;

        $sql = ' SELECT * 
                    FROM post_info
                    WHERE etatPc = "Maintenance" ';

        $requetes = $pdo->prepare($sql);
        $requetes->execute();

        $data =  $requetes->fetchAll(PDO::FETCH_ASSOC); 

        return $data;
    }

    /**
     * Permet de récupérer les informations d'un poste cible statut OK
     * @return $data array_associatif
     */
    function getAllInfoWithOrdiIdKo($id){
        global $pdo;

        $sql = ' SELECT * 
                    FROM post_info
                    WHERE etatPc = "Maintenance" AND numPoste = :idOrdi';

        $requetes = $pdo->prepare($sql);
        $requetes->bindParam(':idOrdi' , $id, PDO::PARAM_INT);
        $requetes->execute();

        $data =  $requetes->fetchAll(PDO::FETCH_ASSOC); 
        
        return $data;
    }

     /**************************************************************
     * 
     *           Parti insertion de donnée dans la BDD
     * 
     **************************************************************/

    function createOrdi($nom, $etat){
        global $pdo;
        
        //défini la timezone
        date_default_timezone_set('Asia/Muscat');
        //génère la date de création du jour et initialisation des variables
        $today = date("Y-m-d H:i:s");
        $newVersion = 0;

        $estOk = false;

        //condition de vérification lors de la réception des données si c'est pas vide alors on insert dans la bdd
        try{
            $newVersion ++;
            
            $sql = "INSERT INTO post_info (nomPc, etatPc, date_crea, versionPost) VALUES (:nomPoste ,:etatPoste ,:dateCrea ,:vers)";
            
            $request = $pdo->prepare($sql);

            $request->bindParam(':nomPoste' , $nom, PDO::PARAM_STR);
            $request->bindParam(':etatPoste' , $etat, PDO::PARAM_STR);
            $request->bindParam(':dateCrea' , $today,PDO::PARAM_STR);
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
     * 
     * 
     */
    function updateOrdiOk($id, $nom, $etat){
        global $pdo;

        $recupVersion = "";
        $ordiTarget = getAllInfoWithOrdiIdOk($id);
        foreach($ordiTarget as $value){
            $recupVersion = $value['versionPost'];
        }
        $estOk = false;
        //condition de vérification lors de la réception des données si c'est pas vide alors on insert dans la bdd
        try{
            $recupVersion ++;
            $sql = "UPDATE post_info 
                        SET nomPc = :nomPoste, etatPc = :etatPoste, versionPost = :vers
                        WHERE numPoste = :idOrdi";

            $request = $pdo->prepare($sql);

            $request->bindParam(':nomPoste' , $nom,PDO::PARAM_STR);
            $request->bindParam(':etatPoste' , $etat,PDO::PARAM_STR);
            $request->bindParam(':vers' , $recupVersion,PDO::PARAM_INT);
            $request->bindParam(':idOrdi',$id, PDO::PARAM_INT);

            $request->execute();

            $estOk = true;

        }catch(PDOException $e) {
	    	echo 'Échec de la requête '. $e->getMessage();
	    }
        return $estOk;
    }
    
    
    /**
     * 
     * 
     */
    function updateOrdiKo($id, $nom, $etat){
        global $pdo;

        $recupVersion = "";
        $ordiTarget = getAllInfoWithOrdiIdKo($id);
        foreach($ordiTarget as $value){
            $recupVersion = $value['versionPost'];
        }
        $estOk = false;
        //condition de vérification lors de la réception des données si c'est pas vide alors on insert dans la bdd
        try{
            $recupVersion ++;
            $sql = "UPDATE post_info 
                        SET nomPc = :nomPoste, etatPc = :etatPoste, versionPost = :vers
                        WHERE numPoste = :idOrdi";
            $request = $pdo->prepare($sql);
            $request->bindParam(':nomPoste' , $nom,PDO::PARAM_STR);
            $request->bindParam(':etatPoste' , $etat,PDO::PARAM_STR);
            $request->bindParam(':vers' , $recupVersion,PDO::PARAM_INT);
            $request->bindParam(':idOrdi',$id, PDO::PARAM_INT);
            $request->execute();
            $estOk = true;
     
        }catch(PDOException $e) {
	    	echo 'Échec de la requête '. $e->getMessage();
	    }
        return $estOk;
    }

    /**
     * 
     * 
     */
    function deleteOrdi($idPost){
        global $pdo;
        $msg = false;
        try{
            $sql = 'DELETE FROM post_info WHERE numPoste = :id ';

            $requete = $pdo->prepare($sql);
            //préparation avec méthode bindParam la liaison entre le marqueur et la variable
            $requete->bindParam(':id', $idPost, PDO::PARAM_INT);

            $requete->execute();
            
            $msg = true;

        }catch(Exception $e){
            echo 'Échec de la requête '. $e->getMessage();;
        }
        return $msg ;
    }

    