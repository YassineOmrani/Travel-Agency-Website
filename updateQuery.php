<?php
    include ('inc/header.php');
    if (!(empty($_GET))){
        $idR         = $_GET['idR'];
        $dateDepart  = $_GET['dateDepart'];
        $heureDepart = $_GET['heureDepart'];
        $dateDepart  = date("Y-m-d h:i:s",strtotime($dateDepart));
        $sql = "UPDATE Reservation SET dateDepart = '$dateDepart' , heureDepart = '$heureDepart' WHERE idReservation = '$idR'";
        $result = query($sql);
        confirm($result);
        redirect("myReservations.php");
    }
?>