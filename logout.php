<?php
    require("functions/init.php");
    

    unset($_SESSION['numCin']);
    unset($_SESSION['fullname']);
    session_destroy();

    redirect("login.php");




?>