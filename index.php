<?php
    session_start();
    include 'models/connexionBDD.php';
    include 'models/toolsManager.php';

    if($pdo == null){
        header("location:./index.php?act=403");
    }

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
            case "404" :
                include './controlers/cErreur.php';
            break;
            case "403" :
                include './controlers/cErreur.php';
            break;
        }
    }

    include './views/'.$view.'.php';

?>