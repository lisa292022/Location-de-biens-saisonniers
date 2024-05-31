<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <link href="../style.css" rel="stylesheet" />
    <title>Formulaire d'inscription</title>
     
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>Inscription</a></h1>
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
                <!--div class="form-group">
                    <label for="cop_client">Code postale :</label>
                    <input type="text" name="Idcom" id="Idcom" required>
                </div>
                <div class="form-group">
                    <label for="vil_client">Ville :</label>
                    <input type="text" name="Idcom" id="Idcom" required>
                </div-->
                <div class="input_container">
                    <label for="vil_client">Ville / Code postal :</label>
                                <input type="text" id='cop_vil_bien' name='cop_vil_bien' placeholder='Indiquez la ville et le code postal' onkeyup="autocompletbien('cop_vil_bien', 'cop_vil_bien_list' )">
				
				<ul id="cop_vil_bien_list"></ul>
                </div>
                <div class="form-group">
                    <label for="mail_client"> Email :</label>
                    <input type="email" name="mail_client" id="mail_client" required>
                </div>
                <div class="form-group">
                    <label for="mdp_client">Créer votre mot de passe :</label>
                    <input type="password" name="mdp_client" id="mdp_client" minlength=12 maxlength=49 autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="mdp_client2">Confirmer votre mot de passe :</label>
                    <input type="password" name="mdp_client2" id="mdp_client2" minlength=12 maxlength=49 autocomplete="off" required">
                </div>

                <button type="submit" class="btn">S'inscrire</button>
                <a href="../front/acceuil.php"><img src="../photo/home.jfif" title="Page d'accueil"></a>
            </form>
        </div>
    </div>
</body>
</html>

