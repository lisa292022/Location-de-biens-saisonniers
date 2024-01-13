<?php
include('../class/client_class.php');
include('../class/commune_class.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs requis sont renseignés
    if (!empty($_POST["nom_client"]) && !empty($_POST["prenom_client"]) && !empty($_POST["rue_client"]) && !empty($_POST["cop_vil_bien"]) && !empty($_POST["mail_client"]) && !empty($_POST["mdp_client"]) && !empty($_POST["mdp_client2"])) {
        // Récupérer les valeurs du formulaire
        //$nom_client = $_POST["nom_client"];
        //$prenom_client = $_POST["prenom_client"];
        //$rue_client = $_POST["rue_client"];
        //$id_com = $_POST["Idcom"];
        //$mail_client = $_POST["mail_client"];
        //$mdp_client = $_POST['mdp_client'];
        //$mdp_client2 = $_POST['mdp_client2'];
        $oClient= new Client(1);
    $oClient->setcode($code);
    // teste si les 2 mots de passe sont identiques
    if ($_POST["mdp_client"]!=$_POST["mdp_client2"]) {
        ?>
        <script language='Javascript'>
            alert("Les mots de passe saisis ne sont pas identiques." );
            location.href = "inscription.php";
        </script>
        <?php
    }
    else {
        // teste si le client existe dejà (même mail)
        $Existe=$oClient->ExisteClient($_POST["mail_client"]);
        if($Existe->rowCount() != 0) {
           ?>
            <script language='Javascript'>
                alert("Le mail saisi est déjà utilisé par un autre client." );
                location.href = "inscription.php";
            </script>
            <?php
        }
        else {
        $ocommune = new Commune(1);
        $ocommune->setcode($code);
        $idcom = $ocommune->getidcomCouple($_POST['cop_vil_bien']);
        $oClient->insertClientSansId($_POST['nom_client'],$_POST['prenom_client'],$_POST['rue_client'],$idcom,$_POST['mail_client'],$_POST['mdp_client'],0,0);
                header('Location: inscription.php');  
        }
    }
}
}
?>

