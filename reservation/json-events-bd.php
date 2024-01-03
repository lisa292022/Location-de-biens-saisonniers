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
    /*if (isset($_POST['id_client']))
    {
        $id_client = $_POST['id_client'];
    }*/
    //$id_client=8;
    // récupération id_bien
    /*if (isset($_POST['id_bien']))
    {
        $id_bien = $_POST['id_bien'];
    }*/
    //$id_bien=2;
    
    
    session_start();
    if (isset($_SESSION['connecter'])) {
        if ($_SESSION['connecter'] == "oui") {
            // récupère l'id du client pour la réservation
            $id_client=$_SESSION['client'];
            // récupère l'id du bien pour la réservation
            $id_bien=$_SESSION['bien'];
        }
    }
    // date du jour au format AAAA-MM-DD hh-mm-ss
    $date = date('Y-m-d h:i:s');
    
        $tableau_event=[];
        $i=0;
        $stmt = $oreservation->getAllReservationBien($id_bien);
        foreach ($stmt as $unstmt ) {
            
            $tableau_event[$i]['id']=$unstmt['id'];
            $tableau_event[$i]['title']=$unstmt['title'];
            $tableau_event[$i]['start']=$unstmt['start'];
            $tableau_event[$i]['end']=$unstmt['end'];
            $tableau_event[$i]['id_client']=$unstmt['id_client'];
            $tableau_event[$i]['id_bien']=$id_bien;
            if ($unstmt['id_client']==$id_client)
            {
                if ($unstmt['start']<$date)
                {
                    // les réservations passées du client ne sont pas modifiables et sont affichées en rouge
                    $tableau_event[$i]['startEditable']=false;
                    $tableau_event[$i]['color']='red';
                }
                else
                {
                    if ($unstmt['annulation_resa']=='0')
                    {
                        // les réservations à venir du client sont modifiables et sont affichées en vert
                        $tableau_event[$i]['startEditable']=true;
                        $tableau_event[$i]['color']='green';
                    }
                    else
                    {
                        // les réservations annulées à venir du client ne sont pas modifiables et sont affichées en jaune
                        $tableau_event[$i]['startEditable']=false;
                        $tableau_event[$i]['color']='orange';
                        $tableau_event[$i]['title']=$unstmt['title']." (annulé)";
                    }
                }
            }
            else
            {
                // les réservations des autres clients ne sont pas modifiables et sont affichées en gris
                $tableau_event[$i]['startEditable']=false;
                $tableau_event[$i]['color']='grey';
            }
            $i=$i+1;  
        }
        echo json_encode($tableau_event);
        
           
        //exit;
    //}
?>
