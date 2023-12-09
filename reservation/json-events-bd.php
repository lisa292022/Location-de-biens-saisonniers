<?php
    
    include("../include/connexion.inc.include");
    require_once('../class/reservation_class.php');
    $oreservation = new Reservations(1);
    $oreservation->setcode($code);
    //if (isset($_GET['view'])) {
        //header('Content-Type: application/json');
        //$start = $_GET["start"];
        //$end = $_GET["end"];
        
    // récupération id_client
    if (isset($_POST['id_client']))
    {
        $id_client = $_POST['id_client'];
    }
    
    
        $tableau_event=[];
        $i=0;
        $stmt = $oreservation->getAllReservation();
        foreach ($stmt as $unstmt ) {
            
            $tableau_event[$i]['id']=$unstmt['id'];
            $tableau_event[$i]['title']=$unstmt['title'];
            $tableau_event[$i]['start']=$unstmt['start'];
            $tableau_event[$i]['end']=$unstmt['end'];
            $tableau_event[$i]['startEditable']=true;
            $i=$i+1;  
        }
        echo json_encode($tableau_event);
        
           
        //exit;
    //}
?>
