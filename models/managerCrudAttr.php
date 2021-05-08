<?php
    // création de plusieurs fonction pour le crud 

    /**
     * Fonction qui permet la création d'une attribution d'un pc d'un creneau et d'un utilisateur
     */
    function createAttr(){
        global $pdo;

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
                    WHERE annuler = 0 ';

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
     * Fonction qui permet de récupérer toute les attributions existante
     * @return $data array_associatif
     */
    // function recupNameAdmin(){
    //     global $pdo;

    //     $sql = ' SELECT * 
    //                 FROM center_cult';

    //     $requetes = $pdo->prepare($sql);
    //     $requetes->execute();

    //     $data =  $requetes->fetchAll(PDO::FETCH_ASSOC); 

    //     return $data;
    // }