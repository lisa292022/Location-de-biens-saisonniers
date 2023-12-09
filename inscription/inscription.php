<!DOCTYPE html>
<html>
<head>
    
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1><a href="../index.php">Inscription</a></h1>
            <form action="insertion_inscription.php" method="POST">
                <div class="form-group">
                    <label for="nom_client">Nom :</label>
                    <input type="text" name="nom_client" id="nom_client" required>
                </div>
                <div class="form-group">
                    <label for="prenom_client">Prénom :</label>
                    <input type="text" name="prenom_client" id="prenom_client" required>
                </div>
                <div class="form-group">
                    <label for="rue_client">Rue :</label>
                    <input type="text" name="rue_client" id="rue_client" required>
                </div>
                <div class="form-group">
                    <label for="cop_client">Code postale :</label>
                    <input type="text" name="Idcom" id="Idcom" required>
                </div>
                <div class="form-group">
                    <label for="vil_client">Ville :</label>
                    <input type="text" name="Idcom" id="Idcom" required>
                </div>
                <div class="form-group">
                    <label for="mail_client"> Email :</label>
                    <input type="email" name="mail_client" id="mail_client" required>
                </div>
                <div class="form-group">
                    <label for="mdp_client">Créer votre mot de passe :</label>
                    <input type="password" name="mdp_client" id="mdp_client" required>
                </div>
                <div class="form-group">
                    <label for="mdp_client2">Confirmer votre mot de passe :</label>
                    <input type="password" name="mdp_client2" id="mdp_client2" required>
                </div>

                <button type="submit" class="btn">S'inscrire</button>
            </form>
        </div>
    </div>
</body>
</html>

