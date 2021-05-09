<?php
    include 'models/managerCrudAttr.php';
    
   //si la variable session[userId] && session[userPw] n'est pas existant alors redirection vers la page login
    if(!isset($_SESSION["userId"]) && !isset($_SESSION["userPw"])){
        header('location:index.php?act=acc'); 
    }

    //blindage du paramètre act=db
    if(!empty($pAction) && $pAction == "db"){

        //réception des paramètre get pour supprimer
        $pRequete = isset($_GET['req']) ? $_GET['req'] : null;
        $pNumPoste = isset($_GET['numP']) ? $_GET['numP'] : null;
        $pNumCreno = isset($_GET['numC']) ? $_GET['numC'] : null;
        $pNumUtil = isset($_GET['numU']) ? $_GET['numU'] : null;
        $tabAttr = getAllAttr();

        if(!empty($pRequete)){
            switch($pRequete){
                case 'delete':
                    //condition pour la requête delete
                    if(!empty($pNumPoste) && !empty($pNumCreno) && !empty($pNumUtil) ){
                        $supprOk = deleteAttr($pNumPoste,$pNumCreno,$pNumUtil);
                        
                        if($supprOk){
                            header("location: index.php?act=db&cfm=13");
                        }
                    }
                break;
                default:
                    header("location: index.php?act=404");
                break;
            }
        }
        
        $view = "vDashboard";
    }