<?php

    $pdo = getConnect();

    /**
     * Fonction permettant de créer la connexion entre la l'application et la BDD
     * @return pdo
     * @param null
     */
    function getConnect(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "appsgao";
        $char = 'UTF8';
        
        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$database;charset=$char", $username, $password );
            // set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully"; 
        } catch(PDOException $e) {  
            echo "Connection failed: " . $e->getMessage();
            $pdo = null;
        }

        return $pdo;
    }
