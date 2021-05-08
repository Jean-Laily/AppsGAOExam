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
        $id_user =  isset($_GET['num']) ? $_GET['num'] : null;
        
        //lecture des tous utilisateurs
        $tabUserId = getUserID($id_user);

        //réception des variables en post du formulaire
        $idUsers = isset($_POST['idUser']) ? htmlspecialchars($_POST['idUser']) : null;
        $nomUser = isset($_POST['nomUser']) ? htmlspecialchars($_POST['nomUser']) : null;
        $prenomUser = isset($_POST['prenomUser']) ? htmlspecialchars($_POST['prenomUser']) : null;
        $adressUser = isset($_POST['adressUser']) ? htmlspecialchars($_POST['adressUser']) : null;
        $cpUser = isset($_POST['cpUser']) ? htmlspecialchars($_POST['cpUser']) : null;
        $citieUser = isset($_POST['citieUser']) ? htmlspecialchars($_POST['citieUser']) : null;
        $mailUser = isset($_POST['mailUser']) ? htmlspecialchars($_POST['mailUser']) : null;
        $passUser = isset($_POST['passUser']) ? htmlspecialchars($_POST['passUser']) : null;

        if(!empty($pRequete)){
            
            switch($pRequete){
                
                case 'create':
                    //on controle que toute les variables en post ont bien une valeur
                    if(!empty($nomUser) && !empty($prenomUser) && !empty($adressUser) && !empty($cpUser) && !empty($citieUser) && !empty($mailUser) && !empty($passUser)){
                        //appel de la fonction pour la création d'un utilisateur en lui passant tous les paramètre nécessaire
                        $requeteOk = createUser($nomUser, $prenomUser, $adressUser, $cpUser, $citieUser, $mailUser, $passUser);
                        
                        if($requeteOk){ // est vrai alors on retourne vers la page des utilisateurs
                            header("location: index.php?act=utl&cfm=10");
                        }
                    }
                    break;
                    
                    case 'update':
                    //condition pour la requête update
                    if(!empty($idUsers) && !empty($nomUser) && !empty($prenomUser) && !empty($adressUser) && !empty($cpUser) && !empty($citieUser)){

                        //appel de la fonction updateFiche pour la 1er partie du formulaire
                        $infoUserValid = updateUserFiche1($idUsers, $nomUser, $prenomUser, $adressUser, $cpUser, $citieUser);
                        if($infoUserValid){
                            header("location: index.php?act=utl&cfm=11");
                        }
                    }

                    if(!empty($mailUser) && !empty($passUser)){
                        $infoUserValid2 = updateUserFiche2($id_user, $mailUser,$passUser);
                        if($infoUserValid2){
                            header("location: index.php?act=utl&cfm=13");
                        }
                    }
                    
                break;
                default:
                    header("location: index.php?act=404");
                break;
            }
        }

        $view = "vCrudUser";
    }
