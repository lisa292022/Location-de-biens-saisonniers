<td>Liste Clients</td>
<!--form name="liste_clients" methode="POST" action="clients_traitement.php"-->
<table>
    <tr>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Adresse</th>
                      <th>Code postal</th>
                      <th>Ville</th>
                      <th>Mail</th>
                      <th>Mot de passe</th>
                      <th>Statut</th>
                      <th>Validité</th>
                      <th colspan="1"><th>
</tr>
<tr>
    </tr>
<?php 
    include('../include/connexion.inc.include');
    include('../class/client_class.php');
    include('../class/commune_class.php');
    $oClient= new Client(1);
    $oClient->setcode($code);
    $lesclients=$oClient->getAllClient();
    $ocommune = new Commune(1);
    $ocommune->setcode($code);
    
    /*if(isset($_POST['ajouter'])){
            echo "<script>alert('Etes-vous certain de vouloir ajouter ?');</script>;";
            $idcom = $ocommune->getidcom($_POST['cop_client'],$_POST['vil_client']);
            //$oClient->insertClient($_POST['id_client'],$_POST['nom_client'],$_POST['prenom_client'],$_POST['rue_client'],$idcom,$_POST['mail_client'],$_POST['mdp_client'],$_POST['statut_client'],$_POST['valid_client']);
            $oClient->insertClientSansId($_POST['nom_client'],$_POST['prenom_client'],$_POST['rue_client'],$idcom,$_POST['mail_client'],$_POST['mdp_client'],$_POST['statut_client'],$_POST['valid_client']);
            header('locations_biens_saisonniers: clients_affichage.php');
    } 
        if(isset($_POST['supprimer'])){
            echo "<script>alert('Etes-vous certain de vouloir supprimer ?');</script>";
            $id_client = $_POST['supprimer'];
            $oClient->deleteClient($id_client);
            header('locations_biens_saisonniers: clients_affichage.php');
        }
        if(isset($_POST['modifier'])){
            echo "<script>alert('Etes-vous certain de vouloir modifier ?');</script>";
            $id_client = $_POST['modifier'];
            $idcom = $ocommune->getidcom($_POST['cop_client'.$id_client],$_POST['vil_client'.$id_client]);
            $oClient->updateClient($id_client,$_POST['nom_client'.$id_client],$_POST['prenom_client'.$id_client],$_POST['rue_client'.$id_client],$idcom,$_POST['mail_client'.$id_client],$_POST['mdp_client'.$id_client],$_POST['statut_client'.$id_client],$_POST['valid_client'.$id_client]);
            header('locations_biens_saisonniers: clients_affichage.php');
        }
    */    
    $lesclients=$oClient->getAllClient();
    while($row = $lesclients->fetch(PDO::FETCH_ASSOC)):?>
                    <form id='modifier' name='modifier' action='clients_traitement.php' method='POST'>
                        <tr>
                        <!--td><?php echo "<input type='text' class='form-control' id='id_client".$row['id_client']."' name='id_client".$row['id_client']."' value='".$row['id_client']."'"; ?></td-->                       
                        <td><?php echo "<input type='text' class='form-control' id='nom_client".$row['id_client']."' name='nom_client".$row['id_client']."' value='".$row['nom_client']."'"; ?></td>
                        <td><?php echo "<input type='text' class='form-control' id='prenom_client".$row['id_client']."' name='prenom_client".$row['id_client']."' value='".$row['prenom_client']."'"; ?></td>
                        <td><?php echo "<input type='text' class='form-control' id='rue_client".$row['id_client']."' name='rue_client".$row['id_client']."' value='".$row['rue_client']."'"; ?></td>                                             
                        
                        <td><?php
                        $idcom = $row['Idcom'];
                        $maville = $ocommune->getnom_commune_postal_code_postal($row['Idcom']); 
                        $liste_code_postal = $maville->fetch(PDO::FETCH_ASSOC);
                        $code_postal=$liste_code_postal['code_postal'];
                        echo "<input type='text' class='form-control' id='cop_client".$row['id_client']."' name='cop_client".$row['id_client']."' value='".$code_postal."'";
                        ?></td>
                        
                        <td><?php 
                        $maville = $ocommune->getnom_commune_postal_code_postal($row['Idcom']); 
                        $liste_nom_commune_postal = $maville->fetch(PDO::FETCH_ASSOC);
                        $nom_commune_postal=$liste_nom_commune_postal['nom_commune_postal'];
                        echo "<input type='text' class='form-control' id='vil_client".$row['id_client']."' name='vil_client".$row['id_client']."' value='".$nom_commune_postal."'";
                        ?></td>
                        
                        <td><?php echo "<input type='text' class='form-control' id='mail_client".$row['id_client']."' name='mail_client".$row['id_client']."' value='".$row['mail_client']."'"; ?></td>                                             
                        <td><?php echo "<input type='text' class='form-control' id='mdp_client".$row['id_client']."' name='mdp_client".$row['id_client']."' value='".$row['mdp_client']."'"; ?></td>                                             
                        <td><?php echo "<input type='text' class='form-control' id='statut_client".$row['id_client']."' name='statut_client".$row['id_client']."' value='".$row['statut_client']."'"; ?></td>                                             
                        <td><?php echo "<input type='text' class='form-control' id='valid_client".$row['id_client']."' name='valid_client".$row['id_client']."' value='".$row['valid_client']."'"; ?></td>                                             
                        
                        <td>
                            
                            <button name='modifier' value="<?php echo $row['id_client'];?>" type='submit' class="btn btn-primary">Modifier</button>
                        </td>
                        
                        <td>
                            <form id='supprimer' name='supprimer' action='clients_traitement.php' method='POST'>
                            <button name='supprimer' value="<?php echo $row['id_client'];?>" type='submit'>Supprimer</button>
                            </form>
                        </td>
                        </form>
                        </tr>
                        
    
     <?php endwhile;?>

    
    <form id="ajouter" name="ajouter" action="clients_traitement.php" method="POST">
                        <!--td><input type="text" class="form-control" id="id_client" name="id_client" placeholder="Indiquez l'identifiant du client"> </td-->
                        <td><input type="text" class="form-control" id="nom_client" name="nom_client" placeholder="Indiquez le nom du client"> </td>
                        <td><input type="text" class="form-control" id="prenom_client" name="prenom_client" placeholder="Indiquez le prénom du client"></td>
                        <td><input type="text" class="form-control" id="rue_client" name="rue_client" placeholder="Indiquez la rue du client"> </td>
                        <td><input type="text" class="form-control" id="cop_client" name="cop_client" placeholder="Indiquez le code postale"> </td>
                        <td><input type="text" class="form-control" id="vil_client" name="vil_client" placeholder="Indiquez la ville"></td>
                        <td><input type="text" class="form-control" id="mail_client" name="mail_client" placeholder="Indiquez le mail du client"> </td>
                        <td><input type="text" class="form-control" id="mdp_client" name="mdp_client" placeholder="Indiquez le mot de passe"> </td>
                        <td><input type="text" class="form-control" id="statut_client" name="statut_client" placeholder="Indiquez le statut"> </td>
                        <td><input type="text" class="form-control" id="valid_client" name="valid_client" placeholder="Indiquez la validité"> </td>
                        
                        
                        <td><button id='ajouter' name='ajouter' type="submit" class="btn btn-primary">Ajouter</button></td>
                        </form>   

</table>                        
                        <a href="../front/acceuil.php"><img src="../photo/home.jfif" title="Page d'accueil"></a>


