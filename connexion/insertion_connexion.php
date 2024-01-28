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
            
            $client = $requete->fetch();
            // si l'utilisateur a un statut qui a été modéré à cause de ces commentaires alors pas de connexion
            // si l'utilisateur n'est plus valide alors pas de connexion
            $statut_client = $client['statut_client'];
            if ($statut_client == 0) {
                echo "Votre identifiant n'est plus valide du fait de vos commentaires.";
                //sleep(3);
                //header("Location:../front/acceuil.php");
                exit();
            }
            
            // si l'utilisateur n'est plus valide alors pas de connexion
            $valid_client = $client['valid_client'];
            if ($valid_client == 0) {
                echo "Votre identifiant n'est plus valide.";
                //sleep(3);
                //header("Location:../front/acceuil.php");
                exit();
            }
            
            // recherche si l'utilisateur est un administrateur
            $UserConnected="oui";
            session_start();
            $_SESSION['connecter'] = "oui";
            
            $_SESSION['time'] = time();
            echo date('Y m d H:i:s', $_SESSION['time']);
            
            // recherche si l'utilisateur est un administrateur
            //$client = $requete->fetch();
            $id_client = $client['id_client'];
            $_SESSION['client'] = $id_client;
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

