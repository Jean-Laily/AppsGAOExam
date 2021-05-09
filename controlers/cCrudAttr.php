<?php
    include 'models/managerCrudAttr.php';


    //si la variable session[userId] && session[userPw] n'est pas existant alors redirection vers la page login
    if(!isset($_SESSION["userId"]) && !isset($_SESSION["userPw"])){
        header('location:index.php?act=acc'); 
    }

    //blindage du paramètre act=crU
    if(!empty($pAction) && $pAction == "crA"){
        
        //réception du 2em paramètre get pour le CRUD
        $pRequete = isset($_GET['req']) ? $_GET['req'] : null;
        
        //lecture de tout les postes attribués
        $tabPostAttr = getAllAttr();
        $tabPostOk= getAllOrdiWithOk();
        $tabUser = getAllUser();
        $tabCreneau = getAllCreneau();

        //réception des variables en post du formulaire
        $posteName = isset($_POST['nomPoste']) ? htmlspecialchars($_POST['nomPoste']) : null;
        $userName = isset($_POST['utilisateurName']) ? htmlspecialchars($_POST['utilisateurName']) : null;
        $libCreneau = isset($_POST['creneauHr']) ? htmlspecialchars($_POST['creneauHr']) : null;
        $dateValide = isset($_POST['dateChoisi']) ? htmlspecialchars($_POST['dateChoisi']) : null;

        if(!empty($pRequete)){
            
            switch($pRequete){
                
                case 'create':
                    //on controle que toute les variables en post ont bien une valeur
                    if(!empty($posteName) && !empty($userName) && !empty($libCreneau)){
                        foreach($tabPostOk as $value){
                            if($posteName == $value['nomPc']){
                                $idPost = $value['numPoste'];
                            }
                            foreach($tabUser as $value){
                                if($userName == $value['nomUtil']){
                                    $idUser = $value['numUtil'];
                                }
                                foreach($tabCreneau as $value){
                                    if($libCreneau == $value['libelle']){
                                        $idCreneau = $value['numCreneau'];
                                        
                                    }
                                }
                            }
                        }

                        // // controle ici 
                        // foreach($tabPostAttr as $value){
                        //     //SI un poste et une horaire est déjà réservé par le même utilisateur ALORS message d'erreur
                        //     if($idPost == $value['numPoste']  && $idUser == $value['numUtil'] && $idCreneau == $value['numCreneau']){
                        //         header('location: index.php?act=crA&req=create&err=20');
                        //     }

                        // }
                        //appel de la fonction pour la création d'un utilisateur en lui passant tous les paramètre nécessaire
                        $requeteOk = createAttr($idPost, $idUser, $idCreneau, $dateValide);

                        if($requeteOk){ // est vrai alors on retourne vers le dashboard
                            header("location: index.php?act=db&cfm=10");
                        }
                        // else{
                        //     header('location: index.php?act=crA&req=create&err=21');
                        // }
                    }
                    break;
                    
                //     case 'update':
                //     //condition pour la requête update
                //     if(!empty($idUsers) && !empty($nomUser) && !empty($prenomUser) && !empty($adressUser) && !empty($cpUser) && !empty($citieUser)){

                //         //appel de la fonction updateFiche pour la 1er partie du formulaire
                //         $infoUserValid = updateUserFiche1($idUsers, $nomUser, $prenomUser, $adressUser, $cpUser, $citieUser);
                //         if($infoUserValid){
                //             header("location: index.php?act=utl&cfm=11");
                //         }
                //     }

                //     if(!empty($mailUser) && !empty($passUser)){
                //         $infoUserValid2 = updateUserFiche2($id_user, $mailUser,$passUser);
                //         if($infoUserValid2){
                //             header("location: index.php?act=utl&cfm=13");
                //         }
                //     }
                    
                // break;
                default:
                    header("location: index.php?act=404");
                break;
            }
        }

        $view = "vCrudAttr";
    }
