<?php
    //Gestion erreur 403 & 404 à terminer
    if(!empty($pAction)){
        if($pAction == "403"){
            $view = "v403";
        }else if($pAction == "404" || $pAction != "404"){
            $view = "v404";
        }
    }
