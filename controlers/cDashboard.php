<?php
    // on vérifie si l'utilisateur n'est pas déjà connecter si c'est le cas alors redirection au dashboard
    // if(isset($_SESSION["userId"]) && isset($_SESSION["userPw"])){
    //     header('location:index.php?act=db'); 
    // }

    //blindage du paramètre act=db
    if(!empty($pAction) && $pAction == "db"){
        $view = "vDashboard";
    }