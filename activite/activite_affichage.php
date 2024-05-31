<link href="../style.css" rel="stylesheet" />
<center>Liste des activités</center>
<table>
    <tr>
                      <th>Activité</th>
                      <th colspan="1"><th>
    </tr>
 <form name="liste_activite" method="POST" action="activite_traitement.php">
        <?php
    include('../include/connexion.inc.include');
    include('../class/activite_class.php');
    
    $oactivite = new activite(1);
    $oactivite->setcode($code);
    $lesactivite = $oactivite->getallactivite();
    ?>
<form id='modifier' name='modifier'action='activite_traitement.php' method='POST'>
    <?php foreach ($lesactivite as $unactivite) {  ?>
            
            <tr>  
                <td>
                <?php echo "<input type='text' class='form-control' "
                . "id='description".$unactivite['id_activite']."' "
                        . "name='description".$unactivite['id_activite']."' value='".$unactivite['description']."'"; ?>
                </td>
                <td>
                    <button name='modifier'  value="<?php echo $unactivite['id_activite'];?>" type="submit"  class="btn btn-primary">Modifier</button>
                </td>
                <td>    
                        <button name='supprimer' value="<?php echo $unactivite['id_activite'];?>">Supprimer</button>   
                </td>
            </tr>
    
   <?php } ?>
    </form>
     <form id='ajouter' name='ajouter' action="activite_traitement.php" method="POST">
        <tr>
            <td><input type="text" class="form-control" id="description" name="description" placeholder="Indiquez la description"></td>
            <td><button id='ajouter' name='ajouter' type="submit" class="btn btn-primary">Ajouter</button></td>
        </tr>
    </form>
</table> 
<a href="../front/acceuil.php"><img src="../photo/home.jfif" title="Page d'accueil"></a>
