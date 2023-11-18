<?php
    include('../class/client_class.php');
    include('../class/biens_class.php');
    $oReservation=New Reservation();
    if($_POST["date_resa"]){
        $date=$_POST["date_resa"];
        $id=$_POST["modifier"];
        $oReservation->update($date,$id);
        header('Location: reservation_affichage.php');
    }
?>

