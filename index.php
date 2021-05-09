<?php
    session_start();
    include 'models/connexionBDD.php';
    include 'models/toolsManager.php';

    if($pdo == null){
        header("location:./index.php?act=403");
    }

    $view = "";
    //création du paramètre action 
    $pAction = isset($_GET['act'])? $_GET['act'] : null;
    $pErreur = isset($_GET['err'])? $_GET['err'] : null;
    $pConfirm = isset($_GET['cfm'])? $_GET['cfm'] : null;

    if(!isset($_GET['act'])){
        header("location:./index.php?act=acc");
    }else{
        switch ($pAction){
            //Partie Affichage et gestion login
            case "acc" :
                include './controlers/cAccueil.php';
            break;
            case "log" :
                include './controlers/cLogin.php';
            break;

            //Partie gestion dashboard page
            case "db" :
                include './controlers/cDashboard.php';
            break;
            case "utl" :
                include './controlers/cUtilisateur.php';
            break;
            case "odt" :
                include './controlers/cOrdinateur.php';
            break;
            case "atr" :
                include './controlers/cCrudAttr.php';
            break;

            //Partie gestion CRUD
            case "crU" :
                include './controlers/cCrudUser.php';
            break;
            case "crO" :
                include './controlers/cCrudOrdi.php';
            break;
            case "crA" :
                include './controlers/cCrudAttr.php';
            break;

            //Parti Autre gestion
            case "dcx" :
                include './controlers/cDeconnexion.php';
            break;
            case "404" :
                include './controlers/cErreur.php';
            break;
            case "403" :
                include './controlers/cErreur.php';
            break;
            default:
                header("location:index.php?act=404");
            break;
        }
    }

    include './views/'.$view.'.php';

?>