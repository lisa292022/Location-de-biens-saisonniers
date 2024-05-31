<?php     
include('../include/connexion.inc.include');
include('../class/activite_class.php');
    $oactivite = new activite(1);
    $oactivite->setcode($code);
    $lesactivite = $oactivite->getallactivite();
    
if(isset($_POST['ajouter'])){
    echo "<script>alert('Etes-vous certain de vouloir ajouter ?');</script>";
    $oactivite->insertActivite( $_POST['description']);
    header('Location: activite_affichage.php');
} 

if(isset($_POST['supprimer'])){
    echo "<script>alert('Etes-vous certain de vouloir supprimer ?');</script>";
    $id_activite = $_POST['supprimer'];
    $oactivite->deleteActivite($id_activite);
    header('Location: activite_affichage.php');
}

if(isset($_POST['modifier'])){
     echo "<script>alert('Etes-vous certain de vouloir modifier ?');</script>";
   
    $id_activite = $_POST['modifier'];
    $description = $_POST['description'.$id_activite];
    
    echo $id_activite.$description. ' '.$_POST[$description];
    $oactivite->updateActivite($id_activite,$description);
    header('Location: activite_affichage.php');
}

?>
