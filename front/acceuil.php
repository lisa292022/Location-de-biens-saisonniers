<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../style.css" rel="stylesheet" />
        <?php
        include('../include/connexion.inc.include');
        include('../class/biens_class.php');
        $o_Biens=new Biens(1);
        $o_Biens->setCode($code);
        ?>
        
    </head>
    <body>
        <header>
            <h1 align = left>
            <img src="../photo/moundef_computing.PNG"> 
            <font size ="3pt" face = "verdana" color='#AF8F8F'>
                <li class="bouton">
                    <a href="">
                       Ajoutez votre logement
                    </a>   
                </li>
                                
                <?php 
                $UserConnected="non";
                session_start();
                //echo $_SESSION['connecter'];  
                //echo $_SESSION['admin'];
                if (isset($_SESSION['connecter'])) {
                    if ($_SESSION['connecter'] == "oui") {
                        //echo "Connecté le " ,date('Y m d H:i:s', $_SESSION['time']);
                        if ($_SESSION['admin'] == "oui") {
                        ?>
                            <li class="bouton">
                            <a href="..\clients\clients_affichage.php">
                            Gérer clients
                            </a>   
                            </li>
                            <?php
                        }
                        else {
                             ?>
                            <li class="bouton">
                            // TODO
                            <a href="..\bien\reservation_affichage.php">
                            Gérer réservation
                            </a>   
                            </li>
                            <?php
                            
                        }
                    ?>
                    <li class="bouton">
                    <a href="..\connexion\deconnexion.php">
                       Se déconnecter
                    </a>   
                    </li>
                    <?php 
                
                    } 
                    else {
                    ?>
                        <li class="bouton">
                         <a href="..\connexion\connexion.php">
                         Se connecter
                        </a>   
                        </li>
                        <?php
                    } 
                }
                else {
                    ?>
                        <li class="bouton">
                         <a href="..\connexion\connexion.php">
                         Se connecter
                        </a>   
                        </li>
                        <?php
                    }
                ?>
                    
                    
                
                <li class="bouton">
                    <a href="..\inscription\inscription.php">
                       S'inscrire
                    </a>   
                </li>
            </font>
            </h1>
            </header>
            <main>
            <h1>Trouvez la location de vos rêves</h1>
            <form>
                <label for="destination">Destination :</label>
                <input type="text" id="destination" name="destination" placeholder="Entrez une destination">
                
                <br/><label for="destination">Date de début :</label>
                <input type="date" id="date_debut" name="date_fin">
                <br/><label for="destination">Date de fin :</label>
                <input type="date" id="date_debut" name="date_fin">
                
                <br/><label for="nb_personne">Nombre de personnes :</label>
                <input type="number" id="nb_personne" name="nb_personne" placeholder="Entrez un nombre"> 
                
                <button type="submit">Rechercher</button>
            </form>
            
            <table>
                <caption>Résultat de votre recherche</caption>
                <thead>
                    <tr>
                      <th>Nom du bien</th>
                      <th>Ville</th>
                      <th>Nombre de couchages</th>
                      <th>Prix</th>
                      <th colspan="1"><th>
                    </tr>
                    <tr>
                    <?php
                    $appel = $o_Biens->getAllBiens();
                    while($row = $appel->fetch(PDO::FETCH_ASSOC)):?>
                    <form id='consulter' name='consulter' action='consulter_bien.php' method='POST'>
                        <tr>
                        <td><?php echo "<input type='text' class='form-control' id='nom_bien".$row['id_bien']."' name='nom_bien".$row['id_bien']."' value='".$row['nom_bien']."'"; ?></td>
                        
                        <?php $MonBien = $o_Biens->getCommuneBiens($row['Idcom']); $row2=$MonBien->fetch(PDO::FETCH_ASSOC); $MonBienTexte = $row2['nom_commune_postal']; ?>
                        <td><?php echo "<input type='text' class='form-control' id='communes' name='communes' value='".$MonBienTexte."'"; ?></td>
                        
                        <td><?php echo "<input type='text' class='form-control' id='nb_personne".$row['id_bien']."' name='nb_personne".$row['id_bien']."' value='".$row['nb_chambre']."'"; ?></td>
                        
                        <?php $MonTarif = $o_Biens->getTarifBien($row['id_bien']); $row4=$MonTarif->fetch(PDO::FETCH_ASSOC); $MonTarifTexte = $row4['prix_loc']; ?>
                        <td><?php echo "<input type='text' class='form-control' id='tarif' name='tarif' value='".$MonTarifTexte."'"; ?></td>
                        
                        
                        <td colspan="1"><button id='consulter' name='consulter' value="<?php echo $row['id_bien'];?>" type="file" class="btn btn-primary">Consulter</button></td>
                        <?php if(isset($_POST['consulter'])) { header("Location:./front/consulter_bien.php"); } ?>
                    </form>
                                              
                        <!--td>
                            <button name='consulter' value="<?php echo $row['id_bien'];?>" type='file'>Consulter</button>
                        </td-->
                    </form>                        
                        </tr>
                    <?php endwhile;?> 
                  <tbody>
                    <tr>
                      <td>Nom bien 1</td>
                      <td>Ville 1</td>
                      <td>1</td>
                      <td>1000</td>
                      <td><button type="submit">Consulter</button></td>
                    </tr>
                    <tr>
                      <td>Nom bien 2</td>
                      <td>Ville 2</td>
                      <td>4</td>
                      <td>1500</td>
                      <td><button type="submit">Consulter</button></td>
                    </tr>
                  </tbody>
            </table>
            </main>
    </body>
</html>

