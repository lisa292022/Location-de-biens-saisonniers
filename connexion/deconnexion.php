<!DOCTYPE html>

<html>
    <head>
        <title>Page de déconnexion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../style.css" rel="stylesheet" />
    </head>
    <body>       
        <form method="POST" action="trait.php">
            <fieldset>
                <legend> <b> Vous êtes déconnecté </b></legend>
                
                    <?php 
                    session_start();
                    $_SESSION['connecter'] = "non";
                    $_SESSION['admin'] = "non";
                    $_SESSION['client'] = 0;
                    ?>
                </fieldset>
        </form>        
        <a href="../front/acceuil.php"><img src="../photo/home.jfif" title="Page d'accueil"></a>
    </body>
</html>