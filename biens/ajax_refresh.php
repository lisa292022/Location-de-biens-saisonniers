<?php


 // puis création de votre requete  dans l'exemple ci dessous on sélectionne les eleves d'une BDDD 
 
	include '../include/connexion.inc.include';
        
$keyword = '%'.$_POST['keyword'].'%';  // récupère la lettre saisie dans le champ texte en provenance de JS 

//$keyword = "AM";

//$sql = "SELECT * FROM communes WHERE communes.nom_commune_postal (:var) or communes.code_postal LIKE (:var) ORDER BY nom_commune_postal ASC LIMIT 0, 10";  // création de la requete avec sélection des résultats sur la lettre 
//$req = $code->prepare($sql);
//$req->bindParam(':var', $keyword, PDO::PARAM_STR);
//$req->execute();
//$list = $req->fetchAll();

$sql = "SELECT nom_commune_postal, code_postal FROM communes ORDER BY nom_commune_postal ASC LIMIT 0, 10";
$stmt=$code->Query($sql);
$list = $stmt->fetchAll();
foreach ($list as $res) {
	//  affichage
	$Listeeleve = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $res['nom_commune_postal'].' '.$res['code_postal']);
	// sélection 
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $res['nom_commune_postal'].' '.$res['code_postal']).'\')">'.$Listeeleve.'</li>';
}
?>

