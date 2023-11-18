<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs requis sont renseignés
    if (!empty($_POST["mail_client"]) && !empty($_POST["mdp_client"])) {
        // Récupérer les valeurs du formulaire
        $mail_client = $_POST["mail_client"];
        $mdp_client = $_POST["mdp_client"];

        // Effectuer la vérification dans la base de données
        require_once("../include/connexion.inc.include"); // Inclure le fichier de connexion PDO

        $requete = $code->prepare("SELECT * FROM clients WHERE mail_client = :mail_client AND mdp_client = :mdp_client");
        $requete->bindValue(":mail_client", $mail_client);
        $requete->bindValue(":mdp_client", $mdp_client);
        $requete->execute();

        if ($requete->rowCount() == 1) {
            // Connexion réussie, l'utilisateur existe dans la base de données
            // Vous pouvez enregistrer des informations de session ou rediriger vers une page protégée
            
            $UserConnected="oui";
            session_start();
            $_SESSION['connecter'] = "oui";
            
            $_SESSION['time'] = time();
            echo date('Y m d H:i:s', $_SESSION['time']);
            
            // recherche si l'utilisateur est un administrateur
            $client = $requete->fetch();
            $id_client = $client['id_client'];
            echo $id_client;
            $requete = $code->prepare("SELECT * FROM administrateurs WHERE id_client = :id_client");
            $requete->bindValue(":id_client", $id_client);
            $requete->execute();
            if ($requete->rowCount() == 1) {
                $_SESSION['admin'] = "oui";
            }
            else {
                $_SESSION['admin'] = "non";
            }
            
            header("Location:../front/acceuil.php");
        } else {
            // Identifiants invalides
            echo "Email ou mot de passe incorrect.";
            
        }
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }
}
?>

