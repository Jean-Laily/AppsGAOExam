<?php
    include 'models/managerCrudUser.php';

    //si la variable session[userId] && session[userPw] n'est pas existant alors redirection vers la page login
    if(!isset($_SESSION["userId"]) && !isset($_SESSION["userPw"])){
        header('location:index.php?act=acc'); 
    }

    //blindage du paramètre act=crU
    if(!empty($pAction) && $pAction == "crU"){
        //réception du 2em paramètre get pour le CRUD
        $pRequete = isset($_GET['req']) ? $_GET['req'] : null;

        //réception des variables en post du formulaire
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
                    if(!empty($nomUser)){
                        //appel de la fonction pour la création d'un utilisateur
                        $bool = createUser($nomUser, $prenomUser, $adressUser, $cpUser, $citieUser, $mailUser, $passUser);

                        if($bool){
                            header("location: index.php?act=utl&cfm=10");
                        }else{
                            header("location: index.php?act=utl&err=005");
                        }
                    }
                break;

                case 'update':
                    //condition pour la requête update
                    if(!empty($pCoDuree) && !empty($pCatProd) && !empty($pPrixLoc) ){
                        $bool = getUpdate($pCoDuree, $pCatProd, $pPrixLoc);
                        if($bool){
                            header("location: index.php?act=tar&ms=13");
                        }else{
                            header("location: index.php?act=tar&err=115");
                        }
                    }
                    
                break;
                case 'delete':
                    //condition pour la requête delete
                    if(!empty($pCoDuree) && !empty($pCatProd)){
                        $bool = getDelete($pCoDuree, $pCatProd);
                        if($bool){
                            header("location: index.php?act=tar&ms=14");
                        }else{
                            header("location: index.php?act=tar&err=120");
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
