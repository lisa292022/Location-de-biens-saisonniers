<?php
    include('../class/biens_class.php');
    include('../class/type_bien_class.php');
    include('../class/commune_class.php');
    include('../class/tarif_class.php');
        
    $oBiens= new Biens(1);
    $oBiens->setcode($code);
    $oTypebien= new TypeBien(1);
    $oTypebien->setcode($code);
    $ocommune = new Commune(1);
    $ocommune->setcode($code);
    $oTarif= new Tarif(1);
    $oTarif->setcode($code);
        
    if(isset($_POST['ajouter'])){
        echo "<script>alert('Etes-vous certain de vouloir ajouter ?');</script>;";
        // récupère id de type_bien
        echo $_POST['lib_type_bien'][0];
        echo $_POST['lib_type_bien'];
        $MonTypebienId=$_POST['lib_type_bien'];
        $idcom = $ocommune->getidcomCouple($_POST['cop_vil_bien']);
        $oBiens->insertBien($_POST['nom_bien'],$_POST['rue_bien'],$idcom,$_POST['superficie_bien'], $_POST['nb_couchage'], $_POST['nb_piece'], $_POST['nb_chambre'], $_POST['descriptif'], $_POST['ref_bien'], $_POST['statut_bien'], $MonTypebienId);
        header('Location: biens_affichage.php');
    }
    if(isset($_POST['supprimer'])){
        echo "<script>alert('Etes-vous certain de vouloir supprimer ?');</script>";
        $id_bien = $_POST['supprimer'];
        $oBiens->deleteBien($id_bien);
        header('Location: biens_affichage.php');
    }
    if(isset($_POST['modifier'])){
        echo "<script>alert('Etes-vous certain de vouloir modifier ?');</script>";
        $id_bien = $_POST['modifier'];
        $idcom = $ocommune->getidcomCouple($_POST['cop_vil_bien'.$id_bien]);
        // AVANT $MonTypebienId=$oTypebien->getIdTypeBien($_POST['lib_type_bien'.$id_bien]);
        $MonTypebienId=$_POST['lib_type_bien'.$id_bien];
        $oBiens->updateBien($id_bien,$_POST['nom_bien'.$id_bien],$_POST['rue_bien'.$id_bien],$idcom,$_POST['superficie_bien'.$id_bien],$_POST['nb_couchage'.$id_bien],$_POST['nb_piece'.$id_bien],$_POST['nb_chambre'.$id_bien],$_POST['descriptif'.$id_bien],$_POST['ref_bien'.$id_bien],$_POST['statut_bien'.$id_bien], $MonTypebienId);
        // modification des tarifs
        $id_tarif1=$_POST['id_tarif1'];
        $id_tarif2=$_POST['id_tarif2'];
        $date_deb_tarif1=$_POST['date_deb_tarif1'];
        $date_deb_tarif2=$_POST['date_deb_tarif2'];
        $date_fin_tarif1=$_POST['date_fin_tarif1'];
        $date_fin_tarif2=$_POST['date_fin_tarif2'];
        $tarif1=$_POST['tarif1'];
        $tarif2=$_POST['tarif2'];
        $oTarif->updateTarif($id_tarif1,$date_deb_tarif1,$date_fin_tarif1,$tarif1,$id_bien);
        $oTarif->updateTarif($id_tarif2,$date_deb_tarif2,$date_fin_tarif2,$tarif2,$id_bien);
        
        header('Location: biens_affichage.php');
    }      
?>
