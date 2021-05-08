<?php
    include 'models/managerCrudAttr.php';
    
   //si la variable session[userId] && session[userPw] n'est pas existant alors redirection vers la page login
    if(!isset($_SESSION["userId"]) && !isset($_SESSION["userPw"])){
        header('location:index.php?act=acc'); 
    }

    //blindage du paramètre act=db
    if(!empty($pAction) && $pAction == "db"){

        $tabAttr = getAllAttrNotCancel();
        
        $view = "vDashboard";
    }