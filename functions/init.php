<?php

    /*
    Without output buffering (the default), your HTML is sent to the browser 
    in pieces as PHP processes through your script.With output buffering, 
    your HTML is stored in a variable and sent to the browser as one piece 
    at the end of your script.
    */
    ob_start();
    session_start(); 

    require_once("functions.php");
    require_once("db.php");



?>