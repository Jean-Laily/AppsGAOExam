<?php
   session_unset();
   session_destroy();
   //redirection vers la page de login
   header("location:index.php");