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


    /**
     * générer un mot de passe aléatoire selon le nombre de caractère voulu
     * @return passwordAléatoire 
     * @param nbcChar
     */
    function passGenerator($nbChar){
        return substr(str_shuffle('abcdefghijklmnop-qrstuvwxyz@ABCEFGHIJKLMNOPQ_RSTUVWXYZ#0123456789'),0, $nbChar); 
    }