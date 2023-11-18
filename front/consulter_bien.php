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
                        <th> Nom </th> 
                        <th> Superficie </th> 
                        <th> Nombre de personnes </th>
                        <th> Nombre de pièces </th>
                        <th> Descriptif </th>
                        <th colspan="1"> Voir les disponibilités </th>
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
                    <form id='consulter' name='consulter' action='consulter_bien.php' method='POST'>
                        <tr>
                            <td><?php echo $row['nom_bien']?> </td>
                            <td><?php echo $row['superficie_bien']?> </td>
                            <td><?php echo $row['nb_couchage']?> </td>
                            <td> <?php echo $row['nb_piece']?> </td>
                            <td> <?php echo $row['descriptif']?> </td>
                        <!--
                        <td><?php echo "<input type='text' class='form-control' id='nom_bien".$row['nom_bien']."' name='nom_bien".$row['nom_bien']."' value='".$row['nom_bien']."'"; ?></td>
                        <td><?php echo "<input type='text' class='form-control' id='superficie_bien".$row['superficie_bien']."' name='superficie_bien".$row['superficie_bien']."' value='".$row['superficie_bien']."'"; ?></td>
                        -->
                        
                        <td><?php echo "<input type='week' name='week' id='week' min='2023-W44' max='2024-W52' required"; ?></td>
                        
                        <td>
                            <button name='reserver' value="<?php echo $row['id_bien'];?>" type='submit'>Voir les disponibilités</button>
                        </td>
                    </form>  
                <th><img src="../photo/bien_photo_1.PNG"></th>
                <IMG src="../photo/bien_photo_1.jfif" style="width:200px;height:150px;">
                <h1 align = center>
                    <img src="../photo/bien_photo_1.png"> 
                    <font size ="50pt" face = "verdana"> </font>
                </h1>
                        </tr>
                    <?php endwhile;?> 
                        
                </tbody>
                
        </table>
        </table>
         <a href="../front/acceuil.php"><img src="../photo/home.jfif" title="Page d'accueil"></a>
    </body>
</html>

