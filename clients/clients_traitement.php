<?php
    include('../class/client_class.php');
    include('../class/commune_class.php');
        
    $oClient= new Client(1);
    $oClient->setcode($code);
    $lesclients=$oClient->getAllClient();
    $ocommune = new Commune(1);
    $ocommune->setcode($code);
    
    if(isset($_POST['ajouter'])){
            echo "<script>alert('Etes-vous certain de vouloir ajouter ?');</script>;";
            $idcom = $ocommune->getidcom($_POST['cop_client'],$_POST['vil_client']);
            //$oClient->insertClient($_POST['id_client'],$_POST['nom_client'],$_POST['prenom_client'],$_POST['rue_client'],$idcom,$_POST['mail_client'],$_POST['mdp_client'],$_POST['statut_client'],$_POST['valid_client']);
            $oClient->insertClientSansId($_POST['nom_client'],$_POST['prenom_client'],$_POST['rue_client'],$idcom,$_POST['mail_client'],$_POST['mdp_client'],$_POST['statut_client'],$_POST['valid_client']);
            header('Location: clients_affichage.php');
            
    } 
    if(isset($_POST['supprimer'])){
            echo "<script>alert('Etes-vous certain de vouloir supprimer ?');</script>";
            $id_client = $_POST['supprimer'];
            $oClient->deleteClient($id_client);
            header('Location: clients_affichage.php');
    }
    if(isset($_POST['modifier'])){
            echo "<script>alert('Etes-vous certain de vouloir modifier ?');</script>";
            $id_client = $_POST['modifier'];
            $idcom = $ocommune->getidcom($_POST['cop_client'.$id_client],$_POST['vil_client'.$id_client]);
            $oClient->updateClient($id_client,$_POST['nom_client'.$id_client],$_POST['prenom_client'.$id_client],$_POST['rue_client'.$id_client],$idcom,$_POST['mail_client'.$id_client],$_POST['mdp_client'.$id_client],$_POST['statut_client'.$id_client],$_POST['valid_client'.$id_client]);
            header('Location: clients_affichage.php');
    }
       
?>

