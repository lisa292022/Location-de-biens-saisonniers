<td>Liste des types biens</td>
 <form name="liste_bien" method="POST" action="type_bien_traitement.php">
        <?php
    include('../include/connexion.inc.include');
    include('../class/type_bien_class.php');
    
    $oTypebien = new TypeBien(1);
    $oTypebien->setcode($code);
    $lestypebien = $oTypebien->getallTypeBien();
    ?>
<form id='modifier' name='modifier'action='type_bien_traitement.php' method='POST'>
    <?php foreach ($lestypebien as $untypebien) {  ?>
            
             
            <tr>
                <?php echo "<td>" . $untypebien['id_type_bien'] . "</td>"; ?>
                <td>
                <?php echo "<input type='text' class='form-control' "
                . "id='lib_type_bien".$untypebien['lib_type_bien']."' "
                        . "name='lib_type_bien".$untypebien['id_type_bien']."' value='".$untypebien['lib_type_bien']."'"; ?>
                </td>
                <td>
                    <button name='modifier'  value="<?php echo $untypebien['id_type_bien'];?>" type="submit"  class="btn btn-primary">Modifier</button>
                </td>
                <td>
                   
                        <button name='supprimer' value="<?php echo $untypebien['id_type_bien'];?>">Supprimer</button>
                   
                </td>
            </tr>
    
   <?php } ?>
    </form>
     <form id='ajouter' name='ajouter' action="type_bien_traitement.php" method="POST">
        <tr>
            <td><input type="text" class="form-control" id="lib_type_bien" name="lib_type_bien" placeholder="Indiquez le nom du type bien"></td>
            <td><button id='ajouter' name='ajouter' type="submit" class="btn btn-primary">Ajouter</button></td>
        </tr>
    </form>

    
