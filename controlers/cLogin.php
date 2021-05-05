<?php
    include 'models/managerConnexion.php';

    //récupère les valeurs du formulaire de login si il existe et blocage des tentatives de requête lors de l'envoie de formulaire
    $id = (isset($_POST["userID"])) ? htmlspecialchars($_POST["userID"]) : "";
    $mdp = (isset($_POST["userPASS"])) ? htmlspecialchars($_POST["userPASS"]) : "";

    //blindage du paramètre act=log 
    if(!empty($_GET['act']) && $_GET['act'] == "log"){

        if(controleUser($id,$mdp)){
            
            //création des variables sessions
            $_SESSION["userId"] = $id;
            $_SESSION["userPw"] = $mdp;

            header('location: index.php?act=db');
        }else{
            
            header('location: index.php?act=acc&err=53');
        }
    }