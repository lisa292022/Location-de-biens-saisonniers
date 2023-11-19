<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Liste des réservations</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<td>Liste Réservations</td>
<body>
<table>
    <tr>
                      <!--th>Date de la réservation</th-->
                      <th>Date début</th>
                      <th>Date fin</th>
                      <th>Commentaires</th>
                      <th>Modération</th>
                      <th>Annulation</th>
                      <th>Client</th>
                      <th>Bien</th>
                      <th colspan="1"><th>
</tr>

<form name="liste_reservation" methode="POST" action="reservation.traitement.php">
<?php 
    include('../include/connexion.inc.include');
    include('../class/reservation_class.php');
    include('../class/client_class.php');
    include('../class/biens_class.php');
    $oReservation= new Reservation(1);
    $oReservation->setcode($code);
    $lesreservations=$oReservation->getAllReservation();
    $oClient= new Client(1);
    $oClient->setcode($code);
    $lesclients=$oClient->getAllClient();
    $oBiens= new Biens(1);
    $oBiens->setcode($code);
    $lesbiens=$oBiens->getAllBiens();
    
    
    if(isset($_POST['ajouter'])){
            echo "<script>alert('Etes-vous certain de vouloir ajouter ?');</script>;";
            $MonClientId= $oClient->getid_client($_POST['nom_client']);
            $MonBienId= $oBiens->getId_bien($_POST['nom_bien']);        
            //$MonClientId=$oClient->getId($_POST['nom_client']);
            //$row2=$MonClientId->fetch(PDO::FETCH_ASSOC); $id_client = $row2['id_client'];
            //$MonBienId=$oBiens->getId($_POST['nom_bien']);
            //$row3=$MonBienId->fetch(PDO::FETCH_ASSOC); $id_bien = $row3['id_bien'];
            $oReservation->insertReservation($_POST['date_deb_resa'],$_POST['date_fin_resa'],$_POST['commentaire'],$_POST['moderation'],$_POST['annulation_resa'],$_POST['nom_client'],$_POST['nom_bien']);
            header('Location: reservation_affichage.php');
    } 
        
    if(isset($_POST['supprimer'])){
            echo "<script>alert('Etes-vous certain de vouloir supprimer ?');</script>";
            $id_reservation = $_POST['supprimer'];
            $oReservation->deleteReservation($id_reservation);
            header('Location: reservation_affichage.php');
        }
        if(isset($_POST['modifier'])){
            echo "<script>alert('Etes-vous certain de vouloir modifier ?');</script>";            
            $id_reservation = $_POST['modifier'];
            $MonClientId = $oClient->getid_client($_POST['nom_client'.$id_client]);
            //$MonClientIdId=$oClient->getId($_POST['nom_client']);
            //$row2=$MonClientId->fetch(PDO::FETCH_ASSOC); $id_client = $row2['id_client'];
            $MonBienId=$oBiens->getId_bien($_POST['nom_bien'.$id_bien]);
            //$row3=$MonBienId->fetch(PDO::FETCH_ASSOC); $id_bien = $row3['id_bien'];
            $oReservation->updateReservation($_POST['id_reservation'],$_POST['date_resa'],$_POST['date_deb_resa'.$id_reservation],$_POST['date_fin_resa'.$id_reservation],$_POST['commentaire'.$id_reservation],$_POST['moderation'.$id_reservation],$_POST['annulation_resa'.$id_reservation],$id_client,$id_bien);
            header('Location: reservation_affichage.php');
        }
    
    $lesreservations=$oReservation->getAllReservation();    
    while($row = $lesreservations->fetch(PDO::FETCH_ASSOC)):?>
                    <form id='modifier' name='modifier' action='reservation_traitement.php' method='POST'>
                        <tr>
                        <!--td><?php echo "<input type='text' class='form-control' id='id_reservation".$row['id_reservation']."' name='id_reservation".$row['id_reservation']."' value='".$row['id_reservation']."'"; ?></td-->                       
                        <!--td><?php echo "<input type='date' class='form-control' id='date_resa".$row['id_reservation']."' name='date_resa".$row['id_reservation']."' value='".$row['date_resa']."'"; ?></td-->
                        <td><?php echo "<input type='date' class='form-control' id='date_deb_resa".$row['id_reservation']."' name='date_deb_resa".$row['id_reservation']."' value='".$row['date_deb_resa']."'"; ?></td>
                        <td><?php echo "<input type='date' class='form-control' id='date_fin_resa".$row['id_reservation']."' name='date_fin_resa".$row['id_reservation']."' value='".$row['date_fin_resa']."'"; ?></td>                                             
                        <td><?php echo "<input type='text' class='form-control' id='commentaire".$row['id_reservation']."' name='commentaire".$row['id_reservation']."' value='".$row['commentaire']."'"; ?></td>                                             
                        <td><?php echo "<input type='text' class='form-control' id='moderation".$row['id_reservation']."' name='moderation".$row['id_reservation']."' value='".$row['moderation']."'"; ?></td>                                             
                        <td><?php echo "<input type='text' class='form-control' id='annulation_resa".$row['id_reservation']."' name='annulation_resa".$row['id_reservation']."' value='".$row['annulation_resa']."'"; ?></td>                                             
                        
                        <td><?php $MonNomClient = $oClient->getOneClient($row['id_client']); 
                        $row4=$MonNomClient->fetch(PDO::FETCH_ASSOC); 
                        //$row5=$MonPrenomClient->fetch(PDO::FETCH_ASSOC); 
                        $MonNomClientTexte = $row4['nom_client']; 
                        //$MonPrenomClientTexte = $row5['prenom_client']; ?></td>
                        <td><?php echo "<input type='text' class='form-control' id='nom_client' name='nom_client' value='".$MonNomClientTexte."'";?></td>
                        
                        <td><?php $MonNomBien = $oBiens->getOneBien($row['id_bien']); 
                        $row4=$MonNomBien->fetch(PDO::FETCH_ASSOC); 
                        $MonNomBienTexte = $row4['nom_bien']; ?></td>
                        <td><?php echo "<input type='text' class='form-control' id='nom_bien' name='nom_bien' value='".$MonNomBienTexte."'"; ?></td>
                
                   
                        
                        <td>
                            <button name='modifier' value="<?php echo $row['id_reservation'];?>" type='submit' class="btn btn-primary">Modifier</button>
                        </td>
                        
                        <td>
                            <form id='supprimer' name='supprimer' action='reservation_affichage.php' method='POST'>
                            <button name='supprimer' value="<?php echo $row['id_reservation'];?>" type='submit'>Supprimer</button>
                            </form> 
                        </td>
                        </form>
                        </tr>
                        
    
     <?php endwhile;?>

    
    <form id="ajouter" name="ajouter" action="reservation_traitement.php" method="POST">
                        <!--td><input type="text" class="form-control" id="id_reservation" name="id_reservation" placeholder="Indiquez l'identifiant de réservation"> </td-->
                        <!--td><input type="date" class="form-control" id="date_resa" name="date_resa" placeholder="Indiquez la date de la réservation"> </td-->
                        <td><input type="date" class="form-control" id="date_deb_resa" name="date_deb_resa" placeholder="Indiquez la date de début"></td>
                        <td><input type="date" class="form-control" id="date_fin_resa" name="date_fin_resa" placeholder="Indiquez la date de fin"> </td>
                        <td><input type="text" class="form-control" id="commentaire" name="commentaire" placeholder="Indiquez les commentaires"> </td>
                        <td><input type="text" class="form-control" id="moderation" name="moderation" placeholder="Indiquez si le commentaire est modéré"> </td>
                        <td><input type="text" class="form-control" id="annulation_resa" name="annulation_resa" placeholder="Indiquez si la réservation est annuler"> </td>
                        <!--td><input type="text" class="form-control" id="nom_client" name="nom_client" placeholder="Indiquez le nom du client"> </td>
                        <td><input type="text" class="form-control" id="nom_bien" name="nom_bien" placeholder="Indiquez le nom du bien"> </td-->
                        
                        <td><select id="nom_client" name="nom_client">
                                <?php
                                    $all_client = $oClient->getAllClient();
                                    foreach($all_client as $client) {
                                ?>
                                <option value="<?php echo $client["id_client"];?>">
                                    <?php echo $client["nom_client"]?>
                                </option>
                               <?php
                                   //endwhile;
                               }
                               ?>
                            </select>
                        </td>
                        
                        <td><select id="nom_bien" name="nom_bien">
                                <?php
                                    $all_bien = $oBiens->getAllBiens();
                                    //var_dump($all_bien);
                                    foreach($all_bien as $bien) {
                                ?>
                                <option value="<?php echo $bien["id_bien"];?>">
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
</body>

<a href="../front/acceuil.php"><img src="../photo/home.jfif" title="Page d'accueil"></a>
