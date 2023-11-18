<?php
    include('../class/biens_class.php');
    include('../class/type_bien_class.php');
    include('../class/commune_class.php');
        
    $oBiens= new Biens(1);
    $oBiens->setcode($code);
    $oTypebien= new TypeBien(1);
    $oTypebien->setcode($code);
    $ocommune = new Commune(1);
    $ocommune->setcode($code);
        
    if(isset($_POST['ajouter'])){
        echo "<script>alert('Etes-vous certain de vouloir ajouter ?');</script>;";
        // récupère id de type_bien
        $MonTypebienId=$oTypebien->getId_type_bien($_POST['lib_type_bien']);
        $idcom = $ocommune->getidcom($_POST['cop_bien'],$_POST['vil_bien']);
        $oBiens->insertBien($_POST['nom_bien'],$_POST['rue_bien'],$idcom,$_POST['superficie_bien'], $_POST['nb_couchage'], $_POST['nb_piece'], $_POST['nb_chambre'], $_POST['descriptif'], $_POST['ref_bien'], $_POST['statut_bien'], $_POST['lib_type_bien']);
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
        $idcom = $ocommune->getidcom($_POST['cop_bien'.$id_bien],$_POST['vil_bien'.$id_bien]);
        $MonTypebienId=$oTypebien->getId_type_bien($_POST['lib_type_bien']);
        $oBiens->updateBien($id_bien,$_POST['nom_bien'.$id_bien],$_POST['rue_bien'.$id_bien],$idcom,$_POST['superficie_bien'.$id_bien],$_POST['nb_couchage'.$id_bien],$_POST['nb_piece'.$id_bien],$_POST['nb_chambre'.$id_bien],$_POST['descriptif'.$id_bien],$_POST['ref_bien'.$id_bien],$_POST['statut_bien'.$id_bien], $_POST['lib_type_bien']);
        header('Location: biens_affichage.php');
    }
       
?>
