<?php
    include 'models/managerCrudUser.php';
    include 'models/managerCrudOrdi.php';

    /**
     * Fonction qui permet la création d'une attribution d'un pc d'un creneau et d'un utilisateur
     */
    function createAttr($idPost, $idUser, $idCreneau, $dateJrs){
        global $pdo;

        $cancel = 0;
        $estOk = false;
        // if(!empty($dateJrs)){
        //     try{
            
        //         $sql = ' SELECT *
        //                     FROM attribuer 
        //                     WHERE dateJour = :datJ';

        //         $requetes = $pdo->prepare($sql);
        //         $requetes->bindParam(':datJ' , $dateJrs, PDO::PARAM_STR);
        //         $requetes->execute();

        //         $tabData =  $requetes->fetchAll(PDO::FETCH_ASSOC);
        //         echo'<pre>';
        //             print_r($tabData);
        //         echo'</pre>';
        //         echo'<br/>';
        //         foreach($tabData as $values){
        //             if( $idPost == $values['numPoste'] && $idCreneau == $values['numCreneau']){
        //                 header('location: index.php?act=crA&req=create&err=21');
        //             }
        //         }
        //     }catch(PDOException $e) {
        //         echo 'Échec de la requête '. $e->getMessage();
        //     }
        // }
        //condition de vérification lors de la réception des données si c'est pas vide alors on insert dans la bdd
        try{
          
            $sql = "INSERT INTO attribuer (numPoste, numUtil, numCreneau, dateJour, annuler) VALUES (:idPst , :idUsr , :idCrn , :dateJ, :annul) ";
            
            $request = $pdo->prepare($sql);

            $request->bindParam(':idPst' , $idPost, PDO::PARAM_INT);
            $request->bindParam(':idUsr' , $idUser, PDO::PARAM_INT);
            $request->bindParam(':idCrn' , $idCreneau,PDO::PARAM_INT);
            $request->bindParam(':dateJ' , $dateJrs,PDO::PARAM_STR);
            $request->bindParam(':annul' , $cancel,PDO::PARAM_INT);
            
            $request->execute();

            // echo'<pre>';
            //     print_r($request);
            // echo'</pre>';
            // exit;
            $estOk = true;

        }catch(PDOException $e) {
	    	echo 'Échec de la requête '. $e->getMessage();
	    }
        return $estOk;
    }
    
    /**
     * Fonction qui permet de récupérer toute les attributions existante
     * @return $data array_associatif
     */
    function getAllAttrNotCancel(){
        global $pdo;

        $sql = ' SELECT a.*, u.nomUtil, u.prenomUtil, p.nomPc ,c.libelle 
                    FROM attribuer as a
                    INNER JOIN utilisateur as u
                    ON a.numUtil = u.numUtil
                    INNER JOIN post_info as p
                    ON a.numPoste = p.numPoste
                    INNER JOIN creneau_hor as c
                    ON a.numCreneau = c.numCreneau
                    WHERE annuler = 0
                    ORDER BY a.dateJour DESC, a.numCreneau ASC ';

        $requetes = $pdo->prepare($sql);
        $requetes->execute();

        $data =  $requetes->fetchAll(PDO::FETCH_ASSOC); 

        return $data;
    }


    function updateAttr(){

    }


    function deleteAttr(){

    }

    /**
     * Permet de récuperer tout les creneaux horaire existant
     * 
     */
    function getAllCreneau(){
        global $pdo;

        $sql = 'SELECT * FROM creneau_hor';
        $requetes = $pdo->prepare($sql);
        $requetes->execute();

        $data = $requetes->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }