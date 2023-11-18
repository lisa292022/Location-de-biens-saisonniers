<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs requis sont renseignés
    if (!empty($_POST["nom_client"]) && !empty($_POST["prenom_client"]) && !empty($_POST["rue_client"]) && !empty($_POST["id_com"]) && !empty($_POST["mail_client"]) && !empty($_POST["mdp_client"]) && !empty($_POST["mdp_client"]) && !empty($_POST["mdp_client2"])) {
        // Récupérer les valeurs du formulaire
        $nom_client = $_POST["nom_client"];
        $prenom_client = $_POST["prenom_client"];
        $rue_client = $_POST["rue_client"];
        $id_com = $_POST["Idcom"];
        $mail_client = $_POST["mail_client"];
        $mdp_client = $_POST['mdp_client'];
        $mdp_client2 = $_POST['mdp_client2'];
        
        
        if ($mdp_client != $mdp_client2) {
            echo "Le mot de passe n'est pas le même. ";
        } else {
            // Effectuer l'insertion dans la base de données
            require_once("../include/connexion.inc.include"); 

            try {
                // Préparer la requête d'insertion
                $requete = $code->prepare("INSERT INTO clients (nom_client, prenom_client, rue_client, Idcom, mail_client, mdp_client) VALUES (:nom_client, :prenom_client, :rue_client, :Idcom, :mail_client, :mdp_client)");

                // Lier les valeurs aux paramètres
                $requete->bindParam(":nom_client", $nom_client);
                $requete->bindParam(":prenom_client", $prenom_client);
                $requete->bindParam(":rue_client", $rue_client);
                $requete->bindParam(":Idcom", $id_com);
                $requete->bindParam(":mail_client", $mail_client);
                $requete->bindParam(":mdp_client", $mdp_client);
                

                if ($requete->execute()) {
                    header("Location: ../connexion/connexion.php");
                    exit(); 
                } else {
                    echo "Une erreur est survenue lors de l'inscription.";
                }
            } catch (PDOException $e) {
                echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
            }
        }
    }
}
?>

