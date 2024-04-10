<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Liste des clients</title>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <link href="../style.css" rel="stylesheet" />
</head>

<body>
<center>Liste Clients</center>
<!--form name="liste_clients" methode="POST" action="clients_traitement.php"-->
<div class="container">
<table>
    <tr>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Adresse</th>
                      <!--th>Code postal</th>
                      <th>Ville</th-->
                      <th>Ville / Code postal</th>
                      <th>Mail</th>
                      <th>Mot de passe</th>
                      <th>Statut</th>
                      <th>Validité</th>
                      <th colspan="1"><th>
</tr>
<tr>
    </tr>
<?php 
    include('../include/connexion.inc.include');
    include('../class/client_class.php');
    include('../class/commune_class.php');
    $oClient= new Client(1);
    $oClient->setcode($code);
    $lesclients=$oClient->getAllClient();
    $ocommune = new Commune(1);
    $ocommune->setcode($code);    
    $lesclients=$oClient->getAllClient();
    while($row = $lesclients->fetch(PDO::FETCH_ASSOC)):?>
                    <form id='modifier' name='modifier' action='clients_traitement.php' method='POST'>
                        <tr>
                        <!--td><?php echo "<input type='text' class='form-control' id='id_client".$row['id_client']."' name='id_client".$row['id_client']."' value='".$row['id_client']."'"; ?></td-->                       
                        <td><?php echo "<input type='text' class='form-control' id='nom_client".$row['id_client']."' name='nom_client".$row['id_client']."' value='".$row['nom_client']."'"; ?></td>
                        <td><?php echo "<input type='text' class='form-control' id='prenom_client".$row['id_client']."' name='prenom_client".$row['id_client']."' value='".$row['prenom_client']."'"; ?></td>
                        <td><?php echo "<input type='text' class='form-control' id='rue_client".$row['id_client']."' name='rue_client".$row['id_client']."' value='".$row['rue_client']."'"; ?></td>                                             
                        
                        <!--td><?php
                        $idcom = $row['Idcom'];
                        $maville = $ocommune->getnom_commune_postal_code_postal($row['Idcom']); 
                        $liste_code_postal = $maville->fetch(PDO::FETCH_ASSOC);
                        $code_postal=$liste_code_postal['code_postal'];
                        echo "<input type='text' class='form-control' id='cop_client".$row['id_client']."' name='cop_client".$row['id_client']."' value='".$code_postal."' disabled='disabled' display='none'";
                        ?></td-->
                        
                        <!--td><?php 
                        $maville = $ocommune->getnom_commune_postal_code_postal($row['Idcom']); 
                        $liste_nom_commune_postal = $maville->fetch(PDO::FETCH_ASSOC);
                        $nom_commune_postal=$liste_nom_commune_postal['nom_commune_postal'];
                        echo "<input type='text' class='form-control' id='vil_client".$row['id_client']."' name='vil_client".$row['id_client']."' value='".$nom_commune_postal."' disabled='disabled' display='none'";
                        ?></td-->
                        
                        <td>
                                <input type="text" class='form-control' id='cop_vil_client<?php echo $row['id_client']; ?>' name='cop_vil_client<?php echo $row['id_client']; ?>' value='<?php echo $nom_commune_postal." ".$code_postal ; ?>'    onkeyup="autocompletclient('cop_vil_client<?php echo $row['id_client']; ?>', 'cop_vil_client_list<?php echo $row['id_client']; ?>' )">
				<ul id="cop_vil_client_list<?php echo $row['id_client']; ?>"></ul>
                        </td>
                        
                        <td><?php echo "<input type='text' class='form-control' id='mail_client".$row['id_client']."' name='mail_client".$row['id_client']."' value='".$row['mail_client']."'"; ?></td>                                             
                        <td><?php echo "<input type='password' class='form-control' id='mdp_client".$row['id_client']."' name='mdp_client".$row['id_client']."' value='".$row['mdp_client']."'"; ?></td>                                             
                        <td><?php echo "<input type='text' class='form-control' id='statut_client".$row['id_client']."' name='statut_client".$row['id_client']."' value='".$row['statut_client']."'"; ?></td>                                             
                        <td><?php echo "<input type='text' class='form-control' id='valid_client".$row['id_client']."' name='valid_client".$row['id_client']."' value='".$row['valid_client']."'"; ?></td>                                             
                        
                        <td> 
                            <button name='modifier' value="<?php echo $row['id_client'];?>" type='submit' class="btn btn-primary">Modifier</button>
                        </td>
                        
                        <!--td>
                            <form id='supprimer' name='supprimer' action='clients_traitement.php' method='POST'>
                                <button name='supprimer' value="<?php echo $row['id_client'];?>" type='submit'>Supprimer</button>
                            </form>
                        </td-->
                        </form>
                        </tr>
                        
    
     <?php endwhile;?>

    <form id="ajouter" name="ajouter" action="clients_traitement.php" method="POST">
                        <!--td><input type="text" class="form-control" id="id_client" name="id_client" placeholder="Indiquez l'identifiant du client"> </td-->
                        <td><input type="text" class="form-control" id="nom_client" name="nom_client" placeholder="Indiquez le nom du client"> </td>
                        <td><input type="text" class="form-control" id="prenom_client" name="prenom_client" placeholder="Indiquez le prénom du client"></td>
                        <td><input type="text" class="form-control" id="rue_client" name="rue_client" placeholder="Indiquez la rue du client"> </td>
                        <!--td><input type="text" class="form-control" id="cop_client" name="cop_client" placeholder="Indiquez le code postale" disabled="disabled"> </td-->
                        <!--td><input type="text" class="form-control" id="vil_client" name="vil_client" placeholder="Indiquez la ville" disabled="disabled"></td-->
                        
                        <td>
                                <div class="input_container">
                                <input type="text" id='cop_vil_client' name='cop_vil_client' placeholder='Indiquez la ville et le code postal du client' onkeyup="autocompletclient('cop_vil_client', 'cop_vil_client_list' )">
				
				<ul id="cop_vil_client_list"></ul>
                            </div>
                        </td>
                         
                        <td><input type="text" class="form-control" id="mail_client" name="mail_client" placeholder="Indiquez le mail du client"> </td>
                        <td><input type="password" class="form-control" id="mdp_client" name="mdp_client" placeholder="Indiquez le mot de passe"> </td>
                        <td><input type="text" class="form-control" id="statut_client" name="statut_client" placeholder="Indiquez le statut"> </td>
                        <td><input type="text" class="form-control" id="valid_client" name="valid_client" placeholder="Indiquez la validité"> </td>
                         
                        <td><button id='ajouter' name='ajouter' type="submit" class="btn btn-primary">Ajouter</button></td>
                        </form>   

</table>                        
                        <a href="../front/acceuil.php"><img src="../photo/home.jfif" title="Page d'accueil"></a>
</div><!-- container -->
</body>

