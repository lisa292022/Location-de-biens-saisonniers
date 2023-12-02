<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../style.css" rel="stylesheet" />
        <?php
        include('../include/connexion.inc.include');
        include('../class/biens_class.php');
        $o_Biens=new Biens(2);
        $o_Biens->setCode($code);
        $o_Biens->getOneBien(2);
        ?>
        
    </head>
    <body>
        <!--?phpif(isset($_POST['consulter'])){
            
            $id_bien = $_POST['consulter'];
            echo $id_bien;
        }
        ?-->
        <table>
            <table>
            <caption>CE LOGEMENT</caption>
            <thead>
                    <tr>
                        <th> Id </th> 
                        <th> Nom </th> 
                        <th> Superficie </th> 
                        <th> Nombre de personnes </th>
                        <th> Nombre de pièces </th>
                        <th> Descriptif </th>
                        <th colspan="1"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                    // a remplacer avec l'identifiant du bien reçu
                    //$id_bien=2;
                    $id_bien = $_POST['consulter'];
                    $appel = $o_Biens->getOneBien($id_bien);
                    while($row = $appel->fetch(PDO::FETCH_ASSOC)):?>
                    <form id='reserver' name='reserver' action='..\reservation\affichage_test.php' method='POST'>
                        <tr>
                            <td><?php echo "<input type='text' class='form-control' id='id_bien' name='id_bien' value='".$row['id_bien']."'"; ?></td>
                            <td><?php echo $row['nom_bien']?> </td>
                            <td><?php echo $row['superficie_bien']?> </td>
                            <td><?php echo $row['nb_couchage']?> </td>
                            <td> <?php echo $row['nb_piece']?> </td>
                            <td> <?php echo $row['descriptif']?> </td>
                        <!--
                        <td><?php echo "<input type='text' class='form-control' id='nom_bien".$row['nom_bien']."' name='nom_bien".$row['nom_bien']."' value='".$row['nom_bien']."'"; ?></td>
                        <td><?php echo "<input type='text' class='form-control' id='superficie_bien".$row['superficie_bien']."' name='superficie_bien".$row['superficie_bien']."' value='".$row['superficie_bien']."'"; ?></td>
                        -->
                                                                       
                        <td>
                            <button name='reserver' value="<?php echo $row['id_bien'];?>" type='submit'>Voir les disponibilités</button>
                            <!--a href="..\reservation\affichage_test.php?client=autre">Réserver</a-->
                        </td>
                    </form>  
                <!--th><img src="../photo/bien_photo_1.PNG"></th-->
                <!--IMG src="../photo/bien_photo_1.jfif" style="width:200px;height:150px;"-->
                <h1 align = center>
                    <IMG src="../photo/bien_photo_1.jfif" style="width:200px;height:150px;">
                    <!--img src="../photo/bien_photo_1.png"> 
                    <font size ="100pt" face = "verdana"> </font-->
                </h1>
                        </tr>
                    <?php endwhile;?> 
                        
                </tbody>
                
        </table>
        </table>
         <a href="../front/acceuil.php"><img src="../photo/home.jfif" title="Page d'accueil"></a>
    </body>
</html>

