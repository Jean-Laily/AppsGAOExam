<?php
    include 'models/managerCrudUser.php';
    include 'models/managerCrudOrdi.php';

    /**************************************************************
     * 
     *           Parti lecture de donnée dans la BDD
     * 
     **************************************************************/

     /**
     * Permet de récupérer tout les créneaux horaire existant
     * @return data => résultat de la requête
     * @param null
     */
    function getAllCreneau(){
        global $pdo;

        $sql = 'SELECT * FROM creneau_hor';
        $requetes = $pdo->prepare($sql);
        $requetes->execute();

        $data = $requetes->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    /**
     * Permet de récupérer toutes les attributions existante 
     * @return data => 
     */
    function getAllAttr(){
        global $pdo;

        $sql = ' SELECT a.*, u.nomUtil, u.prenomUtil, p.nomPc ,c.libelle 
                    FROM attribuer as a
                    INNER JOIN utilisateur as u
                    ON a.numUtil = u.numUtil
                    INNER JOIN post_info as p
                    ON a.numPoste = p.numPoste
                    INNER JOIN creneau_hor as c
                    ON a.numCreneau = c.numCreneau
                    ORDER BY a.dateJour DESC, a.numCreneau ASC ';

        $requetes = $pdo->prepare($sql);
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
     * Fonction qui permet la création d'une attribution pour un pc avec creneau et un utilisateur
     */
    function createAttr($idPost, $idUser, $idCreneau, $dateJrs){
        global $pdo;

        $cancel = 0;
        $estOk = false;
       
        try{
         
            $sql = "INSERT INTO attribuer (numPoste, numUtil, numCreneau, dateJour) VALUES (:idPst , :idUsr , :idCrn , :dateJ) ";
            
            $request = $pdo->prepare($sql);

            $request->bindParam(':idPst' , $idPost, PDO::PARAM_INT);
            $request->bindParam(':idUsr' , $idUser, PDO::PARAM_INT);
            $request->bindParam(':idCrn' , $idCreneau,PDO::PARAM_INT);
            $request->bindParam(':dateJ' , $dateJrs,PDO::PARAM_STR);
            
            $request->execute();
            $estOk = true;
         

        }catch(PDOException $e) {
	    	echo 'Échec de la requête '. $e->getMessage();
	    }
        return $estOk;
    }
    
    

    function updateAttr(){
        return null;
    }


    function deleteAttr($pNumPoste,$pNumCreno,$pNumUtil){
        global $pdo;

        //init variable
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

   