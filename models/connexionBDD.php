<?php

$pdo = getConnect();

/**
 * Fonction permettant de créer la connexion entre la l'application et la BDD
 */
function getConnect(){
    //initialisation des variables et affectations des valeurs par défaut 
    $url = "localhost";             //@ip.... par ex : 127.0.0.1
    $port = '';                     //port ip ... par ex : "3306" par défaut
    $char = 'UTF8';                 //charset ... défini le type d'encodage souhaité
    $bdd = 'appGAO';                // nom de la data base
    $login = "root";                
    $pass = "";

    //try catch va permettre de capturer l'erreur et de retourner un null s'il y a exception
    try{
        //création de la connection vers un SGBD avec l'extension PHP Data Object 
        $serveur = 'mysql:host=' .  $url  .';dbname='. $bdd;
        //on remet ici le port et le charset avec les paramètre par défaut afin d'éviter tout problème de connexion
        if($port != '') $serveur .= ';port='. $port; 
        if($char != '') $serveur .= ';charset='. $char;

        //instantiation de l'objet PDO et de ses paramètres requis
        $pdo = new PDO($serveur, $login, $pass); 

    }catch(PDOException $e){
        echo 'Échec de la connection : ';
        // $pdo = null;
    }

    return $pdo;
}
