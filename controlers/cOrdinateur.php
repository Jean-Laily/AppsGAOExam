<?php
    //si la variable session[userId] && session[userPw] n'est pas existant alors redirection vers la page login
    if(!isset($_SESSION["userId"]) && !isset($_SESSION["userPw"])){
        header('location:index.php?act=acc'); 
    }

    //blindage du paramètre act=odt
    if(!empty($pAction) && $pAction == "odt"){
        $view = "vOrdinateur";
    }

