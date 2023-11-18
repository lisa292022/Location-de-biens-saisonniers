<title>Liste des photos</title>    
<td>Liste des photos</td>
    <!--form name="liste_bien" methode="POST" action="photo_traitement.php"-->
    <table>
        <tr>
            <th>Nom</th>
            <th>Photo</th>
            <th>Nom du bien</th>
            <th colspan="1"><th>
        </tr>
    <?php 
        include('../include/connexion.inc.include');
        include('../class/photo_class.php');
        include('../class/biens_class.php');
        $oPhoto= new Photo(1);
        $oPhoto->setcode($code);
        $lesphotos=$oPhoto->getAllPhotos(); 
        $oBiens= new Biens(1);
        $oBiens->setcode($code);   
    
        /*if(isset($_POST['ajouter'])){
            echo "<script>alert('Etes-vous certain de vouloir ajouter ?');</script>;";
            // récupère id de photo
            $MonBienTexte=$oBiens->getId($_POST['nom_bien']);
            $row2=$MonBienTexte->fetch(PDO::FETCH_ASSOC); $id = $row2['id_bien'];
            $oPhotos->insert($_POST['id_photo'],$_POST['nom_photo'],$_POST['lien_photo'], $id_bien);
            header('Location: photo_affichage.php');
        } 
        if(isset($_POST['supprimer'])){
            echo "<script>alert('Etes-vous certain de vouloir supprimer ?');</script>";
            $id_photo = $_POST['supprimer'];
            $oPhotos->deletePhoto($id_photo);
            header('Location: photo_affichage.php');
        }
        if(isset($_POST['modifier'])){
            echo "<script>alert('Etes-vous certain de vouloir modifier ?');</script>";
            $id_photo = $_POST['modifier'];
            // récupère id de bien
            $MesPhotosTexte=$oBiens->getId($_POST['nom_bien']);
            $row2=$MesPhotosTexte->fetch(PDO::FETCH_ASSOC); $id_bien = $row2['id_bien'];
            $oPhotos->updatePhoto($_POST['id_photo'],$_POST['nom_photo'],$_POST['lien_photo'], $id_bien);
            header('Location: photo_affichage.php');
        }*/
        $lesphotos=$oPhoto->getAllPhotos();
        while($row = $lesphotos->fetch(PDO::FETCH_ASSOC)):?>
                    <form id='modifier' name='modifier' action='photo_affichage.php' method='POST'>
                        <?php $lien_photo = $row['lien_photo'];?>
                        <tr>
                        <!--td><?php echo "<input type='text' class='form-control' id='id_photo".$row['id_photo']."' name='id_photo".$row['id_photo']."' value='".$row['id_photo']."'"; ?></td-->                       
                        <td><?php echo "<input type='text' class='form-control' id='nom_photo".$row['nom_photo']."' name='nom_photo".$row['nom_photo']."' value='".$row['nom_photo']."'"; ?></td>
                        <td><?php echo "<input type='image' src=' ". $lien_photo . " ' alt='Photo non trouvée'  width='150' height='100'  class='form-control' id='lien_photo".$row['lien_photo']."' name='lien_photo".$row['lien_photo']."'";?></td>  
                               
                        <td><?php $MonNomBien = $oBiens->getOneBien($row['id_bien']); 
                        $row4=$MonNomBien->fetch(PDO::FETCH_ASSOC); 
                        $MonNomBienTexte = $row4['nom_bien']; ?></td>
                        <td><?php echo "<input type='text' class='form-control' id='nom_bien' name='nom_bien' value='".$MonNomBienTexte."'"; ?></td>
                                   
                        <td>
                            <button name='modifier' value="<?php echo $row['id_photo'];?>" type='submit' class="btn btn-primary">Modifier</button>
                        </td>
                        
                        <td>
                            <form id='supprimer' name='supprimer' action='photo_affichage.php' method='POST'>
                            <button name='supprimer' value="<?php echo $row['id_photo'];?>" type='submit'>Supprimer</button>
                            </form>
                        </td>
                        </form>
                        </tr>
                        
    
        <?php endwhile;?>

    
    <form id="ajouter" name="ajouter" action="photo_affichage.php" method="POST">
                        <!--td><input type="text" class="form-control" id="id_photo" name="id_photo" placeholder="Indiquez l'identifiant de la photo"> </td-->
                        <td><input type="text" class="form-control" id="nom_photo" name="nom_photo" placeholder="Indiquez le nom de la photo"> </td>
                        <td><input type="text" class="form-control" id="lien_photo" name="lien_photo" placeholder="Indiquez le lien de la photo"> </td>
                       
                        
                        <td><select id="nom_bien" name="nom_bien">
                                <?php
                                    $all_bien = $oBiens->getAllBiens();
                                    foreach($all_bien as $bien) {
                                ?>
                                <option value="<?php echo $bien["nom_bien"];?>">
                                    <?php echo $bien["nom_bien"]?>
                                </option>
                               <?php
                                   //endwhile;
                               }
                               ?>
                            </select>
                        </td>
                        
                        <td><button id='ajouter' name='ajouter' type="submit" class="btn btn-primary">Ajouter</button></td>
                        </form>
    </table> 
        <a href="../front/acceuil.php"><img src="../photo/home.jfif" title="Page d'accueil"></a>


