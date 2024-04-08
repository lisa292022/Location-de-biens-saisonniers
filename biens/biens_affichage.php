<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Liste des biens</title>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<link href="../style.css" rel="stylesheet" />
</head>

<body>    
    <center>Liste des Biens</center>
    <!--link rel="stylesheet" href="css/style.css" /-->
    <div class="container">
    <table id="tablebiens">
    <tr>
                      <th>Nom</th>
                      <th>Adresse</th>
                      <!--th>Code postal</th>
                      <th>Ville</th-->
                      <th>Ville / Code postal</th>
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
        $lesbiens=$oBiens->getAllBiens();
        while($row = $lesbiens->fetch(PDO::FETCH_ASSOC)):?>
                    <form id='modifier' name='modifier' action='biens_traitement.php' method='POST'>           
                        <td><?php echo "<input type='text' class='form-control' id='nom_bien".$row['id_bien']."' name='nom_bien".$row['id_bien']."' value='".$row['nom_bien']."'"; ?></td>
                        <td><?php echo "<input type='text' class='form-control' id='rue_bien".$row['id_bien']."' name='rue_bien".$row['id_bien']."' value='".$row['rue_bien']."'"; ?></td>
                        
                        <!--td><?php
                        $idcom = $row['Idcom'];
                        $maville = $ocommune->getnom_commune_postal_code_postal($row['Idcom']); 
                        $liste_code_postal = $maville->fetch(PDO::FETCH_ASSOC);
                        $code_postal=$liste_code_postal['code_postal'];
                        echo "<input type='text' class='form-control' id='cop_bien".$row['id_bien']."' name='cop_bien".$row['id_bien']."' value='".$code_postal."' disabled='disabled'";
                        ?></td-->
                        
                        <!--td><?php 
                        $maville = $ocommune->getnom_commune_postal_code_postal($row['Idcom']); 
                        $liste_nom_commune_postal = $maville->fetch(PDO::FETCH_ASSOC);
                        $nom_commune_postal=$liste_nom_commune_postal['nom_commune_postal'];
                        echo "<input type='text' class='form-control' id='vil_bien".$row['id_bien']."' name='vil_bien".$row['id_bien']."' value='".$nom_commune_postal."' disabled='disabled'";
                        ?></td-->
                        
                        <td>
                                <input type="text" class='form-control' id='cop_vil_bien<?php echo $row['id_bien']; ?>' name='cop_vil_bien<?php echo $row['id_bien']; ?>' value='<?php echo $nom_commune_postal." ".$code_postal ; ?>'    onkeyup="autocompletbien('cop_vil_bien<?php echo $row['id_bien']; ?>', 'cop_vil_bien_list<?php echo $row['id_bien']; ?>' )">
				<ul id="cop_vil_bien_list<?php echo $row['id_bien']; ?>"></ul>
                        </td>
                        
                        <td><?php echo "<input type='text' class='form-control petit' id='superficie_bien".$row['id_bien']."' name='superficie_bien".$row['id_bien']."' value='".$row['superficie_bien']."'"; ?></td>  
                        <td><?php echo "<input type='text' class='form-control petit' id='nb_couchage".$row['id_bien']."' name='nb_couchage".$row['id_bien']."' value='".$row['nb_couchage']."'"; ?></td>  
                        <td><?php echo "<input type='text' class='form-control petit' id='nb_piece".$row['id_bien']."' name='nb_piece".$row['id_bien']."' value='".$row['nb_piece']."'"; ?></td>  
                        <td><?php echo "<input type='text' class='form-control petit' id='nb_chambre".$row['id_bien']."' name='nb_chambre".$row['id_bien']."' value='".$row['nb_chambre']."'"; ?></td>  
                        <td><?php echo "<textarea class='form-control' id='descriptif".$row['id_bien']."' name='descriptif".$row['id_bien']."'>".$row['descriptif']."</textarea>"; ?></td>
                        <td><?php echo "<input type='text' class='form-control petit' id='ref_bien".$row['id_bien']."' name='ref_bien".$row['id_bien']."' value='".$row['ref_bien']."'"; ?></td>  
                        <td><?php echo "<input type='text' class='form-control petit' id='statut_bien".$row['id_bien']."' name='statut_bien".$row['id_bien']."' value='".$row['statut_bien']."'"; ?></td>  
                               
                        <?php $MonTypeBienTexte = $oTypebien->getLibTypeBien($row['id_type_bien']); ?>
                        <!--td><?php echo "<input type='text' class='form-control petit' id='lib_type_bien".$row['id_bien']."' name='lib_type_bien".$row['id_bien']."' value='".$MonTypeBienTexte."'"; ?></td-->                            
                        
                        <td><select class="form-control petit" id='lib_type_bien".$row['id_bien']."' name='lib_type_bien".$row['id_bien']."'>
                                <?php
                                    $all_type_bien = $oTypebien->getAllTypeBien();
                                    foreach($all_type_bien as $type_bien) {  
                                ?>
                                <?php if ($type_bien['lib_type_bien'] == $MonTypeBienTexte) {?>
                                <option selected="selected" value="<?php echo $type_bien["id_type_bien"];?>">
                                    <?php echo $type_bien["lib_type_bien"]?>
                                </option>
                                <?php } else { ?>
                                <option value="<?php echo $type_bien["id_type_bien"];?>">
                                    <?php echo $type_bien["lib_type_bien"]?>
                                </option>
                                <?php }?>
                               <?php
                                   //endwhile;
                               }
                               ?>
                            </select>
                        </td>
                        
                        <td>
                            <button class="btn secondary" name='modifier' value="<?php echo $row['id_bien'];?>" type='submit' class="btn btn-primary">Modifier</button>
                        </td>
                        
                        <td>
                            <form id='supprimer' name='supprimer' action='biens_traitement.php' method='POST'>
                            <button class="btn secondary" name='supprimer'  value="<?php echo $row['id_bien'];?>" type='submit'>Supprimer</button>
                            </form>
                        </td>
                        </form>
                        </tr>
        <?php endwhile;?>

    
    <form id="ajouter" name="ajouter" action="biens_traitement.php" method="POST">
                        <td><input type="text" class="form-control" id="nom_bien" name="nom_bien" placeholder="Indiquez le nom du bien"> </td>
                        <td><input type="text" class="form-control" id="rue_bien" name="rue_bien" placeholder="Indiquez la rue du bien"></td>
                        <!--td><input type="text" class="form-control" id="cop_bien" name="cop_bien" placeholder="Code postal du bien" disabled="disabled"> </td-->
                        <!--td><input type="text" class="form-control" id="vil_bien" name="vil_bien" placeholder="Ville du bien" disabled="disabled"> </td--> 
                        
                        <td>
                            <div class="input_container">
                                <input type="text" id='cop_vil_bien' name='cop_vil_bien' placeholder='Indiquez la ville et le code postal du bien' onkeyup="autocompletbien('cop_vil_bien', 'cop_vil_bien_list' )">
				
				<ul id="cop_vil_bien_list"></ul>
                            </div>
                        </td>
                            
                        <td><input type="text" class="form-control petit" id="superfice_bien" name="superficie_bien" placeholder="superficie"> </td>
                        <td><input type="text" class="form-control petit" id="nb_couchage" name="nb_couchage" placeholder="nombre de couchage"> </td>
                        <td><input type="text" class="form-control petit" id="nb_piece" name="nb_piece" placeholder="nombre de piece"> </td>
                        <td><input type="text" class="form-control petit" id="nb_chambre" name="nb_chambre" placeholder="nombre de chambre"> </td>
                        <td><input type="text" class="form-control" id="descriptif" name="descriptif" placeholder="descriptif"> </td>
                        <td><input type="text" class="form-control petit" id="ref_bien" name="ref_bien" placeholder="reférence du bien"> </td>
                        <td><input type="text" class="form-control petit" id="statut_bien" name="statut_bien" placeholder="statut"> </td>
                       
                        
                        <td><select class="form-control petit" id="lib_type_bien" name="lib_type_bien">
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
                        
                        
                        <td><button id='ajouter' name='ajouter' type="submit" class="btn secondary">Ajouter</button></td>
                        </form>
                        
    </form>
                                                
</table>                        
                        <a href="../front/acceuil.php"><img src="../photo/home.jfif" title="Page d'accueil"></a>
</div><!-- container -->
</body>

