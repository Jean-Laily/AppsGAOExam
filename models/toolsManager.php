<?php

     /**
     * M: Permet une redirection temporisé 
     * O: @return NULL
     * I: @param url = le chemin qu'il faudra fournir pour la redirection
     *    @param delai = le temps de rafraichissement qu'il faudra definir (en seconde)
    */
    function redirectionTimer($url, $delai = 5) {
        header("refresh: $delai; url = $url");
    }