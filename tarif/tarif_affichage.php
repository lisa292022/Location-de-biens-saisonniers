<td>Liste Tarif</td>
<form name="liste_tarif" methode="POST" action="tarif_traitement.php">
<?php 
    include('../include/connexion.inc.include');
    include('../class/tarif_class.php');
    include('../class/biens_class.php');
    $oTarif= new Tarif(1);
    $oTarif->setcode($code);
    $oBiens= new Biens(1);
    $oBiens->setcode($code);
    $lestarifs=$oTarif->getAllTarif();
    
    
    if(isset($_POST['ajouter'])){
            echo "<script>alert('Etes-vous certain de vouloir ajouter ?');</script>;";
            // récupère id du bien
            $MonBienId=$oBiens->getId($_POST['nom_bien']);
            $row2=$MonBienId->fetch(PDO::FETCH_ASSOC); $nom_bien = $row2['nom_bien'];
            $oTarif->insert($_POST['id_tarif'],$_POST['date_deb_tarif'],$_POST['date_fin_tarif'],$_POST['prix_loc'],$id_bien);
            header('locations_biens_saisonniers: tarif_affichage.php');
    } 
        if(isset($_POST['supprimer'])){
            echo "<script>alert('Etes-vous certain de vouloir supprimer ?');</script>";
            $id_tarif = $_POST['supprimer'];
            $oTarif->delete($id_tarif);
            header('locations_biens_saisonniers: tarif_affichage.php');
        }
        if(isset($_POST['modifier'])){
            echo "<script>alert('Etes-vous certain de vouloir modifier ?');</script>";
            $id_tarif = $_POST['modifier'];
            // récupère id du bien
            $MonBienId=$oBiens->getId($_POST['nom_bien']);
            $row2=$MonBienId->fetch(PDO::FETCH_ASSOC); $id_bien = $row2['id_bien'];
            $oTarif->update($_POST['id_tarif'],$_POST['date_deb_tarif'],$_POST['date_fin_tarif'],$_POST['prix_loc'],$id_bien);
            header('locations_biens_saisonniers: tarif_affichage.php');
        }
    
    while($row = $lestarifs->fetch(PDO::FETCH_ASSOC)):?>
                    <form id='modifier' name='modifier' action='tarif_affichage.php' method='POST'>
                        <tr>
                        <td><?php echo "<input type='text' class='form-control' id='id_tarif".$row['id_tarif']."' name='id_tarif".$row['id_tarif']."' value='".$row['id_tarif']."'"; ?></td>                       
                        <td><?php echo "<input type='date' class='form-control' id='date_deb_tarif".$row['date_deb_tarif']."' name='date_deb_tarif".$row['date_deb_tarif']."' value='".$row['date_deb_tarif']."'"; ?></td>
                        <td><?php echo "<input type='date' class='form-control' id='date_fin_tarif".$row['date_fin_tarif']."' name='date_fin_tarif".$row['date_fin_tarif']."' value='".$row['date_fin_tarif']."'"; ?></td>
                        <td><?php echo "<input type='text' class='form-control' id='prix_loc".$row['prix_loc']."' name='prix_loc".$row['prix_loc']."' value='".$row['prix_loc']."'"; ?></td>                                             
                        
                        <?php $MonBien = $oBiens->getBiens($row['id_bien']); $row2=$MonBien->fetch(PDO::FETCH_ASSOC); $MonBienTexte = $row2['nom_bien'];?>
                        <td><?php echo "<input type='text' class='form-control' id='nom_bien' name='nom_bien' value='".$MonBienTexte."'"; ?></td>                            
                        
                        <td>
                            <button name='modifier' value="<?php echo $row['id_tarif'];?>" type='submit' class="btn btn-primary">Modifier</button>
                        </td>
                        
                        <td>
                            <form id='supprimer' name='supprimer' action='tarif_affichage.php' method='POST'>
                            <button name='supprimer' value="<?php echo $row['id_tarif'];?>" type='submit'>Supprimer</button>
                            </form>
                        </td>
                        </form>
                        </tr>
                        
    
     <?php endwhile;?>

    
    <form id="ajouter" name="ajouter" action="cheval_affichage.php" method="POST">
                        <td><input type="text" class="form-control" id="id_tarif" name="id_tarif" placeholder="Indiquez l'identifiant du tarif"> </td>
                        <td><input type="date" class="form-control" id="date_deb_tarif" name="date_deb_tarif" placeholder="Indiquez la date de fin"> </td>
                        <td><input type="date" class="form-control" id="date_fin_tarif" name="date_fin_tarif" placeholder="Indiquez la date de début"></td>
                        <td><input type="text" class="form-control" id="prix_loc" name="prix_loc" placeholder="Indiquez le prix de la location"> </td>
                        <td><select id="id_bien" name="id_bien">
                                <?php
                                    $all_bien = $oBiens->getall();
                                    foreach($all_bien as $biens) {
                                ?>
                                <option value="<?php echo $biens["id_bien"];?>">
                                    <?php echo $biens["id_bien"]?>
                                </option>
                               <?php
                                   //endwhile;
                               }
                               ?>
                            </select>
                        </td>
                        
                        <td><button id='ajouter' name='ajouter' type="submit" class="btn btn-primary">Ajouter</button></td>
                        </form>
         
       

