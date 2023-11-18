
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Liste des biens</title>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
</head>

<body>    
<td>Liste des Biens</td>
    <!--link rel="stylesheet" href="css/style.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script-->
    <div class="container">
    <table>
    <tr>
                      <th> ID </th>
                      <th>Nom</th>
                      <th>Adresse</th>
                      <th>Code postal</th>
                      <th>Ville</th>
                      <th>Superficie</th>
                      <th>Couchage(s)</th>
                      <th>Pièce(s)</th>
                      <th>Chambre(s)</th>
                      <th>Descriptif</th>
                      <th>Référence</th>
                      <th>Statut</th>
                      <th>Type</th>
                      <th colspan="1"><th>
</tr>
    <?php 
        include('../include/connexion.inc.include');
        include('../class/biens_class.php');
        include('../class/type_bien_class.php');
        include('../class/commune_class.php');
        $oBiens= new Biens(1);
        $oBiens->setcode($code);
        $oTypebien= new TypeBien(1);
        $oTypebien->setcode($code);
        $lesbiens=$oBiens->getAllBiens();
        $ocommune = new Commune(1);
        $ocommune->setcode($code);
        
        /*
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
            header('Location: clients_affichage.php');
        }
        */
        
        $lesbiens=$oBiens->getAllBiens();
        while($row = $lesbiens->fetch(PDO::FETCH_ASSOC)):?>
                    <form id='modifier' name='modifier' action='biens_traitement.php' method='POST'>
                        <td><?php echo $row['id_bien'] ?></td>              
                        <td><?php echo "<input type='text' class='form-control' id='nom_bien".$row['id_bien']."' name='nom_bien".$row['id_bien']."' value='".$row['nom_bien']."'"; ?></td>
                        <td><?php echo "<input type='text' class='form-control' id='rue_bien".$row['id_bien']."' name='rue_bien".$row['id_bien']."' value='".$row['rue_bien']."'"; ?></td>
                        
                        <td>
                            <!--form-->
                                <!--div class="input_container"-->
                                <input type="text" id='cop_vil_bien<?php echo $row['id_bien']; ?>' onkeyup="autocomplet3('cop_vil_bien<?php echo $row['id_bien']; ?>', 'cop_vil_bien_list<?php echo $row['id_bien']; ?>' )">
				<ul id="cop_vil_bien_list<?php echo $row['id_bien']; ?>"></ul>
                            <!--/div-->
                            <!--/form-->
                        </td>
                        
                        
                        <td><?php
                        $idcom = $row['Idcom'];
                        $maville = $ocommune->getnom_commune_postal_code_postal($row['Idcom']); 
                        $liste_code_postal = $maville->fetch(PDO::FETCH_ASSOC);
                        $code_postal=$liste_code_postal['code_postal'];
                        echo "<input type='text' class='form-control' id='cop_bien".$row['id_bien']."' name='cop_bien".$row['id_bien']."' value='".$code_postal."'";
                        ?></td>
                        
                        <td><?php 
                        $maville = $ocommune->getnom_commune_postal_code_postal($row['Idcom']); 
                        $liste_nom_commune_postal = $maville->fetch(PDO::FETCH_ASSOC);
                        $nom_commune_postal=$liste_nom_commune_postal['nom_commune_postal'];
                        echo "<input type='text' class='form-control' id='vil_bien".$row['id_bien']."' name='vil_bien".$row['id_bien']."' value='".$nom_commune_postal."'";
                        ?></td>
                        
                        <td><?php echo "<input type='text' class='form-control' id='superficie_bien".$row['id_bien']."' name='superficie_bien".$row['id_bien']."' value='".$row['superficie_bien']."'"; ?></td>  
                        <td><?php echo "<input type='text' class='form-control' id='nb_couchage".$row['id_bien']."' name='nb_couchage".$row['id_bien']."' value='".$row['nb_couchage']."'"; ?></td>  
                        <td><?php echo "<input type='text' class='form-control' id='nb_piece".$row['id_bien']."' name='nb_piece".$row['id_bien']."' value='".$row['nb_piece']."'"; ?></td>  
                        <td><?php echo "<input type='text' class='form-control' id='nb_chambre".$row['id_bien']."' name='nb_chambre".$row['id_bien']."' value='".$row['nb_chambre']."'"; ?></td>  
                        <td><?php echo "<input type='text' class='form-control' id='descriptif".$row['id_bien']."' name='descriptif".$row['id_bien']."' value='".$row['descriptif']."'"; ?></td>  
                        <td><?php echo "<input type='text' class='form-control' id='ref_bien".$row['id_bien']."' name='ref_bien".$row['id_bien']."' value='".$row['ref_bien']."'"; ?></td>  
                        <td><?php echo "<input type='text' class='form-control' id='statut_bien".$row['id_bien']."' name='statut_bien".$row['id_bien']."' value='".$row['statut_bien']."'"; ?></td>  
                               
                        <?php $MonTypeBien = $oTypebien->getAllTypeBien($row['id_type_bien']); $row2=$MonTypeBien->fetch(PDO::FETCH_ASSOC); $MonTypeBienTexte = $row2['lib_type_bien'];?>
                        <td><?php echo "<input type='text' class='form-control' id='lib_type_bien".$row['id_bien']."' name='lib_type_bien".$row['id_bien']."' value='".$MonTypeBienTexte."'"; ?></td>                            
                        
                        <td>
                            <button name='modifier' value="<?php echo $row['id_bien'];?>" type='submit' class="btn btn-primary">Modifier</button>
                        </td>
                        
                        <td>
                            <form id='supprimer' name='supprimer' action='biens_traitement.php' method='POST'>
                            <button name='supprimer' value="<?php echo $row['id_bien'];?>" type='submit'>Supprimer</button>
                            </form>
                        </td>
                        </form>
                        </tr>
                        
    
        <?php endwhile;?>

    
    <form id="ajouter" name="ajouter" action="biens_traitement.php" method="POST">
                        <td></td>
                        <td><input type="text" class="form-control" id="nom_bien" name="nom_bien" placeholder="Indiquez le nom du bien"> </td>
                        <td><input type="text" class="form-control" id="rue_bien" name="rue_bien" placeholder="Indiquez la rue du bien"></td>
                        <td>
                            <!--form-->
                                <div class="input_container">
                                <input type="text" id='cop_vil_bien' onkeyup="autocomplet3('cop_vil_bien', 'cop_vil_bien_list' )">
				
				<ul id="cop_vil_bien_list"></ul>
                            </div>
                            <!--/form-->
                        </td>
                            
                        <td><input type="text" class="form-control" id="cop_bien" name="cop_bien" placeholder="Indiquez le code postal du bien"> </td>
                        <td><input type="text" class="form-control" id="vil_bien" name="vil_bien" placeholder="Indiquez la ville du bien"> </td>
                        <td><input type="text" class="form-control" id="superfice_bien" name="superficie_bien" placeholder="Indiquez le superficie du bien"> </td>
                        <td><input type="text" class="form-control" id="nb_couchage" name="nb_couchage" placeholder="Indiquez le nombre de couchage du bien"> </td>
                        <td><input type="text" class="form-control" id="nb_piece" name="nb_piece" placeholder="Indiquez le nombre de piece"> </td>
                        <td><input type="text" class="form-control" id="nb_chambre" name="nb_chambre" placeholder="Indiquez le nombre de chambre"> </td>
                        <td><input type="text" class="form-control" id="descriptif" name="descriptif" placeholder="Indiquez le descriptif"> </td>
                        <td><input type="text" class="form-control" id="ref_bien" name="ref_bien" placeholder="Indiquez la reférence du bien"> </td>
                        <td><input type="text" class="form-control" id="statut_bien" name="statut_bien" placeholder="Indiquez le statut du bien"> </td>
                       
                        
                        <td><select id="lib_type_bien" name="lib_type_bien">
                                <?php
                                    $all_type_bien = $oTypebien->getAllTypeBien();
                                    foreach($all_type_bien as $type_bien) {
                                ?>
                                <option value="<?php echo $type_bien["id_type_bien"];?>">
                                    <?php echo $type_bien["lib_type_bien"]?>
                                </option>
                               <?php
                                   //endwhile;
                               }
                               ?>
                            </select>
                        </td>
                        
                        
                        <td><button id='ajouter' name='ajouter' type="submit" class="btn btn-primary">Ajouter</button></td>
                        </form>
                        
    </form>
                                                
</table>                        
                        <a href="../front/acceuil.php"><img src="../photo/home.jfif" title="Page d'accueil"></a>
</div><!-- container -->
</body>

