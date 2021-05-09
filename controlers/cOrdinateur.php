<?php
    include 'models/managerCrudOrdi.php';

    //si la variable session[userId] && session[userPw] n'est pas existant alors redirection vers la page login
    if(!isset($_SESSION["userId"]) && !isset($_SESSION["userPw"])){
        header('location:index.php?act=acc'); 
    }

    //blindage du paramètre act=odt
    if(!empty($pAction) && $pAction == "odt"){
        //réception du 2em paramètre get pour le CRUD
        $pRequete = isset($_GET['req']) ? $_GET['req'] : null;
        $id_ordi =  isset($_GET['num']) ? $_GET['num'] : null;

        //affichage liste Poste
        $tabOrdiOk = getAllOrdiWithOk();
        $tabOrdiKo = getAllOrdiWithKo();
        

        if(!empty($pRequete)){

            switch($pRequete){

                case 'delete':
                    //condition pour la requête delete
                    if(!empty($id_ordi)){
                        
                        $supprOk = deleteOrdi($id_ordi);

                        if($supprOk){
                            header("location: index.php?act=odt&cfm=23");
                        }
                    }
                break;
                default:
                    header("location: index.php?act=404");
                break;
            }
        }
        
        $view = "vOrdinateur";
    }

