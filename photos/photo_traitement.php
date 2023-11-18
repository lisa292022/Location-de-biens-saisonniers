<?php
    include('../class/photo_class.php');
    include('../class/biens_class.php');

    $oPhoto = new Photo(1);
    $oPhoto->setcode($code);
    $lesphotos=$oPhoto->getAllPhoto();
    $oBiens = new Biens(1);
    $oBiens->setcode($code);
    
    if(isset($_POST['ajouter'])){
            echo "<script>alert('Etes-vous certain de vouloir ajouter ?');</script>;";
            // récupère id de photo
            $MonNomBienTexte=$oBiens->getId($_POST['nom_bien']);
            $row2=$MonNomBienTexte->fetch(PDO::FETCH_ASSOC); $id = $row2['id_bien'];
            $oPhoto->insertPhoto($_POST['nom_photo'],$_POST['lien_photo'], $id_bien);
            header('Location: photo_affichage.php');
        } 
        if(isset($_POST['supprimer'])){
            echo "<script>alert('Etes-vous certain de vouloir supprimer ?');</script>";
            $id_photo = $_POST['supprimer'];
            $oPhoto->deletePhoto($id_photo);
            header('Location: photo_affichage.php');
        }
        if(isset($_POST['modifier'])){
            echo "<script>alert('Etes-vous certain de vouloir modifier ?');</script>";
            $id_photo = $_POST['modifier'];
            $MonNomBienTexte=$oBiens->getId_bien($_POST['nom_bien']);
            $row2=$MonNomBienTexte->fetch(PDO::FETCH_ASSOC); $id_bien = $row2['id_bien'];
            $oPhoto->updatePhoto($id_photo,$_POST['nom_photo'],$_POST['lien_photo'], $id_bien);
            header('Location: photo_affichage.php');
        }
    
?>

 