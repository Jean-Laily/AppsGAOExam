<?php
    include 'models/managerConnexion.php';

    //récupère les valeurs du formulaire de login et blocage des script dans input lors de l'envoie du formulaire
    $id = (isset($_POST["userID"])) ? htmlspecialchars($_POST["userID"]) : "";
    $mdp = (isset($_POST["userPASS"])) ? htmlspecialchars($_POST["userPASS"]) : "";

    //blindage du paramètre act=log 
    if(!empty($_GET['act']) && $_GET['act'] == "log"){

        $mdpCheck = controlePass($mdp);

        if(controleUser($id,$mdpCheck)){
            
            //création des variables sessions
            $_SESSION["userId"] = $id;
            $_SESSION["userPw"] = $mdpCheck;

            header('location: index.php?act=db');
        }else{
            header('location: index.php?act=acc&err=53');
        }
    }