<?php
    session_start();

    $view = "";
    //création du paramètre action 
    $gAction = isset($_GET['act'])? $_GET['act'] : null;
    $gErreur = isset($_GET['err'])? $_GET['err'] : null;

    if(!isset($_GET['act'])){
        header("location:./index.php?act=acc");
    }else{
        switch ($gAction){
            case "acc" :
                include './controlers/cAccueil.php';
            break;
            case "log" :
                include './controlers/cLogin.php';
            break;
            case "db" :
                include './controlers/cDashboard.php';
            break;
            case "utl" :
                include './controlers/cUtilisateur.php';
            break;
            case "odt" :
                include './controlers/cOrdinateur.php';
            break;
            case "dcx" :
                include './controlers/cDeconnexion.php';
            break;
        }
    }

    include './views/'.$view.'.php';

?>