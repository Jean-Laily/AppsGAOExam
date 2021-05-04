<?php
include 'models/managerConnexion.php';

$userID = (isset($_POST["identifiant"])) ? htmlspecialchars($_POST["identifiant"]) : "";
$userPASS = (isset($_POST["password"])) ? htmlspecialchars($_POST["password"]) : "";

//blindage du paramètre act=log 
if(!empty($_GET['act']) && $_GET['act'] = "log"){

    if(controleUser($userID,$userPASS)){
        
        //création des variables sessions
        $_SESSION["userId"] = $userID;
        $_SESSION["userPw"] = $userPASS;

        header('location: index.php?act=db');
    }else{
        
        header('location: index.php?act=acc&err=53');
    }
}else{
    header("location: /index.php?act=404");
}