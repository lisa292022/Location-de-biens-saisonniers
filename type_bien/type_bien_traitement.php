<?php     
include('../include/connexion.inc.include');
include('../class/type_bien_class.php');
    $oTypebien = new TypeBien(1);
    $oTypebien->setcode($code);
    $lestypebien = $oTypebien->getallTypeBien();
    
if(isset($_POST['ajouter'])){
    echo "<script>alert('Etes-vous certain de vouloir ajouter ?');</script>";
    $oTypebien->insertTypeBien( $_POST['lib_type_bien']);
    header('Location: type_bien_affichage.php');
} 

if(isset($_POST['supprimer'])){
    echo "<script>alert('Etes-vous certain de vouloir supprimer ?');</script>";
    $id_type_bien = $_POST['supprimer'];
    $oTypebien->deleteTypeBien($id_type_bien);
    header('Location: type_bien_affichage.php');
}

if(isset($_POST['modifier'])){
     echo "<script>alert('Etes-vous certain de vouloir modifier ?');</script>";
   
    $id_type_bien = $_POST['modifier'];
    $nomtb = 'lib_type_bien'.$id_type_bien;
    
    echo $id_type_bien. ' '.$_POST[$nomtb];
    $oTypebien->updateTypeBien($id_type_bien,$_POST[$nomtb]);
    header('Location: type_bien_affichage.php');
}
?>
