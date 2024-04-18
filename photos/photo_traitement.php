<?php
    include('../class/photo_class.php');
    include('../class/biens_class.php');

    $oPhoto = new Photo(1);
    $oPhoto->setcode($code);
    $oBiens = new Biens(1);
    $oBiens->setcode($code);
    
    if(isset($_POST['ajouter'])){
            echo "<script>alert('Etes-vous certain de vouloir ajouter ?');</script>;";
            // récupère id de photo
            $MonBienId= $oBiens->getId_bien($_POST['nom_bien']);
            //$row2=$MonNomBienTexte->fetch(PDO::FETCH_ASSOC); $id = $row2['id_bien'];
            $oPhoto->insertPhoto($_POST['nom_photo'],$_POST['lien_photo'],$_POST['nom_bien']);
            header('Location: photo_affichage.php');
        }
        if(isset($_POST['ajouter_photo_bien'])){
            echo "<script>alert('Etes-vous certain de vouloir ajouter ?');</script>;";
            // récupère id de photo
            $MonBienId=$_POST['ajouter_photo_bien'];
            $oPhoto->insertPhoto($_POST['nom_photo'],$_FILES['lien_photo']['name'],$MonBienId);
            // copie la photo
            echo "Le fichier ".$_FILES['lien_photo']['name'];
            //$destination='C:\xampp\htdocs\location_saisonniere\Location-de-biens-saisonniers\photo'.'\\'.$_POST['nom_photo']."JPG";
            //echo $destination;
            $destination='C:\xampp\htdocs\location_saisonniere\Location-de-biens-saisonniers\photo'.'\\'.$_FILES['lien_photo']['name'];
            echo $destination;
            copy($_FILES['lien_photo']['tmp_name'],$destination);
            //move_uploaded_file($_FILES['lien_photo']['tmp_name'], $destination);
            ?>
            <?php
            if(isset($MonBienId))
            {
            ?>
            <form name="myForm" id="myForm"  action="../biens/bien_modifier.php" method="POST">
                <input name="modifier" value="<?php echo $MonBienId;?>" />
            </form>

            <script>
            function submitform()
            {
            document.getElementById("myForm").submit();
            }
            window.onload = submitform;
            </script>
            <?php
            }
            ?>
                       
            <?php
        }
        if(isset($_POST['supprimer'])){
            echo "<script>alert('Etes-vous certain de vouloir supprimer ?');</script>";
            $id_photo = $_POST['supprimer'];
            $oPhoto->deletePhoto($id_photo);
            header('Location: photo_affichage.php');
        }
        if(isset($_POST['supprimer_photo_bien'])){
            echo "<script>alert('Etes-vous certain de vouloir supprimer ?');</script>";
            $id_photo = $_POST['supprimer_photo_bien'];
            $RetMonBienId = $oPhoto->getIdBienPhoto($id_photo);
            $row3=$RetMonBienId->fetch(PDO::FETCH_ASSOC);$MonBienId=$row3['id_bien'];
            $oPhoto->deletePhoto($id_photo);
            ?>
            <?php
            if(isset($MonBienId))
            {
            ?>
            <form name="myForm2" id="myForm2"  action="../biens/bien_modifier.php" method="POST">
                <input name="modifier" value="<?php echo $MonBienId;?>" />
            </form>

            <script>
            function submitform()
            {
            document.getElementById("myForm2").submit();
            }
            window.onload = submitform;
            </script>
            <?php
            }
            ?>
                       
            <?php
        }
        if(isset($_POST['modifier'])){
            echo "<script>alert('Etes-vous certain de vouloir modifier ?');</script>";
            $id_photo = $_POST['modifier'];
            $MonNomBienTexte=$oBiens->getId_bien($_POST['nom_bien']);
            $row2=$MonNomBienTexte->fetch(PDO::FETCH_ASSOC); $id_bien = $row2['id_bien'];
            $oPhoto->updatePhoto($id_photo,$_POST['nom_photo'],$_POST['lien_photo'], $id_bien);
            header('Location: photo_affichage.php');
        }
        if(isset($_POST['modifier_photo_bien'])){
            echo "<script>alert('Etes-vous certain de vouloir modifier ?');</script>";
            $id_photo = $_POST['modifier_photo_bien'];
            $RetMonBienId = $oPhoto->getIdBienPhoto($id_photo);
            $row3=$RetMonBienId->fetch(PDO::FETCH_ASSOC);$MonBienId=$row3['id_bien'];
            $lien_photo=$_POST['lien_photo'.$id_photo];
            $nom_photo=$_POST['nom_photo'.$id_photo];
            //$oPhoto->updatePhoto($id_photo,$nom_photo,$lien_photo, $MonBienId);
            $oPhoto->updateNomPhoto($id_photo,$nom_photo);
            ?>
            <?php
            if(isset($MonBienId))
            {
            ?>
            <form name="myForm3" id="myForm3"  action="../biens/bien_modifier.php" method="POST">
                <input name="modifier" value="<?php echo $MonBienId;?>" />
            </form>

            <script>
            function submitform()
            {
            document.getElementById("myForm3").submit();
            }
            window.onload = submitform;
            </script>
            <?php
            }
            ?>
                       
            <?php
        }
?>

 