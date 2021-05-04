<?php
    //Gestion erreur 403 & 404 à terminer
    if(!empty($gAction)){
        if($gAction == "403"){
            $view = "v403";
        }else if($gAction == "404" || $gAction != "404"){
            $view = "v404";
        }
    }
