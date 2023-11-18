<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="style.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <ul id="menu">
                <li><img src="./photo/moundef_computing.PNG"><li>
                <li><a href="./connexion/login.php">Mon compte</a></li>
                <li><a href="#">Mes Réservations</a></li>
            </ul>
        </header>
        <main>
            <h1>Trouvez la location de vos rêves</h1>
            <form>
                <label for="destination">Destination :</label>
                <input type="text" id="destination" name="destination" placeholder="Entrez une destination">
                
                <br/><label for="destination">Date de début :</label>
                <input type="date" id="date_debut" name="date_fin">
                <br/><label for="destination">Date de fin :</label>
                <input type="date" id="date_debut" name="date_fin">
                
                <br/><label for="nb_personne">Nombre de personnes :</label>
                <input type="number" id="nb_personne" name="nb_personne" placeholder="Entrez un nombre"> 
                
                <button type="submit">Rechercher</button>
            </form>
            
            <table>
                <caption>Résultat de votre recherche</caption>
                <thead>
                    <tr>
                      <th>Nom du bien</th>
                      <th>Ville</th>
                      <th>Nombre de pièces</th>
                      <th>Prix</th>
                      <th><th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Nom bien 1</td>
                      <td>Ville 1</td>
                      <td>1</td>
                      <td>1000</td>
                      <td><button type="submit">Consulter</button></td>
                    </tr>
                    <tr>
                      <td>Nom bien 2</td>
                      <td>Ville 2</td>
                      <td>4</td>
                      <td>1500</td>
                      <td><button type="submit">Consulter</button></td>
                    </tr>
                  </tbody>
            </table>
        </main>
    </body>
</html>
