<!DOCTYPE html>
<html>
<head>
    <link href="../style.css" rel="stylesheet" />
    <title>Page de connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1><a href="../index.php">Connexion</a></h1>
            <form action="insertion_connexion.php" method="POST">
                <div class="form-group">
                    <label for="mail_client">Email:</label>
                    <input type="email" name="mail_client" id="mail_client" required>
                </div>
                <div class="form-group">
                    <label for="mdp_client">Mot de passe:</label>
                    <input type="password" name="mdp_client" id="mdp_client" required>
                </div>
                <button type="submit" class="btn">Se connecter</button>
            </form>
        </div>
</html>

