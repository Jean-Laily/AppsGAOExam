<?php
    include 'models/managerCrudUser.php';

    //si la variable session[userId] && session[userPw] n'est pas existant alors redirection vers la page login
    if(!isset($_SESSION["userId"]) && !isset($_SESSION["userPw"])){
        header('location:index.php?act=acc'); 
    }

    //blindage du paramètre act=utl
    if(!empty($pAction) && $pAction == "utl"){
        //réception du 2em paramètre get pour le CRUD
        $pRequete = isset($_GET['req']) ? $_GET['req'] : null;
        $id_user =  isset($_GET['num']) ? $_GET['num'] : null;
        
        
        //lecture des tous utilisateurs
        $tabUser = getAllUser();

        if(!empty($pRequete)){
            switch($pRequete){
                case 'delete':
                    
                    //condition pour la requête delete
                    if(!empty($id_user)){
                        $supprOk = deleteUser($id_user);
                        if($supprOk){
                            header("location: index.php?act=utl&cfm=33");
                        }
                    }
                break;
                default:
                    header("location: index.php?act=404");
                break;
            }
        }
        
        $view = "vUtilisateur";
    }
