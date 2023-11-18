<?php
    $oTarif=New Tarif();
    if($_POST["date_deb_tarif "]){
        $date=$_POST["date_deb_tarif"];
        $id=$_POST["modifier"];
        $oTarif->update($date,$id);
        header('locations_biens_saisonniers:tarif_affichage.php');
    }
?>

