<html>
    <head>
        <meta charset="UTF-8">
        <title>Accueil</title>
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>
        <link href="../style.css" rel="stylesheet" />
        <?php
        include('../include/connexion.inc.include');
        include('../class/biens_class.php');
        include('../class/commune_class.php');
        $o_Biens=new Biens(1);
        $o_Biens->setCode($code);
        $ocommune = new Commune(1);
        $ocommune->setcode($code);
        ?>
        
    </head>
    <body>
        <header>
            <!-- <h1 align = left> -->
            <img src="../photo/moundef_computing.PNG"> 
            <font size ="3pt" face = "verdana" color='#AF8F8F'>
                <li class="bouton">
                     
                </li>
                                
                <?php 
                $UserConnected="non";
                session_start();
                //echo $_SESSION['connecter'];  
                //echo $_SESSION['admin'];
                if (isset($_SESSION['connecter'])) {
                    if ($_SESSION['connecter'] == "oui") {
                        //echo "Connecté le " ,date('Y m d H:i:s', $_SESSION['time']);
                        // récupère l'id du client pour la réservation
                        $id_client_connecte=$_SESSION['client'];
                        // pas de bien sélectionné sur la page principale
                        $id_bien = 0;
                        // menu différent suivant le client ou l'admin
                        if ($_SESSION['admin'] == "oui") {
                        ?>
                            <li class="bouton">
                            <a href="..\clients\clients_affichage.php">Clients</a>   
                            </li>
                            <li class="bouton">
                            <a href="..\biens\biens_affichage.php">Biens</a>   
                            </li>
                            <li class="bouton">
                            <a href="..\type_bien\type_bien_affichage.php">Types bien</a>   
                            </li>
                            <li class="bouton">
                            <a href="..\photos\photo_affichage.php">Photos</a>   
                            </li>
                            <li class="bouton">
                            <a href="..\tarif\tarif_affichage.php">Tarifs</a>   
                            </li>
                            <li class="bouton">
                            <a href="..\reservation\affichage_test.php?client=admin">Réservations</a>   
                            </li>
                            <?php
                        }
                        else {
                             ?>
                            <li class="bouton">
                            <a href="..\reservation\affichage_test.php?client=autre">Réservation</a>   
                            </li>
                            <?php
                            
                        }
                    ?>
                    <li class="bouton">
                    <a href="..\connexion\deconnexion.php">Se déconnecter</a>   
                    </li>
                    <?php 
                
                    } 
                    else {
                        $id_client_connecte=0;
                    ?>
                        <li class="bouton">
                         <a href="..\connexion\connexion.php">Se connecter</a>   
                        </li>
                        <li class="bouton">
                        <a href="..\inscription\inscription.php">S'inscrire</a>   
                        </li>
                        <?php
                    } 
                }
                else {
                    $id_client_connecte=0;
                    ?>
                        <li class="bouton">
                         <a href="..\connexion\connexion.php">Se connecter</a>   
                        </li>
                        <li class="bouton">
                        <a href="..\inscription\inscription.php">S'inscrire</a>   
                        </li>
                        <?php
                    }
                ?>
  
            </font>
            </h1>
            </header>
            <main>
            <h1 id="h1acceuil">Trouvez la location de vos rêves</h1>
            
            <form id='rechercher' name='rechercher' value="3" action='acceuil.php' ype="file" class="btn btn-primary" method='POST'>
                
                
                <br/><label for="debut">Date de début :</label>
                <input type="date" id="date_debut" name="date_fin">
                <br/><label for="fin">Date de fin :</label>
                <input type="date" id="date_debut" name="date_fin">
                
                <br/><label for="vide"> </label>       
                <br/><label for="couchage">Nombre de personnes :</label>
                <input type="number" id="nb_personne" name="nb_personne" placeholder="Entrez un nombre"> 
                
                <br/><label for="destination">Destination :</label>
                <br><td>
                    <div class="input_container">
                        <input type="text" id='cop_vil_bien' name='cop_vil_bien' placeholder='Indiquez la ville et le code postal du bien' onkeyup="autocompletbien('cop_vil_bien', 'cop_vil_bien_list' )">
                            <ul id="cop_vil_bien_list"></ul>
                        </div>
                </td>
                

                <td><button id='rechercher' name='rechercher' type="submit" class="btn btn-primary" value="<?php echo $cop_vil_bien;?>">Rechercher</button></td>
                
            </form>

            <table id="tableacceuil">
                <caption>Résultat de votre recherche</caption>
                    <tr>
                      <th>Nom du bien</th>
                      <th>Destination</th>
                      <th>Nombre de couchages</th>
                      <th>Prix</th>
                      <th colspan="1"></th>
                    </tr>
                    <tr>
                    <?php
                    
                    if (isset($_POST['rechercher']))
                    {
                        if ($_POST['cop_vil_bien']!="" and $_POST['nb_personne']!="") 
                        {
                            $idcom = $ocommune->getidcomCouple($_POST['cop_vil_bien']);
                            $appel = $o_Biens->getAllBiensCommuneNbcouchage($idcom,$_POST['nb_personne']);
                            //$appel = $o_Biens->getAllBiensCommune($idcom);
                        }
                        if ($_POST['cop_vil_bien']!="" and $_POST['nb_personne']=="")
                            {
                                $idcom = $ocommune->getidcomCouple($_POST['cop_vil_bien']);
                                $appel = $o_Biens->getAllBiensCommune($idcom);
                            }
                        if ($_POST['cop_vil_bien']=="" and $_POST['nb_personne']!="") 
                            {
                               $appel = $o_Biens->getAllBiensNbcouchage($_POST['nb_personne']);
                            } 
                        if ($_POST['cop_vil_bien']=="" and $_POST['nb_personne']=="") 
                            {
                                $appel = $o_Biens->getAllBiensValide();
                            }
                    }
                    else
                    {
                        $appel = $o_Biens->getAllBiensvalide();
                    }    
                    //$appel = $o_Biens->getAllBiens();
                    while($row = $appel->fetch(PDO::FETCH_ASSOC)):?>
                    <form id='consulter' name='consulter' action='consulter_bien.php' method='POST'>
                        <?php echo "<input type='text' class='form-control' id='id_client' name='id_client' style='visibility: hidden' value='".$id_client_connecte."'"; ?>
                        <tr>
                        <td><?php echo "<input type='text' class='form-control' id='nom_bien".$row['id_bien']."' name='nom_bien".$row['id_bien']."' value='".$row['nom_bien']."'"."disabled='disabled'"; ?></td>
                        
                        <?php $MonBien = $ocommune->getnom_commune_postal_code_postal($row['Idcom']); $row2=$MonBien->fetch(PDO::FETCH_ASSOC); $MonBienTexte = $row2['nom_commune_postal']." ".$row2['code_postal']; ?>
                        <td><?php echo "<input type='text' class='form-control' id='communes' name='communes' value='".$MonBienTexte."'"."disabled='disabled'"; ?></td>
                        
                        <td><?php echo "<input type='text' class='form-control' id='nb_personne".$row['id_bien']."' name='nb_personne".$row['id_bien']."' value='".$row['nb_couchage']."'"."disabled='disabled'"; ?></td>
                        
                        <?php $MonTarif = $o_Biens->getTarifBien($row['id_bien']); $row4=$MonTarif->fetch(PDO::FETCH_ASSOC); $MonTarifTexte = $row4['prix_loc']; ?>
                        <td><?php echo "<input type='text' class='form-control' id='tarif' name='tarif' value='".$MonTarifTexte."'"."disabled='disabled'"; ?></td>
                        
                        
                        <td colspan="1"><button id='consulter' name='consulter' value="<?php echo $row['id_bien'];?>" type="file" class="btn btn-primary">Consulter</button></td>
                        <?php if(isset($_POST['consulter'])) { header("Location:./front/consulter_bien.php"); } ?>
                    </form>
                                              
                        <!--td>
                            <button name='consulter' value="<?php echo $row['id_bien'];?>" type='file'>Consulter</button>
                        </td-->
                    </form>                        
                        </tr>
                    <?php endwhile;?> 
            </table>
            </main>
    </body>
</html>

