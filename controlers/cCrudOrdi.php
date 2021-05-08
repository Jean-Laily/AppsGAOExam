<?php
    include 'models/managerCrudOrdi.php';

    //si la variable session[userId] && session[userPw] n'est pas existant alors redirection vers la page login
    if(!isset($_SESSION["userId"]) && !isset($_SESSION["userPw"])){
        header('location:index.php?act=acc'); 
    }

    //blindage du paramètre act=crU
    if(!empty($pAction) && $pAction == "crO"){
        
        //réception du 2em paramètre get pour le CRUD
        $pRequete = isset($_GET['req']) ? $_GET['req'] : null;
        $id_poste =  isset($_GET['num']) ? $_GET['num'] : null;
        
        //lecture des tous les postes
        $tabOrdiIdOk = getAllInfoWithOrdiIdOk($id_poste);
        $tabOrdiIdKo = getAllInfoWithOrdiIdKo($id_poste);


        //réception des variables en post du formulaire
        $idPost = isset($_POST['idPoste']) ? htmlspecialchars($_POST['idPoste']) : null;
        $nomOrdi = isset($_POST['nomPoste']) ? htmlspecialchars($_POST['nomPoste']) : null;
        $etatOrdi = isset($_POST['etatPoste']) ? htmlspecialchars($_POST['etatPoste']) : null;

        if(!empty($pRequete)){
            
            switch($pRequete){
                
                case 'create':
                    //on contrôle que toute les variables en post ont bien une valeur
                    if(!empty($nomOrdi) && !empty($etatOrdi)){
                        //appel de la fonction pour la création d'un utilisateur en lui passant tous les paramètre nécessaire
                        $requeteOk = createOrdi($nomOrdi, $etatOrdi);
                        
                        if($requeteOk){ // est vrai alors on retourne vers la page des utilisateurs
                            header("location: index.php?act=odt&cfm=10");
                        }
                    }
                    break;
                    
                case 'update1':
                    //condition pour la requête update
                    if(!empty($idPost) && !empty($nomOrdi) && !empty($etatOrdi)){
                        
                        //appel de la fonction updateFiche pour la 1er partie du formulaire
                        $infoUserValid = updateOrdiOk($idPost, $nomOrdi, $etatOrdi);

                        if($infoUserValid){
                            header("location: index.php?act=odt&cfm=11");
                        }
                    }
                break;

                case 'update2':
                    //condition pour la requête update
                    if(!empty($idPost) && !empty($nomOrdi) && !empty($etatOrdi)){
                        //appel de la fonction updateFiche pour la 1er partie du formulaire
                        $infoUserValid = updateOrdiKo($idPost, $nomOrdi, $etatOrdi);

                        if($infoUserValid){
                            header("location: index.php?act=odt&cfm=11");
                        }
                    }
                break;
                default:
                    header("location: index.php?act=404");
                break;
            }
        }

        $view = "vCrudOrdi";
    }
