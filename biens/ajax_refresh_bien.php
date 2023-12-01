<?php
 
include '../include/connexion.inc.include';
        
$keyword = '%'.$_POST['keyword'].'%';  // récupère la lettre saisie dans le champ texte en provenance de JS 
$id = '%'.$_POST['id'].'%'; // récupère l'identifiant du champ de saisie en provenance de JS 
$list_id = '%'.$_POST['list_id'].'%'; // récupère l'identifiant de la liste de champs possible en provenance de JS 
$sql = "SELECT nom_commune_postal, code_postal FROM communes WHERE nom_commune_postal LIKE '".$keyword. "' OR code_postal LIKE '".$keyword. "' ORDER BY nom_commune_postal ASC LIMIT 0, 10";


$stmt=$code->Query($sql);
$list = $stmt->fetchAll();
foreach ($list as $res) {
	//  affichage
	$Listeeleve = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $res['nom_commune_postal'].' '.$res['code_postal']);
	// sélection 
    echo '<li onclick="set_item_cop_vil_bien('
                        . '\''.str_replace("'", "\'", $res['nom_commune_postal'].' '.$res['code_postal']).'\''
                        . ',\''.$_POST['id'].'\''
                        . ',\''.$_POST['list_id'].'\''
                        . ')'
        . '">'.$Listeeleve.'</li>';
}
?>

